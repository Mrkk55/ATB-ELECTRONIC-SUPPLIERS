<?php
session_start();
if($_SESSION['admin']!=55)
{
  header('Location: ../login1.php?secure=safe');
  die();
}
else{

  $adminYes="<color='#00ff00'>You have successfully login Admin";
}
?>
<?php

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Register or create an account</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="../styles.css" rel="stylesheet" type="text/css" media="screen" />
<style type="text/css">
<!--
.style1 {
	color: #FFFFFF;
	font-weight: bold;
	font-style: italic;
}
.style5 {
	color: #A66501;
	font-weight: bold;
}
.style7 {font-size: 12px}
-->
</style>
</head>
<body>
<div id="content">
<!-- header begins -->

<div id="header"> 
	<div id="logo">
		<h1 class="style1">ATB ELECTRONIC SUPPLIERS</h1>
		<h2><a href="http://www.metamorphozis.com/" id="metamorph">come get what you desire in low,low prices </a></h2>
	</div>
	<div id="menu">
		<ul>
		   <li><a href="index.php" title="">Home Admin</a></li>
			<li><a href="#" title="">View Orders</a></li>
			<li><a href="manageProducts.php" title="">Manage Product</a></li>
			<li><a href="#" title="" class="style7">Manage Customer</a></li>
			<li><a href="login1.php?logout=1"  title="">Logout</a></li>
			
		</ul>
	</div>
</div>

<!-- header ends -->
<!-- content begins -->
 <div id="main_top">
<div id="main">
	<div id="right">
        	<form name="form1" id="form1" method="post" action="">
        	  <table width="667" height="330" border="0">
                <tr bgcolor="#FF9966">
                  <td colspan="4"><div align="center">
                    <h2 class="style1"><?php  echo $adminYes; ?></h2>
                  </div></td>
                </tr>
                <tr>
                  <td width="80" height="17">&nbsp;</td>
                  <td colspan="2">&nbsp;</td>
                  <td width="177">&nbsp;</td>
                </tr>
                <tr>
                  <td height="17">&nbsp;</td>
                  <td colspan="2"><label></label></td>
                  <td rowspan="9"><div align="left">
				  <?php
				 
				  ?>
				  </div></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td width="114">&nbsp;</td>
                  <td width="278">&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><strong>
                    <label></label>
                  </strong></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td height="22">&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td bgcolor="#FFFFFF">&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td height="27">&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td height="27">&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td height="27">&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp; </td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
              </table>
        </form>
        	<p>&nbsp;</p>
        	<h4>&nbsp;	    </h4>
		<div class="text">
		  <p>&nbsp;</p>
		</div>
	  </div>
	<div id="left">
	
			<h3>ADMIN ONLY </h3>
		<div id="categories"><a href="../index.php" title=""><img src="../images/d.jpg" width="182" height="158" /></a> </div>
			
			<h3>Our Partners</h3>
		<div id="partners">
			<ul>
				<li></li>
			</ul>
		</div>
			
	</div><div style="clear:both;"></div>
	</div> <div id="main_bottom"></div></div>
   
</div>
<!--content ends -->
<!--footer begins -->


<div id="footer">
<p class="style5">Copyright 2013 (do not steal these stuff) </p> 
  <p>&nbsp;</p>
</div>
<!-- footer ends-->
</body>
</html>
