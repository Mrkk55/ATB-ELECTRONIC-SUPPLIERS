<?php
session_start();
 $id = $_SESSION['user'];
 $session = $_SESSION['sess'];
?>
<?php
require('Cart.php');
$hello=new Cart();
$con=$hello->dbConn();
$sql = "select * from users where user_id = '$id'";
$result =mysql_query($sql);
$row = mysql_fetch_row($result);
$name = $row[1];
$surname = $row[2];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="file:///C|/xampp/htdocs/letz/images/icon.jpg"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>view products</title>

<link rel="stylesheet" href="file:///C|/xampp/htdocs/letz/customers/styles.css" type="text/css" />
<style type="text/css">
	@import url(..//letz/menu_style.css); 
body {
	background-color: #FFFFFF;
	font-family:Georgia, "Times New Roman", Times, serif;
}


.style1 {color: #999999}
.style14 {color: #000000}
a:link {
	color: #FFFFFF;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #FFFFFF;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
.style19 {font-size: 14%}
.style20 {font-size: 24%}
.style21 {font-size: 24}
.style22 {font-size: 18%}
.style23 {font-size: 18}
.style24 {font-size: 24px}
</style>
</head>

<body>
<form action="" method="post">
  <p>&nbsp;</p>
  <table width="620" height="487" border="0" align="center" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
  <tr>
    <td width="4%" rowspan="3" valign="top" ><div id="menu"></div>       </td>
    <td height="36" colspan="3" ><div align="right"></div></td>
    </tr>
  <tr>
    <td height="52" valign="bottom" bgcolor="#FFFFFF" style="border-bottom:#990000; border-bottom-style:solid; border-bottom-width:thin;"><label></label>      <label></label>      <label></label>
      <span class="style14"></span>      <label></label>      <label><img src="file:///C|/xampp/htdocs/letz/products_images/try.jpg" width="94" height="75" />Inside the cart </label></td>
    <td valign="bottom" bgcolor="#FFFFFF" style="border-bottom:#990000; border-bottom-style:solid; border-bottom-width:thin;">&nbsp;</td>
    <td width="19%" style="border-bottom:#990000; border-bottom-style:solid; border-bottom-width:thin;">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="3" valign="top" bgcolor="#E1E1E1"><iframe frameborder="0" style="width:99%; height:439px;" src="cart.php"> </iframe></td>
    </tr>

  <tr>
    <td valign="bottom" bgcolor="#FFFFFF" >&nbsp;</td>
    <td width="41%" valign="bottom" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="36%" valign="bottom" bgcolor="#FFFFFF">&nbsp;</td>
    <td valign="bottom" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
  

  <tr>
    <td height="20" colspan="4" bgcolor="#E1E1E1" ><div align="center">
      <p class="style1">Copyright &copy; 2013 </p>
      </div></td>
  </tr>
</table>
</form>
</body>
</html>
