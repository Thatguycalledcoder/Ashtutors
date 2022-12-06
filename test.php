<?php 
$datetime = new DateTime('00:00:00');
  
// DateInterval object is taken as the 
// parameter of the add() function
// Here 5 hours, 3 Minutes and 10 seconds is added
$datetime->add(new DateInterval('PT2H'));
  
// Getting the new date after addition
$adder = floatval(strtotime($datetime->format('H:i:s')));

echo "Copied date:". date("h:i:s", 1670247720+$adder);
?>