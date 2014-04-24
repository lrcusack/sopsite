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
        session_start();//continues php session
        
        // connect to database
            $conn = mysql_connect("localhost", "lrcusack", "S3Cr3T.228");
	
            if (!$conn) {
                echo "Unable to connect to DB: " . mysql_error();
                exit;}
	
            if (!mysql_select_db("lrcusack")) {
                echo "Unable to select database: " . mysql_error();
                exit;}
            
            //set userid variables to the current user and the 
                //person who made the friend request
            $currentUserID = $_SESSION['currentUserID'];
            $requester= $_GET['fid'];
            
            //set query to create pair of friends
            $query1="INSERT INTO Friend (userID1, userID2) 
                VALUES ('$currentUserID', '$requester');";
            //evaluate query
            $result1 = mysql_query($query1);
            //check to see if query was successful
            if(!$result1)
                {echo "Failed to add friend, please try again."; exit;}
            else {
                //delete corresponding friend request
                $query2="DELETE FROM FriendReq 
                WHERE senderID='$requester' 
                AND recieverID = '$currentUserID'";
                  mysql_query($query2);
                  echo 'Successfully added friend, <a href="home.php">return home</a>';
            }
            
        ?>
    </body>
</html>
