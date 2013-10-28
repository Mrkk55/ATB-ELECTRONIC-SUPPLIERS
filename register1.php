<?php

if(isset($_POST['reg']))
{
		
	$name=$_POST['name'];
	$surname=$_POST['surname'];
	$email=$_POST['email'];
	$username=$_POST['username'];
	$pwd=$_POST['pwd'];
	$r_pwd=$_POST['r_pwd'];
	$terms=$_POST['terms'];

   $date=date('Y-d-m (H:I:S)');
   
	$vNym=preg_match("/^[a-zA-Z]{4,}+$/",$name);
	$vSur=preg_match("/^[a-zA-Z]{6,}+$/",$surname);
	$vEm=preg_match("/^[a-zA-Z0-9_\-.]{4,}+@(yahoo|gmail|hotmail)+\.(com|co\.za)|[a-zA-Z0-9_\-.]{4,}+[a-zA-Z0-9]{4,}+@(yahoo|gmail|hotmail)+\.(com|co\.za)+$/",$email);
	$vUnym=preg_match("/^[a-zA-Z0-9_\-.\$\*\#]{5,}+$/",$username);
	$vP=preg_match("/^[a-zA-Z0-9_\.\*@\$#\&]{8,}+$/",$pwd);
	$vComp=strcmp($r_pwd,$pwd)==0;

     $count=0;
	if(empty($name) || empty($surname)|| empty($email) || empty($username)|| empty($pwd)|| empty($r_pwd) || empty($terms))
	{
	   $isEmpty= "<li><font color='#FF0000' >Make sure all fields are filled <br/></li>";
	   $count=1;
	 }
	   if(!$vNym)
	   {
		 $isNameV="<li><font color='#FF0000' >Invalid ..Name must be at least 4 characters long <br/></li>";
		 $count+=1;
		 
	   }
	   if(!$vSur)
	   {
		 $isSurV= "<li><font color='#FF0000' > INVALID,Surname must be at least 4 characters long <br/></li>";
		  $count+=1;
	   }
	   if(!$vEm)
	   {
	     $isEmV= "<li><font color='#FF0000' >INVALID ,email must be in the pattern e.g (john@yahoo.com)<br/></li>";
		  $count+=1;
	   }
	   if(!$vUnym)
	   {
	     $isUnV="<li><font color='#FF0000' >INVALID ,username must be at least 5 characters long <br/></li>";
		   $count+=1;
	   }
      if(!$vP)
	  {
	    $pwdV="<li><font color='#FF0000'>Invalid , password must be at least 8 characters long <br/></li>";
		$count+=1;
	  }
	  if(!$vComp)
	  {
	   $pwdComp="<li><font color='#FF0000'>ERROR : password re-entered has no match <br/></li>";
		$count+=1;
	    }
	  if(!isset($terms))
	  {
	    $errTerms="<li><font color='#FF0000'>ERROR :Make sure you check t&c<br/></li>";
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
	 
	// $result=mysql_query($query,$conn);
	   if($vNym && $vSur && $vEm && $vUnym && $vP && $vComp && isset($terms))
	   {
	    $enPwd=md5($pwd);
		
	  mysql_query("INSERT INTO users(user_id,name,surname,email,username,password,date) VALUES(NULL,'$name','$surname','$email','$username','$enPwd','$date')");
	   
		
	//if(!(empty($name) && empty($surname)&& empty($email) && empty($username)&& empty($pwd)&& empty($rpwd)) && ($vNym && $vSur && $vEm && $vUnym && $vP && $vComp))
    
       if(mysql_affected_rows()==1)
	   {
     
	     header("Location: registered.php?name=$name&surname=$surname");
		 die();
	   
      }
	}
	mysql_close($con);
 }
  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Register or create an account</title>
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
        	<form name="form1" id="form1" method="post" action="register1.php">
        	  <table width="667" height="419" border="0">
                <tr bgcolor="#FF9966">
                  <td colspan="4" bgcolor="#FF6633"><div align="center">
                    <h3><strong>Register Now </strong></h3>
                  </div></td>
                </tr>
                <tr>
                  <td height="31" colspan="4">&nbsp;</td>
                </tr>
                <tr>
                  <td width="27">&nbsp;</td>
                  <td width="147"><label>Name</label>&nbsp;</td>
                  <td width="233"><input name="name" type="text" id="name" size="30" maxlength="30" /></td>
                  <td width="237" rowspan="9"><div align="left">
				  <?php
				
				 //if($_POST['reg'] && 
				 if(isset($_POST['reg']) && $count>0)
				 {
				  echo "<table border=0 bgcolor='#ff9900'font color='#FF0000' ><th>Error message(s) <hr/></th> \n";
				   echo  "<tr><td>".$isEmpty.$isNameV.$isSurV.$isEmV.$isUnV.$pwdV.$pwdComp.$conErr.$QErr.$errTerms."</td></tr>";
				   echo "</table>";
		         }
		     
				  ?>
				  </div></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><label>Surname</label>&nbsp;</td>
                  <td><input name="surname" type="text" id="surname" size="30" maxlength="30" /></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><label>Email</label>&nbsp;</td>
                  <td><input name="email" type="text" id="email" size="30" maxlength="30" /></td>
                </tr>
                <tr>
                  <td height="35">&nbsp;</td>
                  <td><label>Username</label>&nbsp;</td>
                  <td><input name="username" type="text" id="username" size="30" maxlength="30" /></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td bgcolor="#FFFFFF"><label>Password</label>
                  &nbsp;</td>
                  <td><input name="pwd" type="password" id="pwd"  size="32" maxlength="32" /></td>
                </tr>
                <tr>
                  <td height="27">&nbsp;</td>
                  <td><label>Reenter-Password</label>&nbsp;</td>
                  <td><input name="r_pwd" type="password" id="r_pwd" size="32" maxlength="32" /></td>
                </tr>
                <tr>
                  <td height="27">&nbsp;</td>
                  <td>&nbsp;</td>
                  <td> <input name="terms" type="checkbox" id="terms" value="checkbox" />
                  <span class="style7">                  I Accept terms and conditions </span></td>
                </tr>
                <tr>
                  <td height="66">&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td height="49">&nbsp;</td>
                  <td><input name="reg" type="submit" id="reg" value="Register" /></td>
                  <td> <input type="reset" name="Reset" value="Clear form" /></td>
                  <td width="1">&nbsp;</td>
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
			
			<h3>How to purchase? </h3>
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
</body></html>