<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Курсы</title>
    <link rel="stylesheet" href="css/course.css">
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/style.css" />
    
    
</head>
<body>

  <?php require "blocks/header.php" ?>
  
  <?php 
  $isEmployee = isset($_SESSION['employees']);
  if ($isEmployee) {
      // Пользователь является сотрудником, поэтому отображаем кнопку "Создать курс"
      $showCreateCourseButton = true;
  } else {
      // Пользователь не является сотрудником, поэтому скрываем кнопку "Создать курс"
      $showCreateCourseButton = false;
  }
  ?>

  <?php if ($showCreateCourseButton) { ?>
    <div class="create_course">
      <a href="create_course.php"><h3>Создать курс</h3></a>
    </div>
  <?php } ?>

    <p class="couses_children courses_title1">
      Курсы
    </p>
    <div class="courses">
      <div class="couses_cart">
        <div>
          <img class="course_cart_image" src="images/course1.png" alt="" />
        </div>
        <div class="course_cart_info">
          <img src="images/figma logo.svg" alt="" />
          <p class="course_card_trans">HTML CSS</p>
        </div>
        <p class="course_card_descr">
          Курс HTML и CSS предназначен для обучения студентов основам разметки
          и стилей веб-страниц. Участники курса изучат синтаксис HTML для создания
          структуры контента и CSS для оформления и визуального оформления веб-страниц,
          получая практические навыки создания привлекательных и респонсивных
          веб-интерфейсов.
        </p>
        <div class="price">
          <p class="course_card_descr_2">
            Стоимость 86 400 тенге
            Продолжительность 3 месяца
            <a href="">Купить</a>
          </p>
        </div>
      </div>
    </div>

    <?php require "blocks/footer.php" ?>
    
</body>
</html>