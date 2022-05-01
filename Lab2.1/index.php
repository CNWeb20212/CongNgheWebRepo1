<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <link rel="stylesheet" href = "style.css">
        <meta charset="UTF-8">
        <title>Lap 2-1</title>
    </head>
    <body>
        <div class = "screen">
            <div class = "logo">
                <img class="image" src="hello.jpg">
            </div>
            <div class = "form">
                <form action="process.php" method="post">
                    <p> Please input your information: </p>
                    <span> Name: </span> <input type="text" class="input-text" name = "name"> <br/>
                    <span> Date of Birth: </span> <input type="date" class="input-text" name="dob"> <br/>
                    <span> Age: </span> <input type="number" class="input-text" name = "age"> <br/>
                    <span> Gender: </span> 
                        <input type="radio" class="input-gender" name = "gender" value = "male"> Male
                        <input type="radio" class="input-gender" name = "gender" value = "female"> Female <br/>
                    <span> Class: </span> <input type="text" class="input-text" name = "class"> <br/>
                    <span> University: </span> <input type="text" class="input-text" name = "university"> <br/>
                    <span> Hobbies: </span> <br/>
                        <input class = "checkbox" type="checkbox" name = "swimming">           <span> Swimming </span> <br/>
                        <input class = "checkbox" type="checkbox" name = "listening-music">    <span> Listening to music </span> <br/>
                        <input class = "checkbox" type="checkbox" name = "reading-book">       <span> Reading book </span> <br/>
                        <input class = "checkbox" type="checkbox" name = "playing-videogames"> <span> Playing video games </span> <br/>
                        <input class = "checkbox" type="checkbox" name = "singing">            <span> Singing songs </span> <br/>
                        <input class = "checkbox" type="checkbox" name = "cooking">            <span> Cooking </span> <br/>
                    <div class="submit"> 
                        <input type="submit" class="submit-button" name="submit" value="Submit">
                    </div>
                </form>
            </div>
        </div>
            
    </body>
</html>
