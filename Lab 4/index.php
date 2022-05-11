<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> CONNECT MySQL</title>
        <style>
            input {
                background-color: blue;
                border: none;
                border-radius: 10px;
                margin: 12px;
                color: white;
                font-weight: 500;
                font-size: 20px;
                cursor: pointer;
                width: 200px;
                height: 50px;
                display: inline;
            }
            body{
                width: 100vw;
                height: 100vh;
                display: flex;
                flex-direction: column;
                align-items: center;
            }
            
        </style>
    </head>
    <body>
        <h1> Manage Product </h1>
        <form action = "insert.php"> 
            <input type = "submit" value = "Insert">
        </form>
        <form action = "viewdata.php"> 
            <input type = "submit" value = "View Data">
        </form>
        <form action = "search.php"> 
            <input type = "submit" value = "Search">
        </form> 
        <form action = "update.php"> 
            <input type = "submit" value = "Update">
        </form>
    </body>
</html>
