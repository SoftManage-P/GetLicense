<?php include("connect_db.php");
    $id = $_POST['new'];

    if (!empty($_POST['create']))
        $create = $_POST['create'];

    if (!empty($_POST['order']))
        $order = $_POST['order'];

    if (!empty($create['first_name']))
        $first_name = $create['first_name'];

    if (!empty($create['last_name']))
        $last_name = $create['last_name'];

    if (!empty($create['user_id']))
        $user_id = $create['user_id'];

    if (!empty($create['email']))
        $email = $create['email'];

    if (!empty($create['role']))
        $role = $create['role'];

    if (!empty($create['password']))
        $password = $create['password'];

    if (!empty($create['account_type']))
        $account_type = $create['account_type'];

    if (!empty($create['details']))
        $details = $create['details'];

    if (!empty($create['postal']))
        $postal = $create['postal'];

    $target_dir = "../assets/upload/";
    if (!empty($_FILES["certificate"]["name"])){
        $_FILES["certificate"]["name"] = time() . $_FILES["certificate"]["name"];
        $target_file = $target_dir . basename($_FILES["certificate"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["certificate"]["tmp_name"]);
            if($check !== false) {
//                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
//                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
    // Check if file already exists
        if (file_exists($target_file)) {
//            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
    // Check file size
        if ($_FILES["certificate"]["size"] > 500000) {
//            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
    // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
//            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
    // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
//            echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["certificate"]["tmp_name"], $target_file)) {
//                echo "The file ". basename( $_FILES["certificate"]["name"]). " has been uploaded.";
            } else {
//                echo "Sorry, there was an error uploading your file.";
            }
        }
    }else{
        $target_file = !empty($create['certificate'])?$create['certificate']:'';
    }
//        $target_file = $_SESSION['user']['certificate'];

if (!empty($order)){
        if ($order == 2){
            $sql = "SELECT * FROM user WHERE id=".$id;
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
            $sql = "DELETE FROM user WHERE id=".$id;

            if ($conn->query($sql) === TRUE) {
                $result = 1;
            } else {
                $result = 0;
            }
        }
    }else{
        if ($id == 0){

            $date = date('Y-m-d H:i:s');
            $password = md5($password);
            $sql = "INSERT INTO user (first_name, last_name, user_id, email, role, password, account_type
                    , details, postal, certificate, created_at)
                    VALUES ('{$first_name}', '{$last_name}', '{$user_id}', '{$email}', '{$role}', '{$password}'
                    , '{$account_type}', '{$details}', '{$postal}', '{$target_file}', '{$date}')";

            if ($conn->query($sql) === TRUE)
                $result = 1;
            else
                $result = 0;
        }
        else{
            $date = date('Y-m-d H:i:s');
            $password = md5($password);
            $sql = "UPDATE user SET first_name='{$first_name}', last_name='{$last_name}', user_id='{$user_id}'
                , email='{$email}', role='{$role}', password='{$password}', account_type='{$account_type}'
                , details='{$details}', postal='{$postal}', certificate='{$target_file}', updated_at='{$date}' WHERE id=".$id;

            if ($conn->query($sql) === TRUE) {
                $result = 1;
            } else {
                $result = 0;
            }
        }?>
    <script>
        location.href = "instructors.php"
    </script>
        <?php
    }
    echo $result;
?>