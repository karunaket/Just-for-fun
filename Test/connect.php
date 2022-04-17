<?php
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$Country = $_POST['Country'];
$zip = $_POST['zip'];
$address = $_POST['address'];
$email = $_POST['email'];

$conn = new mysqli('localhost','root','','test');

if($conn->connect_error)
{
  die("Connection failed:".$conn->connect_error);
}
else
{
  $stmt = $conn->prepare("insert into registration(firstname, lastname, gender, phone, Country, zip, address, email)values(?,?,?,?,?,?,?,?)");

  $stmt->bind_param("sssisiss",$firstname, $lastname, $gender, $phone, $Country, $zip, $address, $email);

  $stmt->execute();
  echo "Registration Successfull...";
  $stmt->close();
  $conn->close();
}
?>