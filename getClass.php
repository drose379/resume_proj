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
	protected $ExperienceCheck = array("YearsOfEmployment" => "Under30Valid","Position" => "NoNumberValid","JobDescription" => "NoNumberValid","CompanyInfo" => "Under30Valid");
	protected $SkillsCheck = array("Under150Valid");

public function __construct(array $fullInfo) {
	$this->Name = $fullInfo['Name'];
	$this->Tele = $fullInfo['Tele'];
	$this->setLocation($fullInfo['Location']);
	$this->setEducation($fullInfo['Education']);
	$this->setExperience($fullInfo['Work Experience']);
	$this->setSkills($fullInfo['Skills']);
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

public function Under150Valid($value) {
if ( is_string($value) ) {
if ( strlen($value) > 150 === true ) {
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

public function setExperience(array $experience) {
	$tempArray = [];
foreach ($this->ExperienceCheck as $property => $validator) {
	$value = isset($experience[$property]);
	try {
		$this->$validator($experience[$property]);
		$tempArray[$property] = $experience[$property];
	}
	catch (Exception $e) {}
}
	$this->Experience = $tempArray;
}

public function setSkills(array $skills) {
	$tempArray = [];
foreach ($skills as $skill) {
foreach ($this->SkillsCheck as $validator) {
	try {
	$this->$validator($skill);
	$tempArray[] = $skill;
	}
	catch (Exception $e) {}
}
}
$this->Skills = $tempArray;
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

	foreach ($this->Education as $key => $value) {
		if (is_array($value)) {
			$outerLoop[] = $key;
		foreach ($value as $innerKey => $val) {
			$innerLoop[] = $innerKey . $val;
		}

		}
		else {
			//$outerLoop[] = $key . $value;
		}
	}
	return implode("//",$outerLoop);
}

public function getExperience() {

}

public function getSkills() {
	
}

}
