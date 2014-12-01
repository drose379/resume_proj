<?php

class insertClass {
#================================================================================================================================    
#ADD A METHOD THAT CALLS ALL OF THE DB METHODS. EX.) PUBLIC FUNCTION SAVE() WILL CALL ADDLOCATION AND ADDSKILLS... ETC..
#SAVE METHOD NEEDS TO BE PASSED A $RESUME OBJECT.     
#================================================================================================================================
    
protected $con;

public function __construct($dbc) {
	$this->con = $dbc;
}
    
public function addPhone($Resume) {
	$Tele = $Resume->getTele();

	$stmt = $this->con->prepare("INSERT INTO phone (phone) VALUES (:tele)");
	$stmt->bindParam(':tele',$tele);
	$stmt->execute();
    
    #Insert the Tele number into the resume table
    $stmt = $this->con->prepare("INSERT INTO resume (phone) VALUES (:tele)");
    $stmt->bindParam(':tele',$tele);
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
    
    $stmt = $this->con->prepare("INSERT INTO resume (location) VALUES (:locationID)");
    $stmt->bindParam(':locationID',$ID);
}
    
public function addResume($Resume) {
    # $this->addName();
	# $this->addPhone();
	# $this->addLocation();
}


}