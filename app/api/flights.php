<?php

	//get list of flights for a trip
	$app->get('/api/flights/{trip_name}', function($request) use ($app){
		
		require_once('mysqli_connect.php');
		$trip_name = $request->getAttribute('trip_name');

		//get city name, airport name of from and to for a given flight name
		$query = 
				"SELECT f.id, a.name AS from_airport ,a.city AS from_city, a2.name AS to_airport, a2.city AS to_city 
				FROM airports a
				INNER JOIN flights f
				ON f.from_id=a.id
				INNER JOIN airports a2
				ON f.to_id=a2.id
				INNER JOIN trips t
				ON f.trip_id =t.id
				WHERE t.name='$trip_name'";

		$result = $mysqli->query($query);
		
		while($row = $result->fetch_assoc()){ 
			$data[] = $row;
		}

		if(isset($data)){
			header('Content-Type: application/json');
			echo json_encode($data);
		}
		else{
			
			http_response_code(404);
		}
		
		mysqli_free_result($result);
		$mysqli->close();
		
	});

	//post data and create new row in flights table, adding a flight to a trip
	$app->post('/api/flights', function($request) use ($app){ 

		require_once('mysqli_connect.php');

		//get airport id from city and airport names, put that id inside of insert statement

		$query = "INSERT INTO `flights` (`from_id`, `to_id`, `trip_id`) VALUES (?,?,?)";
	
		if($stmt = $mysqli->prepare($query)){
			$stmt->bind_param("iii", $from_id, $to_id, $trip_id); 

			$data = $request->getParsedBody();
	    	
	    	$from_id = $data['from_id'];
	    	$to_id = $data['to_id'];
	    	$trip_id = $data['trip_id'];
	    

			$stmt->execute();
			echo "successful insert";
			

		}

		echo $mysqli->error;
		mysqli_stmt_close($stmt);
		$mysqli->close();
		
	});
?>