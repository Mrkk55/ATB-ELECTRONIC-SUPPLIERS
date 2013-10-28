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
    $name=$_POST['name'];
    $descr=$_POST['descr'];
	
	 
	 $count=0;
	$vd=preg_match("/^[a-zA-Z0-9]{5,}+$/",$descr);
	
	 if(empty($name))
	 {
	  $en="<font-color='#FF0000'> select category please\n";
	  $count+=1;
	 }
	 if(empty($descr))
	 {
	  $ed="<font-color='#FF0000'>description must be written\n";
	  $count+=1;
	 }
	 if(!$vd)
	 {
	   $vvd="<font-color='#FF0000'>description must be at least 5 characters\n";
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
	   
	   if(isset($name) && isset($descr) && $vd)
	{
	$date=date('Y-m-d (H:I:S)');
	  mysql_query("INSERT INTO category(cat_id,cat_name,descr,date) VALUES(NULL,'$name','$descr','$date')");
    
       if(mysql_affected_rows()==1)
	   {
     
	     $addStatus="<color='#00ff00'>category successfully added";
	   
      }
	  else{
	  
	      $addStatus="<color='#00ff00'>Sorry:could not add category";
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
			<li><a href="addCategory.php" title="">Add Category</a></li>
			<li><a href="editCategory.php" title="">Update Category</a></li>
			<li><a href="removeCategory.php" title="">Remove Category</a></li>
			<li><a href="../login1.php?logout=1" title="">Logout</a></li>
			
		</ul>
	</div>
</div>

<!-- header ends -->
<!-- content begins -->
 <div id="main_top">
<div id="main">
	<div id="right">
	<!--enctype="multipart/form-data"-->
        	<form name="form1"  id="form1" method="post" action="addCategory.php">
        	  <table width="667" height="340" border="0">
                <tr bgcolor="#FF9966">
                  <td colspan="4"><div align="center">
                    <h2 class="style1 style7">Add Category </h2>
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
				   echo  "<tr><td>".$en.$ed.$vvd."</td></tr>";
				   echo "</table>";
		         }
		     
				  
				  ?>
				  </div></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td width="126"><strong>
                    <label> category</label>
                  &nbsp;name</strong></td>
                  <td width="242"><select name="name" id="name">
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
                    <label>Desccription</label>
                  </strong></td>
                  <td><textarea name="descr" cols="25" rows="3" id="descr"></textarea></td>
                </tr>
                <tr>
                  <td height="17">&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td height="22">&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td height="22">&nbsp;</td>
                  <td><input name="add" type="submit" id="add2" value="Add Category" /></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td height="27">&nbsp;</td>
                  <td rowspan="2">&nbsp;</td>
                  <td rowspan="2">&nbsp;</td>
                </tr>
                <tr>
                  <td height="17">&nbsp;</td>
                </tr>
                <tr>                </tr>
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
