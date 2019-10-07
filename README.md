<?php


$locations = [
	[
   	 	"locationId" => 58,  
    	"locationName" => "creme",
	],
	[
   	 	"locationId" => 88,  
    	"locationName" => "riz",
	],
	[
   	 	"locationId" => 32,  
    	"locationName" => "caramel",
	],
];


$venues = [
	[  
    	"locationName" => "creme",
		"locationNickname" => "",
		"locationCode" => "",
		"address1" => "",
		"address2" => "",
		"address3" => "",
	],
	[
    	"locationName" => "riz",
		"locationNickname" => "",
		"locationCode" => "",
		"address1" => "",
		"address2" => "",
		"address3" => "",
	],
	[
    	"locationName" => "caramel",
		"locationNickname" => "",
		"locationCode" => "",
		"address1" => "",
		"address2" => "",
		"address3" => "",
	],
];  


foreach ($locations as $key_a => $val_a) {
    foreach ($venues as $key_b => $val_b) {
		if(isset($val_b["locationName"])) {
			if ($val_a["locationName"] == $val_b["locationName"]) {
				unset($venues[$key_b]["locationName"]);
				$venues[$key_b]["locationId"] = $val_a["locationId"];
			}
		}
		     
    }
}

echo "<pre>";
var_dump($venues);
