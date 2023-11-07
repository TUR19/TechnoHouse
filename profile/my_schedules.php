<?php
    session_start();
    require '../vender/connect.php';
    $course_id = $_GET['course_id'];

    // Найти все группы, связанные с данным курсом
    $stmt_groups = $connect->prepare("SELECT * FROM groups_all WHERE course_id = :course_id");
    $stmt_groups->bindParam(':course_id', $course_id);
    $stmt_groups->execute();
    $groups = $stmt_groups->fetchAll(PDO::FETCH_ASSOC);

    $scheduleData = array();

    // Для каждой найденной группы, найти связанные с ней расписания
    foreach ($groups as $group) {
        $current_group_id = $group['group_id']; // Сохраняем текущее значение group_id

        $stmt = $connect->prepare("SELECT * FROM schedule WHERE 
            (day_1 = :group_id OR day_2 = :group_id OR day_3 = :group_id 
            OR day_4 = :group_id OR day_5 = :group_id OR day_6 = :group_id 
            OR day_7 = :group_id) AND time BETWEEN '09:00' AND '18:00'");
        $stmt->bindParam(':group_id', $current_group_id);
        $stmt->execute();
        $groupSchedule = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $scheduleData = array_merge($scheduleData, $groupSchedule);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create schedule</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
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
                    <?php for ($day = 1; $day <= 7; $day++): ?>
                        <td>
                            <?php
                                $currentGroups = array();
                                foreach ($groups as $group) {
                                    $groupId = $group['group_id'];
                                    foreach ($scheduleData as $schedule) {
                                        if ($schedule["time"] == sprintf('%02d:00', $i) && $schedule["day_$day"] == $groupId) {
                                            $currentGroups[] = $groupId;
                                            break;
                                        }
                                    }
                                }
                                echo implode(', ', $currentGroups);
                            ?>
                        </td>
                    <?php endfor; ?>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>

<?php else: ?>
    <p>Вы еще не добавили расписание</p>
<?php endif; ?>
</body>
</html>
