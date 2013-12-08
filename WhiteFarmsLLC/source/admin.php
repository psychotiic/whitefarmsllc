<?php 
require("header.php");

if(!checkAdmin()) {
die("<div class=\"box\">
    <h2>Administration Panel &bull; Access Denied</h2>
<div class=\"box-content\">
<p>You are not an administrator.</p>
</div></div>");
exit();
}
?>

<head>
<script language="JavaScript" type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<title>White Farms LLC</title>
</head>

<div class="box">
    <h2>Administration Panel &bull; Statistics</h2>
<div class="box-content">
<p>
      <table width="100%" border="0" cellpadding="0" cellspacing="1" class="myaccount">
        <tr>
          <td><center>Total Members: <font color="white"><?php echo $all;?></font></td>
          <td><center>Active Members: <font color="white"><?php echo $active; ?></font></td>
          <td><center>Unapproved Users: <font color="white"><?php echo $total_pending; ?></font></td>
          </tr>
      </table>
      <p>
</div>
</div>

<div class="box">
<h2>Administration Panel &bull; Configuration</h2>
<!--<div class="box-content">
      <table width="45%" border="0" cellpadding="0" cellspacing="1" class="myaccount">
          <form name="frmcontadd" action="" method="post">
        <tr>
          <td>Change Site Title</td>
          <td><input size="20" class="entryfield" name="bootername" type="text" id="bootername" value=""></td>
        </tr> 
<tr><td></td><td><input class="button" type="submit" name="SubmitConfig" value="Update Configuration"></form></td>
    </table>
    </div>
</div>  -->


<div class="box">
<h2>Administration Panel &bull; Maintenance</h2>
<div class="box-content">
     <table width="100%" border="0" cellpadding="0" cellspacing="1" class="myaccount">
        <tr>
          <td><center><form name="frmcontadd" action="" method="post">Empty Logs:<input class="button" type="submit" name="EmptyLogs" value="Truncate Logs"></center></font></td>
          <td><center><form name="frmcontadd" action="" method="post">Empty News:<input class="button" type="submit" name="EmptyNews" value="Truncate News"></center></td>
          <td><center><form name="frmcontadd" action="" method="post">Prune Users:<input class="button" type="submit" name="EmptyUsers" value="Delete Unapproved Users"></center></td>
        </tr>
    </table>


</div>
</div>

<div class="box">
<h2>Administration Panel &bull; Add News</h2>
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
}


?>
<div class="box-content">
<form name="frmcontadd" action="" method="post">
News Title : <input size="41" class="entryfield" name="title" type="text" id="title"></td>
<br><br>
<textarea cols="50" rows="3" name="body">
</textarea>
<br><br><input class="button" type="submit" name="Submit2" value="Post News">
</form>
</div>
</div>

<div class="box">
<h2>Administration Panel &bull; Add Update</h2>
<div class="box-content">
<?php
$update = $_POST['update'];
if(isset($_POST['Submit3'])) {
    if($update == "") {
        die("Update field cannot be left empty");
    } else {
        $query2 = "INSERT INTO updates (message, date) VALUES ('$update', '$date')";
	$result2 = mysql_query($query2) or die(mysql_error());
    }
}
?>
<form name="frmcontadd" action="" method="post">
Update Description : <input size="30" class="entryfield" name="update" type="text" id="update"></td>
<br><input class="button" type="submit" name="Submit3" value="Post Update">
</form>
</div>
</div>


