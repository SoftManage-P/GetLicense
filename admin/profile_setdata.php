<?php include("connect_db.php");
session_start();
//$id = $_POST['new'];
//
//$create = $_POST['create'];

if (!empty($_POST['new']))
    $id = $_POST['new'];

if (!empty($_POST['create']))
    $create = $_POST['create'];

if (!empty($create['order']))
    $order = $create['order'];

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
    $password = md5($create['password']);

if (!empty($create['password']))
    $password = md5($create['password']);

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
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
// Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
// Check file size
    if ($_FILES["certificate"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
// Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["certificate"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["certificate"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}else
    $target_file = $_SESSION['user']['certificate'];

if ($_SESSION['user']['role'] == "Instructor"){
    if (!empty($create['account_type']))
        $account_type = $create['account_type'];

    if (!empty($create['details']))
        $details = $create['details'];

    if (!empty($create['postal']))
        $postal = $create['postal'];

    $sql = "UPDATE user SET first_name='{$first_name}', last_name='{$last_name}', user_id='{$user_id}', postal='{$postal}' 
                , email='{$email}', role='{$role}', password='{$password}', account_type='{$account_type}', details='{$details}', certificate = '{$target_file}' WHERE id=".$id;

}else{
    $sql = "UPDATE user SET first_name='{$first_name}', last_name='{$last_name}', user_id='{$user_id}'
                , email='{$email}', role='{$role}', password='{$password}' WHERE id=".$id;
}

if ($conn->query($sql) === TRUE) {
    $result = 1;
    session_unset();

    $sql = "SELECT * FROM user WHERE id = '{$id}'";
    $result = $conn->query($sql);

    $data = array();
    if ($result->num_rows > 0) {
        session_unset();
        while($row = $result->fetch_assoc()) {
            array_push($data, $row);
        }
        $_SESSION['user'] = $data[0];
        // output data of each row
        $result = 1;
    }
} else {
    $result = 0;
}
echo $result;
?>
<script>
location.href="profile.php";
</script>