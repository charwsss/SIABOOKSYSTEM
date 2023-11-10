<?php include "db.php" ?>

<?php
if (isset($_POST['username'])) {
    // Get user input
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // SQL query to check if the provided username and password match in the database
    $query = "SELECT * FROM logintable WHERE UserName = '{$user}'";
    $result = mysqli_query($conn, $query);

    // Initialize the $password variable
    $password = '';

    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['UserID'];
        $username = $row['UserName'];
        $email = $row['Email'];
        $password = $row['Password'];
    }

    if (empty($pass) || empty($user)) {
        echo "<script type='text/javascript'>alert('Please enter your username and password.'); window.location.href = 'login.php';</script>";
    } else {
        if ($pass == $password && $user == $username) {
            echo "<script type='text/javascript'>alert('Login successful!'); window.location.href = 'home.php';</script>";
        } else {
            echo "<script type='text/javascript'>alert('Incorrect username or password.'); window.location.href = 'login.php';</script>";
        }
    }
    // Close the database connection
    mysqli_close($conn);
}
?>
