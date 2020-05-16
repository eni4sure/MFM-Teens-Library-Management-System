<?php 
include("includes/connect.php");
 //require_once("Includes/sessions.php");
 function Redirect_to($New_Location){
	header("Location:".$New_Location);
	 exit;
	 }
 session_start();
	//redirects user to location   
	

	// checks if the user exist in the database
	function username_exists($username, $connection)
	{
		$sqli = "SELECT * FROM admin WHERE username='$username'";
		$result = mysqli_query($connection, $sqli);
		
		$sql = mysqli_num_rows($result);
		
		if($sql == 1){
			return true;
		}
		else
		{
			return false;
		}
		
	}

	function otherusername_exists($username, $connection)
	{
		$sqls = "SELECT * FROM otheradmin WHERE username='$username'";
		$res = mysqli_query($connection, $sqls);
		
		$sqlss = mysqli_num_rows($res);
		
		if($sqlss == 1){
			return true;
		}
		else
		{
			return false;
		}
		
	}

	
	
	//checks if a user is logged in after a period of time 
	function logged_in()
	{
			if(isset($_SESSION['username']) || isset($_COOKIE['username']))
			{
				 
			
			return true;
			}
			else
			{
				return false;
			}
	}
	
    
    //checks if a user is logged in.
    function Confirm_Login(){
    if(!logged_in()){
	
	Redirect_to("login.php");
    }
    
 }
 function Message(){
    if(isset($_SESSION["ErrorMessage"])){
       $Output="<div class=\"alert alert-danger alert-dismissable\">" ;
       $Output.=htmlentities($_SESSION["ErrorMessage"]);
       $Output.="</div>";
       $_SESSION["ErrorMessage"]=null;
       return $Output;
        
        
    }
}
function SuccessMessage(){
    if(isset($_SESSION["SuccessMessage"])){
       $Output="<div class=\"alert alert-success alert-dismissable\">" ;
       $Output.=htmlentities($_SESSION["SuccessMessage"]);
       $Output.="</div>";
       $_SESSION["SuccessMessage"]=null;
       return $Output;
        
        
	}
	
}
function PrintMessage(){
	if(isset($_SESSION["PrintMessage"])){
	   $Output="<div class=\"alert alert-success alert-dismissable\">" ;
	   $Output.=htmlentities($_SESSION["PrintMessage"]);
	   $Output.="</div>";
	   $_SESSION["PrintMessage"]=null;
	   return $Output;
		
		
	}
}


?>
