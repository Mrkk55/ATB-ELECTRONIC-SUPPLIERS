<?php
session_start();
if($_SESSION['admin']!=55)
{
  header('Location: ../login1.php?secure=safe');
  die();
}
?>
<?php
require('Cart.php');
$hello=new Cart();
$con=$hello->dbConn();


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Products are available here</title>
 <link type="text/css" rel="stylesheet" href="css/style.css" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="file:///C|/xampp/htdocs/hereWeCome/styles.css" rel="stylesheet" type="text/css" media="screen" />
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
<?php
$qry="SELECT * FROM products";
$r =mysql_query($qry);
$nr = mysql_num_rows($r);

if($nr>0)
{

   while($row=mysql_fetch_row($r))
   {
     $id=$row[0];
   
   }
}

?>
<div id="content">
<!-- header begins -->

<div id="header"> 
	<div id="logo">
		<h1 class="style1">ATB ELECTRONIC SUPPLIERS</h1>
		<h2><a href="http://www.metamorphozis.com/" id="metamorph">come get what you desire in low,low prices </a></h2>
	</div>
	<div id="menu">
		<ul>
			<li><a href="file:///C|/xampp/htdocs/hereWeCome/admin/index.php" title="">Home Admin</a></li>
			<li><a href="file:///C|/xampp/htdocs/hereWeCome/admin/index.php" title="">View Orders</a></li>
			<li><a href="file:///C|/xampp/htdocs/hereWeCome/admin/addProducts.php" title="">add Product</a></li>
			<li><a href="file:///C|/xampp/htdocs/hereWeCome/admin/editProducts.php" title="">Update Products</a></li>
			<li><a href="file:///C|/xampp/htdocs/hereWeCome/admin/removeProducts.php" title="">Remove Products</a></li>
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
        	<form name="form1"  id="form1" method="post" action="file:///C|/xampp/htdocs/hereWeCome/admin/addProducts.php">
        	  <table width="667" height="372" border="0">
                <tr bgcolor="#FF9966">
                  <td height="40" colspan="4"><div align="center">
                    <h2 class="style1 style7">Products</h2>
                  </div></td>
                </tr>
                <tr>
                  <td width="1" height="17">&nbsp;</td>
                  <td colspan="2">&nbsp;</td>
                  <td width="747">
				  <table width="747" height="451" border="0" align="right">
                    <tr>
                      <td width="148">&nbsp;</td>
                      <td width="167" height="83"><img src="<?php echo "./images/". $row[5]; ?>" width="60" height="60" alt="product image"/>&nbsp;</td>
                      <td width="116"><a href="" target="_self"><?php echo $row[2]; ?></a></td>
                      <td width="252"><?php  $row[1]; ?></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td height="20"><a href="viewProd.php?product_id=<?php echo $row[0];?>" ><img src="../images/yes_buy.gif" alt="buy" width="49" height="44" /></a> </td>
                      <td><?php echo 'R:'.$row[3]; ?></td>
                      
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td height="62">&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td height="71">&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td height="17">&nbsp;</td>
                  <td colspan="3" rowspan="11"><label></label>                    <strong>
                    <label></label>
                    </strong><strong>
                    <label></label>
                    </strong><strong><label></label>
                  </strong><strong>
                    <label></label>
               
 </label>
                  </strong>                  <div align="left">
                   
                    </div> </td>
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
	
			<h3>Admin to Add </h3>
		<div id="categories"></div>
			
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
