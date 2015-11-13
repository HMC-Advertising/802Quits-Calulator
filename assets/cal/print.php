<?php
 include_once("includes/header.php");
 
 include_once("includes/rewards.php");
 	$objRewards = new Rewards;
 	
 include("BusinnesIncludes/BusinnesReport.php"); 
 
 	$objReport = new BusinnesReport;
	$Result = $objReport->GetReportByUserId($_REQUEST["id"]);
	
	$id=$_REQUEST["id"];
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
 	
 	//$datetime = new DateTime(); 
 	$url = $_SERVER['SERVER_NAME'];
	$page = $_SERVER['PHP_SELF'];
	//$url = "http://".$url.$page."?id=".$id."-".$datetime->format('Y/m/d').".pdf";
	 
 	if(count($Result)>0 && $Result[0]!="")
	{
		
		$id= $Result["UserID"];
		$years = ( (int)$Result["CurrentAge"] - (int)$Result["AgeStarted"] );
	 	$fileName = $url;
	 	$filePath = "./pdfs/".$fileName;
	 	$email= "";
	 	$age_started = $Result["AgeStarted"];
	 	$current_age = $Result["CurrentAge"];
	 	$average_packs = $Result["AveragePacks"];
	 	$current_price = $Result["CurrentPrice"];
	 	$money_spent = $Result["	MoneySpent"];
	 	$true_cost = $Result["TrueCost"];
	 	$six_months = $Result["SixMonths"];
	 	$one_year =  $Result["OneYear"];
	 	$five_years =  $Result["FiveYears"];
	 	$ten_years = $Result["TenYears"];
	 	$twenty_years = $Result["TwentyYears"];
	}
