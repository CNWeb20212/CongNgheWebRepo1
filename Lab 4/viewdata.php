<html>
<head>
    <title> View Data </title>
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
    <div class = "view-data"> 
        <h1> Products Data </h1>
        <p> The Query Select * from Products </p>
        <table>
            <tr>
                <th> Number </th>
                <th> Product </th>
                <th> Weight </th>
                <th> Cost </th>
                <th> Count </th>
            </tr>
            <?php
                include "./backend.php";
                $table = selectAll($db, $table_name); 
                while ($row = $table->fetch_assoc()){
                    echo "<tr>"
                        . "<td>".$row["ProductID"]."</td>"
                        . "<td>".$row["Product_desc"]."</td>"
                        . "<td>".$row["Cost"]."</td>"
                        . "<td>".$row["Weight"]."</td>"
                        . "<td>".$row["Numb"]."</td>"
                    . "</tr>";
                }
            ?>
        </table>
    </div>
</body>
</html>    


