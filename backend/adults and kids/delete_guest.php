<?php 
  header('Access-Control-Allow-Origin: *'); 
  header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
  header('Access-Control-Allow-Methods: DELETE');
  header('Content-Type: application/json');
  
  require("connection.php");
  $connection = returnConnection();
 
  $id = mysqli_real_escape_string($connection, $_GET['id']);

  $result = array();

  if ($connection)
  {
    $connection->set_charset('utf8');
    $sql = "DELETE FROM `luzportillo` WHERE `id`='$id'";

    if(mysqli_query($connection, $sql))
    {
      $result['message'] = "deleted";

      echo json_encode($result);
    }
    else
    {
      $result['message'] = "Data not deleted";

      echo json_encode($result);
    }
  }
  else
  {
    $result['message'] = "Connection error";

    echo json_encode($result);
  }
  
?>