<?php
session_start();

//Storing user input into session variables.
$_SESSION['permQuestion1'] = $_POST['permQ1'];
$_SESSION['permQuestion2'] = $_POST['permQ2'];
$_SESSION['permQuestion3'] = $_POST['permQ3'];
$_SESSION['permQuestion4'] = $_POST['permQ4'];
$_SESSION['permQuestion5'] = $_POST['permQ5'];

//Local variables for storing file
$email = $_SESSION['email'];
$firstName = $_SESSION['lName'];
$lastName = $_SESSION['fName'];

/*File Upload file1 and/or file2
 * 
 * File structure: 
 * - Only Docx files 
 * - File size limit of 2-MB
 * - Applicant Documents/#email_FirstnameLastname/userfile
 * 
 * */
	if(isset($_FILES['file1']))
	{
		//Create file associative array
		$file = $_FILES['file1'];
		
		//file properties
		$filename = $file['name'];
		$fileTempLoc = $file['tmp_name'];
		$fileSize = $file['size'];
		$fileError = $file['error'];
		
		//file path 
		$filePath = 'Applicant_Documents/'.$email.'_'.$firstName.''.$lastName;
		
		//Check if directory exist. If it doesn't, then it creates the  directory
		if(!file_exists($filePath))
		{
			mkdir($filePath, 0777, true);
			echo "Directory created";//output for testing
		}
	
		
		//Extract file extension
		$fileExtension = explode('.', $filename);
		$fileExtension = strtolower(end($fileExtension));
		
		//Array that stores a list of allowed file extensions
		$extensionAllowed = array('docx');
		
		//If the extension is allowed
		if(in_array($fileExtension, $extensionAllowed))
		{
			//Check for errors
			if($fileError === 0)
			{
				//Check File size
				if($fileSize <= 2097152)
				{
					$fileNewName = uniqid('',  true).'.'.$fileExtension;
					$fileDestination = $filePath.'/'.$filename;
						
					if(move_uploaded_file($fileTempLoc, $fileDestination))
					{
						echo "the file '$filename' was succesfully Uploaded";
					}
					else
					{
						echo "File NOT uploaded";
					}
				}
			}
		}
	}

	if(isset($_FILES['file2']))
	{
		$file = $_FILES['file2'];
	
		//file properties
		$filename = $file['name'];
		$fileTempLoc = $file['tmp_name'];
		$fileSize = $file['size'];
		$fileError = $file['error'];
	
		//file path
		$filePath = 'Applicant_Documents/'.$email.'_'.$firstName.''.$lastName;
	
		//Extract file extension
		$fileExtension = explode('.', $filename);
		$fileExtension = strtolower(end($fileExtension));
	
		//Array that stores a list of allowed file extensions
		$extensionAllowed = array('docx');
	
		//If the extension is allowed
		if(in_array($fileExtension, $extensionAllowed))
		{
			//Check for errors
			if($fileError === 0)
			{
				//Check Max file size
				if($fileSize <= 2097152)
				{
					$fileNewName = uniqid('',  true).'.'.$fileExtension;
					$fileDestination = $filePath.'/'.$filename;
						
					if(move_uploaded_file($fileTempLoc, $fileDestination))
					{
						echo "the file '$filename' was succesfully Uploaded";
					}
					else
					{
						echo "File NOT uploaded";
					}
				}
			}
		}
	}

?>