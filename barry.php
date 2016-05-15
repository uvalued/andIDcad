<?php
header('Content-type: application/json'); 
include 'connection2.php';

if(isset($_GET['loc']))
		{
	
								$fille1 = $_GET['loc'];
												
								$fille=$fille1;

								$sql = "SELECT count(*) FROM ajaxstudents WHERE others = '$fille'"; 
								$result = $dbh->prepare($sql); 
								$result->execute(); 
								$number_of_rows = $result->fetchColumn(); 

								if ($number_of_rows == 1)

								{
		
														 $stmt = $dbh->prepare("SELECT * FROM ajaxstudents WHERE others=:others");
														 $stmt->execute(array(':others' => $fille));
														 
														  $result = array(); 
														  while($row = $stmt->fetch(PDO::FETCH_ASSOC) )
														  
														  {
															  
																		$matric = $row['registrationno'];//from database
																		 $lastname = $row['lastname'];//from database
																		 $middlename = $row['middlename'];//from database
																		 $surname = $row['surname'];//from database
																		
															  
																		 $lastname1= strlen($lastname);
																		 $middlename2= strlen($middlename);
																		 $surname3= strlen($surname);
																		 
																		 $idvalue = $lastname1+$middlename2+$surname3+2;
																		
																			if($idvalue > 17)
																			{
																				if((strlen($lastname1) >= strlen($middlename2)) || (strlen($lastname1) >= strlen($surname3)) ) 
																						{
																									$var = $middlename[0];
																									
																									$store = $lastname." ".$var.". ".$surname;
																									
																						}
																			   else if((strlen($middlename2) >= strlen($lastname1)) || (strlen($middlename2) >= strlen($surname3)) ) 
																						{
																									$var = $middlename[0];
																									
																									$store = $lastname." ".$var.". ".$surname;
																									$store1= strlen($store);	
																						}
																				else if((strlen($surname3) >= strlen($lastname1)) || (strlen($surname3) >= strlen($middlename2)) ) 
																						{
																									$var = $middlename[0];
																									$store = $lastname." ".$var.". ".$surname;
																						}
																			
																			}
																			else
																			{
																			 $store = $lastname." ".$middlename." ".$surname;
																			}
																		
																												
																			array_push($result, array('registrationno' => $matric,
																					'fullname' => $store,
																					'course' => $row['course'],
																					'dept' => $row['dept'],
																					'prog' => $row['prog']
																					
																					)
																					);

																			echo json_encode(array("result" => $result)); 
															}
								}
								else
								{
									echo "Null";
								}
		}
  // $dbh->null; 
?>