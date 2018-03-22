<?php
	
	$pageConfig = [
		"header"=>"条记录", 
		"prev"=>"上一页", 
		"next"=>"下一页", 
		"first"=>"首 页", 
		"last"=>"尾 页"
	];

	/**
	 * 设置 Limit
	 */
	function setLimit($listRows)
	{
		$page = !empty($_GET["page"]) ? $_GET["page"] : 1;
		return ' ' . ($page-1) * $listRows . ',' . $listRows;
	}

	/**
	 * 设置 URL
	 */
	function getUri($pa = ''){

		$url = $_SERVER["REQUEST_URI"] . (strpos($_SERVER["REQUEST_URI"], '?')?'':"?") . $pa;
		$parse = parse_url($url);

		if(isset($parse["query"]))
		{
			parse_str($parse['query'], $params);
			unset($params["page"]);
			$url = $parse['path'].'?' . http_build_query($params);
		}

		return $url;
	}

	/**
	 * start
	 * @param Integer $total 数据表中总记录数
	 * @param Integer $listRows 每页显示行数
	 * @return Integer 
	 */
	function pageStart($total, $listRows)
	{
		if($total == 0)
		{
			return 0;
		}else{
			$page = !empty($_GET["page"]) ? $_GET["page"] : 1;
			return ($page - 1) * $listRows;
		}
	}

	/**
	 * end
	 * @param Integer $total 数据表中总记录数
	 * @param Integer $listRows 每页显示行数
	 * @return Integer 
	 */
	function pageEnd($total, $listRows){
		$page = !empty($_GET["page"]) ? $_GET["page"] : 1;
		return min($page * $listRows, $total);
	}

	/**
	 * first
	 * @param Integer $total 数据表中总记录数
	 * @param Integer $listRows 每页显示行数
	 * @return Integer 
	 */
	function pageFirst(){
		Global $pageConfig;
		$page = !empty($_GET["page"]) ? $_GET["page"] : 1;
		if($page == 1)
			$html .= '';
		else
			$html .= "&nbsp;&nbsp;<a href='".getUri()."&page=1'>".$pageConfig["first"]."</a>&nbsp;&nbsp;";

		return $html;
	}

	/**
	 * prev
	 * @param Integer $total 数据表中总记录数
	 * @param Integer $listRows 每页显示行数
	 * @return Integer 
	 */
	function pagePrev(){
		Global $pageConfig;
		$page = !empty($_GET["page"]) ? $_GET["page"] : 1;
		if($page == 1)
			$html .= '';
		else
			$html .= "&nbsp;&nbsp;<a href='".getUri()."&page=".($page-1)."'>".$pageConfig["prev"]."</a>&nbsp;&nbsp;";

		return $html;
	}

	function pageList($total, $listRows)
	{
		$linkPage = '';
		$page = !empty($_GET["page"]) ? $_GET["page"] : 1;
		$pageNum = ceil($total/$listRows);
		$inum = floor($listNum/2);
	
		for($i=$inum; $i>=1; $i--)
		{
			$pageIunm=$page-$i;

			if($pageIunm<1)
				continue;

			$linkPage .= "&nbsp;<a href='" . getUri() . "&page={$pageIunm}'>{$pageIunm}</a>&nbsp;";

		}
	
		$linkPage .= "&nbsp;{$page}&nbsp;";
		

		for($i=1; $i<=$inum; $i++){
			$pageIunm = $page + $i;
			if($pageIunm <= $pageNum)
				$linkPage .= "&nbsp;<a href='" . getUri() . "&page={$pageIunm}'>{$pageIunm}</a>&nbsp;";
			else
				break;
		}

		return $linkPage;
	}

	function pageNext($total, $listRows){
		Global $pageConfig;
		$page = !empty($_GET["page"]) ? $_GET["page"] : 1;
		$pageNum = ceil($total/$listRows);
		if($page == $pageNum)
			$html .= '';
		else
			$html .= "&nbsp;&nbsp;<a href='" . getUri() . "&page=".($page+1)."'>{$pageConfig["next"]}</a>&nbsp;&nbsp;";

		return $html;
	}

	function pageLast($total, $listRows){
		Global $pageConfig;
		$page = !empty($_GET["page"]) ? $_GET["page"] : 1;
		$pageNum = ceil($total/$listRows);
		if($page == $pageNum)
			$html .= '';
		else
			$html .= "&nbsp;&nbsp;<a href='" . getUri() . "&page=".($pageNum)."'>{$pageConfig["last"]}</a>&nbsp;&nbsp;";

		return $html;
	}

	function goPage($total, $listRows){
		$pageNum = ceil($total/$listRows);
		$page = !empty($_GET["page"]) ? $_GET["page"] : 1;
		return '&nbsp;&nbsp;<input type="text" onkeydown="javascript:if(event.keyCode==13){var page=(this.value>'.$pageNum.')?'.$pageNum.':this.value;location=\'' . getUri() . '&page=\'+page+\'\'}" value="'.$page.'" style="width:25px"><input type="button" value="GO" onclick="javascript:var page=(this.previousSibling.value>'.$pageNum.')?'.$pageNum.':this.previousSibling.value;location=\''.getUri().'&page=\'+page+\'\'">&nbsp;&nbsp;';
	}

	/**
	 * 显示分页内容
	 * @param Integer $total 数据表中总记录数
	 * @param Integer $listRows 每页显示行数
	 * @param Array $display
	 * @return String 
	 */
	function fpage($total, $listRows, $display = [0,1,2,3,4,5,6,7,8])
	{
		Global $pageConfig;
		$page = !empty($_GET["page"]) ? $_GET["page"] : 1;

		$html[0] = "&nbsp;&nbsp;共有<b>{$total}</b>{$pageConfig["header"]}&nbsp;&nbsp;";
		$html[1] = "&nbsp;&nbsp;每页显示<b>".$listRows."</b>条，本页<b>" . (pageStart($total, $listRows) + 1 . '-' . pageEnd($total, $listRows)) . "</b>条&nbsp;&nbsp;";
		$html[2] = "&nbsp;&nbsp;<b>" . $page . '/' . ceil($total/$listRows) . "</b>页&nbsp;&nbsp;";
		$html[3] = pageFirst();
		$html[4] = pagePrev();
		$html[5] = pageList($total, $listRows);
		$html[6] = pageNext($total, $listRows);
		$html[7] = pageLast($total, $listRows);
		$html[8] = goPage($total, $listRows);
		$fpage = '';
		foreach($display as $index)
		{
			$fpage .= $html[$index];
		}
		return $fpage;
	}
