<?php

class Resume {
	protected $Name;
	protected $Tele;
	protected $Location = array("Country" => null , "State" => null , "City" => null , "Address" => null);
	protected $Education = array();
	protected $Experience = array();
	protected $Skills = array();

	//Validate arrays
	protected $LocationCheck = array('Country' => 'NoNumberValid','State' => 'NoNumberValid', 'City' => 'NoNumberValid', 'Address' => 'Under30Valid');
	protected $EducationCheck = array("YearsOfAttendance" => "Under30Valid","Activities" => "NoNumberValid", "FurtherEducation" => "NoNumberValid");

public function __construct(array $fullInfo) {
	$this->Name = $fullInfo['Name'];
	$this->Tele = $fullInfo['Tele'];
	$this->setLocation($fullInfo['Location']);
	$this->setEducation($fullInfo['Education']);
	$this->Experience = $fullInfo['Work Experience'];
	$this->Skills = $fullInfo['Skills'];
}

//All validators
public function NoNumberValid($value) {
	if (is_array($value)) {
		foreach ($value as $v) {
			$this->NoNumberValid($v);
		}
	}
	else {
	if (! is_string($value)) {throw new Exception("Value must be a string");}
	
	if (preg_match('/([0-9]+)/', $value) === 1) {
		throw new Exception("String should not contain numbers");
	}
	}
}

public function Under30Valid($value) {
if ( is_string($value) ) {
	if ( strlen($value) > 30 === true ) {
	throw new Exception("Value exceeds char limit");
		}
	}
}

//All Setters
public function setLocation(array $location) {
	foreach ($this->Location as $key => $value) {
	foreach ($this->LocationCheck as $property => $validator) {

	if ( $key === $property ) {
		try {
		$this->$validator( $location[$key] );
		$this->Location[$key] = $location[$key];
		}	
		catch (Exception $e) {echo "Bad value for " . $key;}	
		}
	
		}

	}

}

public function setEducation(array $education) {
	$tempArray = [];
foreach ($this->EducationCheck as $property => $validator) {
	$value = isset($education[$property]);
		try {
			$this->$validator($education[$property]);
			$tempArray[$property] = $education[$property];
		}
		catch (Exception $e) {}
}
	$this->Education = $tempArray;
}


//All Getters
public function getName() {
	return $this->Name;
}

public function getTele() {
	return $this->Tele;
}

public function getLocation() {
	$Items = [];
	foreach ($this->Location as $key => $val) {$Items[] = $key; $Items[] = $val;}
	return implode(" ",$Items);
}

public function getEducation() {
	var_dump($this->Education);
}

public function getExp() {
	return $this->Experience;
}

public function getSkills() {
	return $this->Skills;
}

}
