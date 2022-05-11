<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> SEARCH</title>
        <style> 
            h1{
                color: blue;
            }
            table, td{
                border: 2px black solid;
            }
            th {
                border: 2px black solid;
                background-color: gray;
            }
        </style>
    </head>
    <body>
        <h1> Inventory Search </h1>
        <form action = <?php echo $_SERVER["PHP_SELF"] ?> method = "post">
            <label> Product description <label/>
            <input type = "text" name = "desc" > <br/>
            <input type = "submit" name = "submit" value = "Click to submit">
            <input type = "reset" value = "Reset">
        </form>
        
        <?php
            include "backend.php";
            $post   = $_POST;
            if (isset($post["submit"])){
                $desc = $post["desc"];
                $query = "select * from $table_name where Product_desc = \"$desc\"";
                $table = $db->query($query);
        ?>
        <div class = "view-data"> 
        <h1> Products Data </h1>
        <p> select * from $table_name where Product_desc = <?php echo $desc ?> </p>
        <table>
            <tr>
                <th> Number </th>
                <th> Product </th>
                <th> Weight </th>
                <th> Cost </th>
                <th> Count </th>
            </tr>
            <?php
                while ($row = $table->fetch_assoc()){
                    echo "<tr>"
                        . "<td>".$row["ProductID"]."</td>"
                        . "<td>".$row["Product_desc"]."</td>"
                        . "<td>".$row["Cost"]."</td>"
                        . "<td>".$row["Weight"]."</td>"
                        . "<td>".$row["Numb"]."</td>"
                    . "</tr>";
                }
            }
            ?>
        </table>
    </div>
       

    </body>
</html>


