<?php 
  header('Access-Control-Allow-Origin: *'); 
  header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
  header('Access-Control-Allow-Methods: GET');
  header('Content-Type: application/json');
  
  require("connection.php");
  $connection = returnConnection();
  $code = mysqli_real_escape_string($connection, $_GET['code']);

  $result = array();

  if ($connection)
  {
    $connection->set_charset('utf8');
    $sql = sprintf("SELECT id, name, adults_limit, kids_limit, confirmed FROM luzportillo WHERE code='%s'", $code);
    $query = mysqli_query($connection, $sql);

    while ($row = $query->fetch_assoc())
    {
      $data = $row;
    }

    echo json_encode($data);
  }
  else
  {
    $result['message'] = "Connection error";

    echo json_encode($result);
  }
  
?>