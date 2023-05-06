<?php 
  header('Access-Control-Allow-Origin: *'); 
  header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
  header('Access-Control-Allow-Methods: GET');
  header('Content-Type: application/json');
  
  require("connection.php");
  $connection=returnConnection();

  $result = array();

  if ($connection)
  {
    $connection->set_charset('utf8');
    $query = $connection->query("SELECT code, name, adults_limit, adults_confirmed, kids_limit, kids_confirmed, confirmed, message FROM luzportillo ORDER BY confirmation_date DESC ");

    $data = array();

    while ($row = $query->fetch_assoc())
    {
      $data[] = $row;
    }

    echo json_encode($data);
  }
  else
  {
    $result['message'] = "Connection error";

    echo json_encode($result);
  }
  
?>