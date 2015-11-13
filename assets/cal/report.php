<?php
 //include_once("includes/header.php");
 
 include("includes/rewards.php");
 	$objRewards = new Rewards; 
 
 include("BusinnesIncludes/BusinnesReport.php"); 
 
 	$objReport = new BusinnesReport;
	$Result = $objReport->GetReportByUserId($_REQUEST["id"]);
 
	$id="";
	$years="";
 	$fileName="";
 	$filePath="";
 	$email="";
 	$age_started="";
 	$current_age="";
 	$average_packs="";
 	$current_price="";
 	$money_spent="";
 	$true_cost="";
 	$six_months="";
 	$one_year="";
 	$five_years="";
 	$ten_years="";
 	$twenty_years="";
 	$six_months="";
 	
 	//$url = $_SERVER['SERVER_NAME'];
	//$page = $_SERVER['PHP_SELF'];
	//$url = "http://".$url.$page; 
	
	if(count($Result)>0 && $Result[0]!="")
	{
		$id= $Result["UserID"];
		$years = ( (int)$Result["CurrentAge"] - (int)$Result["AgeStarted"] );
	 //	$fileName = $url.$id."pdf";
	// 	$filePath = "./pdfs/".$fileName;
	 	//$email= "";
	 	$age_started = $Result["AgeStarted"];
	 	$current_age = $Result["CurrentAge"];
	 	$average_packs = $Result["AveragePacks"];
	 	$current_price = $Result["CurrentPrice"];
	 	$money_spent = $Result["MoneySpent"];
	 	$true_cost = $Result["TrueCost"];
	 	$six_months = $Result["SixMonths"];
	 	$one_year =  $Result["OneYear"];
	 	$five_years =  $Result["FiveYears"];
	 	$ten_years = $Result["TenYears"];
	 	$twenty_years = $Result["TwentyYears"];
		
		
		$six_months = str_replace(",", "", $six_months);
		$six_months = explode(".",$six_months);
		$six_months = $six_months[0];
    
	
		
	 	$one_year = str_replace(",", "", $one_year);
		$one_year = explode(".",$one_year);
		$one_year = $one_year[0];
       
	
		
	 	$five_years =  str_replace(",", "", $five_years);
		$five_years = explode(".",$five_years);
		$five_years = $five_years[0];
  
	
		
	 	$ten_years = str_replace(",", "", $ten_years);
		$ten_years = explode(".",$ten_years);
		$ten_years = $ten_years[0];
     
	
		
	 	$twenty_years =str_replace(",", "", $twenty_years);
		$twenty_years = explode(".",$twenty_years);
		$twenty_years = $twenty_years[0];
     
	
		$val = str_replace("-", "", $years);
		
		if($val =="0")
		{
			$six_months="";
			$one_year="";
			$five_years="";
			$ten_years="";
			$twenty_years="";
		}
	
	}

