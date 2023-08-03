<?php
// session_start();
// $_SESSION['adminUsername'] = "";
?>


<?php
session_start();
$_SESSION['adminUsername'] = "";

include 'database.php';


if (isset($_POST['btn'])) {
    $userName = $_POST['userName'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `admin`;";
    $data = mysqli_query($conn, $sql);

    $adminAuthorised = false;

    if (mysqli_num_rows($data) > 0) {
        while ($row = mysqli_fetch_assoc($data)) {
            if ($row['email'] == $email && $row['userName'] == $userName && $row['password'] == $password) {
                $_SESSION['adminUsername'] = $row['userName'];
                
                $adminAuthorised = true;
                break;
            }
        }
    }

    if ($adminAuthorised == true) {
        header("location: admin.php");
    }


}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin login</title>
    <link rel="stylesheet" href="css/adminLogin.css">
</head>
<body>
<div class="form">
    <form action="" method="POST">
        <h2>Admin login</h2>
        <input type="text" placeholder="username" name="userName">
        <input type="text" placeholder="email" name="email">
        <input type="password" placeholder="password" name="password">
        <button name="btn">submit</button>
    </form>
</div>
</body>
</html>