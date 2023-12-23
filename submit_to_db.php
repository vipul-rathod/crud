<?php

//INSERT INTO `notes` (`sno`, `title`, `description`, `tstamp`) VALUES (NULL, 'Buy books', 'Please buy books from the store', current_timestamp());



// Connect to the database
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'notes';

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Die if connection was not successful.
if (!$conn){
    die("Sorry we failed to connect: " . mysqli_connect_error());
}


// Insert new records in database
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $title = $_POST['title'];
    $description = $_POST['desc'];

    $sql = "INSERT INTO `notes` (`title`, `description`) VALUES ('$title', '$description')";
    $result = mysqli_query($conn, $sql);
    if ($result){
        echo "Record was successfully inserted to the database";
    }
    else
    {
        echo "Record was not inserted due to this error --> " . mysqli_error($conn);
    }
}
?>