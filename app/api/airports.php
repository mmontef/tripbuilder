<?php

	$app->get('/api/airports', function() use ($app){
	
		require_once('mysqli_connect.php');

		$query = "SELECT id,name,city,country FROM airports ORDER BY name ASC";

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

	$app->get('/api/airports/{city_name}', function($request) use ($app){
		
		require_once('mysqli_connect.php');
		$city_name = $request->getAttribute('city_name');

		$query = "SELECT id,name,country FROM airports WHERE city='$city_name' ORDER BY name ASC";

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
?>