<?php
	//get list of customers
	$app->get('/api/customers', function() use ($app){
		
		require_once('mysqli_connect.php');

		//get city name, airport name of from and to for a given flight name
		$query = "SELECT* FROM customer";

		$result = $mysqli->query($query);
		
		while($row = $result->fetch_assoc()){ 
			$data[] = $row;
		}

		if(isset($data)){
			header('Content-Type: application/json'); //prevents page from crashing?
			echo json_encode($data);
		}
		else{
			
			http_response_code(404);
		}
		
		mysqli_free_result($result);
		$mysqli->close();
		
	});
	

	//post data and create new row in customer table, adding a customer to the database
	$app->post('/api/customers', function($request) use ($app){

		require_once('mysqli_connect.php');

		$query = "INSERT INTO `customer` (`name`,`username`, `password`) VALUES(?,?,?)";
		
		if($stmt = $mysqli->prepare($query)){
			$stmt->bind_param("sss", $name, $username, $password); 

			$data = $request->getParsedBody();
	    	
	    	$name = $data['name'];
	    	$username = $data['username'];
	    	$password = $data['password'];
			
			echo "successful insert";
			

			$stmt->execute();
		}
		
		echo $mysqli->error;
		mysqli_stmt_close($stmt);
		$mysqli->close();
		
	});

?>