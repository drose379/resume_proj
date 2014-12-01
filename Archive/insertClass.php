<?php

class insertClass {

protected $con;

public function __construct($dbc) {
	$this->con = $dbc;
}
    
//ADD A METHOD THAT CALLS ALL OF THE DB METHODS. EX.) PUBLIC FUNCTION SAVE() WILL CALL ADDLOCATION AND ADDSKILLS... ETC..
//SAVE METHOD NEEDS TO BE PASSED A $RESUME OBJECT. 

public function addPhone($Resume) {
	$Tele = $Resume->getTele();

	$stmt = $this->con->prepare("INSERT INTO phone (phone) VALUES (:tele)");
	$stmt->bindParam(':tele',$tele);
	$stmt->execute();
    
    #Insert the Tele number into the resume table
	#return $Tele; DELETE
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
    
    #Insert the ID into the Resume table
	#return $ID; DELETE
}
    
public function addResume($Resume) {
    # $this->addName();
	# $this->addPhone();
	# $this->addLocation();
	//insert $ID from location method into resume intersection table
	//To get return values, $LocID = $this->addLocation();
}

public function addSkills($Resume) {
	foreach ($Resume->getSkills() as $skill) {
		$stmt = $this->con->prepare("INSERT INTO skills (skill) VALUES (:skill)");
		$stmt->bindParam(':skill' $skill);
		$stmt->execute();

		$ID[] = $this->con->lastInsertID();

	}
	return $ID;
	//use foreach($ID when inserting to intersection table)
}

public function addEducation($Resume) {
	
}

}