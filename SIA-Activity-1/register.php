<?php
$lastname   = $_POST['lastname'];
$middlename = $_POST['middlename'];
$firstname  = $_POST['firstname'];
$age        = $_POST['age'];
$course     = $_POST['course'];
$year       = $_POST['year'];
$section    = $_POST['section'];
$contact    = $_POST['contact'];
$address    = $_POST['address'];
$gender     = $_POST['gender'];

echo "HELLO $firstname THESE ARE THE INFORMATION THAT YOU SUBMITTED<br><br>";
echo "$lastname, $firstname $middlename<br>";
echo "$age<br>";
echo "$gender<br>";
echo "My contact number: $contact<br>";
echo "My Address is: $address<br>";
echo "Your course is: $course - $year$section<br>";
?>