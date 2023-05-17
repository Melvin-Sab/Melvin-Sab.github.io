<?php 

require_once("config/db.php");

// Code for checking username availabilty
if(!empty($_POST['username']))
{
	$uname= $_POST['username'];
	$sql="SELECT UserName FROM userdata WHERE UserName=:uname";
	$stmt = $con -> prepare($sql);
	$stmt->bindParam(':uname',$uname, PDO::PARAM_STR);
	$stmt->execute();
	$results=$stmt->fetchAll(PDO::FETCH_OBJ);
	if($stmt -> rowCount() >0)
	{
		echo"<span style='color:red'>Username already exists.</span>";
	}
	else
	{
		echo"<span style='color:green'>Username available for Registration.</span>";
	}
}
// Code for checking email availabilty
if(!empty($_POST['email']))
{
	$email= $_POST['email'];
	$sql="SELECT UserEmail FROM userdata WHERE UserEmail=:email";
	$stmt = $con -> prepare($sql);
	$stmt->bindParam(':email',$email, PDO::PARAM_STR);
	$stmt->execute();
	$results=$stmt->fetchAll(PDO::FETCH_OBJ);
	if($stmt -> rowCount() >0)
	{
		echo"<span style='color:red'>Email-id already exists.</span>";
	}
	else
	{
		echo"<span style='color:green'>Email-id available for Registration.</span>";
	}
}

?>