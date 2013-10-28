<?php
session_start();
if($_SESSION['admin']!=55)
{
  header('Location: ../login1.php?secure=safe');
  die();
}
?>
 
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
.style7 {color: #FFFFFF}
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
			<li><a href="index.php" title="">View Orders</a></li>
			<li><a href="addProducts.php" title="">add Product</a></li>
			<li><a href="editProducts.php" title="">Update Products</a></li>
			<li><a href="removeProducts.php" title="">Remove Products</a></li>
			<li><a href="#" title="">Logout</a></li>
			
		</ul>
	</div>
</div>

<!-- header ends -->
<!-- content begins -->
 <div id="main_top">
<div id="main">
	<div id="right">
	<!--enctype="multipart/form-data"-->
        	<form name="form1"  id="form1" method="post" action="addProducts.php">
        	  <table width="667" height="413" border="0" cellspacing="6">
                <tr bgcolor="#FF9966">
                  <td height="59" colspan="3"><div align="center">
                    <h2 align="left" class="style1 style7"><img src="../images/portfolio06.jpg" width="130" height="77" />What do you want to do Admin? </h2>
                  </div></td>
                </tr>
                <tr>
                  <td height="47" colspan="3"><strong><img src="../products_image/banner.jpg" width="661" height="86" /></strong></td>
                </tr>
                <tr>
                  <td width="59" height="184">&nbsp;</td>
                  <td colspan="2"><label></label>                    <strong>
                    <label></label>
                    </strong><strong>
                    <label></label>
                    </strong> <strong>
                    <label></label>
                  </strong>                    <div align="left"><img src="../images/discussing.jpg" width="593" height="290" />
				      </div></td>
                </tr>
                <tr>
                  <td height="17">&nbsp;</td>
                  <td width="116">&nbsp; </td>
                  <td width="478">&nbsp;</td>
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
	
			<h3>Admin only </h3>
		<div id="categories"><a href="../index.php" title=""><img src="../images/d.jpg" width="182" height="158" /></a></div>
			
			<h3>Our Partners</h3>
		<div id="partners"></div>
			
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
