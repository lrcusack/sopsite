<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
  <meta content="text/html; charset=ISO-8859-1"
 http-equiv="content-type">
  <title>Welcome to MyFrontPorch</title>
</head>
<body>
    <?php session_start(); //continue session
    $currentUser=$_SESSION['username'];
    $currentID=$_SESSION['currentUserID'];
    //connect to database
    $conn = mysql_connect("localhost","lrcusack","S3Cr3T.228");
    if (!$conn)
        {echo "Unable to connect to database: " . mysql_error(); 
        exit;}

    $db = mysql_select_db('lrcusack',$conn);
    if (!$db)
	{echo "Unable to find database: " . mysql_error();
	exit;}
    
    ?>
<div style="font-weight: bold; text-align: center;"><big><big><big>MyFrontPorch<br>
</big></big></big></div>
<a href="home.php">Home</a><br>
<?php echo $currentUser;?> <a href="profile.php">Profile</a><br>
<a href="logout.php">Log Out</a><br>
<br>
Friend requests:<br>


<?php
//generate list of friend requests
$query1="SELECT * FROM FriendReq WHERE recieverID='$currentID';";//query friend requests involving user
$result1=  mysql_query($query1);
//for each friend request, find the requesters and display their names
while ($row = mysql_fetch_assoc($result1)) {
    $friendID=$row['senderID'];
    $query2="SELECT fn, ln FROM User WHERE userID='$friendID';";
    $result2=  mysql_query($query2);
    $friendname = mysql_fetch_assoc($result2);        
        echo $friendname['fn'] . ' ' . $friendname['ln'] . ' ' . 
                '<a href="approvefriend.php?fid=' . $friendID .
                '">Accept</a>' . ' <a href="rejectfriend.php?fid='
                . $friendID .'">Ignore</a>';
        echo '<br>';
        
}

?>



My Wall<br>
<form action="posttowall.php" method="post">
  <input size="90" name="posttext"><input
 value="Post" type="submit"><br>
</form>
<?php
//Display all posts to the current user's 
//query all posts to user
$query4="SELECT * FROM Post WHERE ownerID='$currentID';";
$result4=  mysql_query($query4);

//go through results and print the names, dates, and post texts.
while ($row = mysql_fetch_assoc($result4)) {
    $posterID=$row['posterID'];
    $query5="SELECT fn, ln FROM User WHERE userID='$posterID';";
    $result5=  mysql_query($query5);
    $poster=  mysql_fetch_assoc($result5);
    echo $poster['fn'] . ' ' . $poster['ln'] . ' --- ' 
            . $row['date'] . ' --- ' . $row['txt'] . '<br>';
}

?>
<form action="friendrequest.php" method="post">
  <input size="40" type ="text" name="reqfriend"><input
 value="Send Friend Request" type="submit"></form>

My Friends:<br>
<?php
//start list of friends here
//query pairs of friends
$query3="SELECT * FROM Friend WHERE 
    userID1='$currentID' OR userID2='$currentID';";
$result3=  mysql_query($query3);

//for each pair of friends, figure out which friend is not
//the current user, print that one instead of the current user
while ($row = mysql_fetch_assoc($result3)) {
    if($row['userID1']==$currentID)
    {
        $friendID=$row['userID2'];
    }
    else{
        $friendID=$row['userID1'];
    }
    //get info on friend
    $query2="SELECT fn, ln, userID FROM User WHERE userID='$friendID';";
    $result2=  mysql_query($query2);
    
    //print friend name and link to wall
    $friendname = mysql_fetch_assoc($result2);        
        echo '<a href="wall.php?uid=' . $friendname['userID'] . '">'
                . $friendname['fn'] . ' ' . $friendname['ln'].'</a>';
        echo '<br>';
        
}

?>
<br>
</body>
</html>
