<?php
session_start();
include "config.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lecturer_id = mysqli_real_escape_string($conn, $_POST['lecturer_id']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM lecturers WHERE lecturer_id = '$lecturer_id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row['password'])) {
            $_SESSION['lecturer_id'] = $row['lecturer_id'];
            $_SESSION['fullname'] = $row['fullname'];

            header("Location: lecturerdashboard.php");
            exit();
        } else {
            $error = "Incorrect Password!";
        }
    } else {
        $error = "Invalid Lecturer ID!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Lecturer Login</title>
<link rel="stylesheet" href="styles.css">

</head>
<body>

<div class="login-container">
    <h2>Lecturer Login</h2>

    <form method="POST">
        <label>Lecturer ID</label>
        <input type="text" name="lecturer_id" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit">Login</button>
    </form>

    <?php if ($error != "") { ?>
        <p style="color:red; text-align:center;"><?php echo $error; ?></p>
    <?php } ?>
</div>

</body>
</html>
