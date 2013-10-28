<?php
session_start();
if($_SESSION['admin']!=55)
{
  header('Location: ../login1.php?secure=safe');
  die();
}
?>
<?php
if(isset($_POST['remove']))
{
    $prod_ID=$_POST['prod_ID'];
	
	 
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
	   
	   if(isset($prod_ID)&& $prod_ID>0)
	{
	
	   mysql_query("DELETE FROM products WHERE Prod_id='$prod_ID'");
    
       if(mysql_affected_rows()==1)
	   {
     
	     $rStatus="<font-color='#00ff00'>Product successfully removed";
	   
       }
	  else{
	  
	      $rStatus="<font-color='#00ff00'>Sorry:could not remove product";
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
        	<form name="form1"  id="form1" method="post" action="removeProducts.php">
        	  <table width="667" height="354" border="0" cellpadding="2" cellspacing="2">
                <tr bgcolor="#FF9966">
                  <td colspan="4"><div align="center">
                    <h2 class="style1 style7">Delete Products</h2>
                  </div></td>
                </tr>
                <tr>
                  <td width="18" height="17">&nbsp;</td>
                  <td colspan="2"><?php echo $rStatus; ?>&nbsp;</td>
                  <td width="263">&nbsp;</td>
                </tr>
                <tr>
                  <td height="17">&nbsp;</td>
                  <td colspan="2"><label></label></td>
                  <td rowspan="9"><div align="left">
				  <?php
				  if(isset($_POST['remove']) && $count>0)
				 {
				  echo "<table border=0 bgcolor='#ff9900'font color='#FF0000' ><th>Error message(s) <hr/></th> \n";
				   echo  "<tr><td>".$eId.$vId."</td></tr>";
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
                    <label></label>
                  </strong></td>
                  <td width="242">&nbsp;</td>
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
                  <td><input name="remove" type="submit" id="remove" value="Remove Products" /></td>
                  <td>&nbsp;</td>
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
	
			<h3>Admin to Delete </h3>
		<div id="categories"><a href="../index.php" title=""><img src="../images/d.jpg" width="182" height="158" /></a></div>
			
			<h3>Our Partners</h3>
		<div id="partners">
			<ul>
				<li><a href="#">Mauris neque egestas justo</a></li>
				<li><a href="#">Neque eros a nequestibulum</a></li>
				<li><a href="#">Primis in faucibus orci luctus </a></li>
				<li><a href="#">Posuere cubilia Curae</a></li>
				<li><a href="#">Ulla risus risus sagittis in</a></li>
				<li><a href="#">Lobortis sed tincidunt at est.</a></li>
				<li><a href="#">Donec posuere egestas ipsu</a></li>
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
