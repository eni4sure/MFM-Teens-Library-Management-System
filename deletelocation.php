<?php include("includes/connect.php");?>
<?php require_once("includes/functions.php");?>
<?php

                                          $SearchQueryParameter = $_GET['delete'];
                                        

												 $sho = "SELECT * FROM books WHERE location_id='$SearchQueryParameter'";
                                         	 	 $sho2 = mysqli_query($connection, $sho);
                                          	     $s23 = mysqli_fetch_assoc($sho2);
                                          	     if(!$s23){
        	                                    $remove2 = "DELETE FROM location WHERE id ='$SearchQueryParameter'";
												$delete2 = mysqli_query($connection, $remove2);
												
												if($delete2){
													$_SESSION["SuccessMessage"]="Location Deleted Successfully";
												Redirect_to("location.php");
												}else{
													$_SESSION["ErrorMessage"]="Operation was unsuccesful";
												Redirect_to("location.php");
												}
                                     }else{
										$_SESSION["ErrorMessage"]="There are books in this location";
										Redirect_to("location.php");
                                     
                                       	
                                   }

                                         
                                   Redirect_to("location.php");
                                       
                                       ?>