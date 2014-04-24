	<?php 
        /*
        //start session, initialize user variables, connect to database
		session_start();
		
		$acode = $_POST['acode'];
		$username = $_POST['username'];
		$key = $_POST['pw'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$gyear = $_POST['gyear'];
		$vpart = $_POST['vpart'];
		$htown = $_POST['htown'];
		$profile = $_POST['profiletext'];
		
                if(!isset($acode)){
					echo 'You must enter an activation code, please go back and <a href="singersignup.html">try again</a>';
                exit;}
                if(!isset($username)||!isset($key)||!isset(fname)||!isset(lname)||!isset(gyear))
                {echo 'You must enter a value for all fields up to voice part, please go back and <a href="singersignup.html">try again</a>';
                exit;}
                
             //encrypt password   
                $pw=crypt($key,substr($key,0,2));
                $conn = mysql_connect("localhost", "lrcusack", "S3Cr3T.228");
	
		if (!$conn) {
		echo "Unable to connect to DB: " . mysql_error();
		exit;}
	
		if (!mysql_select_db("lrcusack")) {
		echo "Unable to select database: " . mysql_error();
		exit;}
                
                //build queries to check if there was an existing user with that
                //username, and another to create a new user
                $query1 = "SELECT * FROM User WHERE username = '$username';";
		$query2="INSERT INTO User (fn,ln,username,pw) VALUES ('$fname','$lname','$username','$pw')";
	
                //check if username already exists
		$result1 = mysql_query($query1);
                
                if(mysql_num_rows($result1)==1)
                {   echo 'Username already exists, please go back and <a href="singersignup.html">try again</a>';
                exit;}
                
                //add new user to User table
                $result2=  mysql_query($query2);
	
		if (!$result2) 
                    {
                    echo "Could not successfully add user. Error: " . mysql_error() . '<br>Please <a href="singersignup.html">try again</a>'; 
                    exit;}
                 
                    //run query1 again to get new user info
            $result3=  mysql_query($query1);
                    
            //set session variables, essentially log in here
            $_SESSION['username']=$username;
            $_SESSION['pw']=$pw;
            $row = mysql_fetch_assoc($result3);
            $_SESSION['currentUserID']=$row['userID'];
	*/
            header('Location: singerhome.html')
              
	?>