<div class="box">
<h2>Administration Panel &bull; Search</h2>
<div class="box-content">

	  <?php 
	  if(!empty($msg)) {
	  echo $msg[0];
	  }
	  ?>

	  
      <table width="80%" border="0" align="center" cellpadding="5" cellspacing="5" >
        <tr>
          <td><form name="form1" method="get" action="admin.php">
              Search <input name="q" type="text" id="q" size="25">
                <br>
                <br>
                <input type="radio" name="qoption" value="pending">
                Members Awaiting Approval <br>
                <input type="radio" name="qoption" value="recent">
                Recent Members <br>
                <input type="radio" name="qoption" value="banned">
                Suspended Accounts
                <br>
                <br>
                <input name="doSearch" type="submit" id="doSearch" value="Search">
              </form></td>
        </tr>
      </table>
	
      <p>
        <?php if ($get['doSearch'] == 'Search') {
	  $cond = '';
	  if($get['qoption'] == 'pending') {
	  $cond = "where `approved`='0' order by date desc";
	  }
	  if($get['qoption'] == 'recent') {
	  $cond = "order by date desc";
	  }
	  if($get['qoption'] == 'banned') {
	  $cond = "where `banned`='1' order by date desc";
	  }
	  
	  if($get['q'] == '') { 
	  $sql = "select * from users $cond"; 
	  } 
	  else { 
	  $sql = "select * from users where `user_email` = '$_REQUEST[q]' or `user_name`='$_REQUEST[q]' ";
	  }

	  
	  $rs_total = mysql_query($sql) or die(mysql_error());
	  $total = mysql_num_rows($rs_total);
	  
	  if (!isset($_GET['page']) )
		{ $start=0; } else
		{ $start = ($_GET['page'] - 1) * $page_limit; }
	  
	  $rs_results = mysql_query($sql . " limit $start,$page_limit") or die(mysql_error());
	  $total_pages = ceil($total/$page_limit);
	  
	  ?>
	  
	  
      <p>Approve -&gt; A notification email will be sent to user notifying activation.<br>
        Ban -&gt; No notification email will be sent to the user. 
      <p><strong>*Note: </strong>Once the user is banned, he/she will never be 
        able to register new account with same email address. 
      <p align="right"> 
        <?php 
	  
	  // outputting the pages
		if ($total > $page_limit)
		{
		echo "<div><strong>Pages:</strong> ";
		$i = 0;
		while ($i < $page_limit)
		{
		
		
		$page_no = $i+1;
		$qstr = ereg_replace("&page=[0-9]+","",$_SERVER['QUERY_STRING']);
		echo "<a href=\"admin.php?$qstr&page=$page_no\">$page_no</a> ";
		$i++;
		}
		echo "</div>";
		}  ?>
		</p>
		<form name "searchform" action="admin.php" method="post">
        <table width="100%" border="0" align="center" cellpadding="2" cellspacing="0">
          <tr bgcolor="#666633"> 
            <td width="4%"><strong>ID</strong></td>
            <td> <strong>Date</strong></td>
            <td><div align="center"><strong>User Name</strong></div></td>
            <td width="24%"><strong>Email</strong></td>
            <td width="10%"><strong>Approval</strong></td>
            <td width="10%"> <strong>Banned</strong></td>
            <td width="25%">&nbsp;</td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td width="10%">&nbsp;</td>
            <td width="17%"><div align="center"></div></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <?php while ($rrows = mysql_fetch_array($rs_results)) {?>
          <tr> 
            <td><input name="u[]" type="checkbox" value="<?php echo $rrows['id']; ?>" id="u[]"></td>
            <td><?php echo $rrows['date']; ?></td>
            <td> <div align="center"><?php echo $rrows['user_name'];?></div></td>
            <td><?php echo $rrows['user_email']; ?></td>
            <td> <span id="approve<?php echo $rrows['id']; ?>"> 
              <?php if(!$rrows['approved']) { echo "Pending"; } else {echo "Active"; }?>
              </span> </td>
            <td><span id="ban<?php echo $rrows['id']; ?>"> 
              <?php if(!$rrows['banned']) { echo "no"; } else {echo "yes"; }?>
              </span> </td>
            <td> <font size="2"><a href="javascript:void(0);" onclick='$.get("do.php",{ cmd: "approve", id: "<?php echo $rrows['id']; ?>" } ,function(data){ $("#approve<?php echo $rrows['id']; ?>").html(data); });'>Approve</a> 
              <a href="javascript:void(0);" onclick='$.get("do.php",{ cmd: "ban", id: "<?php echo $rrows['id']; ?>" } ,function(data){ $("#ban<?php echo $rrows['id']; ?>").html(data); });'>Ban</a> 
              <a href="javascript:void(0);" onclick='$.get("do.php",{ cmd: "unban", id: "<?php echo $rrows['id']; ?>" } ,function(data){ $("#ban<?php echo $rrows['id']; ?>").html(data); });'>Unban</a> 
              <a href="javascript:void(0);" onclick='$("#edit<?php echo $rrows['id'];?>").show("slow");'>Edit</a> 
              </font> </td>
          </tr>
          <tr> 
            <td colspan="7">
			
			<div style="display:none;font: normal 11px arial; padding:10px; background: #e6f3f9" id="edit<?php echo $rrows['id']; ?>">
			
			<input type="hidden" name="id<?php echo $rrows['id']; ?>" id="id<?php echo $rrows['id']; ?>" value="<?php echo $rrows['id']; ?>">
			User Name: <input name="user_name<?php echo $rrows['id']; ?>" id="user_name<?php echo $rrows['id']; ?>" type="text" size="10" value="<?php echo $rrows['user_name']; ?>" >
			User Email:<input id="user_email<?php echo $rrows['id']; ?>" name="user_email<?php echo $rrows['id']; ?>" type="text" size="20" value="<?php echo $rrows['user_email']; ?>" >
			Level: <input id="user_level<?php echo $rrows['id']; ?>" name="user_level<?php echo $rrows['id']; ?>" type="text" size="5" value="<?php echo $rrows['user_level']; ?>" > 1->user,5->admin
			<br><br>New Password: <input id="pass<?php echo $rrows['id']; ?>" name="pass<?php echo $rrows['id']; ?>" type="text" size="20" value="" > (leave blank)
			<input name="doSave" type="button" id="doSave" value="Save" 
			onclick='$.get("do.php",{ cmd: "edit", pass:$("input#pass<?php echo $rrows['id']; ?>").val(),user_level:$("input#user_level<?php echo $rrows['id']; ?>").val(),user_email:$("input#user_email<?php echo $rrows['id']; ?>").val(),user_name: $("input#user_name<?php echo $rrows['id']; ?>").val(),id: $("input#id<?php echo $rrows['id']; ?>").val() } ,function(data){ $("#msg<?php echo $rrows['id']; ?>").html(data); });'> 
			<a  onclick='$("#edit<?php echo $rrows['id'];?>").hide();' href="javascript:void(0);">close</a>
		 
		  <div style="color:red" id="msg<?php echo $rrows['id']; ?>" name="msg<?php echo $rrows['id']; ?>"></div>
		  </div>
		  
		  </td>
          </tr>
          <?php } ?>
        </table>
	    <p><br>
          <input name="doApprove" type="submit" id="doApprove" value="Approve">
          <input name="doBan" type="submit" id="doBan" value="Ban">
          <input name="doUnban" type="submit" id="doUnban" value="Unban">
          <input name="doDelete" type="submit" id="doDelete" value="Delete">
          <input name="query_str" type="hidden" id="query_str" value="<?php echo $_SERVER['QUERY_STRING']; ?>">
          <strong>Note:</strong> If you delete the user can register again, instead 
          ban the user. </p>
        <p><strong>Edit Users:</strong> To change email, user name or password, 
          you have to delete user first and create new one with same email and 
          user name.</p>
      </form>
	  
	  <?php } ?>
      &nbsp;</p>
	  <?php
	  if($_POST['doSubmit'] == 'Create')
{
$rs_dup = mysql_query("select count(*) as total from users where user_name='$post[user_name]' OR user_email='$post[user_email]'") or die(mysql_error());
list($dups) = mysql_fetch_row($rs_dup);

if($dups > 0) {
	die("The user name or email already exists in the system");
	}

if(!empty($_POST['pwd'])) {
  $pwd = $post['pwd'];	
  $hash = PwdHash($post['pwd']);
 }  
 else
 {
  $pwd = GenPwd();
  $hash = PwdHash($pwd);
  
 }
 
mysql_query("INSERT INTO users (`user_name`,`user_email`,`pwd`,`approved`,`date`,`user_level`)
			 VALUES ('$post[user_name]','$post[user_email]','$hash','1',now(),'$post[user_level]')
			 ") or die(mysql_error()); 



$message = 
"Thank you for registering with us. Here are your login details...\n
User Email: $post[user_email] \n
Passwd: $pwd \n

*****LOGIN LINK*****\n
http://$host$path/login.php

Thank You

Administrator
$host_upper
______________________________________________________
THIS IS AN AUTOMATED RESPONSE. 
***DO NOT RESPOND TO THIS EMAIL****
";

if($_POST['send'] == '1') {

	mail($post['user_email'], "Login Details", $message,
    "From: \"Member Registration\" <auto-reply@$host>\r\n" .
     "X-Mailer: PHP/" . phpversion()); 
 }
echo "<div class=\"msg\">User created with password $pwd....done.</div>"; 
}

	  ?>
	  


    <td width="12%">&nbsp;</td>
  </tr>
</table>
</div>
</div>

<?php 
include 'footer.php';
?>