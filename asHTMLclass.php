<?php

include_once 'getClass.php';

class HTMLResume extends Resume {

public function LocationFormatted() {
	$Items = [];
	foreach ($this->Location as $key => $val) {$Items[] = $key; $Items[] = $val;}
	return implode(" ",$Items);
}

public function EducationFormatted() {
	foreach ($this->Education as $key => $value) {
		$outerLoop[] = $key;
		if (is_array($value)) {
			foreach ($value as $v) {
				$innerLoop[] = $v
			}
		}
		else {
			$innerLoop[] = $value;
		}
	}
}


}