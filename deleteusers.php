<?php include("includes/connect.php");?>
	<?php include("includes/functions.php");?>
								 
                                          <?php
                                         $SearchQueryParameter = $_GET['delete'];

                                          	$date  = "SELECT  datereturned FROM $SearchQueryParameter WHERE datereturned  = 'Book not yet returned'";
										        $collectdate = mysqli_query($connection, $date);
										        $collecteddate = mysqli_fetch_array($collectdate);

										        if(!$collecteddate){
        	                                  $remove = "UPDATE `users` SET `statususer`='Disable' WHERE `user`='$SearchQueryParameter'";
            	                              $delete = mysqli_query($connection, $remove);
											  if($edit){
												$_SESSION["SuccessMessage"]="User Deleted Successfully";
												Redirect_to("users.php");
												}
												
											}else{
												$_SESSION["ErrorMessage"]="You cant delete this person because he is still owing some books";
											Redirect_to("users.php");
													
											
                                       Redirect_to("users.php");
										}
                                       ?>