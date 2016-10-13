<?php
//post data by creating a trip
	$app->post('/api/trips', function($request) use ($app){

		require_once('mysqli_connect.php');
		
		
		$query = "INSERT INTO `trips` (`customer_id`,`name`) VALUES(?,?)";
		if($stmt = $mysqli->prepare($query)){

			$stmt->bind_param("is", $customer_id, $trip_name); 
			
			$data = $request->getParsedBody();
	    	
	    	$customer_id = $data['customer_id'];
	    	$trip_name = $data['trip_name'];
			
			echo "successful insert";
			

			$stmt->execute();

		}

		echo $mysqli->error;
		mysqli_stmt_close($stmt);
		$mysqli->close();
		
	});

	//put data by renaming a trip
	$app->put('/api/trips/{old_trip_name}', function($request) use ($app){
		
		require_once('mysqli_connect.php');

		$query = "UPDATE `trips` SET name= ? WHERE name=?";
		if($stmt = $mysqli->prepare($query)){
			$stmt->bind_param("ss", $new_trip_name, $old_trip_name);
			
			$data = $request->getParsedBody();
	    	
	    	$new_trip_name = $data['new_trip_name'];
	    	$old_trip_name = $data['old_trip_name'];
			
			echo "successful update";
			

			$stmt->execute();
		}
		
		echo $mysqli->error;
		mysqli_stmt_close($stmt);
		$mysqli->close();
		
	});

	//delete data by removing a trip
	$app->delete('/api/trips/{trip_name}', function($request) use ($app){

		require_once('mysqli_connect.php');

		$query = "DELETE FROM `trips` WHERE name=?";
		
		if($stmt = $mysqli->prepare($query)){
			$stmt->bind_param("s", $trip_name);
			
			$data = $request->getParsedBody();
	    	
	    	$trip_name = $data['trip_name'];
			
			echo "successful delete";
			

			$stmt->execute();
		}

		echo $mysqli->error;
		mysqli_stmt_close($stmt);
		$mysqli->close();
		
	});
?>