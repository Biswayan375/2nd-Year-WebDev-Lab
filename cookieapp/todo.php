<?php
    $tasks = array();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cookie App</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <!-- 
        1. A form to create tasks
        2. A table to view all tasks
        3. Way to modify and delete tasks
        4. Sort tasks based on priority
     -->
    <div id="form-container">
        <fieldset>
            <legend style="text-align: center;">Create Taks</legend>
            <form id="task-create-form" action="#" method="post">
                <input name="task-name" placeholder="Enter task name" required>
                <select name="task-priority">
                    <option value="1">High</option>
                    <option value="2">Moderate</option>
                    <option value="3">Low</option>
                </select>
                <button class="btn" name="create-task">Create Task</button>
            </form>
        </fieldset>
    </div>

    <div>
        <form action="#" method="post">
            <button class="btn" name="show-tasks">Show Tasks</button>
        </form>
    </div>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["create-task"])) {
                $taskName = $_POST['task-name'];
                $taskPriority = $_POST["task-priority"];

                if (!isset($_COOKIE['tasks'])) {
                    array_push($tasks, array($taskName, $taskPriority));
                    // var_dump($tasks);
                    setcookie("tasks", serialize($tasks));
                } else {
                    $arr = unserialize($_COOKIE['tasks']);
                    // var_dump($arr);
                    array_push($arr, array($taskName, $taskPriority));

                    // sorting the array based on priority
                    for ($i = 0; $i < sizeof($arr); $i++) {
                        $min_index = $i;
                        for ($j = $i + 1; $j < sizeof($arr); $j++) {
                            if ($arr[$j][1] <= $arr[$min_index][1]) {
                                $min_index = $j;
                            }
                        }
                        $t = $arr[$i];
                        $arr[$i] = $arr[$min_index];
                        $arr[$min_index] = $t;
                    }
                    setcookie("tasks", serialize($arr));
                }
            } else if (isset($_POST["show-tasks"])) {
                if (isset($_COOKIE["tasks"])) {
                    $arr = unserialize($_COOKIE["tasks"]);
                    

                    for ($i = 0; $i < sizeof($arr); $i++) {
                        $task = $arr[$i];
                        $priority = $task[1];
                        ?>
                        <div class="task-div <?php if ($priority == 1) echo "bgred"; else if ($priority == 2) echo "bgyellow"; else echo "bggreen"; ?>">
                            <table class="task-content">
                                <tr>
                                    <td style="border-right: 1px solid"><?php echo $task[0]; ?></td>
                                    <td style="border-right: 1px solid"><?php 
                                if ($task[1] == 1)
                                    echo "High";
                                else if ($task[1] == 2)
                                    echo "Moderate";
                                else
                                    echo "Low";
                            ?></td>
                                    <td>
                                        <form action="#" method="post">
                                            <input name="key" style="display: none" value="<?php echo $i; ?>" readonly>
                                            <button name="modify-task">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <?php
                    }
                }
            } else if (isset($_POST["modify-task"])) {
                $toBeModified = $_POST["key"];
                $tasks = unserialize($_COOKIE["tasks"]);
                ?>
                <form action="#" method="post">
                    <input name="key" style="display: none" value="<?php echo $toBeModified; ?>" readonly>
                    <input name="modified-name" type="text" value="<?php echo $tasks[$toBeModified][0] ?>" require>
                    <select name="modified-priority">
                        <option value="1">High</option>
                        <option value="2">Moderate</option>
                        <option value="3">Low</option>
                    </select>
                    <button name="modify-it">Modify</button>
                </form>
                <?php
            } else if (isset($_POST["modify-it"])) {
                $in = $_POST["key"];
                $name = $_POST["modified-name"];
                $priority = $_POST["modified-priority"];

                $arr = unserialize($_COOKIE["tasks"]);
                $arr[$in][0] = $name;
                $arr[$in][1] = $priority;
                // sorting the array based on priority
                for ($i = 0; $i < sizeof($arr); $i++) {
                    $min_index = $i;
                    for ($j = $i + 1; $j < sizeof($arr); $j++) {
                        if ($arr[$j][1] <= $arr[$min_index][1]) {
                            $min_index = $j;
                        }
                    }
                    $t = $arr[$i];
                    $arr[$i] = $arr[$min_index];
                    $arr[$min_index] = $t;
                }

                setcookie("tasks", serialize($arr));
            }
        }
    ?>
</body>
</html>