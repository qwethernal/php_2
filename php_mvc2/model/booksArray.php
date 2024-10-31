<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "mvc"; 

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT bookname, author, price, description, image FROM books";
$result = $conn->query($sql);

$books = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $books[] = $row;
    }
}


$conn->close();
?>
