<?php include("connect_db.php");
    $id = $_POST['new'];

    if (!empty($_POST['type']))
        $type = $_POST['type'];

    if (!empty($_POST['name']))
        $name = $_POST['name'];

    if (!empty($_POST['description']))
        $description = $_POST['description'];

    if (!empty($_POST['automatic_price']))
        $automatic_price = $_POST['automatic_price'];

    if (!empty($_POST['manual_price']))
        $manual_price = $_POST['manual_price'];

    if (!empty($_POST['note']))
        $note = $_POST['note'];

    if (!empty($_POST['order']))
        $order = $_POST['order'];

    if (!empty($order)){
        if ($order == 2){
            $sql = "SELECT * FROM courses WHERE id=".$id;
            $result = $conn->query($sql);
            $data = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    array_push($data, $row);
                }
            }
            $result = json_encode($data);
        }else{
            $sql = "DELETE FROM courses WHERE id=".$id;

            if ($conn->query($sql) === TRUE) {
                $result = 1;
            } else {
                $result = 0;
            }
        }
    }else{
        if ($id == 0){

            $sql = "INSERT INTO courses (type, name, description, automatic_price, manual_price, note)
                VALUES ('{$type}', '{$name}', '{$description}', '{$automatic_price}'
                , '{$manual_price}', '{$note}')";


            if ($conn->query($sql) === TRUE)
                $result = 1;
            else
                $result = 0;
        }
        else{
            $sql = "UPDATE courses SET type='{$type}', name='{$name}', description='{$description}' 
            , automatic_price='{$automatic_price}', manual_price='{$manual_price}', note='{$note}' WHERE id=".$id;

            if ($conn->query($sql) === TRUE) {
                $result = 1;
            } else {
                $result = 0;
            }
        }
    }
    echo $result;
?>

