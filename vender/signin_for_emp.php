<?php 
    session_start();
    $email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_STRING);
    $password = filter_var(trim($_POST['password'] ?? ''), FILTER_SANITIZE_STRING);
 
    if (empty($email) || empty($password)) {
        $_SESSION['message'] = "Пожалуйста, введите email и пароль";
        header('Location: ../sign-in.php');
        exit();
    }

    require 'connect.php';
    
    $statement = $connect->prepare("SELECT * FROM employees WHERE email = :email AND password = :password");
    $statement->bindParam(':email', $email);
    $statement->bindParam(':password', $password);
    $statement->execute();
    $employees = $statement->fetch(PDO::FETCH_ASSOC);

    if (!$employees) {
        $_SESSION['message'] = "Неверный email или пароль";
        header('Location: ../sign-in.php');
        exit();
    } 

    $_SESSION['employees'] = [
        "id" => $employees['id'], 
        "full_name" => $employees['full_name'],
        "email" => $employees['email'],
        "phone_number" => $employees['phone_number'],
        "date_birth" => $employees['date_birth']
    ];
    header('Location: ../profile.php');
    exit();
?>

<pre>
    <?php
        print_r($statement);
        print_r($employees);
    ?>
</pre>
