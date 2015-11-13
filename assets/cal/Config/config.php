<?php

class Config
 {	
   	function ExecuteQuery($Query)
   	{
	   	 /*$host="localhost";
		 $user="root";
		 $password="root";


	   
	
		 $link = mysql_connect ($host, $user, $password) or die ("No se puede conectar con la base de datos.");
		 $dbname = "new802wp";
		 //$dbname = "wordpress802";
                 // php ntb
                 mysql_select_db($dbname,$link);
	  	 
                 $result=mysql_query($Query, $link);//mysql_db_query($dbname, $Query, $link);
	  	 
	  	 $array = Array();
	  	 $array = mysql_fetch_array($result);
                 mysql_free_result($result);
                mysql_close($link);
	    return $array;*/

	    	$array =  array();
	   	$host="localhost";
		$user="root";
		$password="root";
		$dbname = "multi_site";

		$connection = 'mysql:host='.$host.';dbname='.$dbname;
		
		try{
		 	 $pdo = new PDO($connection, $user, $password);
		 	 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		 	 $data = $pdo->query($Query);
		 	 $array = $data->fetch(PDO::FETCH_ASSOC);

		 	 return $array;
		 	 $pdo->connection = null;

		 }
		 catch(PDOException $e){
		 	echo "error " . $e->getMessage();

		 }
   		
   	}
   	
   function ExecuteQueryUpdate($Query)
   	{	  $host="localhost";
		 $user="root";
		 $password="root";
	   $dbname = "new802wp";


	    	$array =  array();
	   	$host="localhost";
		$user="root";
		$password="root";
		$dbname = "new802wp";

		$connection = 'mysql:host='.$host.';dbname='.$dbname;
		
		try{
		 	 $pdo = new PDO($connection, $user, $password);
		 	 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		 	 $data = $pdo->query($Query);
		 	 $array = $data->fetch(PDO::FETCH_ASSOC);

		 	 return $array;
		 	 $pdo->connection = null;

		 }
		 catch(PDOException $e){
		 	echo "error " . $e->getMessage();

		 }
		 /*
	
		 $link = mysql_connect ($host, $user, $password) or die ("No se puede conectar con la base de datos.");
		 //$dbname = "wordpress802";
	
	  	 $result = mysql_db_query($dbname, $Query, $link);
	  	 

	     mysql_close($link);
		
	     return $result;*/
   		
   	}
 }
 
?>