?>

  <div onLoad="loadp()" onUnload="loadp()" >
  <div id="container">
    <div class="wrapper">
      <div style="clear:both"></div>
      <div class="header_cal"></div>
      <div class="content">
        <div class="stats">
          <ul>
            <li>You started smoking cigarettes when you were <span class="red"><?php echo $age_started;?></span>. And you're currently <span class="red"><?php echo $current_age;?></span> years old.</li>
            <li class="amount_time">You've been smoking for <span class="red"><?php echo str_replace("-", "", $years);?></span> years.</li>
            <li>You smoke an average of <span class="red"><?php echo $average_packs;?></span> packs a day at <span style="text-decoration:underline"><span class="red" >$<?php echo $current_price;?></span> per pack.</span></li>
          </ul>
        </div>
        <div class="calculation spent">
          <p>You have already spent</p>
          <div class="numbers">
            <table cellpadding="0">
              <tr style="border-top:thin solid">
                <td width="115">Total</td>
                <td align="right"><b><?php echo "$ ".$money_spent;?></b></td>
              </tr>
           
              <tr>
                <td width="115" style="font-size:90%">In today's dollars 
                  <small style="font-size:75%">(adjusted for inflation)</small></td>
                <td align="right"><b><?php echo "$ ".$true_cost;?></b></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="calculation">
          <p>If you continue, you'll spend</p>
          <div class="numbers">
            <table cellpadding="0">
              <tr style="border-top:thin solid">
                <td width="115">In 6 months </td>
                <td align="right"><b><?php echo "$ ".number_format($six_months).".00";?></b></td>
              </tr>
           
              <tr>
                <td width="115">In 1 year</td>
                <td align="right"><b><?php echo "$ ".number_format($one_year).".00";?></b></td>
              </tr>
           
              <tr>
                <td width="115">In 5 years</td>
                <td align="right"><b><?php echo "$ ".number_format($five_years).".00";?></b></td>
              </tr>
           
              <tr>
                <td width="115">In 10 years</td>
                <td align="right"><b><?php echo "$ ".number_format($ten_years).".00";?></b></td>
              </tr>
           
              <tr>
                <td width="115">In 20 years</td>
                <td align="right"><b><?php echo "$ ".number_format($twenty_years).".00";?></b></td>
              </tr>
            </table>
          </div>
        </div>
        <div style="clear:both"></div>
        <div class="better">
          <h4>If you quit today, here are some better ways <br>you can use that money</h4>
          <div class="item bluegreen">
            <table align="center">
              <tr>
                <td align="center"><p><b>IN 6 MONTHS</b></p></td>
              </tr>
              <tr>
                <td align="center" ><?php echo $objRewards->GetRewards($six_months);?></td>
              </tr>
              
              
            </table>
          </div>
          <div class="item brightblue">
            <table align="center">
              <tr>
                <td align="center"><p><b>IN A YEAR</b></p></td>
              </tr>
              <tr>
                <td align="center"><?php echo $objRewards->GetRewards($one_year);?></td>
              </tr>
              
              
            </table>
          </div>
          <div class="item darkblue" style="margin-right:0px;">
            <table align="center">
              <tr>
                <td align="center"><p><b>IN 5 YEARS</b></p></td>
              </tr>
              <tr>
                <td align="center"><?php echo $objRewards->GetRewards($five_years);?></td>
              </tr>
                
              
            </table>
          </div>
          <div style="clear:both"></div>
          <div class="better-print">
            <table cellpadding="5" width="879" height="250" >
              <tr valign="top">
                <td width="290" align="center"><b>IN 6 MONTHS</b></td>
                <td width="290" align="center"><b>IN A YEAR</b></td>
                <td width="290" align="center"><b>IN 5 YEARS</b></td>
              </tr>
              <tr valign="top">
                <td align="center" width="290" ><?php echo $objRewards->GetRewards($six_months);?></td>
                <td align="center" width="290"><?php echo  $objRewards->GetRewards($one_year);?></td>
                <td align="center"  width="290"><?php echo $objRewards->GetRewards($five_years);?></td>
              </tr>
               
              
            </table>
          </div>
        </div>
        <div style="clear:both"></div>
        <div class="info">
          <h4 class="ta-center grid-full">Quitting smoking is not just good for your wallet; it's good for your health.</h4>
          <ul>
            <li>
              <span style="font-weight:800">20 minutes</span> after you quit smoking, your blood pressure decreases</li>
            <li>
               <span style="font-weight:800">8 hours</span> after you quit smoking, your blood oxygen level returns to normal
            </li>
            <li>
               <span style="font-weight:800">3 months</span> after you quit smoking, your lung function improves up to 30 percent 
            </li>
            <li> 
               <span style="font-weight:800">1 year</span> after you quit smoking, your risk of heart attack is cut in half
            </li>
            <li> 
               <span style="font-weight:800">10 years</span> after you quit smoking, your risk of dying from lung cancer is about half that of a smoker
            </li>
            <li>
              <span style="font-weight:800"> 10 years </span>after you quit smoking, your risk of heart disease is that of a person who never smoked
            </li>
          </ul>
        </div>
        <div style="clear:both"></div>
       
        <div class="help">
          <div class="footer-c">
            <header class="footer-header">
              <h4 class="ta-center grid-full">We can help you quit smoking. Get started today.</h4>
            </header>
            <nav class="nav-footer">
              <ul id="menu-main-navigation-1" class="menu">
                <li id="menu-item-174" class="item-gum menu-item menu-item-type-post_type menu-item-object-page">
                  <a href="http://802quits.org/free-gum-patches/">Free Gum &#038; Patches<br /><small>Details on how to get free gum and patches or lozenges delivered to you at your home.</small></a>
                </li>
                <li id="menu-item-173" class="item-person menu-item menu-item-type-post_type menu-item-object-page">
                  <a href="http://802quits.org/in-person-quit-help/">In-Person Quit Help<br /><small>Find a Vermont Quit Partner who can help you on your way to quit smoking.</small></a>
                </li>
                <li id="menu-item-172" class="item-phone menu-item menu-item-type-post_type menu-item-object-page">
                  <a href="http://802quits.org/quit-help-by-phone/">Quit Help by Phone<br /><small>Call (800) QUIT-NOW to connect with a Quit Coach who can give you tools, advice and support, all for free.</small></a>
                </li>
                <li id="menu-item-171" class="item-online menu-item menu-item-type-post_type menu-item-object-page">
                  <a href="http://802quits.org/online-quit-help/">Online Quit Help<br /><small>Use our free online support program to connect with former smokers and others trying to quit.</small></a>
                </li>
                <li id="menu-item-162" class="item-own menu-item menu-item-type-post_type menu-item-object-page">
                  <a href="http://802quits.org/your-way/">Quit Your Way<br /><small>Quit your way with our helpful tips and tools.</small></a>
                </li>
              </ul>         
            </nav>
          </div>
          <div class="help-print">
          </div>
        </div>
        <div style="clear:both"></div>
     	 </div>       
      <div class="footer-cal">&nbsp;</div>
      <div id="disclaimer" class="block">
              <p>
                Calculator courtesy of <a href="http://www.tobaccofreeflorida.com/" target="_blank">Tobacco Free Florida</a>
              </p>
            </div>
    </div>

  </div>
  
</div>
