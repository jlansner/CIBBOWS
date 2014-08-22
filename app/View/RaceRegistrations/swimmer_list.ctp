<?php
echo "Race Number,First Name,Last Name,Age,Gender,Age Group,Wetsuit,Address,Medical Conditions,Emergency Contact\n";

foreach ($data['RaceRegistration'] as $row) {

	echo $row['race_number'] . ',';
	echo $row['User']['first_name'] . ',';
	echo $row['User']['last_name'] . ',';
	echo $row['age'] . ',';
	echo $row['Gender']['title'] . ',';
	echo $row['AgeGroup']['title'] . ',';
	
	if ($row['RaceRegistration']['wetsuit'] == 1) {
		echo 'Yes'; 
	}
	echo ',"';
	foreach ($row['User']['Address'] as $address) {
		if (trim($address['line1'] !== "")) {
			echo $address['line1'] . "\n";
		}

		if (trim($address['line2'] !== "")) {
			echo $address['line2'] . "\n";
		}

		if (trim($address['line3'] !== "")) {
			echo $address['line3'] . "\n";
		}

		echo $address['city'] . ', ' . $address['county_province'] . " " . $address['postcode'] . "\n";
		if (preg_match('/[0-9]{10}/',$address['phone'])) {
			echo preg_replace('/([0-9]{3})([0-9]{3})([0-9]{4})/','($1) $2-$3',$address['phone']);
		} else {
			echo $address['phone'];
		}
	}

	echo '","' . $row['User']['medical'] . '","';
	$notFirst = false;
	foreach ($row['User']['EmergencyContact'] as $contact) {
		if ($notFirst) {
			echo "\n\n";
		}
		echo $contact['name'] . ', ' . $contact['relationship'] . "\n";
		echo $contact['email'] . "\n";
		if (preg_match('/[0-9]{10}/',$contact['phone'])) {
			echo preg_replace('/([0-9]{3})([0-9]{3})([0-9]{4})/','($1) $2-$3',$contact['phone']);
		} else {
			echo $contact['phone'];
		}
		$notFirst = true;
	} 

	echo '"' . "\n";
}
?>