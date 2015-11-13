<?php 
 /*include_once("includes/header.php");*/
 include("BusinnesIncludes/BusinnesReport.php");
 	
 	$url = $_SERVER['SERVER_NAME'];
	$page = $_SERVER['PHP_SELF'];
  $id=$_REQUEST["id"];
	$years="";
 	$fileName="";
 	$filePath="";
 	$email="";
 	$age_started=$_REQUEST["age_started"];
 	$current_age=$_REQUEST["current_age"];
 	$average_packs=$_REQUEST["average_packs"];
 	$current_price=$_REQUEST["current_price"];
 	$money_spent=$_REQUEST["money_spent"];
 	$true_cost=$_REQUEST["true_cost"];
 	$six_months=$_REQUEST["six_months"];
 	$one_year=$_REQUEST["one_year"];
 	$five_years=$_REQUEST["five_years"];
 	$ten_years=$_REQUEST["ten_years"];
 	$twenty_years=$_REQUEST["twenty_years"];
 	$six_months=$_REQUEST["six_months"];
	
	
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
	
	
	
	if($_REQUEST["id"] !="" && $_REQUEST["id"]!=null)
	{
		$objReport = new BusinnesReport;
		$Result = $objReport->GetReportByUserId($_REQUEST["id"]);
	

		/*if(count($Result)>0 && $Result[0]!="")
		{
		 
		  $Update = $objReport->UpdateReportByUserId("'".$_REQUEST["id"]."'", "'".$_REQUEST["age_started"]."'", "'".$_REQUEST["current_age"]."'", "'".$_REQUEST["average_packs"]."'",
		  											 "'".$_REQUEST["current_price"]."'", "'".$_REQUEST["money_spent"]."'", "'".$_REQUEST["true_cost"]."'" , 
		  											 "'".$_REQUEST["six_months"]."'" , "'".$_REQUEST["one_year"]."'", "'".$_REQUEST["five_years"]."'", "'".$_REQUEST["ten_years"]."'", "'".$_REQUEST["twenty_years"]."'");
		}
		else {*/
			$Insert = $objReport->InsertReportByUserId("'".$_REQUEST["id"]."'", "'".$_REQUEST["age_started"]."'", "'".$_REQUEST["current_age"]."'", "'".$_REQUEST["average_packs"]."'",
		  											   "'".$_REQUEST["current_price"]."'", "'".$_REQUEST["money_spent"]."'", "'".$_REQUEST["true_cost"]."'" , 
		  											   "'".$_REQUEST["six_months"]."'" , "'".$_REQUEST["one_year"]."'", "'".$_REQUEST["five_years"]."'", "'".$_REQUEST["ten_years"]."'", "'".$_REQUEST["twenty_years"]."'");
		//}
	} 
	
?> 

 <?php 
 
 include("includes/rewards.php");

 $objRewards = new Rewards; 
 $objRewards->GetRewards($six_months);
 $HtmlRender ='<html> <body> <div id="container" style="width: 976px; margin-left: 0px;font-family:Verdana, Geneva, sans-serif;font-size:14px;" >' ?>
  <?php $HtmlRender = $HtmlRender.'<div class="wrapper">'?>
  <?php $HtmlRender = $HtmlRender.'<div class="header" style="visibility:visible;"><img src="images/header.jpg" alt="" width="946px" heigth="137px" /></div>'?>
  <?php $HtmlRender = $HtmlRender.'<div class="content" style="	background:#ffffff;margin-left: 0px; margin-right: 0px; ">'?>
  <?php $HtmlRender = $HtmlRender.'<div class="stats" style="color: #0094C6; position:relative; font-size: 15px; height:132px; padding: 10px 20px;width: 600px;">'?>  
  <?php $HtmlRender = $HtmlRender.'<p>You started smoking cigarettes when you were <span  class="red" style="color:#ee393e;">'. $age_started?>
  <?php $HtmlRender = $HtmlRender.' </span>. And you'."'re currently <span class='red'  style='color:#ee393e;'>".$current_age?> 
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
                <td width='160px' align='center' style='font-size:11px'><b><img src='images/TF_Icons_Phone.jpg'  height='70' align='middle'  /><span style='font-size:9px'><br/>Talk to a counselor who <br/>can help you quit tobacco</span><br/> 1.877.822.6669</b></td>
                <td width='160px' align='center' style='font-size:11px'><b><img src='images/TF_Icons_Online.jpg'   height='70' align='middle'  /><br/>Help quitting tobacco<br/>is only a few clicks away<br />https://www.quitnow.net/florida/</b></td>
                <td width='160px' align='center' style='font-size:11px'><b><img src='images/TF_Yellow-Box_InPerson.jpg'  height='70' align='middle'  /><br/>For some one-on-one help<br/>http://www.ahectobacco.com/want-to-quit<br />/cessation-courses-near-you/</b></td>
              </tr>
            </table>
          </div>
        </div>
        <div style='clear:both'></div>
      </div>
      <div class='footer' ></div>
    </div>
  </body>
  </html>";
/*
$fecha = date("d-m-Y");

require_once("dompdf/dompdf_config.inc.php");
$html = $HtmlRender;
$dompdf = new DOMPDF();
$dompdf->load_html($html);

$dompdf->set_paper("" , "portrait");
//aumentamos memoria del servidor si es necesario
ini_set("memory_limit","32M"); 
$dompdf->render();

$dompdf->save_file=true;

$pdf = $dompdf->output();

$namefile = "pdfs/"."Report".$id.$fecha.".pdf";
file_put_contents($namefile, $pdf); */

?>