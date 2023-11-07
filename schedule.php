<?php
    require 'vender/connect.php';
    $group_id = $_GET['group_id'];
    $stmt = $connect->prepare("SELECT * FROM Schedule WHERE 
        (day_1 = :group_id OR day_2 = :group_id OR day_3 = :group_id 
        OR day_4 = :group_id OR day_5 = :group_id OR day_6 = :group_id 
        OR day_7 = :group_id) AND time BETWEEN '09:00' AND '18:00'");
    $stmt->bindParam(':group_id', $group_id);
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
    <?php if (!empty($scheduleData)): ?>
    <table>
        <thead>
            <tr>
                <th>Время</th>
                <th>Понедельник</th>
                <th>Вторник</th>
                <th>Среда</th>
                <th>Четверг</th>
                <th>Пятница</th>
                <th>Суббота</th>
                <th>Воскресенье</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 9; $i <= 18; $i++): ?>
                <tr class="schedule-row">
                    <td><?php printf('%02d:00', $i); ?></td>
                    <td>
                        <?php
                            foreach ($scheduleData as $schedule) {
                                if ($schedule['time'] == sprintf('%02d:00', $i)) {
                                    if ($schedule['time'] == sprintf('%02d:00', $i) && $schedule['day_1'] == $group_id) {
                                        echo $schedule['day_1'];
                                    }
                                }
                            }
                        ?>
                    </td>
                    <td>
                        <?php
                            foreach ($scheduleData as $schedule) {
                                if ($schedule['time'] == sprintf('%02d:00', $i)) {
                                    if ($schedule['time'] == sprintf('%02d:00', $i) && $schedule['day_2'] == $group_id) {
                                        echo $schedule['day_2'];
                                    }
                                }
                            }
                        ?>
                    </td>
                    <td>
                        <?php
                            foreach ($scheduleData as $schedule) {
                                if ($schedule['time'] == sprintf('%02d:00', $i)) {
                                    if ($schedule['time'] == sprintf('%02d:00', $i) && $schedule['day_3'] == $group_id) {
                                        echo $schedule['day_3'];
                                    }
                                }
                            }
                        ?>
                    </td>
                    <td>
                        <?php
                            foreach ($scheduleData as $schedule) {
                                if ($schedule['time'] == sprintf('%02d:00', $i)) {
                                    if ($schedule['time'] == sprintf('%02d:00', $i) && $schedule['day_4'] == $group_id) {
                                        echo $schedule['day_4'];
                                    }
                                }
                            }
                        ?>
                    </td>
                    <td>
                        <?php
                            foreach ($scheduleData as $schedule) {
                                if ($schedule['time'] == sprintf('%02d:00', $i)) {
                                    if ($schedule['time'] == sprintf('%02d:00', $i) && $schedule['day_5'] == $group_id) {
                                        echo $schedule['day_5'];
                                    }
                                }
                            }
                        ?>
                    </td>
                    <td>
                        <?php
                            foreach ($scheduleData as $schedule) {
                                if ($schedule['time'] == sprintf('%02d:00', $i)) {
                                    if ($schedule['time'] == sprintf('%02d:00', $i) && $schedule['day_6'] == $group_id) {
                                        echo $schedule['day_6'];
                                    }
                                }
                            }
                        ?>
                    </td>
                    <td>
                        <?php
                            foreach ($scheduleData as $schedule) {
                                if ($schedule['time'] == sprintf('%02d:00', $i)) {
                                    if ($schedule['time'] == sprintf('%02d:00', $i) && $schedule['day_7'] == $group_id) {
                                        echo $schedule['day_7'];
                                    }
                                }
                            }
                        ?>
                    </td>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Преподаватель еще не добавил расписание</p>
<?php endif; ?>
</body>
</html>