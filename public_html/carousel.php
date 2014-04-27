

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

//create connection
$con = mysql_connect("localhost", "scarrick", "Freeza68!", "scarrick");

if(!$con)
{
die('Could not connect: ' . mysql_error());
}

// check connection
if ($con)
{
	echo "connected to the databes 		";
}

// Select database to use
$com = "use scarrick";
$result = mysql_query($com);

// get the number of singers in the tables
$sql = "SELECT COUNT(name) FROM singers";
$result = mysql_query($sql);
$thing =  mysql_fetch_row($result);

// make an array of all the singer's names
$sql = "SELECT name FROM singers";
$result = mysql_query($sql);
$data = array();

while($row = mysql_fetch_array($result))
{
	array_push($data, $row[name]);
}	
$count = count($data);

// get links to images, can be changed to get file path of the image from singer table by changing the query
$sql = "SELECT link FROM imageLinks";
$result = mysql_query($sql);
$links = array();

while($row = mysql_fetch_array($result))
{
	array_push($links, $row[link]);
}

echo ' <ol class="carousel-indicators">';
echo "
";
echo ' <li data-target="#myCarousel" data-slide-to="0" class="active"></li>';
echo "
";
for ($x=1; $x<$count; $x++){
	echo ' <li data-target="#myCarousel" data-slide-to="' . $x . '" class="active"></li>';
	echo "
	";
}

echo '</ol>';
echo "
";

		echo "i have reached the rendezvous point.";

echo '<div class = "carousel-inner">';
echo "
";
echo '<div class = "item active">';
echo "
";

for ($x=0; $x<$count; $x++)
{
echo '<img src = ' . '"' . $links[$x] . '"' . 'alt = "dat ish">';
echo "
";
echo '<div class="container">';
echo "
";
echo '<div class="carousel-caption">';
echo "
";
echo '<h1>' . $data[$x] . '</h1>';
echo "
";
echo '<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>'; 
echo "
";
echo '<p><a class="btn btn-lg btn-primary" href="./currentsons.html" role="button">Learn more</a></p>';
echo "
";
echo '</div>';
echo "
";
echo '</div>';
echo "
";
echo '</div>';
echo "
";

if ($x < ($count-1)){
	echo '<div class = "item">';
	echo "
	";
	}
}
echo '</div>';
echo "
";
echo '<a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>';
echo "
";
echo '<a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>';
echo "
";
echo '</div><!-- /.carousel -->';
echo "
";

?>