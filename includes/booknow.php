<?php  include "../db.php" ?>

<?php
if (isset ($_POST['create']))
{
    $user = $_POST['UserName'];
    $email = $_POST['Email'];
    $pass = $_POST['Password'];

    

    $query = "INSERT INTO users(username, email, password) 
    VALUES ('{$user}', '{$email}', '{$pass}')"; //SQL query to insert user data into the users table
    
    $add_user = mysqli_query($conn, $query); //send data to database

    //displaying proper message to see whether the query is executed perfectly
    if (!$add_user){
        echo "Something went wrong". mysqli_connect_error($conn);
    }
    else {
        echo "<script type = 'text/javascript'>alert('User added successfully!')</script>";
    }
}
?>


<!-- body -->
<h1 class="text-center">Add User Details</h1>
<div class="container">
<form action="" method="post">
    <div class="form-group">
        <label for="user" class="form-label">Username</label>
        <input type="text" class="form-control" name = "user">
    </div>

    <div class="form-group">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name = "email">
    </div>

    <div class="form-group">
        <label for="pass" class="form-label">Password</label>
        <input type="password" class="form-control" name = "pass">
    </div>

    <div class = "container texct-center mt-5">
     <input type="submit" name ="create" class="btn btn-primary mt-2" value=submit>
    </div>
</form>
</div>
<!--a BACK button to go to home page-->
<div class = "container text-center mt-5">
     <a href="home.php" class = "btn btn-warning">BACK</a>
</div>

<!-- Footer -->
<?php include "../footer.php" ?>