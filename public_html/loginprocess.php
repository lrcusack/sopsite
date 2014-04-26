
<?php session_start(); //continue session
    $currentUser=$_SESSION['username'];
    $currentID=$_SESSION['currentUserID'];
    if(!$currentID){header("Location: index.html");exit;}
    //connect to database
    $conn = mysql_connect("localhost","lrcusack","S3Cr3T.228");
    if (!$conn)
        {echo "Unable to connect to database: " . mysql_error(); 
        exit;}

    $db = mysql_select_db('lrcusack',$conn);
    if (!$db)
	{echo "Unable to find database: " . mysql_error();
	exit;}
	
	$sql = "SELECT * FROM singer WHERE 
                singer_id='$currentID';";
    $result=mysql_query($sql);
            if (!$result) 
            {
                $name = 'SOP Member'; 
        	exit;
            }
    $singer = mysql_fetch_assoc($result);
            extract($singer);
    $name = $singer['singer_name']

    ?>
        <?php
        //start session and initialize user variables    
        session_start();
            $username=$_POST['username'];
            $key=$_POST['pw'];
            
            if(!isset($username)||!isset($key))
                {echo 'You must enter a username and a password, please <a href="singersignup.html">try again</a>';
                exit;
                }
            //encrypt password
                $pw=crypt($key,substr($key,0,2));
                
                //connect to database
            $conn = mysql_connect("localhost","lrcusack","S3Cr3T.228");
            if (!$conn)
                {echo "Unable to connect to database: " . mysql_error() . '<br>Please <a href="singersignup.html">try again</a>'; 
                exit;}

            $db = mysql_select_db('lrcusack',$conn);
            if (!$db)
            {
        	echo "Unable to find database: " . mysql_error() . '<br>Please <a href="singersignup.html">try again</a>';
        	exit;
            }
            
            //query to find matching username and encrypted password
            $sql = "SELECT username, pw, singer_id FROM singer WHERE 
                username='$username' AND pw='$pw';";
            $result=mysql_query($sql);
            if (!$result) 
            {
                echo "Query failure: " . mysql_error() . '<br>Please <a href="singersignup.html">try again</a>'; 
        	exit;
            }
            if(mysql_num_rows($result)!=1)//check to make sure there was a match
            {
        	echo 'Login failure, please try again <br>Please <a href="singersignup.html">try again</a>';
        	exit;
            }
            //if database has a matching user
            

            $row = mysql_fetch_assoc($result);
            extract($row);
            
           //set session variables
            $_SESSION['username']=$username;
            $_SESSION['pw']=$pw;
         
            $_SESSION['currentUserID']=$row['singer_id'];
        

            mysql_freeresult($result);
            
            header("Location: singerhome.php");

        ?>
    </body>
</html>
