<?php
$error=''; //Variable to Store error message;

if(isset($_POST['submit'])){

 if(empty($_POST['user']) || empty($_POST['pass'])){
 $error = "Username or Password is Invalid";
 }
 else
 {

 //Define $user and $pass
 $user=htmlspecialchars($_POST['user']);
 $pass=htmlspecialchars($_POST['pass']);

 //Establishing Connection with server by passing server_name, user_id and pass as a patameter
 $conn = mysqli_connect("localhost", "Minhphu", "Minhphu");

 //Selecting Database
 $db = mysqli_select_db($conn, "test");

 //sql query to fetch information of registerd user and finds user match.
 $query = mysqli_query($conn, "SELECT * FROM user WHERE password='$pass' AND username='$user'");
 
//create a result row if no result found the result row is zero
 $rows = mysqli_num_rows($query);

 if($rows == 1)
{
 header("Location: welcome.php"); // Redirecting to other page
 }
 else
 {
 $error = "Username of Password is Invalid";
 }
 mysqli_close($conn); // Closing connection
 }
}

?>