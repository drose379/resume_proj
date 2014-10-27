<?php

require( 'getClass.php' );
require( 'buildClass.php' );

$resume = new Resume (array (
	"Name" => "Roger",
	"Tele" => "792-882-4431",
	"Location" => array('Country' => 'United States' , 'State' => 'Texas' , 'City' => 'Fort Worth' , 'Address' => '15 Long Blvd'))
);

$displayBot = new displayBot;

$displayBot->compile($resume);

echo $displayBot->buildHeader();



