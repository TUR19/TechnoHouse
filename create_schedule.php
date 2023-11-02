<?php
    $group_id = $_GET['group_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create schedule</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function fillGroupId() {
            var groupId = <?php echo $group_id; ?>;
            document.getElementById("group_id_field").value = groupId;
        }
        function showButton(element) {
            var row = element.closest(".schedule-row");
            var button = row.querySelector("button");
            button.style.display = "block";
        }
        function hideButton(element) {
            var row = element.closest(".schedule-row");
            var button = row.querySelector("button");
            button.style.display = "none";
        }
    </script>
</head>
<body>
    <?php require 'blocks/header.php' ?>

    <?php if (isset($_SESSION['message'])) {
            echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            unset($_SESSION['message']);
        }
    ?>

    <form action="vender/save_schedule.php" method="post">
        <input type="hidden" id="group_id_field" name="group_id" value="<?php echo $group_id; ?>" />
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
                <tr class="schedule-row">
                    <td><input type="text" name="time[]" value="09:00"></td>
                    <td><input type="text" name="day_1[]" class="schedule-input" onfocus="showButton(this)" onblur="hideButton(this)"></td>
                    <td><input type="text" name="day_2[]" class="schedule-input" onfocus="showButton(this)" onblur="hideButton(this)"></td>
                    <td><input type="text" name="day_3[]" class="schedule-input" onfocus="showButton(this)" onblur="hideButton(this)"></td>
                    <td><input type="text" name="day_4[]" class="schedule-input" onfocus="showButton(this)" onblur="hideButton(this)"></td>
                    <td><input type="text" name="day_5[]" class="schedule-input" onfocus="showButton(this)" onblur="hideButton(this)"></td>
                    <td><input type="text" name="day_6[]" class="schedule-input" onfocus="showButton(this)" onblur="hideButton(this)"></td>
                    <td><input type="text" name="day_7[]" class="schedule-input" onfocus="showButton(this)" onblur="hideButton(this)"></td>
                </tr>
                <tr class="schedule-row">
                    <td><input type="text" name="time[]" value="10:00"></td>
                    <td><input type="text" name="day_1[]" class="schedule-input" onfocus="showButton(this)" onblur="hideButton(this)"></td>
                    <td><input type="text" name="day_2[]" class="schedule-input" onfocus="showButton(this)" onblur="hideButton(this)"></td>
                    <td><input type="text" name="day_3[]" class="schedule-input" onfocus="showButton(this)" onblur="hideButton(this)"></td>
                    <td><input type="text" name="day_4[]" class="schedule-input" onfocus="showButton(this)" onblur="hideButton(this)"></td>
                    <td><input type="text" name="day_5[]" class="schedule-input" onfocus="showButton(this)" onblur="hideButton(this)"></td>
                    <td><input type="text" name="day_6[]" class="schedule-input" onfocus="showButton(this)" onblur="hideButton(this)"></td>
                    <td><input type="text" name="day_7[]" class="schedule-input" onfocus="showButton(this)" onblur="hideButton(this)"></td>
                </tr>
                <tr class="schedule-row">
                    <td><input type="text" name="time[]" value="11:00"></td>
                    <td><input type="text" name="day_1[]" class="schedule-input" onfocus="showButton(this)" onblur="hideButton(this)"></td>
                    <td><input type="text" name="day_2[]" class="schedule-input" onfocus="showButton(this)" onblur="hideButton(this)"></td>
                    <td><input type="text" name="day_3[]" class="schedule-input" onfocus="showButton(this)" onblur="hideButton(this)"></td>
                    <td><input type="text" name="day_4[]" class="schedule-input" onfocus="showButton(this)" onblur="hideButton(this)"></td>
                    <td><input type="text" name="day_5[]" class="schedule-input" onfocus="showButton(this)" onblur="hideButton(this)"></td>
                    <td><input type="text" name="day_6[]" class="schedule-input" onfocus="showButton(this)" onblur="hideButton(this)"></td>
                    <td><input type="text" name="day_7[]" class="schedule-input" onfocus="showButton(this)" onblur="hideButton(this)"></td>
                </tr>
                <tr class="schedule-row">
                    <td><input type="text" name="time[]" value="12:00"></td>
                    <td><input type="text" name="day_1[]" class="schedule-input" onfocus="showButton(this)" onblur="hideButton(this)"></td>
                    <td><input type="text" name="day_2[]" class="schedule-input" onfocus="showButton(this)" onblur="hideButton(this)"></td>
                    <td><input type="text" name="day_3[]" class="schedule-input" onfocus="showButton(this)" onblur="hideButton(this)"></td>
                    <td><input type="text" name="day_4[]" class="schedule-input" onfocus="showButton(this)" onblur="hideButton(this)"></td>
                    <td><input type="text" name="day_5[]" class="schedule-input" onfocus="showButton(this)" onblur="hideButton(this)"></td>
                    <td><input type="text" name="day_6[]" class="schedule-input" onfocus="showButton(this)" onblur="hideButton(this)"></td>
                    <td><input type="text" name="day_7[]" class="schedule-input" onfocus="showButton(this)" onblur="hideButton(this)"></td>
                </tr>
                <tr>
                    <td colspan="8"><button style="display:none" onclick="fillGroupId()">Выбрать</button></td>
                </tr>
            </tbody>
        </table>
        <input type="submit" value="Сохранить">
    </form>
</body>
</html>
