<?php
    session_start();
    $course_name = filter_var(trim($_POST['course_name'] ?? ''), FILTER_SANITIZE_STRING);
    $price = filter_var(trim($_POST['price'] ?? ''), FILTER_SANITIZE_STRING);
    $emp_id = $_SESSION['emp_id']; // получение emp_id из сессии
    $lvl = filter_var(trim($_POST['lvl'] ?? ''), FILTER_SANITIZE_STRING);
    $overview = filter_var(trim($_POST['overview'] ?? ''), FILTER_SANITIZE_STRING);
    $duration = filter_var(trim($_POST['duration'] ?? ''), FILTER_SANITIZE_STRING);
    $hour_count = filter_var(trim($_POST['hour_count'] ?? ''), FILTER_SANITIZE_STRING);
    $ind_group = filter_var(trim($_POST['ind_group'] ?? ''), FILTER_SANITIZE_STRING);
    $group_group = filter_var(trim($_POST['group_group'] ?? ''), FILTER_SANITIZE_STRING);
    
    require 'connect.php';

    $statement = $connect->prepare("INSERT INTO courses (course_name, price, emp_id, lvl, overview, duration, hour_count, ind_group, group_group) 
    VALUES (:course_name, :price, :emp_id, :lvl, :overview, :duration, :hour_count, :ind_group, :group_group)");
    $statement->bindParam(':course_name', $course_name);
    $statement->bindParam(':price', $price);
    $statement->bindParam(':emp_id', $emp_id);
    $statement->bindParam(':lvl', $lvl);
    $statement->bindParam(':overview', $overview);
    $statement->bindParam(':duration', $duration);
    $statement->bindParam(':hour_count', $hour_count);
    $statement->bindParam(':ind_group', $ind_group);
    $statement->bindParam(':group_group', $group_group);
     
    $statement->execute();
?>

