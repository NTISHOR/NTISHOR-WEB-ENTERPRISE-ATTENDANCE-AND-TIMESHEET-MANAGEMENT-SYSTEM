<?php
session_start();
include 'config.php'; // MySQL connection ($conn)

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $lecturer_id = mysqli_real_escape_string($conn, $_POST['lecturer_id']);
    $password    = $_POST['password'];

    // Check if lecturer exists
    $sql = "SELECT * FROM lecturers WHERE lecturer_id='$lecturer_id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // Verify password
        if (password_verify($password, $row['password'])) {
            // Successful login
            $_SESSION['lecturer_id'] = $row['lecturer_id'];
            $_SESSION['fullname'] = $row['fullname'];

            // Redirect to lecturer dashboard
            header("Location: lecturer_dashboard.php");
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
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Lecturer Login - NTISHOR</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="login-container">
    <h2>Supervisor Login</h2>

    <form action="supervisorloginlogin.php" method="POST">
        <label>Lecturer ID</label>
        <input type="text" name="supervisor_id" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit">Login</button>
    </form>

    <?php
    // Show error if login failed
    if (isset($error)) {
        echo "<p style='color:red; text-align:center;'>$error</p>";
    }
    ?>
</div>

</body>
</html>
