<?php include("connect_db.php");
if (!empty($_POST['id'])){
    $sql = "SELECT a.*, CONCAT(b.first_name,' ',b.last_name) instructor_name, c.name course_name
        FROM bookings a 
        JOIN `user` b ON b.id = a.instructor
        JOIN `courses` c ON c.id = a.course
        WHERE a.instructor = {$_POST['id']}
        ";
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
}else{
    $sql = "SELECT a.*, CONCAT(b.first_name,' ',b.last_name) instructor_name, c.name course_name
        FROM bookings a
        LEFT JOIN `user` b ON b.id = a.instructor
        JOIN `courses` c ON c.id = a.course
        ";
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
}