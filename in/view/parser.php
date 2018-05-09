<?php
	$file = file_get_contents("template.html");
	echo $file;
	
	echo "<br><br>After Parsing<br><br>";
	
	$fread = fopen("template.html", "r") or die("can't read stdin");
	$fwrite = fopen("template2.html", "w") or die("can't write stdin");
	while (!feof($fread)) {
		$line = fgets($fread);
		$line = preg_replace_callback(
			'|{{(\w*)}}|',
			"replace",
			$line
		);
		echo $line;
		fwrite($fwrite, $line);
	}
	fclose($fread);
	fclose($fwrite);
	
	function replace($placeHolder) {
				$cvData = array(
					"Name" => "Shriniwas Waphare",
					"Age" => "24",
					"Sex" => "Male"
				);
				
				$keys = array_keys($cvData);
				
				foreach($keys as $key){
					if($key == $placeHolder[1]){
						return $cvData[$key];
					}
				}
			}
?>