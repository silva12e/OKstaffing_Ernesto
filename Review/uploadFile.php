<?php
	session_start();
	
	//local variables
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	
	if(isset($_FILES['fileToUpload']))
	{
		//create file array
		$file = $_FILES['fileToUpload'];
		
		//file properties
		$filename = $file['name'];
		$fileTempLoc = $file['tmp_name'];
		$fileSize = $file['size'];
		$fileError = $file['error'];
		
		//Check if directory exist. If it doesn't, then it creates the  directory
		if(!file_exists('Uploads/'.$firstname.''.$lastname.'/'.$filename))
		{
			mkdir('Uploads/'.$firstname.''.$lastname.'/'.$filename, 0777, true);
			echo "file created";
		}
		
		//Extract file extension
		$fileExtension = explode('.', $filename);
		$fileExtension = strtolower(end($fileExtension));
		
		//Allowd extension
		$extensionAllowed = array('docx');
		
		//if the extension is allowed
		if(in_array($fileExtension, $extensionAllowed))
		{
			//Check for errors
			if($fileError === 0)
			{				
				//Check Max file size
				if($fileSize <= 2097152)
				{
					$fileNewName = uniqid('',  true).'.'.$fileExtension;
					$fileDestination = 'Uploads/'.$firstname.''.$lastname.'/'.$filename;
					
					if(move_uploaded_file($fileTempLoc, $fileDestination))
					{
						echo "File Uploaded";
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