?>
 <!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01//EN' 'http://www.w3.org/TR/html4/strict.dtd'>
  <html>
  <head>
  <link rel='stylesheet' href='styles/print.css' type='text/css' media='print' />
  <script type="text/javascript" src="scripts/jquery-1.6.4.min.js"></script>
  <title>Smoking Cost Calculator Report</title>
  </head>
  
  <body>
  
  <?php $HtmlRender =' <div id="container" style="width: 976px; margin-left: 0px;font-family:Verdana, Geneva, sans-serif;font-size:14px;" >' ?>
  <?php $HtmlRender = $HtmlRender.'<div class="wrapper">'?>
  <?php $HtmlRender = $HtmlRender.'<div class="header" style="visibility:visible;"><img src="http://localhost/HtmlFacebook520MigracionPhp/images/header.png" alt="" /></div>'?>
  <?php $HtmlRender = $HtmlRender.'<div class="content" style="	background:#ffffff;margin-left: 0px; margin-right: 0px; ">'?>
  <?php $HtmlRender = $HtmlRender.'<div class="stats" style="color: #0094C6; position:relative; font-size: 15px; height:132px; padding: 10px 20px;width: 600px;">'?>  
  <?php $HtmlRender = $HtmlRender.'<p>You started smoking cigarettes when you were <span  class="red" style="color:#ee393e;">'. $age_started?>
  <?php $HtmlRender = $HtmlRender.' </span>. And you'."'re currently <span class='red'  style='color:#ee393e;'>'".$current_age?> 
  <?php $HtmlRender = $HtmlRender.'   </span> years old.</p>';?> 
  <?php $HtmlRender = $HtmlRender."  <p style='color:#000000'> <b>You've been smoking for <span class='red'  style='color:#ee393e;'>".$years;?>        
  <?php $HtmlRender = $HtmlRender.'</span> years.</b></p>';?>
  <?php $HtmlRender = $HtmlRender.'  <p>You smoke an average of <span class="red"  style="color:#ee393e;">'.$average_packs;?> 
  <?php $HtmlRender = $HtmlRender.'</span> packs a day at <span style="text-decoration:underline">$<span class="red"  style="color:#ee393e;">'.$current_price;?>
  <?php $HtmlRender = $HtmlRender.'</span> per pack.</span></p>
  									 </div>
      						
        <div class="calculation spent" style="float:left; position:absolute;margin: 0;margin-right:10px;">
        <p><b style="font-size: 18px;font-weight: bold;">You have already spent</b></p>
          <div class="numbers" style="width:450px;color: #000000;font-size: 15px;">
            <table >
              <tr>
                <td width="242">Total</td>
                <td align="right"><b>$'.$money_spent;?> <?php $HtmlRender = $HtmlRender."</b></td>";?>
 <?php $HtmlRender = $HtmlRender."             </tr>
            </table>
          </div>
          <div class='numbers'  style='width:450px;color: #000000;font-size: 15px;'>
            <table >
              <tr>
                <td width='244'>In today's dollars, 
                  adjusted for inflation</td>
                <td align='right'><b>$".$true_cost?><?php $HtmlRender = $HtmlRender."</b></td>
              </tr>
            </table>
          </div>
        </div>
        <div class='calculation' style='float: right; width: 450px; height: 150px; color: #000000; margin:0 10px 0 0;margin-left42px;'>
         <p><b style='font-size: 18px;font-weight: bold;'>If you continue, you'll spend</b></p>
          <div class='numbers' style='width:450px;color: #000000;font-size: 15px;'>
            <table cellpadding='0'>
              <tr>
                <td width='150'>In 6 months </td>
                <td align='right'><b>$".$six_months?><?php $HtmlRender = $HtmlRender."</b></td>
              </tr>
            </table>
          </div>
          <div class='numbers' style='width:450px;color: #000000;font-size: 15px;'>
            <table cellpadding='0'>
              <tr>
                <td width='150'>In 1 year</td>
                <td align='right'><b>$".$one_year?><?php $HtmlRender = $HtmlRender."</b></td>
              </tr>
            </table>
          </div>
          <div class='numbers' style='width:450px;color: #000000;font-size: 15px;'>
            <table cellpadding='0'>
              <tr>
                <td width='150'>In 5 years</td>
                <td align='right'><b>$".$five_years?><?php $HtmlRender = $HtmlRender."</b></td>
              </tr>
            </table>
          </div>
          <div class='numbers' style='width:450px;color: #000000;font-size: 15px;'>
            <table cellpadding='0'>
              <tr>
                <td width='150'>In 10 years</td>
                <td align='right'><b>$".$ten_years?><?php $HtmlRender = $HtmlRender."</b></td>
              </tr>
            </table>
          </div>
          <div class='numbers' style='width:450px;color: #000000;font-size: 15px;'>
            <table cellpadding='0'>
              <tr>
                <td width='150'>In 20 years</td>
                <td align='right'><b>$".$twenty_years?><?php $HtmlRender = $HtmlRender."</b></td>
              </tr>
            </table>
          </div>
        </div>
        <div style='clear:both'></div>
        <div class='better' style=''>
          <p style='color: #0094C6;font-size: 15px;'><b>If you quit today, here are some better ways you can use that money...</b></p>
       <div class='item' style='color:#000000;float:left;'>
            <table cellpadding='5' width='280'>
              <tr align='center'>
                <td ><p><b>IN 6 MONTHS</b></p></td>
              </tr>
              <tr align='center'>
                <td align='center' ><b>".$objRewards->GetRewards($six_months);?><?php $HtmlRender = $HtmlRender."</b></td>
              </tr>
                </tr>
              
            </table>
          </div>
          <div class='item' style='color:#000000;float:left;'>
            <table cellpadding='5' width='280'>
              <tr align='center'>
                <td ><p><b>IN A YEAR</b></p></td>
              </tr>
              <tr align='center'>
                <td align='center'><b>".$objRewards->GetRewards($one_year);?><?php $HtmlRender = $HtmlRender."</b></td>
              </tr>
                </tr>
              
            </table>
          </div>
          <div class='item' style='color:#000000;float:left;'>
            <table cellpadding='5' width='280'>
              <tr align='center'>
                <td ><p><b>IN 5 YEARS</b></p></td>
              </tr>
              <tr align='center'>
                <td align='center'><b>".$objRewards->GetRewards($five_years);?><?php $HtmlRender = $HtmlRender."</b></td>
              </tr>
                </tr>
              
            </table>
          </div>
          <div style='clear:both'></div>
        </div>
        <div style='clear:both'></div>
        <div class='' style='  color:  #0094C6; float: left; padding: 80px 0px; position: relative; height:230px; width: 600px; margin-top:-50px;'>
           <p style='font-size: 20px; margin-bottom: 0pt;'><b>Quitting smoking is not just good for your wallet; it's good for your health...</b></p>
          <table cellpadding='0'>
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
        <div style='clear:both'></div>
        <p class='label' style='font-size: 20px; color:#000000; margin:0 0 -10px;line-height: 1em;' >&nbsp;&nbsp;<b>Need help quitting? </b></p>
        <br/><br/>
       <div class='help-print' >
            <table cellpadding='0'  width='800'  height='120'>
              <tr  valign='top'>
                <td align='center'><b>BY PHONE</b></td>
                <td align='center'><b>ONLINE</b></td>
                <td align='center'><b>IN PERSON</b></td>
              </tr>
             <tr  valign='top'>
                <td width='160px' align='center' style='font-size:11px'><b><img src='images/TF_Icons_Phone.png'  height='70' align='middle'  /><span style='font-size:9px'><br>Talk to a counselor who <br/>can help you quit tobacco</span><br> 1.877.822.6669</b></td>
                <td width='160px' align='center' style='font-size:11px'><b><img src='images/TF_Icons_Online.png'   height='70' align='middle'  /><br>Help quitting tobacco<br/>is only a few clicks away<br />https://www.quitnow.net/florida/</b></td>
                <td width='160px' align='center' style='font-size:11px'><b><img src='images/TF_Yellow-Box_InPerson.png'  height='70' align='middle'  /><br>For some one-on-one help<br/>http://www.ahectobacco.com/want-to-quit<br />/cessation-courses-near-you/</b></td>
              </tr>
            </table>
          </div>
        </div>
        <div style='clear:both'></div>
      </div>
      <div class='footer' ></div>
    </div>
  </div>
  </body>
  </html>";?>
<?php

require_once("dompdf/dompdf_config.inc.php");
$html = $HtmlRender;

$dompdf = new DOMPDF();
$dompdf->load_html($html);

$dompdf->set_paper( "" , "portrait");

$dompdf->render();

$dompdf->save_file=true;

$pdf = $dompdf->output();

$namefile = "pdfs/"."Report".$id.date("d-m-Y").".pdf";
file_put_contents($namefile, $pdf);

?>