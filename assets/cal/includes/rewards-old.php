<?php
class Rewards
{
   function GetRewards($vAmount)
   {
	   $reward="";
	   $amount = $vAmount;
	  if($vAmount!="")  
	  {
		  if((int)$amount < 250)
		  {
			$reward="<img src='".get_template_directory_uri()."/cal/images/TF_Icons_VideoGame.jpg'  /> <br /> Video Game Console";
		  }
		
		  if((int)($amount) >= 250 && (int)($amount) <= 250)
		  {
				$reward = "<img src='".get_template_directory_uri()."/cal/images/TF_Icons_DigitalCamera.jpg'  /> <br /> High-end Digital Camera";
		  }
		  
		  if((int)($amount) >= 500 && (int)($amount) <= 1000)
		  {
				$reward = "<img src='".get_template_directory_uri()."/cal/images/TF_Icons_Tablet.jpg'  /> <br /> Tablet Computer";
		  }
		  
		  if((int)($amount) >= 1000 && (int)($amount) <= 2000)
		  {
				$reward = "<img src='".get_template_directory_uri()."/cal/images/TF_Icons_TV.jpg'  /> <br /> 55'' LED 3-D TV";
		  }
		  
		  if((int)($amount) >= 2000 && (int)($amount) <= 3000)
		  {
				$reward = "<img src='".get_template_directory_uri()."/cal/images/TF_Icons_Theame-ParkVac.jpg'  /> <br /> 7-day Theme Park Vacation Package for family of 4";
		  }
		  
		  if((int)($amount) >= 3000 && (int)($amount) <= 4000)
		  {
				$reward = "<img src='".get_template_directory_uri()."/cal/images/TF_Icons_7DayCaribbean.jpg'  /> <br /> 7-day Caribbean Cruise Vacation for family of 4";
		  }
		  
		  if((int)($amount) >= 4000 && (int)($amount) <= 5000)
		  {
				$reward = "<img src='".get_template_directory_uri()."/cal/images/TF_Icons_SeasonTickets_02.jpg'  /> <br /> 4 Lower Bowl College Football Season Tickets";
		  }
		   
		  if((int)($amount) >= 5000 && (int)($amount) <= 6000)
		  {
				$reward = "<img src='".get_template_directory_uri()."/cal/images/TF_Icons_7DayHawaiiVac.jpg'  /> <br /> 7-day Hawaii Vacation for two";
		  } 
		  
		  if((int)($amount) >= 6000 && (int)($amount) <= 7000)
		  {
				$reward = "<img src='".get_template_directory_uri()."/cal/images/TF_Icons7NightCruise.jpg'  /> <br /> 12-night Caribbean Cruise Vacation for family of 4";
		  } 
		  
		  if((int)($amount) >= 7000 && (int)($amount) <= 8000)
		  {
				$reward = "<img src='".get_template_directory_uri()."/cal/images/TF_Icons-EuropeanVac.jpg'  /> <br /> 14-day European Vacation for two";
		  } 
		   
		  if((int)($amount) >= 8000 && (int)($amount) <= 10000)
		  {
				$reward = "<img src='".get_template_directory_uri()."/cal/images/TF_jetski.jpg'  /> <br /> A Brand New Jet Ski";
		  } 
		  
		  if((int)($amount) >= 10000 && (int)($amount) <= 12000)
		  {
				$reward = "<img src='".get_template_directory_uri()."/cal/images/TF_IconsHottub.jpg'  /> <br /> Outdoor Hot Tub";
		  }
		  
		  if((int)($amount) >= 12000 && (int)($amount) <= 15000)
		  {
				$reward = "<img src='".get_template_directory_uri()."/cal/images/TF_Icons_NewKitchen_02_02.jpg'  /> <br /> An Average Minor Kitchen Remodel";
		  }
		 
		  if((int)($amount) >= 15000 && (int)($amount) <= 20000)
		  {
				$reward = "<img src='".get_template_directory_uri()."/cal/images/TF_Icons_Tuition.jpg'  /> <br /> One Year of In-state College Tuition in Florida";
		  }
		  
		  if((int)($amount) >= 20000 && (int)($amount) <= 30000)
		  {
				$reward = "<img src='".get_template_directory_uri()."/cal/images/TF_Icons_car.jpg'  /> <br /> A Brand New Car";
		  }
		  
		  if((int)($amount) >= 20000 && (int)($amount) <= 30000)
		  {
				$reward = "<img src='".get_template_directory_uri()."/cal/images/TF_Icons_car.jpg'  /> <br /> A Brand New Car";
		  }
		  
		  if((int)($amount) > 30000 )
		  {
				$reward = "<img src='".get_template_directory_uri()."/cal/images/TF_Icons_Home_02.jpg'  /> <br /> Down Payment on a $150,00 Home";
		  }
	 }
	  return  $reward;
   }
}

?>