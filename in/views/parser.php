<?php
/*
* author - Shriniwas Waphare
* 
* Template parsing code for replacing keys with values 
*/
	require 'KeyNotFoundException.php';
	
	$fileName = $_GET["fileName"];
	$homeButton = "<html>".
		"<form method = 'get' action = 'index.html'>".
		"<button type = 'submit'>HOME</button>".
		"</form>".
		"</html>";
		
	$fread = fopen($fileName, "r") or die("can't read stdin");
	$fwrite = fopen("parsedTemplate.html", "w") or die("can't write stdin");
	try{
		while (!feof($fread)) {
			$line = fgets($fread);
			$line = preg_replace_callback(
				'|{{(\w*)}}|',
				"replace",
				$line
			);
			//echo $line;
			fwrite($fwrite, $line);
		}
		fwrite($fwrite, $homeButton);
		fclose($fread);
		fclose($fwrite);

		header("Location: parsedTemplate.html"); 
	}
	catch(KeyNotFoundException $e){
		$message = $e->errorMessage();
		echo "<script type='text/javascript'>alert('$message');</script>";
	}
	finally{
		echo $homeButton;
	}
	
	/* function replaces the key with the value as per cvData array */
	function replace($placeHolder) {
				$cvData = array(
					"Name" => "Shriniwas Waphare",
					"Age" => "24",
					"Sex" => "Male",
					"Course" => "MCA",
					"Marks" => "9.51"
				);
				
				$keys = array_keys($cvData);
				
				$keyFoundFlag = false;
				foreach($keys as $key){
					if($key == $placeHolder[1]){
						$keyFoundFlag = true;
						return $cvData[$key];
					}
				}				
			
				if(!$keyFoundFlag){
					throw new KeyNotFoundException();
				}
			}
?>