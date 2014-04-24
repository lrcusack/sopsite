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
            $conn = mysql_connect("localhost", "lrcusack", "S3Cr3T.228");
	
            if (!$conn) {
                echo "Unable to connect to DB: " . mysql_error();
                exit;}
	
            if (!mysql_select_db("lrcusack")) {
                echo "Unable to select database: " . mysql_error();
                exit;}
            //get userinformation (current user's wall or friend's wall)
            $currentID = $_SESSION['currentUserID'];
            if(isset($_GET['uid'])) $postee=$_GET['uid'];
            else $postee= $currentID;
            
            //get information to fill in post
            $text= $_POST['posttext'];
            $date = date('F j, Y');
            //query to add new entry to Post
            $query="INSERT INTO Post (ownerID, posterID, txt, date) 
                VALUES ('$postee', '$currentID', '$text', '$date');";
            $result = mysql_query($query);
            
            if(!$result)
                {echo "Failed to add friend, please try again."; exit;}
                else {
                    echo 'Successfully posted to wall, <a href="home.php">return home</a>';
                    //generate page to return home
                }
        ?>
    </body>
</html>
