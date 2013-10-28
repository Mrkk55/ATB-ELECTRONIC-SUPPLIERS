<?php
session_start();
if($_SESSION['admin']!=55)
{
  header('Location: ../login1.php?secure=safe');
  die();
}
?>
<?php
if(isset($_POST['add']))
{
    $category=$_POST['category'];
    $name=$_POST['name'];
	$price=$_POST['price'];
	$qty=$_POST['qty'];
	$img=$_POST['userfile'];
	 $descr=$_POST['descr'];
	 
	 $vp=preg_match("/^[0-9]{4,}+\.[0-9]{2}+$/",$price);
	 
	 $count=0;
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
	 if($price<1000)
	 {
	  $more="<font-color='#FF0000'>Price must start from R1000.00";
	  $count+=1;
	 }
	 if(empty($qty))
	 {
	  $eq="<font-color='#FF0000'>Enter product quantity";
	  $count+=1;
	 }
	 if(empty($img))
	 {
	  $ei="<font-color='#FF0000'>Browse product image";
	  $count+=1;
	 }
	 else
	 {
	    $uploaddir = 'products/';
	   $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
	   
	echo '<pre>';
	if (!move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
		$usta= "<font color='#ff0000'>Possible file upload attack!\n";
	} else {
		
		$usta= "<font color='#009900'>File is valid, and was successfully uploaded.\n";
	}
	
	echo 'Here is some more debugging info:';
	print_r($_FILES);
	
	print "</pre>";
	 }
	 if(empty($descr))
	 {
	  $ed="<font-color='#FF0000'>product description must be written\n";
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
	   
	   if(isset($category)&& isset($name)&& $price>=1000 && $qty>0 && isset($img)&& isset($descr))
	{
	$date=date('Y-m-d (H:I:S)');
	  mysql_query("INSERT INTO products(prod_id,prod_category,prod_name,price,prod_qty,prod_image,prod_descr,date) VALUES
	              (NULL,'$category','$name','$price','$qty','$img','$descr','$date')");
    
       if(mysql_affected_rows()==1)
	   {
     
	     $addStatus="<font color='#00ff00'>Product successfully added";
	   
      }
	  else{
	  
	      $addStatus="<font color='#ff0000'>Sorry:could not add product";
	  }
	
	mysql_close($con);
 }
}
 
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
        	  <table width="667" height="395" border="0">
                <tr bgcolor="#FF9966">
                  <td colspan="4"><div align="center">
                    <h2 class="style1 style7">ADD PRODUCTS </h2>
                  </div></td>
                </tr>
                <tr>
                  <td width="18" height="17">&nbsp;</td>
                  <td colspan="2"><?php echo $addStatus; ?>&nbsp;</td>
                  <td width="263">&nbsp;</td>
                </tr>
                <tr>
                  <td height="17">&nbsp;</td>
                  <td colspan="2"><label></label></td>
                  <td rowspan="10"><div align="left">
				  <?php
				  if(isset($_POST['add']) && $count>0)
				 {
				  echo "<table border=0 bgcolor='#ff9900'font color='#FF0000' ><th>Error message(s) <hr/></th> \n";
				   echo  "<tr><td>".$er.$eu.$ep.$vu.$vp.$eq.$errUpl.$more."</td></tr>";
				   echo "</table>";
		         }
		     
				  
				  ?>
				  </div></td>
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
                    <option>Keyboard</option>
                    <option>Sound System</option>
                    <option>Projector</option>
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
                    <option>Aoc</option>
                    <option>sahara</option>
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
                  <td><strong><label>Product image</label> </strong></td>
                  <td> <input type="hidden" name="MAX_FILE_SIZE" value="30000000" />				   <input name="userfile" type="file" />                  </td>
                </tr>
                <tr>
                  <td height="27">&nbsp;</td>
                  <td rowspan="2"><strong><label>Product description</label> </strong></td>
                  <td rowspan="2"><textarea name="descr" cols="25" rows="3" id="descr"></textarea></td>
                </tr>
                <tr>
                  <td height="27">&nbsp;</td>
                </tr>
                <tr>
                  <td height="19">&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td height="27">&nbsp;</td>
                  <td><input name="add" type="submit" id="add" value="Add Product" /></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp; </td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td height="29">&nbsp;</td>
                  <td colspan="2">&nbsp;</td>
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
	
			<h3>Admin to Add </h3>
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
