<?php

class Resume {
	protected $Name;
	protected $Tele;
	protected $Location = array();


public function __construct(array $fullInfo) {
	$this->Name = $fullInfo['Name'];
	$this->Tele = $fullInfo['Tele'];
	$this->Location = $fullInfo['Location'];
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

public function GeneralGet() {
	$allArray = array('Name' => $this->getName() , 'Phone Number' => $this->getTele() , 'Location' => $this-getLocation());
	return $allArray;
}

}
