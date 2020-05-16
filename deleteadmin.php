<?php include("includes/connect.php");?>
<?php require_once("includes/functions.php");?>
<?php

                                          $SearchQueryParameter = $_GET['Delete'];
                                        

												 $sho = "SELECT * FROM admin WHERE admin_id='$SearchQueryParameter'";
                                         	 	 $sho2 = mysqli_query($connection, $sho);
                                          	     $s23 = mysqli_fetch_assoc($sho2);
                                          	  if($s23){
        	                                    $remove2 = "DELETE FROM admin  WHERE admin_id ='$SearchQueryParameter'";
												$delete4 = mysqli_query($connection, $remove2);
												
											if($delete4){
													$_SESSION["SuccessMessage"]="Admin Deleted Successfully";
												Redirect_to("manageadmins.php");
												}else{
													$_SESSION["ErrorMessage"]="Operation was unsuccesful";
												Redirect_to("manageadmins.php");
												}
                                     }else{
										$_SESSION["ErrorMessage"]="There are books in this location";
										Redirect_to("manageadmins.php");
                                     	
                                       	
                                   }

                                         
                                   Redirect_to("manageadmins.php");
                                       
                                       ?>