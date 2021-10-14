<?php include("connect_db.php");

$sql = "SELECT * FROM user WHERE role = 'Instructor'";
$result = $conn->query($sql);
$data['data'] = array();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        array_push($data['data'], $row);
    }
}

if (!empty($data)){
    foreach ($data['data'] as $key => $row) {
        $data['data'][$key]["no"] = $key + 1;
    }
}
echo json_encode($data);