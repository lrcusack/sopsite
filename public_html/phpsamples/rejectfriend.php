<?php
//start session and connect to database

session_start();
$conn = mysql_connect("localhost","lrcusack","S3Cr3T.228");
    if (!$conn)
        {echo "Unable to connect to database: " . mysql_error(); 
        exit;}

    $db = mysql_select_db('lrcusack',$conn);
    if (!$db)
	{echo "Unable to find database: " . mysql_error();
	exit;}
        
//get variables for query to delete entry from FriendReq
$currentUserID = $_SESSION['currentUserID'];
$requester= $_GET['fid'];
$query="DELETE FROM FriendReq 
        WHERE senderID='$requester' 
        AND recieverID = '$currentUserID';";
//send query to delete friend request
$result=mysql_query($query);
if($result)
echo 'Successfully ignored friend request, 
    <a href="home.php">return home</a>';
else {
    echo 'Could not ignore friend request, please try again.';
}

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
