<?php

include_once 'getClass.php';

class HTMLResume extends Resume {

public function LocationFormatted() {
	$Items = [];
	foreach ($this->Location as $key => $val) {$Items[] = $key; $Items[] = $val;}
	return implode(" ",$Items);
}

public function EducationFormatted() {
	//foreach $this->Education as $education to get each array inside $this->Education
	//foreach $education as $key $value
	//if is array $value
	//loop over
	//assign
	//else
	//assign regular value
}


}