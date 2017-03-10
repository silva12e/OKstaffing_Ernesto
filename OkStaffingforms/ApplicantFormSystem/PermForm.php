<?php
session_start();

//Storing user input into session variables
$_SESSION['permQuestion1'] = $_POST['permQ1'];
$_SESSION['permQuestion2'] = $_POST['permQ2'];
$_SESSION['permQuestion3'] = $_POST['permQ3'];
$_SESSION['permQuestion4'] = $_POST['permQ4'];
$_SESSION['permQuestion5'] = $_POST['permQ5'];

if(isset($_FILES['file1']))
{
	//Create file array
	$file = $_FILES['file1'];
	
	//File properties
	$filename = $file['name'];
	$fileTempLoc = $file['tmp_name'];
	$fileSize = $file['size'];
	$fileError = $file['error'];
	
	//Extract file extension to only accept .docx
	$fileExtension = explode('.', $filename);
	$fileExtension = strtolower(end($fileExtension));
	
	//Allowd extension
	$extensionAllowed = array('docx');
	
	//Will return true if extension is allowed
	if(in_array($fileExtension, $extensionAllowed))
	{
		//If there is no error
		if($fileError === 0)
		{
			//Checking the size of the file is valid
			if($fileSize <= 2097152)
			{
				$fileNewName = uniqid('', true).'.'.$filnsion;
				$fileDestination = 'uploads/'.$fileNewName;
				
				if(move_uploaded_file($fileTempLoc, $fileDestination))
				{
					echo $fileDestination;
				}
			}		
		}
	}
 
	
}


?>