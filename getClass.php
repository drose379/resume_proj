<?php

class Resume {
	protected $Name;
	protected $Tele;
	protected $Location = array("Country" => null , "State" => null , "City" => null , "Address" => null);
	protected $Education = array();
	protected $Experience = array();
	protected $Skills = array();


public function __construct(array $fullInfo) {
	$this->Name = $fullInfo['Name'];
	$this->Tele = $fullInfo['Tele'];
	$this->setLocation($fullInfo['Location']);
	$this->Education = $fullInfo['Education'];
	$this->Experience = $fullInfo['Work Experience'];
	$this->Skills = $fullInfo['Skills'];
}
//All validators
public function validateCountry($value) {
if ( is_string($value) ) {
if ( strlen($value) > 30 === false ) {throw new Exception("Value exceeds char limit");}
if ( ctype_alpha($value) ===false ) {throw new Exception("Value may only be letters and numbers");}
}
return true;

}


//All Setters
public function setLocation(array $location) {
	foreach ($this->Location as $key => $value) {

		if ( method_exists($this, "validate$key") ) {
			$methodName = "validate$key"; 
			$this->$methodName($location[$key]); 
			} 
		$this->Location[$key] = $location['$key'];
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
