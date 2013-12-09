<?php 
require("header.php");

$query = "SELECT * FROM news ORDER BY id DESC LIMIT 5";
$results = mysql_query($query);
$number = mysql_numrows($results);

$i=0;
while ($i < $number) {
$f1 = mysql_result($results,$i,"title");
$f2 = mysql_result($results,$i,"message");
$f3 = mysql_result($results,$i,"date");
$f4 = mysql_result($results,$i,"author");
?>

<head>
<script language="JavaScript" type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<title>White Farms LLC</title>
</head>

<div class="box">
<h2><?php echo $f1; ?></h2>
<div class="box-content">
<p><?php echo nl2br($f2); ?></p>
</div>
<div class="divider"><p>Posted by <font color="white"><?php echo $f4; ?></font>.<span class="right"><?php echo $f3; ?></span></p></div>
</div>


<?php
$i++;
}

if($i == 0) {
   ?>
<div class="box">
<h2>No news to be displayed</h2>
<div class="box-content">
<p>There are currently no news posts! Create one to remove this message.</p>
</div>
</div>
   <?php
}
?>


<br/>
<div class="box">
<h2>Forum Panel &bull; Post News</h2>
<?php
// News

$title = $_POST['title'];
$body = $_POST['body'];
$date = date("m-d-Y, h:i:s a", time());
$author = $username;

if(isset($_POST['Submit2'])) {
if($title == "") { die("You must supply a title for your news post"); }
if($body == "") { die("You must supply a message body for your news post"); }
if($author == "") { die("Possible hack detected."); }
    	$query = "INSERT INTO news (title, message, date, author) VALUES ('$title', '$body', '$date', '$author')";
	$result = mysql_query($query);
	header('location: ./index.php');
}


?>
<div class="box-content">
<form name="frmcontadd" action="" method="post">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;News Title : <input size="41" class="entryfield" name="title" type="text" id="title"style="background:#4D4D4D; color: #27AE60;"></td>
<br><br>
<textarea cols="119" rows="10" name="body" style="background:#4D4D4D;color:#27AE60;">
</textarea>
<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="Submit2" value="Post News" class="btn"><br/>
</form>
</div>
</div>


<?php 
include 'footer.php';
?>