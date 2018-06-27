<?php

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task manager</title>
</head>
<body>
        <?php if ($allTasks->rowCount() === 0): ?>
            <p style="text-align: center;">Вы пока не добавили ни одной фамилии</p>
        <?php else: ?>

            <form method="POST">
                <label>
                    Сортировать по:
                    <select name="sortBy" id="sortBy">
                        <option value="date">Фамилии</option>
                        <option value="status">Имени отчеству</option>
                        <option value="description">телефону</option>
                    </select>
                </label>
                <input type="submit" name="sort" id="sort" value="Сортировка">
            </form>

            <table>
                <tr>
                    <td>Фамилия</td>
                    <td>Имя Отчество</td>
                    <td>телефон</td>
                    <td>Действия</td>
                </tr>
                <?php foreach ($allTasks as $task): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($task['description']) ?></td>
                        <?php echo htmlspecialchars($task['is_done']) ? '<td style="color: green">Выполнено</td>' : '<td style="color: orange">В процессе</td>' ?>
                        <td><?php echo htmlspecialchars($task['date_added']) ?></td>
                        <td>
                            <p>Изменить </p>
                            <?php if (!$task['is_done']): ?>
                                <p>Выполнить </p>
                            <?php endif; ?>
                            <p class='delete link'>Удалить </p>
                            <input type="hidden" value="<?php echo $task['id'] ?>">
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    <div class="forms">
        <form method="POST">
            <textarea name="task" placeholder="Телефон" id="task" cols="50" rows="3" required></textarea>
            <input type="submit" name="addTask" value="Добавить телефон" class="button">
        </form>
    </div>

</body>
</html>
