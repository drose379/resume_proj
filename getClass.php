<?php

class Resume {
	protected $Name;
	protected $Tele;
	protected $Location = array("Country" => null , "State" => null , "City" => null , "Address" => null);
	protected $Education = array();
	protected $Experience = array();
	protected $Skills = array();

	//Validate arrays
	protected $LocationCheck = array('Country' => 'validateNoNumber','State' => 'validateNoNumber', 'City' => 'validateNoNumber', 'Address' => 'validateNoNumber');


public function __construct(array $fullInfo) {
	$this->Name = $fullInfo['Name'];
	$this->Tele = $fullInfo['Tele'];
	$this->setLocation($fullInfo['Location']);
	$this->Education = $fullInfo['Education'];
	$this->Experience = $fullInfo['Work Experience'];
	$this->Skills = $fullInfo['Skills'];
}

//All validators
public function validateNoNumber($value) {
if ( is_string($value) ) {
if ( strlen($value) > 30 === true ) {throw new Exception("Value exceeds char limit");}
if ( preg_match('/([0-9]+)/', $value) === 1 ) {throw new Exception("Value may only be letters and numbers");}
}
}

//All Setters
public function setLocation(array $location) {
	foreach ($this->Location as $key => $value) {
	foreach ($this->LocationCheck as $property => $validator) {

	try {
		$this->$validator( $location[$key] );
		$this->Location[$key] = $location[$key];
		}

catch (Exception $e) {echo "Bad value for" . $key;}	

}

}

}

//All Getters
public function getName() {
	return $this->Name;
}

public function getTele() {
	return $this->Tele;
}

public function getLocation() {
	return $this->Location;
}

public function getEdu() {
	return $this->Education;
}

public function getExp() {
	return $this->Experience;
}

public function getSkills() {
	return $this->Skills;
}

}
