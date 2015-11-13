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
			$reward='<i class="fa fa-gamepad"></i><br> Video Game Console';
		  }
		
		  if((int)($amount) >= 250 && (int)($amount) <= 250)
		  {
				$reward = '<i class="fa fa-camera"></i><br> High-end Digital Camera';
		  }
		  
		  if((int)($amount) >= 500 && (int)($amount) <= 1000)
		  {
				$reward = '<i class="fa fa-tablet"></i><br> Tablet Computer';
		  }
		  
		  if((int)($amount) >= 1000 && (int)($amount) <= 2000)
		  {
				$reward = '<i class="fa fa-desktop"></i> <br> 55inch LED 3D TV';
		  }
		  
		  if((int)($amount) >= 2000 && (int)($amount) <= 3000)
		  {
				$reward = '<i class="fa fa-ticket"></i><br> 7-day Theme Park Vacation Package for Family of Four';
		  }
		  
		  if((int)($amount) >= 3000 && (int)($amount) <= 4000)
		  {
				$reward = '<i class="fa fa-anchor"></i> <br> 7-day Caribbean Cruise Vacation for Family of Four';
		  }
		  
		  if((int)($amount) >= 4000 && (int)($amount) <= 5000)
		  {
				$reward = '<img src="http://802quits.org/wordpress/wp-content/themes/quit_press/cal/images/new_img/camper.png" style="height: 50px; margin-bottom: 15px;margin-top: 10px;"><br> A Brand New Pop-up Camper';
		  }
		   
		  if((int)($amount) >= 5000 && (int)($amount) <= 6000)
		  {
				$reward = '<i class="fa fa-plane"></i><br> 7-day Hawaii Vacation for Two';
		  } 
		  
		  if((int)($amount) >= 6000 && (int)($amount) <= 7000)
		  {
				$reward = '<i class="fa fa-anchor"></i><br> 12-night Caribbean Cruise Vacation for Family of Four';
		  } 
		  
		  if((int)($amount) >= 7000 && (int)($amount) <= 8000)
		  {
				$reward = '<i class="fa fa-plane"></i><br> 14-day European Vacation for Two';
		  } 
		   
		  if((int)($amount) >= 8000 && (int)($amount) <= 10000)
		  {
				$reward =  '<img src="http://802quits.org/wordpress/wp-content/themes/quit_press/cal/images/new_img/4wheeler.png" style="height: 50px; margin-bottom: 15px;margin-top: 10px;"><br> A Brand New <br>4-Wheeler';
		  } 
		  
		  if((int)($amount) >= 10000 && (int)($amount) <= 12000)
		  {
				$reward = '<i class="fa fa-fire"></i><br> Outdoor Hot Tub';
		  }
		  
		  if((int)($amount) >= 12000 && (int)($amount) <= 15000)
		  {
				$reward = '<i class="fa fa-home"></i> <br> A Minor Kitchen Remodel';
		  }
		 
		  if((int)($amount) >= 15000 && (int)($amount) <= 20000)
		  {
				$reward = '<i class="fa fa-graduation-cap"></i><br>One Year of In-state College Tuition in Vermont';
		  }
		  
		  if((int)($amount) >= 20000 && (int)($amount) <= 30000)
		  {
				$reward = '<i class="fa fa-car"></i><br> A Brand New Car';
		  }
		  
		 
		  
		  if((int)($amount) > 30000 )
		  {
				$reward = '<i class="fa fa-home"></i> <br>Down Payment on a $150,00 Home';
		  }
	 }
	  return  $reward;
   }
}

?>