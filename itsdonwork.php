<?php
session_start();
include 'connection2.php';

//$idvalue = $_SESSION["myvalue"];


													

															 
	

														$getname=htmlspecialchars(trim($_POST["matricno"]));
														$getname2=htmlspecialchars(trim($_POST["fullname"]));
														$getname3=htmlspecialchars(trim($_POST["course"]));
														$getname4=htmlspecialchars(trim($_POST["dept"]));
														$getname5=trim($_POST["bloodgp"]);
														//$dstrip=trim($_POST["mats"]);
														//$stripped = trim(preg_replace('/[^-0-9\d\\/\\\]/i','', $dstrip));
														$getname6=trim($_POST["matricno"]);;
														$getname7=trim($_POST["prog"]);
														$getname8=trim($_POST["sess"]);
													//	var_dump($getname7);
														
														// ECHO "THIS IS getname7  ".$getname7;exit;
                                                      //gets last inserted id
															$stmt = $dbh->prepare("SELECT id FROM entry WHERE id=:id");
															 $stmt->execute(array(':id' => $getname8));
															 
															  $result = array(); 
															  while($row = $stmt->fetch(PDO::FETCH_ASSOC) ){
															  $idvalue = $row['id'];//from database
															   
															 }
															 

												//	var_dump($idvalue); exit;
														
$pos = date("Y-m-d");
$xtu =explode("-",$pos);
$voms1 = $xtu[0]; 
$voms = $voms1-1; 
$seg = $xtu[1]; 
$iou = $xtu[2];

global $voms1,$seg1,$xtu1;
$xtu1 =explode(" ",$getname5);
$voms1 = $xtu1[0]; 
$seg1 = $xtu1[1]; 


				if($seg1 == ""){
					$getname5 = $voms1."+";
					//echo "BLOODGP no is ".$getname5; exit;
				}else
				{
				$getname5 == $getname5;
				//echo "GRACE".$getname5; exit;
				}
			
$sql = "SELECT count(*) FROM entry WHERE matric = '$getname6'"; 
$result = $dbh->prepare($sql); 
$result->execute(); 
$number_of_rows = $result->fetchColumn(); 


if ($number_of_rows < 1 && $getname2 <> '')
				{
								
																		if($getname4 == '')//dept most be null for official
																				{
																				$bou = $voms;
																				$sessn = $bou;
																				$poly = "NASPOLY/NC/POLY/000";
																	//		  ECHO "THIS IS SESSN".$sessn."and bou".$bou;exit;
																				}						
																		else if($getname7 == "HND" || $getname7 == "ND" || $getname7 == "CONS")
																			{
																				$bou = $voms + 2;
																				$sessn = $bou;
																				$poly = "NASPOLY/NC/POLY/000";
																				
																				
																				//ECHO "THIS IS SESSN".$sessn."and bou".$bou;exit;
																			}	
																				
																	//			ECHO "THIS IS SESSN".$sessn."and bou".$bou;exit;
								
								$counters=1;
								$today = date('Y-m-d');
								$counters = $today;
								//echo "num_rows is $num_rows,<br/> idvalue is $idvalue <br/> and matric is $getname <br/><br/>"; echo "matrci no is $getname, <br/> $getname2, <br/>$getname3,<br/>$getname4,<br/>$getname5"; exit;
								$stmt = $dbh->prepare("UPDATE entry SET 
														matric=:matric,
														fullname=:fullname,
														course=:course, 
														dept=:dept,
														voms=:voms,
														counter=:counter,
														session=:session, 
														principal=:principal,
														prog=:prog,
														others=:others,
														nacos=:nacos,
														bloodgp=:bloodgp
														
														WHERE id=:id");
									$stmt->bindparam(':matric', $getname6);
								   $stmt->bindparam(':fullname', $getname2);
								 $stmt->bindparam(':course', $getname3);
								 $stmt->bindparam(':dept', $getname4);
								   $stmt->bindparam(':voms', $voms);
								 $stmt->bindparam(':counter', $counters);
								 $stmt->bindparam(':session', $sessn);
								  $stmt->bindparam(':principal', $voms);
								  $stmt->bindparam(':prog', $getname7);
								  $stmt->bindparam(':others', $poly);
								  $stmt->bindparam(':nacos', $idvalue);
								 $stmt->bindparam(':bloodgp', $getname5);
								  $stmt->bindparam(':id', $idvalue);
								 $stmt->execute();
								
								
								echo "Record of student $getname6 created";
								
				}
				
				else
				
				{
				
				
															echo "Student with Matric No ".$getname6." already exist get another student, Please!";	
															
															
															//delete upload files
														 /*$stmt = $dbh->prepare("SELECT * FROM entry ORDER BY id DESC limit 1");
															 $stmt->execute();
															 
															while($row = $stmt->fetch(PDO::FETCH_ASSOC) ){
															  $aStudentPAY = $row['id'];//from database
															   $aStudentIM = $row['image_name'];//from database
															 }

															 */
														 
															 $stmt = $dbh->prepare("SELECT * FROM entry WHERE id=:id");
															 $stmt->execute(array(':id' => $getname8));
															 
															  $result = array(); 
															  while($row = $stmt->fetch(PDO::FETCH_ASSOC) ){
															  $aStudentPAY = $row['id'];//from database
															    $aStudentIM = $row['image_name'];//from database
															 }
															 $image_name=$aStudentIM;
													
													
													
															$myfile = "upload/".$image_name.".jpg";
															
															
															
															unlink($myfile);
																
															$safeid = $aStudentPAY;
														
														$stmt = $dbh->prepare("DELETE FROM entry WHERE id=:id");
															$stmt->execute(array(':id' => $safeid));
																			
															$stmt = $dbh->prepare("DELETE FROM entry WHERE matric=:matric");
															$stmt->execute(array(':matric' => NULL));
				}

	 $dbh = null;
?>