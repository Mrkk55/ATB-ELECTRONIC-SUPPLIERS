<?php
session_start();
$_REQUEST['logout']?session_destroy():session_start();
?>
<?php
if(isset($_POST['login']))
{
   $role=trim($_POST['role']);
   $email=trim($_POST['username']);
   $pwd=trim($_POST['pwd']);
 
  $count=0;
   
 $vEm=preg_match("/^[a-zA-Z0-9_\-.]{4,}+@(yahoo|gmail|hotmail)+\.(com|co\.za)|[a-zA-Z0-9_\-.]{4,}+[a-zA-Z0-9]{4,}+@(yahoo|gmail|hotmail)+\.(com|co\.za)+$/",$email);
 $vPwd=preg_match("/^[a-zA-Z0-9_\.\*\$#@\&]{8,}+$/",$pwd);

	if(!isset($role))
	{
	   $isEm="<font color='#FF0000'>select the role<br/>";
	 
	   $count+=1;
	}
	if(empty($email))
	{
	  $em="<font color='#FF0000'>enter email address<br/>";
	    $count+=1;
	}
	if(empty($pwd))
	{
	   $ep="<font color='#FF0000'>enter password<br/>";
	    $count+=1;
	}
	   if(!$vEm)
	   {
		$vm="<font color='#FF0000'> Invalid:You entered invalid email<br/>";
	   
		 $count+=1;
	   }
	  
	   if(!$vPwd)
	  {
	     $vp= "<font color='#FF0000'> you are kidding<br/>";
	     
		  $count+=1;
	  }
	  $conn=mysql_connect('localhost','root','');
	if(!$conn)
	{
	   die("ERROR, connection Failed!!! : ".mysql_error());
	   exit();
     }
  
	if(!mysql_select_db('hello'))
	{
	  die("ERROR:Could not select the Database : ".mysql_error());
	  exit();
	}
	if($vEm && $vPwd && isset($role))
	{
	   if(isset($_POST['role'])=='Customer')
	   {
	    mysql_query("SELECT email,password FROM users WHERE email='$email' AND password='$pwd'");
          if(mysql_affected_rows()==1)
		 {
		   $_SESSION['customer']=150;
		   header('Location: ./customer/index.php');
		   die();
		 }
	   }
	  if(isset($_POST['role'])== 'Admin')
	   {
	     mysql_query("SELECT username,password FROM administration WHERE username='$email' AND password='$pwd'");
		 if(mysql_affected_rows()==1)
		 {
		   $_SESSION['admin']=55;
		   header('Location: ./admin/index.php');
		   die();
		 
		 }
		 
	   }
	
	}
	
	mysql_close($conn);
}
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Login to view more</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="styles.css" rel="stylesheet" type="text/css" media="screen" />
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
.style6 {font-style: italic}
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
			<li><a href="index.php" title="">Home</a></li>
			<li><a href="#" title="">Blog</a></li>
			<li><a href="#" title="">Gallery</a></li>
			<li><a href="#" title="">About</a></li>
			<li>		      </li>
		</ul>
	</div>
</div>

<!-- header ends -->
<!-- content begins -->
 <div id="main_top">
<div id="main">
	<div id="right">
        	<form name="form1" id="form1" method="post" action="">
        	  <table width="667" height="344" border="0">
                <tr bgcolor="#FF9966">
                  <td colspan="4"><div align="center">
                    <h1 class="style1">Login Now </h1>
                  </div></td>
                </tr>
                <tr>
                  <td width="80" height="24">&nbsp;</td>
                  <td colspan="2">
				  <?php 
				  if ($_GET["secure"]) 
					{
						echo "<font color='#ff0000'>Sorry,you must login first";
					} 
					?>
				  </td>
                  <td width="252">&nbsp;</td>
                </tr>
                <tr>
                  <td height="17">&nbsp;</td>
                  <td colspan="2"><label></label></td>
                  <td rowspan="9"><div align="left">
				  <?php
				  if(isset($_POST['login']) && $count>0)
				 {
				  echo "<table border=0 bgcolor='#ff9900'font color='#FF0000' ><th>Error message(s) <hr/></th> \n";
				   echo  "<tr><td>";
				   echo $isEm.$em.$ep.$vm.$vp;
				   echo "</td></tr>";
				   echo "</table>";
		         }
		     
				  
				  ?>
				  </div></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td width="114"><span class="style6">
                    <label><strong>Role Type</strong></label>
                  </span></td>
                  <td width="203"><select name="role" id="role">
                    <option>select Role</option>
                    <option>Admin</option>
                    <option>Customer</option>
                  </select></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><strong>
                    <label>Username</label>
                  </strong></td>
                  <td><input name="username" type="text" id="username" size="30" maxlength="30" /></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><strong>
                    <label>Password</label>
                  </strong></td>
                  <td><input name="pwd" type="password" id="pwd" size="32" maxlength="32" /></td>
                </tr>
                <tr>
                  <td height="22">&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><input name="login" type="submit" id="login" value="LOGIN" /></td>
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
	
			<h3>First thing first </h3>
			<div id="categories">
			  <ul>
			    <li>
			      <div align="justify"><a href="register1.php" target="_self">Register</a></div>
			    </li>
				  <li class="style5">
				    <div align="justify"><a href="login1.php">Login</a></div>
				  </li>
				  <li>
				    <div align="justify"><a href="contact.php">Contact Us</a></div>
				  </li>
			  </ul>
		</div>
			
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
