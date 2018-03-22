<?php

	/**
	 * 查询 表名,[查询字段],[查询条件],[排序方式],[偏移量和读取数量]
	 */
	function dbSelect($tableName, $selectName = '*', $where = null, $orderBy = null, $limit = null)
	{
		$sql = 'select '.$selectName.' from '.DB_PREFIX.$tableName;
		if(!empty($where)){
			$sql.=' where '.$where;
		}
		if(!empty($orderBy)){
			$sql.=' order by '.$orderBy;
		}
		if(!empty($limit)){
			$sql.=' limit '.$limit;
		}
		//echo $sql.'<br />';
		//exit;
		return dbConn(trim($sql), true);
	}

	//多表查询 表名1,表名2,[查询字段],[查询条件],[排序方式],[偏移量和读取数量]
	function dbDuoSelect($tableName1, $tableName2, $on, $tableName3=null, $on1=null, $selectName='*', $where=null, $orderBy=null ,$limit=null){

		$sql='select '.$selectName.' from '.DB_PREFIX.$tableName1.' inner join '.DB_PREFIX.$tableName2.' '.$on;

		if(!empty($tableName3)){
			$sql='select '.$selectName.' from '.DB_PREFIX.$tableName1.' inner join '.DB_PREFIX.$tableName2.' '.$on.' inner join '.DB_PREFIX.$tableName3.' '.$on1;
		}

		if(!empty($where)){
			$sql.=' where '.$where;
		}

		if(!empty($orderBy)){
			$sql.=' order by '.$orderBy;
		}

		if(!empty($limit)){
			$sql.=' limit '.$limit;
		}
		//echo $sql;
		//exit;
		return dbConn(trim($sql), true);

	}

	//计算查询结果  表名,[sql函数],[查询条件]
	function dbFuncSelect($tableName, $funcName='sum(id)', $where=null)
	{
		$sql='select '.$funcName.' from '.DB_PREFIX.$tableName;
		if(!empty($where)){
			$sql.=' where '.$where;
		}
		if(!empty($orderBy)){
			$sql.=' order by '.$orderBy;
		}
		if(!empty($limit)){
			$sql.=' limit '.$limit;
		}
		return dbConn(trim($sql), true, true);

	}

	//添加,传进来的都是字符串  表名,[字符串：字段名],[字符串：值]
	function dbInsert($tableName, $Key=null, $Val=null){

		$sql='';

		if(empty($Key) || empty($Val)){
			return false;
		}else{

			$Key=trim($Key);

			$Val=trim($Val);

			$sql='insert into '.DB_PREFIX.$tableName.'('.$Key.') values('.$Val.')';

			return dbConn(trim($sql));
		}
	}

	//删除  表名,[查询条件]
	function dbDel($tableName, $where=null)
	{
		if(empty($where)){
			return false;
		}
		$sql='delete from '.DB_PREFIX.$tableName.' where '.$where;

		return dbConn(trim($sql));
	}

	//修改  表名,[字段名1=值1，...],[条件]
	function dbUpdate($tableName, $value, $where=null)
	{
		if(empty($where)){
			$sql='update '.DB_PREFIX.$tableName.' set '.$value;
		}else{
			$sql='update '.DB_PREFIX.$tableName.' set '.$value.' where '.$where;
		}
		//echo $sql;
		//exit;
		return dbConn(trim($sql));
	}

	/**
	 * 打开数据库,参数1：sql语句，参数2：为true时返回查询结果集，参数3：为true时sql语句中使用了sql函数
	 * @param
	 * @param
	 * @param
	 * @return
	 */
	function dbConn($sql, $rtn=false, $func=false)
	{
		$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		if(mysqli_connect_errno($conn)){
			return false;
		}
		mysqli_set_charset($conn, DB_CHARSET);
		$result = mysqli_query($conn, $sql);
		if($result && mysqli_affected_rows($conn))
		{
			if($func)
			{
				return $data = mysqli_fetch_assoc($result);
			}

			if($rtn)
			{
				$rlt = array();
				while($data = mysqli_fetch_assoc($result))
				{
					array_push($rlt, $data);
				}
				return $rlt;
			}else{
				return $result;
			}
		}else{
			return false;
		}
		mysqli_close($conn);

	}