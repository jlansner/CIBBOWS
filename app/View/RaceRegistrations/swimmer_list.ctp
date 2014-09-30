<?php
echo "Race Number,Distance,First Name,Last Name,Email Address,Date of Birth,Age,Gender,Age Group,Wetsuit,Address,Medical Conditions,Emergency Contact\n";

foreach ($data['RaceRegistration'] as $row) {

	echo $row['race_number'] . ',';
	echo $row['ChildRace']['title'] . ',';
	echo $row['User']['first_name'] . ',';
	echo $row['User']['last_name'] . ',';
	echo $row['User']['email'] . ',';
	echo $this->Time->format('m/d/Y',$row['User']['dob']) . ',';
	echo $row['age'] . ',';
	echo $row['Gender']['title'] . ',';
	echo $row['AgeGroup']['title'] . ',';
	
	if ($row['wetsuit'] == "1") {
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
		if (preg_match('/[0-9]{10}/',$contact['phone'])) {
			echo preg_replace('/([0-9]{3})([0-9]{3})([0-9]{4})/','($1) $2-$3',$contact['phone']) . "\n";
		} else {
			echo $contact['phone'] . "\n";
		}
		echo $contact['email'];
		$notFirst = true;
	} 

	echo '"' . "\n";
}
?>