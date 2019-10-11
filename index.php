<?php

//show errors php config
error_reporting(E_ALL);
ini_set('display_errors', 1);


require __DIR__.'/vendor/autoload.php';

class CsvOperator 
{

    public function csvParentToChild($parentArray, $childArray)
    {
        foreach ($parentArray as $parentKey => $parentValue) {
            foreach ($childArray as $childKey => $childValue) {
                if(isset($childValue["locationExternalId"])) {
                    if ($parentValue["externalId"] == $childValue["locationExternalId"]) 
                    {
                        unset($childArray[$childKey]["externalId"]);
                        $childArray[$childKey]["locationId"] = $parentValue["externalId"];
                    }

                }     
            }
        }

        return $childArray;
    }

    public function csvParentToChildV2(array $parentArray, array $childArray, $parentName, $childForeignKey)
    {
        foreach ($parentArray as $parentKey => $parentValue) {
            foreach ($childArray as $childKey => $childValue) {
                if (isset($childValue[$parentName.ucfirst($childForeignKey)]) && $parentValue[$childForeignKey] == $childValue[$parentName.ucfirst($childForeignKey)]) {
                    unset($childArray[$childKey][$parentName . ucfirst($childForeignKey)]);
                    $childArray[$childKey][$parentName . "Id"] = $parentValue[$parentName . "Id"];
                }
            }
        }

        return $childArray;
    }
}

$venues = [
	[  
    	"locationExternalId" => "S058",
		"venuename" => "jonathan",
		"status" => "INACTIVE",
		"address1" => ""
	],
	[
    	"locationExternalId" => "S098",
		"venuename" => "carla",
		"status" => "INACTIVE",
		"address1" => ""
	],
	[
    	"locationExternalId" => "S024",
		"venuename" => "rosa",
		"status" => "INACTIVE",
		"address1" => ""
	]
];

$venues = [
	[  
    	"locationExternalId" => "S058",
		"venuename" => "jonathan",
		"status" => "INACTIVE",
		"address1" => ""
	],
	[
    	"locationExternalId" => "S098",
		"venuename" => "carla",
		"status" => "INACTIVE",
		"address1" => ""
	],
	[
    	"locationExternalId" => "S024",
		"venuename" => "rosa",
		"status" => "INACTIVE",
		"address1" => ""
	]
]; 

$clubs = [
	[
        "externalId" => 1,
        "clubId" => 101,  
    	"clubName" => "Anger",
	],
	[
        "externalId" => 2,
        "clubId" => 102, 
    	"clubName" => "Antibes",
	],
];

$teams = [
	[
   	 	"clubExternalId" => 1,  
    	"teamName" => "Anger",
	],
	[
   	 	"clubExternalId" => 1,  
    	"teamName" => "Anger BC",
	],
	[
   	 	"clubExternalId" => 1,  
    	"teamName" => "Anger BC Club",
    ],
    [
        "clubExternalId" => 2,  
        "teamName" => "Antibes",
    ],
    [
        "clubExternalId" => 2,  
        "teamName" => "Antibes BC",
    ],
    [
        "clubExternalId" => 2,  
        "teamName" => "Antibes BB",
    ],
];


$test = new CsvOperator();

//dump($test->csvParentToChild($locations, $venues));

//dump($test->csvParentToChildV2($locations, $venues, 'location', 'externalId'));

dump($test->csvParentToChildV2($clubs, $teams, 'club', 'externalId'));