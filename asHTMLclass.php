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
		$fullInfo[] = "<ul>";
		unset($education["Name"]);
	foreach ($education as $key => $value) {
		if (isset($value)) {
			$fullInfo[] = "<li>";
			$keys[] = "<b>" . $key . "</b>";
			$fullInfo[] = implode("",$keys);
			$keys = null;
			if (is_array($value)) {
					$fullInfo[] = "<ul>";
				foreach($value as $v) {
					$fullInfo[] = "<li>" . $v . "</li>";
				}
					$fullInfo[] = "</ul>";
			}
			else {
				$fullInfo[] = "<ul>";
				$fullInfo[] = "<li>" . $value . "</li>";
				$fullInfo[] = "</ul>";
			}
		}
	}
		$fullInfo[] = "</ul>";
	}

	return implode("",$fullInfo);
}


}