<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "college";

$con = new mysqli($server, $username, $password, $database);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$studentName = $_POST['student-name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$course = $_POST['course'];
$courseYear = $_POST['course-year'];
$linkedin = $_POST['linkedin'];
$about = $_POST['about'];

$stmt = $con->prepare("INSERT INTO student (stu_name, email, phone, course, course_year, linkedin, about) VALUES (?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param("sssssss", $studentName, $email, $phone, $course, $courseYear, $linkedin, $about);

if ($stmt->execute()) {
    header("Location: thankyou.html");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$con->close();
?>
