<?php

include_once 'getClass.php';

class HTMLResume extends Resume {

public function LocationFormatted() {
	$Items = [];
	foreach ($this->Location as $key => $value) {
		$Items[] = "<b>" . $key . "</b>" . ": " . $value;
	}
	return implode(" | ",$Items);
}

public function EducationFormatted() {
	foreach ($this->Education as $education) {
		$fullInfo[] = "<h3 class='headerUnderlined'>" . "<i>" . $education["Name"] . "</i>" . "</h3>";
		unset($education["Name"]);
	foreach ($education as $key => $value) {
		if (isset($value)) {
			$keys[] = $key;
			$fullInfo[] = implode("",$keys);
			$keys = null;
			if (is_array($value)) {
				foreach($value as $v) {
					$fullInfo[] = $v;
				}
			}
			else {
				$fullInfo[] = $value;
			}

		}
	}
	}
	return implode("",$fullInfo);
}


}