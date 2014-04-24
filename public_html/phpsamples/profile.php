<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
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

        // check if it is current user's wall or a friend's wall
        if(!isset($_GET['uid']))
            //if it is not friend's wall, display edit profile form
        {   
            //get userid and profile, set up editing form
            $uid=$_SESSION['currentUserID'];
            $query2="SELECT * FROM User WHERE userID='$uid'";
            $result2=  mysql_query($query2);
            $row2=  mysql_fetch_assoc($result2);
            $currentProfile=$row2['profile'];
            echo
            '<form id="profileform" name="profileform" 
            method="post" action="saveprofile.php">
            <textarea name="profiletext" id="profiletext" 
            cols="45" rows="5">' . $currentProfile . 
            '</textarea><input name="SaveProfile" 
            type="submit" id="SaveProfile" value="SaveProfile" />
            </form>';}
        else
        {
            //otherwise print friend's profile text
            $uid=$_GET['uid'];
            $query1="SELECT * FROM User WHERE userID='$uid'";
            $result1=  mysql_query($query1);
            $row1=  mysql_fetch_assoc($result1);
            echo $row1['profile'];
        }
        ?>
    </body>
</html>
