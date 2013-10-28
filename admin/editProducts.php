<?php
session_start();
if($_SESSION['admin']!=55)
{
  header('Location: ../login1.php?secure=safe');
  die();
}
?>
<?php
if(isset($_POST['edit']))
{
    $prod_ID=$_POST['prod_ID'];
	$category=$_POST['category'];
    $name=$_POST['name'];
	$price=$_POST['price'];
	$qty=$_POST['qty'];
	 
	 //$vp=preg_match("/^[0-9]{4,}+\.[0-9]{2}+$/",$price);
	 
	 $count=0;
	 if(empty($prod_ID))
	 {
	  $eId="<font-color='#ff0000'>Enter product ID";
	  $count+=1;
	 }
	  if($prod_ID<0)
	 {
	  $vId="<font-color='#ff0000'> product ID mus be greater than zero";
	  $count+=1;
	 }
	 if(empty($category))
	 {
	  $ec="<font-color='#FF0000'> select product category";
	  $count+=1;
	 }
	 if(empty($name))
	 {
	  $en="<font-color='#FF0000'> select product name";
	  $count+=1;
	 }
	 if(empty($price))
	 {
	  $ep="<font-color='#FF0000'>Enter product price";
	  $count+=1;
	 }
	  if($price<0)
	 {
	  $ep1="<font-color='#FF0000'>price must be greater than zero";
	  $count+=1;
	 }
	 if(empty($qty))
	 {
	  $eq="<font-color='#FF0000'>Enter product quantity";
	  $count+=1;
	 }
	  if(empty($qty))
	 {
	  $eq1="<font-color='#FF0000'>product quantity must be greater than zero";
	  $count+=1;
	 }
	 
	 $con=mysql_connect('localhost','root','');
	 if(!$con)
	   {
	    die("<font color='#FF0000'>Error:could not connect to server<br/>");
		exit;
	   }
	   mysql_select_db('hello');
	   if(! mysql_select_db('hello'))
	   {
	     die("<font color='#FF0000'>Error:could not connect to database<br/>");
		exit;
	   }
	   
	   if($prod_ID>0 && isset($category)&& isset($name)&& $price>1000 && $qty>0)
	{
	
	   mysql_query("UPDATE products SET prod_category='$category',prod_name='$name',price='$price',prod_qty='$qty' WHERE Prod_id='$prod_ID'");
    
       if(mysql_affected_rows()==1)
	   {
     
	     $editStatus="<font-color='#00ff00'>Product successfully updated";
	   
       }
	  else{
	  
	      $editStatus="<font-color='#00ff00'>Sorry:could not update product";
	  }
	 mysql_close($con);
	
 }

}
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Edit products</title>
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
        	<form name="form1"  id="form1" method="post" action="editProducts.php">
        	  <table width="667" height="354" border="0">
                <tr bgcolor="#FF9966">
                  <td colspan="4"><div align="center">
                    <h2 class="style1 style7">Update PRODUCTS </h2>
                  </div></td>
                </tr>
                <tr>
                  <td width="18" height="17">&nbsp;</td>
                  <td colspan="2"><?php echo $editStatus; ?>&nbsp;</td>
                  <td width="263">&nbsp;</td>
                </tr>
                <tr>
                  <td height="17">&nbsp;</td>
                  <td colspan="2"><label></label></td>
                  <td rowspan="10"><div align="left">
				  <?php
				  if(isset($_POST['edit']) && $count>0)
				 {
				  echo "<table border=0 bgcolor='#ff9900'font color='#FF0000' ><th>Error message(s) <hr/></th> \n";
				   echo  "<tr><td>".$ep.$vp.$er.$eu.$ep.$ep1.$vu.$vp.$eq.$eq1.$errUpl."</td></tr>";
				   echo "</table>";
		         }
		     
				  
				  ?>
				  </div></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><strong>
                    <label>ProductID</label>
                  &nbsp;</strong></td>
                  <td><input name="prod_ID" type="text" id="prod_ID" size="10" maxlength="10" /></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td width="126"><strong>
                    <label>Product category</label>
                  &nbsp;</strong></td>
                  <td width="242"><select name="category" id="category">
                    <option>select category</option>
                    <option>Monitor</option>
                    <option>Notebook</option>
                    <option>camera</option>
                    <option>Printer</option>
                    <option>Sound System</option>
                  </select></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><strong>
                    <label>Product name </label>
                  </strong></td>
                  <td><select name="name" id="name">
                    <option>select product name</option>
                    <option>Acer</option>
                    <option>Hp</option>
                    <option>Dell</option>
                    <option>Toshibo</option>
                    <option>Sony</option>
                    <option>Samsung</option>
                  </select></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><strong><label>Price</label></strong></td>
                  <td><input name="price" type="text" id="price" size="20" maxlength="20" /></td>
                </tr>
                <tr>
                  <td height="22">&nbsp;</td>
                  <td><strong>
                    <label>Product quantity</label>
                  &nbsp;</strong></td>
                  <td><input name="qty" type="text" id="qty" size="10" maxlength="10" /></td>
                </tr>
                <tr>
                  <td height="22">&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp; 				                     </td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td height="19">&nbsp;</td>
                  <td><input name="edit" type="submit" id="edit" value="Update Products" /></td>
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
	
			<h3>Admin to Update </h3>
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
