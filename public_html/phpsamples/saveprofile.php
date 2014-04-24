<?php
//start session and connect to database
session_start();
//initialize variables for query
$profiletext = $_POST['profiletext'];
$currentUser = $_SESSION['username'];

$conn = mysql_connect("localhost","lrcusack","S3Cr3T.228");
if (!$conn)
    {echo "Unable to connect to database: " . mysql_error(); 
    exit;}

$db = mysql_select_db('lrcusack',$conn);
if (!$db)
	{echo "Unable to find database: " . mysql_error();
	exit;}

        //query to update profile
$query="UPDATE User SET profile = '$profiletext' WHERE username = '$currentUser'";

$result=mysql_query($query);

//handle errors / return home
if(!$result){echo 'Could not edit profile'. mysql_error(); exit;}
else{echo 'Successfully changed profile for '. $currentUser . 
    '<br><br><a href="home.php">Return to home page</a>';}

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
