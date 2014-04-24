<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
  <meta content="text/html; charset=ISO-8859-1"
 http-equiv="content-type">
  <title>Welcome to MyFrontPorch</title>
</head>
<body>
    <?php 
    //start session and connect to database
    session_start(); 
    $currentUser=$_SESSION['username'];
    $conn = mysql_connect("localhost","lrcusack","S3Cr3T.228");
    if (!$conn)
        {echo "Unable to connect to database: " . mysql_error(); 
        exit;}

    $db = mysql_select_db('lrcusack',$conn);
    if (!$db)
	{echo "Unable to find database: " . mysql_error();
	exit;}
        
        //initialize variables for query to find the wall's owner
    $uid=$_GET['uid'];
    $query1="SELECT * FROM User WHERE userID='$uid'";
    $result1=  mysql_query($query1);
    $row1=  mysql_fetch_assoc($result1);
    ?>
<div style="font-weight: bold; text-align: center;"><big><big><big>MyFrontPorch<br>
</big></big></big></div>
<a href="home.php">Home</a><br>
<?php echo $currentUser;?> 
<a href="profile.php">Profile</a><br>
<a href="logout.php">Log Out</a><br>
<br>

<?php echo $row1[fn] . "'s Wall     <br>";
echo '<a href="profile.php?uid='.$uid.'">Profile</a>'?>

<form action="posttowall.php?uid=<?php echo $uid ?>" method="post">
  <input size="90" name="posttext"><input
 value="Post" type="submit"><br>
</form>
<?php
//same as in home.php 

//find all matching posts, display poster name, date, and text
$query4="SELECT * FROM Post WHERE ownerID='$uid';";
$result4=  mysql_query($query4);
while ($row = mysql_fetch_assoc($result4)) {
    $posterID=$row['posterID'];
    $query5="SELECT fn, ln FROM User WHERE userID='$posterID';";
    $result5=  mysql_query($query5);
    $poster=  mysql_fetch_assoc($result5);
    echo $poster['fn'] . ' ' . $poster['ln'] . ' --- ' 
            . $row['date'] . ' --- ' . $row['txt'] . '<br>';
}

?>









</body>
</html>
