<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <link rel="stylesheet" href = "style2.css">
        <meta charset="UTF-8">
        <title>Lap 2-1</title>
    </head>
    <body>
        <div class = "screen">
            <div class = "logo">
                <img class="image" src="hello.jpg">
            </div>
            <p> Thanks for your submition! </p>
            <div class = "echo">
            <?php
                $name = $dob = $age = $gender = $class = $university = $hobbies = "unknown";
                $name = $_POST["name"];
                $dob = $_POST["dob"];
                $age = $_POST["age"];
                if (isset($_POST["gender"])){
                    $gender = $_POST["gender"];
                }
                $class = $_POST["class"];
                $university = $_POST["university"];
                $hbies = array();
                $hb = array("swimming", "listening-music", "reading-book", "playing-videogames", "singing", "cooking");
                foreach ($hb as $value){
                    if (isset($_POST[$value])){
                        array_push($hbies, $value);
                        $hobbies = "known";
                    }
                }
                echo "Hello ".$name."<br/>";
                echo "You were born in ".$dob."<br/>";
                echo "You are ".$age." years old<br/>";
                echo "Your gender is ".$gender."<br/>";
                echo "Your class is ".$class."<br/>";
                echo "Your university is ".$university."<br/>";
                echo "Your hobbies are ";
                if ($hobbies == "unknown"){
                    echo $hobbies;
                } else {
                    foreach ($hbies as $value){
                        echo $value.", ";
                    }  
                }
                echo "<br/>";
            ?> </div>
        </div>
    </body>
</html>
`