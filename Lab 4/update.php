<html>
<head>
    <title> Update </title>
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
    <h1> Select product we just sold </h1>
    <form action = <?php echo $_SERVER["PHP_SELF"] ?> method="post">
        <?php
            include "./backend.php";
            $query = "select distinct Product_desc from $table_name";
            $table = $db->query($query);
            while ($row = $table->fetch_assoc()){
                $name = $row["Product_desc"];
                echo "<input type = \"radio\" name = \"choose\" value = $name required>";
                echo "<label> $name </label>";
                echo "<br/>";
            }
        ?>
        
        <input type = "submit" name = "submit" value = "Click to update">
        <input type = "reset" value = "Reset">
    </form>
    
    <?php
        $post = $_POST;
//        foreach ($post as $key=>$value){
//            echo $key. " - " . $value . "<br/>";
//        }
        
        if (isset($post["submit"])){
            $desc = $post["choose"];
            $query = "update $table_name set Numb = Numb-1 where Product_desc = '$desc'";
            $res = $db->query($query);
            
    ?>
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
    <?php } ?>
</body>
</html>    


