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
        session_start();//continue php session
        //connect to database
        $conn = mysql_connect("localhost","lrcusack","S3Cr3T.228");
        if (!$conn)
            {echo "Unable to connect to database: " . mysql_error(); 
            exit;}

        $db = mysql_select_db('lrcusack',$conn);
        if (!$db)
            {echo "Unable to find database: " . mysql_error();
            exit;}
        
            //set variables to query database to find the friend request
        $currentUser= $_SESSION['currentUserID'];        
        $date = date('F j, Y');
        $reqfriend=$_POST['reqfriend'];
        $query1="SELECT userID FROM User WHERE username='$reqfriend';";
        $result1=  mysql_query($query1);
        
        /* check for matching username
         * add new entry to Friendreq table
         * provide link back to home page
         */
        if(mysql_num_rows($result1)==1)
        {   $row= mysql_fetch_assoc($result1);
            $fuserid=$row['userID'];
            $query2="INSERT INTO FriendReq (senderID, date, recieverID) 
                VALUES('$currentUser', '$date', '$fuserid');";
            $result2=  mysql_query($query2);
            if(!$result2) 
                {echo 'Could not submit friend request, please try again';
                exit;}
            else {echo 'Successfully submitted friend request to ' . $reqfriend
                    . '<br> <a href="home.php">Return Home</a>';}
        }
        else {echo 'Username not found, please try again'; exit;}
        
        
        ?>
    </body>
</html>
