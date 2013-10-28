<?php
class DatabaseConn
{
   private $serverName;
   private $userName;
   private $database;
   
   //connecting to database
  public function DBConn()
  {
     $this->servername='localhost';
	 $this->userName='root';
	 $this->database='hello';
	 
	 $err_array=array();
	 
	  $con=mysql_connect($serverName,$userName,'');
	   if(!$con)
	   {
	     $err="<li><font color='#FF0000'>ERROR,failed to connect ";
		 array_push($err_array,$err);
		 return $err_array;
		 
	   }
	   mysql_select_db('hello');
	   if(!mysql_select_db('hello'))
	   {
	    $err="<li><font color='#FF0000'>ERROR,could not connect to DB";
		 array_push($err_array,$err);
		 return $err_array;
	   }
     
  }
  //validating the identity number
   public function validateIDNo($idNo)
   {
	  $validateId=preg_match("/^[0-9]{13}+$/",$idNo);
      
	  if(!$validateId)
	  {
	    $err="<li><font color='#FF0000'>ERROR :Enter digits,and length must be 13<br/></li>";
	    array_push($err_array,$err);
		 return $err_array;
	  }
	  //validate year born
	  if($idNo[0]<4  || $idNo[1]<0)
	  {
	       $err="<li><font color='#FF0000'>ERROR,born year is invalid<br/></li>";
	       array_push($err_array,$err);
		    return $err_array;
	  }
	  //validate month
	  if($idNo[2]!=1 ||$idNo[2]!=2 && $idNo[3]!=1 || $idNo[3]!=2)
	  {
	       $err="<li><font color='#FF0000'>ERROR,born month is invalid<br/></li>";
	       array_push($err_array,$err);
		    return $err_array;
	  }
	  //validate born day
	   if(($idNo[4]!=0 ||$idNo[4]!=1 || $idNo[4]!=2 && $idNo[5]!=1) && ($idNo[4]==3 && $idNo[5]>1))
	  {
	       $err="<li><font color='#FF0000'>ERROR,born day is invalid<br/></li>";
	       array_push($err_array,$err);
		   return $err_array;
	  }
	 
  }
  //method to add a new customer
  /*public function signUser($name,$surname,$idNo,$email,$username,$pwd,$rpwd,$terms)
  {
     $dbQry=new DatabaseConn();
     $dbConn=$dbQry->DBConn();
	 
	  $err_array=array();
	  $date=date('H:I J S');
	  //validating fields first 
	if(empty($name) || empty($surname)|| empty($email) || empty($idNo) || empty($username)|| empty($pwd)|| empty($rpwd) || empty($terms))
	{
	   $err= "<li><font color='#FF0000' >Make sure all fields are filled <br/></li>";
	   array_push($err_array,$err);
	 
	 }
	   if(!$vNym)
	   {
		 $err="<li><font color='#FF0000' >Invalid ..Name must be at least 4 characters long <br/></li>";
		   array_push($err_array,$err);
		 
	   }
	   if(!$vSur)
	   {
		 $err= "<li><font color='#FF0000' > INVALID,Surname must be at least 4 characters long <br/></li>";
		   array_push($err_array,$err);
	   }
	   if(!$vEm)
	   {
	     $err= "<li><font color='#FF0000' >INVALID ,email must be in the pattern e.g (john@yahoo.com)<br/></li>";
		  array_push($err_array,$err);
	   }
	   if(!$vUnym)
	   {
	     $err="<li><font color='#FF0000' >INVALID ,username must be at least 5 characters long <br/></li>";
		  array_push($err_array,$err);
	   }
      if(!$vP)
	  {
	    $err="<li><font color='#FF0000'>Invalid , password must be at least 8 characters long <br/></li>";
		array_push($err_array,$err);
	  }
	  if(!$vComp)
	  {
	   $err="<li><font color='#FF0000'>ERROR : password re-entered has no match <br/></li>";
		array_push($err_array,$err);
	    }
	  if(!isset($terms))
	  {
	    $err="<li><font color='#FF0000'>ERROR :Make sure you check t&c<br/></li>";
		array_push($err_array,$err);
	  }
	  if(count($err_array()>0))
	  {
	   return $err_array;
	   exit();
	   
	  }
	  
	  $vId=$dbQry->validateIDNo($idNo);
	  $pwdEncr=$dbQry->encryptPwd($pwd);
	  
	  $dbConn=$dbQry->DBConn();
	  if(!empty($dbConn))
	  {
	     $err="<li><font color='#FF0000'>ERROR :Coould not connect to DB<br/></li>";
		 array_push($err_array,$err);
		 exit();
	  }
	  
	   $query=mysql_query("INSERT INTO users(user_id,name,surname,id_number,email,username,password,date) VALUES
	                     (NULL,'$name','$surname','$idNo','$email','$username','$pwdEncr',' $date')");
						
		if(mysql_affected_rows()==1)
		{
		  header('Location: registered.php?name=$name&surname=$surname');
		  die();
		}
  }*/  
  //method to encrpt the password
  public function encryptPwd($pwd)
  {
     $encrPwd=md5($pwd);
	 return $encrPwd;
  
  }
  //check if a user has already registered
  public function loginSelect($id)
  {
    $dbQry=new DatabaseConn();
     $dbConn=$dbQry->DBConn();
	
	$ack_array=array();
	if($id!=NULL)
	{
		  $query=mysql_query("SELECT * FROM users WHERE id_number='$id'");
		  
		  if(mysql_affected_rows()==1)
		  {
		  
			 $ack="The user already exists<br/>";
			 array_push($ack_array,$ack);
			 return $ack_array;
		  }
		  else if(mysql_affected_rows()==0)
		  {
			 $ack="The user does not exists<br/>";
			 array_push($ack_array,$ack);
			 return $ack_array;
		  }
	}
	
  
  }
  public function addUserQuery()
  {
     $dbQry=new DatabaseConn();
     $dbConn=$dbQry->DBConn();
	 $err_array();
	 
	 $date=date('Y-M-D');
	 
	 if(!empty($dbConn))
	 {
	    return $err_array;
	 }
     $query=mysql_query("INSERT INTO users(user_id,name,surname,id_no,email,username,password,date) VALUES
	                     (NULL,'$name','$surname','$idNo','$email','$username','$pwdEncr',' $date')");
						
		if(mysql_affected_rows()==1)
		{
		  header('Location: registered.php?name=$name&surname=$surname');
		  die();
		}
		else{
		
		  $err="<li><font color='#FF0000' >Sorry:could not register you,try again<br/></li>";
		  array_push($err_array,$err);
		  return $err_array;
		}
  }
}
?>