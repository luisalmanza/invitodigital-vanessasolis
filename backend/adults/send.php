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
    $people_confirmed = mysqli_real_escape_string($connection, $params->people_confirmed);
    $message = mysqli_real_escape_string($connection, $params->message);

    $connection->set_charset('utf8');
    $sql ="UPDATE `miroslavagonzalez` SET `people_confirmed`='$people_confirmed', `message`='$message', `confirmation_date`=CURRENT_TIMESTAMP, `confirmed`=true WHERE `id`='$id'";

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