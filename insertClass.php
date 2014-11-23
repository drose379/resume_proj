<?php

class insertClass {

protected $con;

public function __construct($dbc) {
	$this->con = $dbc;
}

public function addPhone($Resume) {
	$Tele = $Resume->getTele();

	$stmt = $this->con->prepare("INSERT INTO phone (phone) VALUES (:tele)");
	$stmt->bindParam(':tele',$tele);
	$stmt->execute();

	return $Tele;
}

public function addLocation($Resume) {
	$Country = $Resume->getLocation()["Country"];
	$State = $Resume->getLocation()["State"];
	$City = $Resume->getLocation()["City"];
	$Address = $Resume->getLocation()["Address"];

	$stmt = $this->con->prepare("INSERT INTO location (country,state,city,address) VALUES (:country,:state,:city,:address)");
	$stmt->bindParam(':country',$Country);
	$stmt->bindParam(':state',$State);
	$stmt->bindParam(':city',$City);
	$stmt->bindParam(':address',$Address);
	$stmt->execute();
	$ID = $this->con->lastInsertId();

	return $ID;
}

public function getBasics($Resume) {
	$Name = $Resume->getName();

	$stmt = $this->con->prepare("INSERT INTO resume (name) VALUES (:name)");
	$stmt->bindParam(':name',$Name);
	$stmt->execute();
}

public function addResume($Resume) {
	//call phone method,
	//call location method
	//insert phone number into resume intersection table
	//insert $ID from location method into resume intersection table
	//To get return values, $LocID = $this->addLocation();
}

}