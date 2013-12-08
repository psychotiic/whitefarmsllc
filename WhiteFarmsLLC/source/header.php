<?php 
include "dbc.php";
page_protect();
include "includes/functions.php";
getBooterTitle();

$file = basename(__FILE__);
if(eregi($file,$_SERVER['REQUEST_URI'])) {
    die("Sorry but you cannot access this file directly for security reasons.");
}
?>
<title>White Farms LLC</title>
<link href="images/styles.css" rel="stylesheet" type="text/css">
	<body>
		<div id="container">
			<div id="header" align="center">
			</div>
<?php 
if (isset($_SESSION['user_id'])) { 
?>

<div id="navigation">

					<dl class="dropdown">
					<dt style="width: 75px" class="single"><a href="index.php" style="height: 18px; padding-top: 5px;"><img border=0 src="images/home.gif"><strong> Home</strong></a></dt>
					</dl>

					<dl class="dropdown">
					<dt style="width: 95px" class="single"><a href="hub.php" style="height: 18px; padding-top: 5px;"><img border=0 src="images/hub.png"><strong> Order</strong></a></dt>
					</dl>

					<dl class="dropdown">
					<dt style="width: 85px" class="single"><a href="updates.php" style="height: 18px; padding-top: 5px;"><img border=0 src="images/news.gif"><strong>News</strong></a></dt>
					</dl>

					<dl class="dropdown">
					<dt style="width: 95px" class="single"><a href="mysettings.php" style="height: 18px; padding-top: 5px;"><img border=0 src="images/account.png"><strong>My Account</strong></a></dt>
					</dl>
					 
					<?php  if (checkAdmin()) { 
                                        // Admin only links should go below here   

										
                                        ?>
					<dl class="dropdown">
					<dt style="width: 95px" class="single"><a href="addshell.php" style="height: 18px; padding-top: 5px;"><img border=0 src="images/add.png"><strong> Inventory</strong></a></dt>
					</dl>
					
					<dl class="dropdown">
					<dt style="width: 75px" class="single"><a href="logs.php" style="height: 18px; padding-top: 5px;"><img border=0 src="images/info.png"> <strong>Logs</strong></a></dt>
					</dl>
					
					<dl class="dropdown">
					<dt style="width: 110px" class="single"><a href="admin.php" style="height: 18px; padding-top: 5px;"><img border=0 src="images/admin.png"><strong> Admin Panel</strong></a></dt>
					</dl>
					
					<?php } ?>
					
					<dl class="dropdown">
					<dt style="width: 85px" class="single"><a href="logout.php" onclick='return confirm("Are you sure you want to logout?");' style="height: 18px; padding-top: 5px;"><img border=0 src="images/delete.png"><strong> Logout</strong></a></dt>
					</dl>

                                        <?php } ?>

</div>

<div id="main">
<div id="left">
</div>

<div id="right">
<div class="small-box"><strong><h2>Welcome, <?php echo $username; ?>!</strong></h2>
    <div class="small-box-content">
        <p>
		Current Time: <font color="white"><strong><?php $date = date("h:i:s A", time()); echo $date; ?></strong></font><br/>
        Profile ID #: <font color="white"><strong><?php echo $id; ?></strong></font> <br />
        User Level: <font color="white"><strong><?php echo $level; ?></strong></font> <br />
        </p>

    </div></div>

        <div class="small-box"><h2>Members Statistics</h2>
    <div class="small-box-content">
        <p>


                    <table width="100%" border="0" align="center" cellpadding="1" cellspacing="1" class="forms">
                        <font size=1>
          <tr>
            <td><font color="white">Total Users</font></td>
            <td><?php echo $all; ?></font></td>
          </tr>

          <tr>
            <td><font color="white">Active Users</font></td>
            <td><?php echo $active; ?></font></td>
          </tr>

          <tr>
            <td><font color="white">Pending Users</font></td>
            <td><?php echo $total_pending; ?></font></td>
			
          </tr>
                    </font>
                    </table>
        </p>


    </div></div>

    <div class="small-box"><h2>Cart Status</h2>
    <div class="small-box-content">
        <p>


                    <table width="100%" border="0" align="center" cellpadding="1" cellspacing="1" class="forms">
                        <font size="1">
          
          <tr>
            <td><font color="white">Items In Cart</font></td>
            <td><font color="lime"><?php echo $shellsOnline; ?></font></td>
          </tr>
		  <tr>
            <td><font color="white">Total Cost $</font></td>
            <td><font color="lime"><?php echo $shellsOnline; ?></font></td>
          </tr>

                        </font>
                    </table>
        </p>


    </div></div>
</div>



	
	
