<?php
 /*include_once("includes/rewards.php");*/
 function generateRandomString($length = 15) {
    $characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}
 
 
 
 $idusuario = generateRandomString();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Tobacco Free Calculator</title>
		<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.3.0/build/cssreset/reset-min.css">
		<link rel="stylesheet" type="text/css" href="styles/aristo/jquery-ui-1.8.7.custom.css">
		<!--[if !IE]><!-->
        	<link rel="stylesheet" type="text/css" href="styles/main.css">
 		<!--<![endif]-->
		<!--[if lte IE 8]>
       		<link rel="stylesheet" type="text/css" href="styles/main-ie.css" />
		<![endif]-->
		<!--[if IE 9]>
       		<link rel="stylesheet" type="text/css" href="styles/main.css" />
		<![endif]-->

		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/jquery-ui.min.js"></script>
		<script type="text/javascript" src="scripts/autoNumeric-1.6.2.js"></script>
		<script type="text/javascript">
			var started_slider;
			var started_count;
			
			var age_slider;
			var age_count;
			
			var total_slider;
			var total_count;
			var total_empty;
			var cost_slider;
			var cost_count;
			var cost_empty;
			
			var nominal;
			var real;
			
			var six_months;
			var one_year;
			var five_years;
			var ten_years;
			var twenty_years;
			
			var age_plus;
			var total_plus;
			var cost_plus;
			
			var STARTED_MAX = 50;
			var STARTED_INIT = 18;
			var AGE_MAX = 50;
			var AGE_INIT = 18;
			var TOTAL_MAX = 3;
			var TOTAL_INIT = 1;
			var COST_MAX = 10;
			var COST_INIT = 4;
			
			$(function() {
				started_slider = $("#year_started div.slider");
				started_count = $("#year_started input[type=text]");
				
				age_slider = $("#age div.slider");
				age_count = $("#age input[type=text]");
				
				total_slider = $("#total_packs div.slider");
				total_count = $("#total_packs input[type=text]");
				total_full = $("#total_packs .full");
				cost_slider = $("#cost_per_pack div.slider");
				cost_count = $("#cost_per_pack input[type=text]");
				cost_full = $("#cost_per_pack .full");
				
				nominal = $('#nominal');
				real = $('#real');
				
				six_months = $('#six_months');
				one_year = $('#one_year');
				five_years = $('#five_years');
				ten_years = $('#ten_years');
				twenty_years = $('#twenty_years');
				
				started_plus = $('.started_plus');
				age_plus = $('.age_plus');
				total_plus = $('.total_plus');
				cost_plus = $('.cost_plus');
				
				// year_started
				started_slider.slider({ 
					min: 0,
					max: STARTED_MAX,
					step: 1,
					value: STARTED_INIT,
					slide: function(event, ui) {
						started_count.val(ui.value);
							updateFields();
					}
				});
				started_count.val(started_slider.slider('value'));
				started_count.autoNumeric({mNum:4, dGroup:4, aSep:'none' , aPad: false});
				started_count.keyup(function(){
					started_slider.slider('value', started_count.val());
					
						updateFields();
				});
				
				// years
				age_slider.slider({ 
					min: 0,
					max: AGE_MAX,
					step: 1,
					value: AGE_INIT,
					slide: function(event, ui) {
						age_count.val(ui.value);
						 updateFields();
					}
				});
				age_count.val(age_slider.slider('value'));
				age_count.autoNumeric({mNum:4, aPad: false});
				age_count.keyup(function(){
					age_slider.slider('value', age_count.val());
					
					updateFields();
				});
				
				// total_packs
				total_slider.slider({ 
					min: 0,
					max: TOTAL_MAX,
					step: .25,
					value: TOTAL_INIT,
					slide: function(event, ui) {
						total_count.val(ui.value);
						updateFields();
					}
				});
				total_count.val(total_slider.slider('value'));
				total_count.autoNumeric({mDec: 2, mNum:1, aPad: false});
				total_count.keyup(function(){
					total_slider.slider('value', total_count.val());
					
					updateFields();
				});
				
				// cost_per_pack
				cost_slider.slider({ 
					min: 0,
					max: COST_MAX,
					step: .01,
					value: COST_INIT,
					slide: function(event, ui) {
						cost_count.val($.fn.autoNumeric.Format(cost_count, ui.value, {aSign:'$', mNum:2}));
						updateFields();
					}
				});
				cost_count.val($.fn.autoNumeric.Format(cost_count, cost_slider.slider('value'), {aSign:'$', mNum:2}));
				cost_count.autoNumeric({aSign:'$', mNum: 2});
				cost_count.keyup(function(){
					cost_slider.slider('value', cost_count.val().replace("$", ""));
					
					updateFields();
				});
				
				// initialize
				updateFields();
				
				//IE 9 fix
				self.setInterval("updateFields()",1000);
				  $(".submit").click(function() {  
					  	var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
				var string_length = 15;
				var randomstring = '';
				
				for (var i=0; i<string_length; i++) {
					var rnum = Math.floor(Math.random() * chars.length);
					randomstring += chars.substring(rnum,rnum+1);
				}
				
				
					    $.ajax({  
					            type: "post",  
					            url: "save_org.php",  
					            data: "id="+randomstring+"&age_started="+ started_count.val()+"&current_age="+ age_count.val()+"&average_packs="+ total_count.val()+"&current_price="+ cost_count.val().replace("$", "") +"&money_spent="+ nominal.val().replace("$", "") +"&true_cost="+ real.val().replace("$", "")+"&six_months="+ six_months.val().replace("$", "")+"&one_year="+ one_year.val().replace("$", "")+"&five_years="+ five_years.val().replace("$", "")+"&ten_years="+ ten_years.val().replace("$", "")+"&twenty_years="+ twenty_years.val().replace("$", ""),
					            success: function(){  
					            window.open ("report_org.php?id="+randomstring,"_self");
								 
					            }  
					        });  
			    });  
	
			});
			function updateAge() {
					age_slider.slider('value', started_count.val());
					
					age_count.val(started_count.val());
				
			}
			
			
			function updateFields() {
				var started = started_count.val();
				var age = age_count.val();
				var packs = total_count.val();
				var cost = cost_count.val().replace("$", "");
				
				var years_smoking =  age -  started;
				var currentYear = (new Date).getFullYear();
			
			
				
				
				total_full.width(calculateWidth(packs, TOTAL_MAX));
				cost_full.width(calculateWidth(cost, COST_MAX));
				
					
				six_months.val($.fn.autoNumeric.Format(one_year, calculate(packs, cost, .5), {aSign:'$', mNum:20}));			
				one_year.val($.fn.autoNumeric.Format(one_year, calculate(packs, cost, 1), {aSign:'$', mNum:20}));
				five_years.val($.fn.autoNumeric.Format(one_year, calculate(packs, cost, 5), {aSign:'$', mNum:20}));
				ten_years.val($.fn.autoNumeric.Format(one_year, calculate(packs, cost, 10), {aSign:'$', mNum:20}));
				twenty_years.val($.fn.autoNumeric.Format(one_year, calculate(packs, cost, 20), {aSign:'$', mNum:20}));	
							
				nominal.val($.fn.autoNumeric.Format(one_year, calculate(packs, get_nominal(currentYear - years_smoking), years_smoking), {aSign:'$', mNum:20}));				
				real.val($.fn.autoNumeric.Format(one_year, calculate(packs, get_real(currentYear - years_smoking), years_smoking), {aSign:'$', mNum:20}));
			
				
		
				if(started > STARTED_MAX){
					started_plus.show();	
				} else {
					started_plus.hide();
				}	
										
				if(age > AGE_MAX){
					age_plus.show();	
				} else {
					age_plus.hide();
				}
				
				if(packs > TOTAL_MAX){
					total_plus.show();	
				} else {
					total_plus.hide();
				}
				
				if(cost > COST_MAX){
					cost_plus.show();	
				} else {
					cost_plus.hide();
				}
			}
			
			function calculate(packs, cost, length) {
				var perDiem = packs * cost;
				var days = length * 365;
				var wasted = perDiem * days;
				
				return wasted.toFixed(2);
			}
			
			function calculate_time(packs, cost, length) {
				var perDiem = packs * cost;
				var days = length * 365;
				var wasted = perDiem * days;
				
				return wasted.toFixed(2);
			}
			
			function calculateWidth(value, max, element) {
				var perc = value / max;

				return perc * 360;
			}
			function get_nominal(year) {
				var price = 0;
				
				if(year == 1954){
				 price = 0.227;}
				if(year == 1955){
				 price = 0.232;}
				if(year == 1956){
				 price = 0.238;}
				if(year == 1957){
				 price = 0.25;}
				if(year == 1958){
				 price = 0.256;}
				if(year == 1959){
				 price = 0.261;}
				if(year == 1960){
				 price = 0.261;}
				if(year == 1961){
				 price = 0.269;}
				if(year == 1962){
				 price = 0.268;}
				if(year == 1963){
				 price = 0.279;}
				if(year == 1964){
				 price = 0.282;}
				if(year == 1965){
				 price = 0.3;}
				if(year == 1966){
				 price = 0.305;}
				if(year == 1967){
				 price = 0.323;}
				if(year == 1968){
				 price = 0.328;}
				if(year == 1969){
				 price = 0.371;}
				if(year == 1970){
				 price = 0.389;}
				if(year == 1971){
				 price = 0.4;}
				if(year == 1972){
				 price = 0.403;}
				if(year == 1973){
				 price = 0.418;}
				if(year == 1974){
				 price = 0.445;}
				if(year == 1975){
				 price = 0.479;}
				if(year == 1976){
				 price = 0.492;}
				if(year == 1977){
				 price = 0.543;}
				if(year == 1978){
				 price = 0.568;}
				if(year == 1979){
				 price = 0.6;}
				if(year == 1980){
				 price = 0.63;}
				if(year == 1981){
				 price = 0.697;}
				if(year == 1982){
				 price = 0.819;}
				if(year == 1983){
				 price = 0.947;}
				if(year == 1984){
				 price = 0.978;}
				if(year == 1985){
				 price = 1.045;}
				if(year == 1986){
				 price = 1.1;}
				if(year == 1987){
				 price = 1.222;}
				if(year == 1988){
				 price = 1.275;}
				if(year == 1989){
				 price = 1.441;}
				if(year == 1990){
				 price = 1.533;}
				if(year == 1991){
				 price = 1.735;}
				if(year == 1992){
				 price = 1.837;}
				if(year == 1993){
				 price = 1.693;}
				if(year == 1994){
				 price = 1.758;}
				if(year == 1995){
				 price = 1.796;}
				if(year == 1996){
				 price = 1.854;}
				if(year == 1997){
				 price = 1.95;}
				if(year == 1998){
				 price = 2.175;}
				if(year == 1999){
				 price = 2.926;}
				if(year == 2000){
				 price = 3.124;}
				if(year == 2001){
				 price = 3.372;}
				if(year == 2002){
				 price = 3.722;}
				if(year == 2003){
				 price = 3.715;}
				if(year == 2004){
				 price = 3.74;}
				if(year == 2005){
				 price = 3.888;}
				if(year == 2006){
				 price = 3.926;}
				if(year == 2007){
				 price = 4.2;}
				if(year == 2008){
				 price = 4.352;}
				if(year == 2009){
				 price = 5.315;}
				if(year == 2010){
				 price = 5.95;}
				
				return price.toFixed(2);
			}
			function get_real(year) {
				var price = 0;
				
				if(year == 1954){
				 price = 1.93;}
				if(year == 1955){
				 price = 1.94;}
				if(year == 1956){
				 price = 1.99;}
				if(year == 1957){
				 price = 2.01;}
				if(year == 1958){
				 price = 2.03;}
				if(year == 1959){
				 price = 2.02;}
				if(year == 1960){
				 price = 1.98;}
				if(year == 1961){
				 price = 2.04;}
				if(year == 1962){
				 price = 2.02;}
				if(year == 1963){
				 price = 2.07;}
				if(year == 1964){
				 price = 2.04;}
				if(year == 1965){
				 price = 2.15;}
				if(year == 1966){
				 price = 2.16;}
				if(year == 1967){
				 price = 2.16;}
				if(year == 1968){
				 price = 2.14;}
				if(year == 1969){
				 price = 2.28;}
				if(year == 1970){
				 price = 2.27;}
				if(year == 1971){
				 price = 2.23;}
				if(year == 1972){
				 price = 2.16;}
				if(year == 1973){
				 price = 2.14;}
				if(year == 1974){
				 price = 2.06;}
				if(year == 1975){
				 price = 2.02;}
				if(year == 1976){
				 price = 1.95;}
				if(year == 1977){
				 price = 2.01;}
				if(year == 1978){
				 price = 1.98;}
				if(year == 1979){
				 price = 1.87;}
				if(year == 1980){
				 price = 1.73;}
				if(year == 1981){
				 price = 1.74;}
				if(year == 1982){
				 price = 1.92;}
				if(year == 1983){
				 price = 2.16;}
				if(year == 1984){
				 price = 2.13;}
				if(year == 1985){
				 price = 2.21;}
				if(year == 1986){
				 price = 2.27;}
				if(year == 1987){
				 price = 2.43;}
				if(year == 1988){
				 price = 2.44;}
				if(year == 1989){
				 price = 2.62;}
				if(year == 1990){
				 price = 2.65;}
				if(year == 1991){
				 price = 2.89;}
				if(year == 1992){
				 price = 2.96;}
				if(year == 1993){
				 price = 2.64;}
				if(year == 1994){
				 price = 2.68;}
				if(year == 1995){
				 price = 2.67;}
				if(year == 1996){
				 price = 2.66;}
				if(year == 1997){
				 price = 2.75;}
				if(year == 1998){
				 price = 3.02;}
				if(year == 1999){
				 price = 3.97;}
				if(year == 2000){
				 price = 4.09;}
				if(year == 2001){
				 price = 4.30;}
				if(year == 2002){
				 price = 4.67;}
				if(year == 2003){
				 price = 4.57;}
				if(year == 2004){
				 price = 4.47;}
				if(year == 2005){
				 price = 4.50;}
				if(year == 2006){
				 price = 4.40;}
				if(year == 2007){
				 price = 4.58;}
				if(year == 2008){
				 price = 4.57;}
				if(year == 2009){
				 price = 5.60;}
				if(year == 2010){
				 price = 6.16;}

				return price.toFixed(2);
			}

		</script>
        
        <style type="text/css">/*body {overflow: hidden;}*/</style>

