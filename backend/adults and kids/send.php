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
    $adults_confirmed = mysqli_real_escape_string($connection, $params->adults_confirmed);
	$kids_confirmed = mysqli_real_escape_string($connection, $params->kids_confirmed);
    $message = mysqli_real_escape_string($connection, $params->message);

    $connection->set_charset('utf8');
    $sql ="UPDATE `luzportillo` SET `adults_confirmed`='$adults_confirmed', `kids_confirmed`='$kids_confirmed', `message`='$message', `confirmation_date`=CURRENT_TIMESTAMP, `confirmed`=true WHERE `id`='$id'";

    if(mysqli_query($connection, $sql))
    {
      $result['message'] = "confirmed";

      echo json_encode($result);
    }
    else
    {
      $result['message'] = "Data not sent";

      echo json_encode($result);
    } 
  }
  else
  {
    $result['message'] = "Connection error";

    echo json_encode($result);
  }
  
?>