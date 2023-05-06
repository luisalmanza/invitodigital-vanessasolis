<?php 
  header('Access-Control-Allow-Origin: *'); 
  header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
  header('Access-Control-Allow-Methods: PATCH');
  header('Content-Type: application/json');
  
  require("connection.php");
  $connection = returnConnection();

  $json = file_get_contents('php://input');
  $params = json_decode($json);

  $result = array();

  if ($connection)
  {
	$code = mysqli_real_escape_string($connection, $params->code);
	$name = mysqli_real_escape_string($connection, $params->name);
    $people_limit = mysqli_real_escape_string($connection, $params->people_limit);

    $connection->set_charset('utf8');
    $sql ="INSERT INTO `miroslavagonzalez` (`code`, `name`, `people_limit`) VALUES('$code', '$name', '$people_limit')";

	if(!empty($code)){
		if($connection->query($sql))
		{
		  $result['message'] = "saved";

		  echo json_encode($result);
		}
		else
		{
		  $result['message'] = "Data not sent";

		  echo json_encode($result);
		} 
		$connection->close();
	}
  }
  else
  {
    $result['message'] = "Connection error";

    echo json_encode($result);
  }
  
?>