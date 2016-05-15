<?php
session_start();
  // print "out put from session".$_SESSION['varname'];
include 'connection.php';
$uploadDir = 'upload/';

for($i=0; $i<count($_FILES["imgs"]["name"]); $i++)
{
//echo "this is value of $i \n \n";
	//if ($i<=2)
				//{
				$fileName = $_FILES['imgs']['name'][$i];
				//var_dump ($fileName);
				$tmpName = $_FILES['imgs']['tmp_name'][$i];
				//var_dump($tmpName);
				$filePath = $uploadDir . $fileName;
				//var_dump($filePath);
				//$var1=$_POST['studnum'];
				
				$result = move_uploaded_file($tmpName, $filePath);
				//var_dump($result);
				
	if (!$result) 
				{
				echo "Error uploading file";
				exit;
				}
				
				mysql_connect("localhost", "root", "anita") or die(mysql_error());
				mysql_select_db("naspolydb") or die(mysql_error());
				
				
				//sleep (15);
				
	if(!get_magic_quotes_gpc())
				{
				$fileName = addslashes($fileName);
				$filePath = addslashes($filePath);
				}
				
	//if($i==0)
				//{//customer image
				//system("mogrify -fill white  -tint 130 /storage/sdcard0/pws/www/idcard/upload/".$fileName.".jpg");	
			  $query ="Insert into entry(id,image_name,image_path) values('','$fileName','$filePath')";
				 mysql_query($query) or die('Error, query failed : ' . mysql_error());
	
			//h	}	

   $value=mysql_insert_id($con);
	//value is assigned to session which will be used in other files
    $_SESSION["myvalue"]=$value;

//echo "session is $value";
/*else
				



	if($i==1)
				{//customer signature
					$query = "insert INTO user (user_id,witness_name,path) ".
				"VALUES ('', '$fileName','$filePath')";
				
				
				 mysql_query($query) or die('Error, query failed : ' . mysql_error());
				}
				
	else
				
				
				 {//witness signature
					$query = "insert INTO witness (user_id,witness_name,path) ".
				"VALUES ('', '$fileName','$filePath')";
				
				
				 mysql_query($query) or die('Error, query failed : ' . mysql_error());
				}
				
				
				//echo "\n \n this is first $i ";
				
				*/
				//var_dump($lastid = mysql_insert_id());
					
				/*echo "<br />";
				echo "<br />";
					echo "File has been successfully uploaded.<br><br>\n CONGRATULATIONS !"; 
					echo "<br />";
					echo "<br />";
					echo "<br />";
						echo "<br />";
					
			echo "number of times ".$i."\n \n";
			&*/
"<br /><br /><br /> \n \n";
//echo "<a href='sesssign.php?amen=$var1'>Get Student Signature  ".  $var1  ."</a>&nbsp;&nbsp;&nbsp;&nbsp; \n \n"  ;
//$counter++;
					
					//}//if ($i<=2)
		//	}//for loop
		


		
echo"<script>location.href='/health/id.php'</script>";



//}
}
?>

