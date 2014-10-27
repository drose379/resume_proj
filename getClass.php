<?php

class Resume {
	protected $Name;
	protected $Tele;
	protected $Location = array();
	protected $Education = array();
	protected $Experience = array();
	protected $Skills = array();


public function __construct(array $fullInfo) {
	$this->Name = $fullInfo['Name'];
	$this->Tele = $fullInfo['Tele'];
	$this->Location = $fullInfo['Location'];
	$this->Education = $fullInfo['Education'];
	$this->Experience = $fullInfo['Work Experience'];
	$this->Skills = $fullInfo['Skills'];
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
