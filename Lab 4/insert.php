<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> INSERT </title>
    </head>
    <body>
       
        <form action = <?php echo $_SERVER["PHP_SELF"] ?> method = "post">
        <table> 
            <tr>
                <td> Item description </td>
                <td> <input type = "text" name = "description" required> </td>
            </tr>
            <tr>
                <td> Cost </td>
                <td> <input type = "number" name = "cost" required> </td>
            </tr>
            <tr>
                <td> Weight </td>
                <td> <input type = "number" name = "weight" required> </td>
            </tr>
            <tr>
                <td> Number available </td>
                <td> <input type = "number" name = "number" required> </td>
            </tr>
        </table>
            <input type = "submit" name = "insert" value = "Click to Submit">
            <input type = "reset" name = "reset" value = "Reset">
        </form>
        
        <?php
            $post   = $_POST;
            if (isset($post["insert"])){
                include "./backend.php"; 
                $desc   = $post["description"];
                $weight = $post["weight"];
                $cost   = $post["cost"];
                $num    = $post["number"];

                if (insert($db, $table_name, $desc, $cost, $weight, $num)) {
                    echo "<br/>Inserted an object! <br/>";
                    echo "Value($desc, $cost, $weight, $num) <br/>";
                } else {
                    echo "Failed in inserting <br/>";     
                }              
            }
        ?>

    </body>
</html>


