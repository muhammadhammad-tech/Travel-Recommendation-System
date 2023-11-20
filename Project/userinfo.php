<?php
$connection = mysqli_connect('localhost', 'root');

if ($connection) {
    echo "connection successful";
} else {
    echo "no connection";
}

mysqli_select_db($connection, 'userinfodata');

$user = $_POST['user'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$comment = $_POST['comment'];

$query = "insert into userinfodata (user, email , mobile , comment)
values ('$user','$email','$mobile','$comment')";

mysqli_query($connection, $query);

header('location:index.php');
