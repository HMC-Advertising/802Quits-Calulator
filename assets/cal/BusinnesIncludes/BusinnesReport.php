<?php
 //include_once("DataBase/DataReportQuery.php");



class Config
 {  
    function ExecuteQuery($Query){

      $array =  array();
      $host="localhost";
      $user="wordpress_8";
     $password="G!Xgr3J9s6";
      $dbname = "wordpress_c";

      //$user="root";
     // $password="root";
      //$dbname = "multi_site";

      $connection = 'mysql:host='.$host.';dbname='.$dbname;
    
      try{
        $pdo = new PDO($connection, $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $data = $pdo->query($Query);
        $array = $data->fetch();

        return $array;
        $pdo->connection = null;

      }
      catch(PDOException $e){
        echo "error " . $e->getMessage();

      }
      
    }
    
   function ExecuteQueryUpdate($Query){   $host="localhost";
     $array =  array();
      $host="localhost";
      $user="wordpress_8";
      $password="G!Xgr3J9s6";
      $dbname = "wordpress_c";

    $connection = 'mysql:host='.$host.';dbname='.$dbname;
    
    try{
       $pdo = new PDO($connection, $user, $password);
       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $data = $pdo->query($Query);
       $array = $data->fetch();

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
 
 class DataReportQuery
 {
 
   function GetReportByUserId($UserID)
   {
        $confin = new Config;
        $Result = 0;
  
        $Query = "SELECT * FROM reports WHERE UserID ='".$UserID."'";
       
        $Result= $confin->ExecuteQuery($Query);
      
     return $Result;
     
   }
    
   function InsertReportByUserId($UserID,$AgeStarted, $CurrentAge, $AveragePacks, $CurrentPrice, $MoneySpent, $TrueCost,
                            $SixMonths, $OneYear, $FiveYears, $TenYears, $TwentyYears)
   {
        $confin = new Config;
        
        $Result=0;
        $fecha ="'". date(d."-".m."-".Y);
        $Query = "INSERT INTO `reports` (`UserID`, `AgeStarted`, `CurrentAge`, `AveragePacks`, `CurrentPrice`, `MoneySpent`, `TrueCost`,
                               `SixMonths`, `OneYear`, `FiveYears`, `TenYears`, `TwentyYears`, `UpdatedDate`)
               VALUES($UserID,$AgeStarted,$CurrentAge,$AveragePacks,$CurrentPrice,$MoneySpent,$TrueCost,
                            $SixMonths,$OneYear,$FiveYears,$TenYears,$TwentyYears,$fecha')";
  
      $Result= $confin->ExecuteQueryUpdate($Query);

        return $Result;
   }
   
   function UpdateReportByUserId($UserID,$AgeStarted, $CurrentAge, $AveragePacks, $CurrentPrice, $MoneySpent, $TrueCost,
                            $SixMonths, $OneYear, $FiveYears, $TenYears, $TwentyYears)
   {
        $confin = new Config;
        $Result=0;
        
        $Query = 'UPDATE reports SET AgeStarted='  .$AgeStarted.  ', CurrentAge='      .$CurrentAge.  '
                            , AveragePacks=' .$AveragePacks.   ', CurrentPrice=' .$CurrentPrice.'
                            , MoneySpent='      .$MoneySpent.  ', TrueCost='     .$TrueCost.'
                            , SixMonths='    .$SixMonths.   ', OneYear='      .$OneYear.', FiveYears='.$FiveYears.'
                            , TenYears='     .$TenYears.    ', TwentyYears='  .$TwentyYears.'
                            , UpdatedDate='  .date(d."-".m."-".Y).' WHERE UserID='.$UserID; 
   
       
      $Result= $confin->ExecuteQueryUpdate($Query);
        return $Result;
   }
 }


 class BusinnesReport
 {
   function GetReportByUserId($UserID)
   {
   		$objDataReport = new DataReportQuery;
   		$Result = $objDataReport->GetReportByUserId($UserID);
   	
   		return $Result;
   }
   
   function InsertReportByUserId($UserID,$AgeStarted, $CurrentAge, $AveragePacks, $CurrentPrice, $MoneySpent, $TrueCost,
   	  							 $SixMonths, $OneYear, $FiveYears, $TenYears, $TwentyYears)
   {
   		$objDataReport = new DataReportQuery;
   		return $objDataReport->InsertReportByUserId($UserID,$AgeStarted, $CurrentAge, $AveragePacks, $CurrentPrice, $MoneySpent, $TrueCost,
   	  							 					$SixMonths, $OneYear, $FiveYears, $TenYears, $TwentyYears);
   }
   
   function UpdateReportByUserId($UserID,$AgeStarted, $CurrentAge, $AveragePacks, $CurrentPrice, $MoneySpent, $TrueCost,
   	  							 $SixMonths, $OneYear, $FiveYears, $TenYears, $TwentyYears)
   {
   		$objDataReport = new DataReportQuery;
   		
   		return $objDataReport->UpdateReportByUserId($UserID,$AgeStarted, $CurrentAge, $AveragePacks, $CurrentPrice, $MoneySpent, $TrueCost,
   	  							 					$SixMonths, $OneYear, $FiveYears, $TenYears, $TwentyYears);
   }
 }

 
 
?>