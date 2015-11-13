<?php
 
  include_once("Config/config.php");

 class DataReportQuery
 {
 
   function GetReportByUserId($UserID)
   {
   	  $confin = new Config;
   	  $Result=0;
  
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
   	  
   	  $Query = 'UPDATE reports SET AgeStarted=' 	.$AgeStarted. 	', CurrentAge='		.$CurrentAge.	'
   	  							 , AveragePacks='	.$AveragePacks.	', CurrentPrice='	.$CurrentPrice.'
   	  							 , MoneySpent='		.$MoneySpent.	', TrueCost='		.$TrueCost.'
   	  							 , SixMonths='		.$SixMonths.	', OneYear='		.$OneYear.', FiveYears='.$FiveYears.'
   	  							 , TenYears='		.$TenYears.		', TwentyYears='	.$TwentyYears.'
   	  							 , UpdatedDate='	.date(d."-".m."-".Y).' WHERE UserID='.$UserID; 
   
   	 
      $Result= $confin->ExecuteQueryUpdate($Query);
   	  return $Result;
   }
 }

?>