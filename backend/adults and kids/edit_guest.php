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

    $id = mysqli_real_escape_string($connection, $params->id);
    $adults_limit = mysqli_real_escape_string($connection, $params->adults_limit);
	$kids_limit = mysqli_real_escape_string($connection, $params->kids_limit);
    $name = mysqli_real_escape_string($connection, $params->name);

    $connection->set_charset('utf8');
    $sql ="UPDATE `luzportillo` SET `name`='$name', `adults_limit`='$adults_limit', `kids_limit`='$kids_limit' WHERE `id`='$id'";

    if(mysqli_query($connection, $sql))
    {
      $result['message'] = "edited";

      echo json_encode($result);
    }
    else
    {
      $result['message'] = "Data not edited";

      echo json_encode($result);
    } 
  }
  else
  {
    $result['message'] = "Connection error";

    echo json_encode($result);
  }
  
?>