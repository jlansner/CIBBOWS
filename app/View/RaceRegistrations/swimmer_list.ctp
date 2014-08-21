<?php
echo "Race Number,First Name,Last Name,Age,Gender,Age Group,Wetsuit,Address,Emergency Contact\n";

foreach ($data as $row) {

	echo $row['RaceRegistration']['race_number'] . ',';
	echo $row['User']['first_name'] . ',';
	echo $row['User']['last_name'] . ',';
	echo $row['RaceRegistration']['age'] . ',';
	echo $row['Gender']['title'] . ',';
	echo $row['AgeGroup']['title'] . ',';
	echo $row['RaceRegistration']['wetsuit'] . ',';

	foreach ($row['User']['Address'] as $address) {
		if (trim($address['line1'] !== "")) {
			echo '"' . $address['line1'] . "\n";
		}

		if (trim($address['line2'] !== "")) {
			echo $address['line2'] . "\n";
		}

		if (trim($address['line3'] !== "")) {
			echo $address['line3'] . "\n";
		}

		echo $address['city'] . ', ' . $address['county_province'] . " " . $address['postcode'] . "\n";
		if (preg_match('/[0-9]{10}/',$address['phone'])) {
			echo preg_replace('/([0-9]{3})([0-9]{3})([0-9]{4})/','($1) $2-$3',$address['phone']) . '",';
		} else {
			echo $address['phone'] . '",';
		}
	}

	foreach ($row['User']['EmergencyContact'] as $contact) {
		echo '"' . $contact['name'] . ', ' . $contact['relationship'] . "\n";
		echo $contact['email'] . "\n";
		if (preg_match('/[0-9]{10}/',$contact['phone'])) {
			echo preg_replace('/([0-9]{3})([0-9]{3})([0-9]{4})/','($1) $2-$3',$contact['phone']) . '"';
		} else {
			echo $contact['phone'] . '"';
		}
	} 

	echo "\n";
}
?>