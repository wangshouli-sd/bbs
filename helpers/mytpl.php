<?php

	function template($tFile)
    {
		$tmpFile = TPL_SKIN.'/'.$tFile;
		if(!file_exists($tmpFile)){
			return $tmpFile;
		}

		$comFile = TPL_CACHE.'/'.basename($tFile,'.html').'.php';
		if (!file_exists($comFile) || filemtime($tmpFile)>filemtime($comFile))
		{
			tplParse($tmpFile,$comFile);
		}

    		return $comFile;
	}


	function tplParse($tFile,$cFile){

		$fileContent=file_get_contents($tFile);

		$fileContent=preg_replace_callback("/^(\xef\xbb\xbf)/", function($r){}, $fileContent);
		$fileContent=preg_replace_callback(
			"/\<\!\-\-\s*\\\$\{(.+?)\}\s*\-\-\>/is",
			function($r)
			{
				return str_replace('\"', '"', '<?php echo ' . $r[1] . '; ?>');
			},
			$fileContent
		);

		$fileContent=preg_replace_callback(
			"/\{(\\\$[a-zA-Z0-9_\[\]\\\ \-\'\,\%\*\/\.\(\)\>\'\"\$\x7f-\xff]+)\}/s",
			function($r)
			{
				return str_replace('\"', '"', '<?php echo ' . $r[1] . '; ?>');
			},
			$fileContent
		);
		$fileContent=preg_replace_callback(
			"/\\\$\{(.+?)\}/is", 
			function($r)
                        {
                                return str_replace('\"', '"', '<?php echo ' . $r[1] . '; ?>');
                        },
			$fileContent
		);
		$fileContent=preg_replace_callback(
			"/\<\!\-\-\s*\{else\s*if\s+(.+?)\}\s*\-\-\>/is", 
			function($r)
                        {
                                return str_replace('\"', '"', '<?php } else if(' . $r[1] . '){ ?>');
                        },
			$fileContent
		);
		$fileContent=preg_replace_callback(
			"/\<\!\-\-\s*\{elif\s+(.+?)\}\s*\-\-\>/is", 
			function($r)
                        {
                                return str_replace('\"', '"', '<?php } else if(' . $r[1] . '){ ?>');
                        },
			$fileContent
		);
		$fileContent=preg_replace_callback(
			"/\<\!\-\-\s*\{else\}\s*\-\-\>/is", 
			function($r)
                        {
                                return "<?php } else { ?>";
                        },
			$fileContent
		);
		for($i=0; $i<5; ++$i){
			$fileContent = preg_replace_callback(
				"/\<\!\-\-\s*\{loop\s+(\S+)\s+(\S+)\s+(\S+)\s*\}\s*\-\-\>(.+?)\<\!\-\-\s*\{\/loop\}\s*\-\-\>/is", 
				function($r)
                        	{
                                	return str_replace('\"', '"', '<?php if(is_array('.$r[1].')){foreach('.$r[1].' AS '.$r[2].'=>'.$r[3].') { ?>'.$r[4].'<?php }}?>');
                        	},
				$fileContent
			);
			$fileContent = preg_replace_callback(
				"/\<\!\-\-\s*\{loop\s+(\S+)\s+(\S+)\s*\}\s*\-\-\>(.+?)\<\!\-\-\s*\{\/loop\}\s*\-\-\>/is", 
				function($r)
                                {
                                        return str_replace('\"', '"', '<?php if(is_array('.$r[1].')){foreach('.$r[1].' AS '.$r[2].') { ?>'.$r[3].'<?php }}?>');
                                },
				$fileContent
			);
			$fileContent = preg_replace_callback(
				"/\<\!\-\-\s*\{if\s+(.+?)\}\s*\-\-\>(.+?)\<\!\-\-\s*\{\/if\}\s*\-\-\>/is", 
				function($r)
                                {
                                        return str_replace('\"', '"', '<?php if('.$r[1].'){?>'.$r[2].'<?php }?>');
                                },
				$fileContent
			);
		}

		$fileContent = preg_replace_callback(
			"#<!--\s*{\s*include\s+([^\{\}]+)\s*\}\s*-->#i", 
			function($r)
            {
                return '<?php include template("'.$r[1].'");?>';
            },
			$fileContent
		);

		file_put_contents($cFile,$fileContent);

		return true;

	}