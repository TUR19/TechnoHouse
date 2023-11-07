<?php
    require 'vender/connect.php';
    $group_id = $_GET['group_id'];

    // Выполните запрос к базе данных, чтобы извлечь данные
    $stmt = $connect->prepare("SELECT * FROM schedule");
    $stmt->execute();
    $scheduleData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create schedule</title>
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>
    <?php require 'blocks/header.php'?>

    <?php if (isset($_SESSION['message'])) {
            echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            unset($_SESSION['message']);
        }
    ?>

    <form action="vender/save_schedule.php" method="post">
    <input type="hidden" name="group_id" value="<?php echo $_GET['group_id']; ?>">

        <table>
            <thead>
                <tr>
                    <th>Время</th>
                    <th>Пн</th>
                    <th>Вт</th>
                    <th>Ср</th>
                    <th>Чт</th>
                    <th>Пт</th>
                    <th>Сб</th>
                    <th>Вс</th>
                </tr>
            </thead>
            <tbody>
            <?php if (!empty($scheduleData)): ?>
                <?php foreach($scheduleData as $schedule): ?>
                    <tr class="schedule-row">
                        <td><input type="text" name="time[]" value="<?php echo $schedule['time']; ?>"></td>
                        <td><input type="text" name="day_1[]" class="schedule-input" value="<?php echo $schedule['day_1']; ?>"></td>
                        <td><input type="text" name="day_2[]" class="schedule-input" value="<?php echo $schedule['day_2']; ?>"></td>
                        <td><input type="text" name="day_3[]" class="schedule-input" value="<?php echo $schedule['day_3']; ?>"></td>
                        <td><input type="text" name="day_4[]" class="schedule-input" value="<?php echo $schedule['day_4']; ?>"></td>
                        <td><input type="text" name="day_5[]" class="schedule-input" value="<?php echo $schedule['day_5']; ?>"></td>
                        <td><input type="text" name="day_6[]" class="schedule-input" value="<?php echo $schedule['day_6']; ?>"></td>
                        <td><input type="text" name="day_7[]" class="schedule-input" value="<?php echo $schedule['day_7']; ?>"></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr class="schedule-row">
                    <td><input type="text" name="time[]" value="09:00"></td>
                    <td><input type="text" name="day_1[]" class="schedule-input"></td>
                    <td><input type="text" name="day_2[]" class="schedule-input"></td>
                    <td><input type="text" name="day_3[]" class="schedule-input"></td>
                    <td><input type="text" name="day_4[]" class="schedule-input"></td>
                    <td><input type="text" name="day_5[]" class="schedule-input"></td>
                    <td><input type="text" name="day_6[]" class="schedule-input"></td>
                    <td><input type="text" name="day_7[]" class="schedule-input"></td>
                </tr>
                <tr class="schedule-row">
                    <td><input type="text" name="time[]" value="10:00"></td>
                    <td><input type="text" name="day_1[]" class="schedule-input"></td>
                    <td><input type="text" name="day_2[]" class="schedule-input"></td>
                    <td><input type="text" name="day_3[]" class="schedule-input"></td>
                    <td><input type="text" name="day_4[]" class="schedule-input"></td>
                    <td><input type="text" name="day_5[]" class="schedule-input"></td>
                    <td><input type="text" name="day_6[]" class="schedule-input"></td>
                    <td><input type="text" name="day_7[]" class="schedule-input"></td>
                </tr>
                <tr class="schedule-row">
                    <td><input type="text" name="time[]" value="11:00"></td>
                    <td><input type="text" name="day_1[]" class="schedule-input"></td>
                    <td><input type="text" name="day_2[]" class="schedule-input"></td>
                    <td><input type="text" name="day_3[]" class="schedule-input"></td>
                    <td><input type="text" name="day_4[]" class="schedule-input"></td>
                    <td><input type="text" name="day_5[]" class="schedule-input"></td>
                    <td><input type="text" name="day_6[]" class="schedule-input"></td>
                    <td><input type="text" name="day_7[]" class="schedule-input"></td>
                </tr>
                <tr class="schedule-row">
                    <td><input type="text" name="time[]" value="12:00"></td>
                    <td><input type="text" name="day_1[]" class="schedule-input"></td>
                    <td><input type="text" name="day_2[]" class="schedule-input"></td>
                    <td><input type="text" name="day_3[]" class="schedule-input"></td>
                    <td><input type="text" name="day_4[]" class="schedule-input"></td>
                    <td><input type="text" name="day_5[]" class="schedule-input"></td>
                    <td><input type="text" name="day_6[]" class="schedule-input"></td>
                    <td><input type="text" name="day_7[]" class="schedule-input"></td>
                </tr>
                <tr class="schedule-row">
                    <td><input type="text" name="time[]" value="13:00"></td>
                    <td><input type="text" name="day_1[]" class="schedule-input"></td>
                    <td><input type="text" name="day_2[]" class="schedule-input"></td>
                    <td><input type="text" name="day_3[]" class="schedule-input"></td>
                    <td><input type="text" name="day_4[]" class="schedule-input"></td>
                    <td><input type="text" name="day_5[]" class="schedule-input"></td>
                    <td><input type="text" name="day_6[]" class="schedule-input"></td>
                    <td><input type="text" name="day_7[]" class="schedule-input"></td>
                </tr>
                <tr class="schedule-row">
                    <td><input type="text" name="time[]" value="14:00"></td>
                    <td><input type="text" name="day_1[]" class="schedule-input"></td>
                    <td><input type="text" name="day_2[]" class="schedule-input"></td>
                    <td><input type="text" name="day_3[]" class="schedule-input"></td>
                    <td><input type="text" name="day_4[]" class="schedule-input"></td>
                    <td><input type="text" name="day_5[]" class="schedule-input"></td>
                    <td><input type="text" name="day_6[]" class="schedule-input"></td>
                    <td><input type="text" name="day_7[]" class="schedule-input"></td>
                </tr>
                <tr class="schedule-row">
                    <td><input type="text" name="time[]" value="15:00"></td>
                    <td><input type="text" name="day_1[]" class="schedule-input"></td>
                    <td><input type="text" name="day_2[]" class="schedule-input"></td>
                    <td><input type="text" name="day_3[]" class="schedule-input"></td>
                    <td><input type="text" name="day_4[]" class="schedule-input"></td>
                    <td><input type="text" name="day_5[]" class="schedule-input"></td>
                    <td><input type="text" name="day_6[]" class="schedule-input"></td>
                    <td><input type="text" name="day_7[]" class="schedule-input"></td>
                </tr>
                <tr class="schedule-row">
                    <td><input type="text" name="time[]" value="16:00"></td>
                    <td><input type="text" name="day_1[]" class="schedule-input"></td>
                    <td><input type="text" name="day_2[]" class="schedule-input"></td>
                    <td><input type="text" name="day_3[]" class="schedule-input"></td>
                    <td><input type="text" name="day_4[]" class="schedule-input"></td>
                    <td><input type="text" name="day_5[]" class="schedule-input"></td>
                    <td><input type="text" name="day_6[]" class="schedule-input"></td>
                    <td><input type="text" name="day_7[]" class="schedule-input"></td>
                </tr>
                <tr class="schedule-row">
                    <td><input type="text" name="time[]" value="17:00"></td>
                    <td><input type="text" name="day_1[]" class="schedule-input"></td>
                    <td><input type="text" name="day_2[]" class="schedule-input"></td>
                    <td><input type="text" name="day_3[]" class="schedule-input"></td>
                    <td><input type="text" name="day_4[]" class="schedule-input"></td>
                    <td><input type="text" name="day_5[]" class="schedule-input"></td>
                    <td><input type="text" name="day_6[]" class="schedule-input"></td>
                    <td><input type="text" name="day_7[]" class="schedule-input"></td>
                </tr>
                <tr class="schedule-row">
                    <td><input type="text" name="time[]" value="18:00"></td>
                    <td><input type="text" name="day_1[]" class="schedule-input"></td>
                    <td><input type="text" name="day_2[]" class="schedule-input"></td>
                    <td><input type="text" name="day_3[]" class="schedule-input"></td>
                    <td><input type="text" name="day_4[]" class="schedule-input"></td>
                    <td><input type="text" name="day_5[]" class="schedule-input"></td>
                    <td><input type="text" name="day_6[]" class="schedule-input"></td>
                    <td><input type="text" name="day_7[]" class="schedule-input"></td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    <input type="submit" value="Сохранить">
    </form>
</body>
</html>
