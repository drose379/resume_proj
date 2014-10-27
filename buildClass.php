<?php

class displayBot {

protected $complete = array();

public function compile( $resData ) {
	$this->resume = $resData;
}

public function buildHeader() {
$header = array( "Name" => $this->resume->getName(), "Telephone" => $this->resume->getTele(), "Location" => $this->resume->getLocation());

foreach ($header as $key => $data) {
	
	if (is_string($data)) {$string[] = $key . $data;}
	

if ( is_array($data) ) {
	
	foreach ( $data as $specific ) {$string[] = $specific;}
}

}
return implode("",$string);
}


}//end class