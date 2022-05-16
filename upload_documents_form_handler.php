<html>
	<head>
		<title>Upload documents</title>
	</head>
	<body>
		<?php
        $status = $statusMsg = ''; 
			if(isset($_POST['Submit']))
			{
                $status = 'error'; 
    if(!empty($_FILES["image"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 




				$data_missing=array();
                if(empty($_POST['username']))
                {
                    $data_missing[]='User Name';
                }
                else
                {
                    $user_name=trim($_POST['username']);
                }
				if(empty($data_missing))
				{
					require_once('Database Connection file/mysqli_connect.php');
					// $query="INSERT INTO Customerdoc (image,created) VALUES ('$imgContent',NOW())";
					// $stmt=mysqli_prepare($dbc,$query);
					// mysqli_stmt_execute($stmt);
					// $affected_rows=mysqli_stmt_affected_rows($stmt);
					// //echo $affected_rows."<br>";
					// // mysqli_stmt_bind_result($stmt,$cnt);
					// // mysqli_stmt_fetch($stmt);
					// // echo $cnt;
					// mysqli_stmt_close($stmt);
					// mysqli_close($dbc);
					// /*
					// $response=@mysqli_query($dbc,$query);
					// */
					// if($affected_rows==1)
					// {
					// 	header('location:user_reg_success.php');
					// }
					// else
					// {
					// 	echo "Submit Error";
					// 	echo mysqli_error();
					// }
                    $insert = $db->query("INSERT into images (image, created) VALUES ('$imgContent', NOW())"); 
             
                    if($insert){ 
                        $status = 'success'; 
                        $statusMsg = "File uploaded successfully."; 
                    }else{ 
                        $statusMsg = "File upload failed, please try again."; 
                    }  
                }else{ 
                    $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
                } 
            }else{ 
                $statusMsg = 'Please select an image file to upload.'; 
            } 
        } 
				}
				else
				{
					echo "The following data fields were empty! <br>";
					foreach($data_missing as $missing)
					{
						echo $missing ."<br>";
					}
				}
			}
			else
			{
				echo "Submit request not received";
			}
		?>
	</body>
</html>