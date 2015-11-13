<?php
 include_once("includes/header.php");
 
 include_once("includes/rewards.php");
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
 	
 	$url = $_SERVER['SERVER_NAME'];
	$page = $_SERVER['PHP_SELF'];
	$url = "http://".$url.$page; 
	
	if(count($Result)>0 && $Result[0]!="")
	{
		$id= $Result["UserID"];
		$years = ( (int)$Result["CurrentAge"] - (int)$Result["AgeStarted"] );
	 	$fileName = $url.$id."pdf";
	 	$filePath = "./pdfs/".$fileName;
	 	$email= "";
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
  <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
  <html>
  <head>
  <link rel="stylesheet" type="text/css" href="styles/report.css" media="screen" />
  <!-- Include Print CSS -->
  <link rel="stylesheet" href="styles/print.css" type="text/css" media="print" />
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/jquery-ui.min.js"></script>

  <title>Smoking Cost Calculator Report</title>




  </head>
  
  <body style="" onload="Javascript:history.go(1);" onUnload="Javascript:history.go(1);">
  
  <div id="container">
    <div class="wrapper">
      <div class="actions"><span class="title"><b>Share this Report:</b></span> <a rel="nofollow" href="http://www.facebook.com/share.php?u=<;url>" class="fb_share_button" onclick="return fbs_click()" target="_blank" style="text-decoration:none;">Post</a> <a class="email" onClick="email_click()">Email</a> <a  class="pdf" href="pdf.php?id=<?php echo $id;?>">Pdf</a></div>
      <div style="clear:both"></div>
      <div class="header"><img src="http://appfb.tobaccofreeflorida.tff-stg.tribalddb.com/calculator/images/header.png" alt="TFF" /></div>
      <div class="content">
        <div class="stats">
          <p>You started smoking cigarettes when you were <span class="red"><?php echo $age_started;?></span>. And you're currently <span class="red"><?php echo $current_age;?></span> years old.</p>
          <br/>
          <p style="color:##000000"> <b>You've been smoking for <span class="red"><?php echo str_replace("-", "", $years);?></span> years.</b></p>
          <br/>
          <p>You smoke an average of <span class="red"><?php echo $average_packs;?></span> packs a day at <span style="text-decoration:underline">$<span class="red" ><?php echo $current_price;?></span> per pack.</span></p>
        </div>
        <div class="calculation spent">
          <p><b>You have already spent</b></p>
          <div class="numbers">
            <table cellpadding="10" width="245">
              <tr>
                <td width="150">Total</td>
                <td align="right"><b><?php echo $money_spent;?></b></td>
              </tr>
            </table>
          </div>
          <div class="numbers">
            <table cellpadding="10" width="245">
              <tr>
                <td width="150">In today's dollars, 
                  adjusted for inflation</td>
                <td align="right"><b><?php echo $true_cost;?></b></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="calculation">
          <p><b>If you continue, you'll spend</b></p>
          <div class="numbers">
            <table cellpadding="10" width="245">
              <tr>
                <td width="150">In 6 months </td>
                <td align="right"><b><?php echo $six_months;?></b></td>
              </tr>
            </table>
          </div>
          <div class="numbers">
            <table cellpadding="10" width="245">
              <tr>
                <td width="150">In 1 year</td>
                <td align="right"><b><?php echo $one_year;?></b></td>
              </tr>
            </table>
          </div>
          <div class="numbers">
            <table cellpadding="10" width="245">
              <tr>
                <td width="150">In 5 years</td>
                <td align="right"><b><?php echo $five_years;?></b></td>
              </tr>
            </table>
          </div>
          <div class="numbers">
            <table cellpadding="10" width="245">
              <tr>
                <td width="150">In 10 years</td>
                <td align="right"><b><?php echo $ten_years;?></b></td>
              </tr>
            </table>
          </div>
          <div class="numbers">
            <table cellpadding="10" width="245">
              <tr>
                <td width="150">In 20 years</td>
                <td align="right"><b><?php echo $twenty_years;?></b></td>
              </tr>
            </table>
          </div>
        </div>
        <div style="clear:both"></div>
        <div class="better">
          <p style="font-size:14.5px;"><b>If you quit today, here are some better ways you can use that money...</b></p>
          <div class="item">
            <table align="center">
              <tr>
                <td align="center"><p><b>IN 6 MONTHS</b></p></td>
              </tr>
              <tr>
                <td align="center" ><b><?php echo $objRewards->GetRewards($six_months);?></b></td>
              </tr>
                </tr>
              
            </table>
          </div>
          <div class="item">
            <table align="center">
              <tr>
                <td align="center"><p><b>IN A YEAR</b></p></td>
              </tr>
              <tr>
                <td align="center"><b><?php echo $objRewards->GetRewards($one_year);?></b></td>
              </tr>
                </tr>
              
            </table>
          </div>
          <div class="item">
            <table align="center">
              <tr>
                <td align="center"><p><b>IN 5 YEARS</b></p></td>
              </tr>
              <tr>
                <td align="center"><b><?php echo $objRewards->GetRewards($five_years);?></b></td>
              </tr>
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
                <td align="center" width="290" ><b><?php echo $objRewards->GetRewards($six_months);?></b></td>
                <td align="center" width="290"><b><?php echo  $objRewards->GetRewards($one_year);?></b></td>
                <td align="center"  width="290"><b><?php echo $objRewards->GetRewards($five_years);?></b></td>
              </tr>
                </tr>
              
            </table>
          </div>
        </div>
        <div style="clear:both"></div>
        <div class="info">
          <p style="font-size: 20px; margin-bottom: 0pt;margin-top: 10px;"><b>Quitting smoking is not just good for your wallet; it's good for your health...</b></p>
          <table cellpadding="5">
            <tr>
              <td ><p>20 minutes after you quit smoking, your blood pressure decreases</p>
                <p>8 hours after you quit smoking, your blood oxygen level returns to normal</p>
                <p>3 months after you quit smoking, your lung function improves up to 30 percent </p></td>
              <td ><p> 1 year after you quit smoking, your risk of heart attack is cut in half</p>
                <p> 10 years after you quit smoking, your risk of dying from lung cancer is about half that of a smoker</p>
                <p>10 years after you quit smoking, your risk of heart disease is that of a person who never smoked</p></td>
            </tr>
          </table>
        </div>
        <div style="clear:both"></div>
        <p class="label" ><b>Need help quitting? </b></p>
        <div class="help">
          <div class="help-item">
            <table cellpadding="0">
              <tr  valign="top" height="50px">
                <td align="center" colspan="3"><p>3 EASY & FREE WAYS TO QUIT</p></td>
              </tr>
             <tr  valign="top">
                <td width="165"><a href="http://www.tobaccofreeflorida.com/Contents-12/Florida-Quitline/" target="_blank"><img width="161px" src="images/imagen2.png"/></a></td>
                <td width="161"><a href="http://www.tobaccofreeflorida.com/Contents-12/Online-Support/" target="_blank"><img width="161px" src="images/imagen3.png"/></a></td>
                <td width="161"><a href="http://www.tobaccofreeflorida.com/Contents-12/In-person/" target="_blank"><img width="161px" src="images/imagen1.png"/></a></td>
              </tr>
              
            </table>
          </div>
          <div class="help-print">
          </div>
        </div>
        <div style="clear:both"></div>
     	 </div>       
      <div class="footer">&nbsp;</div>
      <div class="actions">
      		<span  class="title"> <b>Share this report:</b></span> 
            <a rel="nofollow" href="http://www.facebook.com/share.php?u=<;url>" class="fb_share_button" onclick="return fbs_click()" target="_blank" style="text-decoration:none;">Post</a> <a class="email" onClick="email_click()">Email</a> <a  class="pdf" href="pdf.php?id=<?php echo $id;?>">Pdf</a>
      </div>
    </div>
  </div>
  </body>
  </html>

