<?php
    require '../vender/connect.php';
    session_start();
    $emp_id = $_SESSION['emp_id']; // Получаем emp_id из сессии
    $courses = [];
    $statement = $connect->prepare("SELECT * FROM courses WHERE emp_id = :emp_id");
    $statement->bindParam(':emp_id', $emp_id);
    $statement->execute();
    $courses = $statement->fetchAll(PDO::FETCH_ASSOC);

    if (!isset($_SESSION['clients']) && !isset($_SESSION['employees'])) {
        header('Location: sign-in.php');
        exit();
    } else if (isset($_SESSION['clients'])) {
        // Действия, связанные с клиентом
        $user = $_SESSION['clients'];
    } else if (isset($_SESSION['employees'])) {
        // Действия, связанные со сотрудником
        $user = $_SESSION['employees'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/normalize.css"/>
    <link rel="stylesheet" href="../css/style.css">
</head> 
<body>
    <div class="wrap">
        <div class="container">
            <header class="header">
            <a href="../index.php" class="logo">
                <img src="../images/LOGO.svg" alt="" />
            </a>
            <ul class="nav">
                <li class="nav_item3">
                <a href="../index.php" class="nav_item_link">Главная</a>
                </li>
                <li class="nav_item">
                <a href="../about-us.php" class="nav_item_link">О нас</a>
                </li>
                <li class="nav_item">
                <a href="../course.php" class="nav_item_link">Курсы</a>
                </li>
                <li class="nav_item">
                <a href="../comand.php" class="nav_item_link">Команда</a>
                </li>
                <?php if (isset($_SESSION['clients']) || isset($_SESSION['employees'])) { ?>
                <li class="nav_item2">
                    <a href="../profile.php" class="nav_item_link2"><?php echo $user['full_name']; ?></a>
                </li>
                <?php } else { ?>
                    <li class="nav_item2">
                        <a href="../sign-in.php" class="nav_item_link2">Войти</a>
                    </li>
                    <li class="nav_item2">
                        <a href="../sign-up.php" class="nav_item_link2">Регистрация</a>
                    </li>
                <?php } ?>

            </ul>
            </header>
        </div>
    </div>
        
    <p class="couses_children">Мои курсы</p> 

    <?php foreach ($courses as $course): ?>
        <a href="change.php?course_id=<?php echo $course['course_id']; ?>">

        <div class="courses">
          <div class="couses_cart">
            <div>
              <img class="course_cart_image" src="images/course1.png" alt="" />
            </div>
            <div class="course_cart_info">
              <img src="images/figma logo.svg" alt="" />
              <p class="course_card_trans"><?= $course['course_name']; ?></p>
            </div>
            <p class="course_card_descr">
              <?= $course['overview']; ?>
            </p>
            <div class="price">
                <p class="course_card_descr_2">
                <p>Цена: <?= $course['price']; ?> тг</p>
                <p>Продолжительность (в месяцах): <?= $course['duration']; ?></p>
            </div>
          </div>
        </div>
        </a>
    <?php endforeach; ?>

</body>
</html>
