<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="wdisciplineth=device-wdisciplineth, initial-scale=1.0">
    <title>Lessons</title>
</head>
<body>
    <h2>Отримання інформації про розклад занять для лабораторних робіт обраної зі списку групи</h2>
    <form action="getLessonforLab.php" method="post">
        <select name="Lab">
            <?php
            include("connect.php");
            require_once("connect.php");
            $collections = (new MongoDB\Client)->Lb6_Var1->lessons;
            $groups = $collections->distinct('group');
          foreach($groups as $group){
             echo '<option value = "' .$group. '">' .$group . '</option>';
         }
        ?>
        </select>
            <input type="submit" value="Результат">       
    </form>

    <h2>Отримання інформації про розклад занять для лекцій зазначеного викладача із зазначеної дисципліни</h2>
    <form action="getLessonforTeach.php" method="post">
    <select name="teacher" id="teacher">
        <?php
        include("connect.php");
        require_once("connect.php");
        $collections = (new MongoDB\Client)->Lb6_Var1->lessons;
        $teachers = $collections->distinct('teacher');
        foreach($teachers as $teacher){
            echo '<option value="' . $teacher . '">' . $teacher . '</option>';
        }
        ?>
    </select>
    <select name="discipline" id="discipline">
        <?php
        $disciplines = $collections->distinct('discipline');
        foreach($disciplines as $discipline){
            echo '<option value="' . $discipline . '">' . $discipline . '</option>';
        }
        ?>
    </select>
    <input type="submit" value="Результат">
</form>


    <h2>Отримання інформації про розклад занять для аудиторії</h2>
<form action="getLessonforClass.php" method="post">
    <select name="Class">
        <?php
        include("connect.php");
        $collections = (new MongoDB\Client)->Lb6_Var1->lessons;
        $classrooms = $collections->distinct('classroom');
        foreach($classrooms as $classroom){
            echo '<option value="' . $classroom . '">' . $classroom . '</option>';
        }
        ?>
    </select>
    <input type="submit" value="Результат">
</form>


<script>
    const data = localStorage.getItem("request");
    const result = JSON.parse(data);
    if (result.length > 0) {
        let output = "";
        result.forEach(function(element){
            output += "<br>Date: " + element.date;
            output += "<br>Time: " + element.time;
            output += "<br>Classroom: " + element.classroom;
            output += "<br>Discipline: " + element.discipline;
            output += "<br>Type: " + element.type;
            output += "<br>Group: " + element.group.join(", ");
            output += "<br>Teacher: " + element.teacher.join(", ");
            output += "<br>";
        });
        document.write("Попередній запит:" + output);
    }
</script>

</body>
</html>