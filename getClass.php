<?php

class Resume {
	protected $Name;
	protected $Tele;
	protected $Location = array();
	protected $Education = array();


public function __construct(array $fullInfo) {
	$this->Name = $fullInfo['Name'];
	$this->Tele = $fullInfo['Tele'];
	$this->Location = $fullInfo['Location'];
	$this->Education = $fullInfo['Education'];
}

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

public function GeneralGet() {
	$allArray = array('Name' => $this->getName() , 'Phone Number' => $this->getTele() , 'Location' => $this-getLocation());
	return $allArray;
}

}
