<?php
session_start();
?>
<?php

class Cart
{
  var $prod_name;
  var $prod_id;
  var $url="http:../customer/products.php?add_to_cart=";
  
  function dbConn()
  {
      $con=mysql_connect('localhost','root','');
	 
	  if(!$con)
	   {
	     $err="<li><font color='#FF0000'>ERROR,failed to connect to server";
		 return $err;
		 exit;
	   }
	   mysql_select_db('hello');
	   if(!mysql_select_db('hello'))
	   {
	    $err="<li><font color='#FF0000'>ERROR,could not connect to DB";
		 return $err;
		 exit;
	   }
     
  
  }
  function Cart($prod_name,$prod_id)
  {
    $this->prod_name=$prod_name;
	$this->prod_id=$prod_id;
  
  }
  function getProductName()
  {
    return $this->prod_name;
  }
  function getprod_id()
  {
    return $this->prod_id;
  }
  function addingToCart()
  {
    if(isset($_GET['add']) && (int)$_GET['add']>0)
	{
	    $select=mysql_query("SELECT FROM products WHERE Prod_id=".(int)$_GET['add'])or die(mysql_error("Unable to execute the query"));
		$result=mysql_query($select,$this->con);
		
		$index=mysql_num_rows($result);$index=$index[0];
		
		if(!isset($_SESSION['prod_id']))
		{
		  $_SESSION['prod_id']=array();
		  $_SESSION['counts']=array();
		}
		$num=0;
		
		while($num<count($_SESSION['prod_id'])&& $_SESSION['prod_id'][$num]!=$_GET['add'])$num++;
		if($num<count($_SESSION['prod_id']))
		{
		  $_SESSION['counts'][$num]++;
		  
		}
		else{
		
		 $_SESSION['prod_id'][]=$_GET['add'];
		 $_SESSION['counts'][]=1;
		}
		$cUrl=$url.$_REQUEST['prod_Id'];
		return $cUrl;
	}
  }
  function removeFromCart()
  {
    if(isset($_GET['removeProd'])&& (int)$_GET['removeProd']>0)
	{
	   $num=0;
	   
	   while($num<count($_SESSION['prod_id'] && (int)$_SESSION['prod_id'][$num]!=$_GET['removeProd']))
	   {
		   $num++;
		   if($num<count($_SESSION['prod_id']));
		   
		   $_SESSION['prod_id'][$num]=0;
		   
	 }
	$cUrl=$url.$_REQUEST['prod_id'];
	return $cUrl;
   }
  } 
 }
?>


