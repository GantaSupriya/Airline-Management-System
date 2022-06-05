<?php
	namespace App\Models;
	class deactivate_jet
	{
		public $temp, $temp2, $temp3;
		public function deactivateflight()
		{
			if(isset($_POST['Deactivate']))
			{
				$data_missing=array();
				if(empty($_POST['jet_id']))
				{
					$data_missing[]='Jet ID';
				}
				else
				{
					$jet_id=trim($_POST['jet_id']);
				}

				if(empty($data_missing))
				{
					require_once('Database Connection file/mysqli_connect.php');
					$query="UPDATE Jet_Details SET active='No' WHERE jet_id=?";
					$stmt=mysqli_prepare($dbc,$query);
					mysqli_stmt_bind_param($stmt,"s",$jet_id);
					mysqli_stmt_execute($stmt);
					$affected_rows=mysqli_stmt_affected_rows($stmt);
					$this->temp = $affected_rows;
					//echo $affected_rows."<br>";
					// mysqli_stmt_bind_result($stmt,$cnt);
					// mysqli_stmt_fetch($stmt);
					// echo $cnt;
					mysqli_stmt_close($stmt);
					mysqli_close($dbc);
					/*
					$response=@mysqli_query($dbc,$query);
					*/
					$tempstrthis;
					if($affected_rows==1)
					{
						$tempstrthis = "Successfully Deactivated";
						$this->temp2 = $tempstrthis;
						echo "Successfully Deactivated";
						header("location: deactivate_jet_details.php?msg=success");
					}
					else
					{
						$tempstrthat = "Submit Error";
						$this->temp3 = $tempstrthat;
						echo "Submit Error";
						echo mysqli_error();
						header("location: deactivate_jet_details.php?msg=failed");
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
				echo "Deactivate request not received";
			}
			$tempstrresult;

		}
		public function checkForTest($affected_rows, $tempstrthis, $tempstrthat)
		{
			if ($temp == 1)
			{
				$tempstrresult = $tempstrthis;
				return $tempstrresult;
			}
			else 
			{
				$tempstrresult = $tempstrthat;
				return $tempstrresult;
			}
		}


	}
			
?>