<script type="text/javascript">
$(document).ready(function () {
		$(window).load(function() {
        $('#slider').nivoSlider();
    });
});

window.fbAsyncInit = function () {
    FB.init({
        appId: '310513742297925', // App ID
        channelUrl: 'http://appfb.tobaccofreeflorida.com/calculator/', // Channel File
        status: true, // check login status
        cookie: true, // enable cookies to allow the server to access the session
        xfbml: true  // parse XFBML
    });
    FB.Canvas.setAutoGrow(); //Resizes the iframe to fit content
};
// Load the SDK Asynchronously
(function (d) {
    var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
    if (d.getElementById(id)) { return; }
    js = d.createElement('script'); js.id = id; js.async = true;
    js.src = "//connect.facebook.net/es_CO/all.js";
    ref.parentNode.insertBefore(js, ref);
} (document));

</script>
<script type="text/javascript">
function loadp()
{
<?php echo $idusuario = generateRandomString();?>

}
</script>
		</head>

		<body onLoad="loadp()" onUnload="loadp()" >
        <div id="fb-root"></div>
          <div id="container">
            <div id="year_started" class="small_slider_block block">
              <div class="range"></div>
              <input type="text" id="started_count" class="slider_count" value="18" style="border: none transparent;"/>
              <div class="started_plus"></div>
              <div class="slider"></div>
            </div>
            <div id="age" class="small_slider_block block">
              <div class="range"></div>
              <input type="text" id="age_count" class="slider_count" value="18" style="border: none transparent;"/>
              <div class="age_plus"></div>
              <div class="slider"></div>
            </div>
            <div id="total_packs" class="slider_block block">
              <div class="empty"></div>
              <div class="full"></div>
              <div class="range"></div>
              <input type="text" id="total_count" class="slider_count" value="2.5" style="border: none transparent;"/>
              <div class="total_plus"></div>
              <div class="slider"></div>
            </div>
            <div id="cost_per_pack" class="slider_block block">
              <div class="empty"></div>
              <div class="full"></div>
              <div class="range"></div>
              <input type="text" id="cost_count" class="slider_count" value="7.00" style="border: none transparent;"/>
              <div class="cost_plus"></div>
              <div class="slider"></div>
            </div>
            <div id="report" class="block"> <a class="submit" >Detailed Report</a> </div>
            <div id="spent_block" class="block">
              <input id="nominal" type="text" value="6,387.50" style="border: none transparent;" readonly="readonly"/>
              <input id="real" type="text" value="6,387.50" style="border: none transparent;" readonly="readonly"/>
            </div>
            <div id="calculation_block" class="block">
              <input id="six_months" type="text" value="6,387.50" style="border: none transparent;" readonly="readonly"/>
              <input id="one_year" type="text" value="6,387.50" style="border: none transparent;" readonly="readonly"/>
              <input id="five_years" type="text" value="6,387.50" style="border: none transparent;" readonly="readonly"/>
              <input id="ten_years" type="text" value="6,387.50" style="border: none transparent;" readonly="readonly"/>
              <input id="twenty_years" type="text" value="6,387.50" style="border: none transparent;" readonly="readonly"/>
            </div>
            <div id="report2" class="block"> <a class="submit"  >Detailed Report</a> </div>
            <div id="disclaimer" class="block">
              <p>*Calculated using the average price per pack per year dating back to 1954. <br />Source: The Tax Burden on Tobacco, Historical Compilation, Volume 45, 2010</p>
              <p>**Adjusted for inflation using the CPI inflation calculator, <br /><a href="http://www.bls.gov/cpi/cpicalc.htm">http://www.bls.gov/cpi/cpicalc.htm</a></p>
            </div>
            <div style="clear:both"></div>
            
          </div>
</body>
</html>
