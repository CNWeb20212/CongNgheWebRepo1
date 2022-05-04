<?php
    $name = $date = $month = $year = $hour = $minute = $second = '';
    $newHour = $dayTime = $dayOfMonth = '';

    if(!empty($_GET)) {
        if(isset($_GET['name'])) {
            $name = $_GET['name'];
        }
        if(isset($_GET['date'])) {
            $date = $_GET['date'];
        }
        if(isset($_GET['month'])) {
            $month = $_GET['month'];
        }
        if(isset($_GET['year'])) {
            $year = $_GET['year'];
        }
        if(isset($_GET['hour'])) {
            $hour = $_GET['hour'];
        }
        if(isset($_GET['minute'])) {
            $minute = $_GET['minute'];
        }
        if(isset($_GET['second'])) {
            $second = $_GET['second'];
        }

        if($hour >= 12) {
            if($hour == 12) $newHour = 12;
            else $newHour = $hour - 12;
            
            $dayTime = 'PM';
        }
        else {
            if($hour == 0) $newHour = 12;
            else $newHour = $hour;

            $dayTime = 'AM';
        }

        switch($month) {
            case 1: 
            case 3:
            case 5:
            case 7:
            case 8:
            case 10:
            case 12: 
                $dayOfMonth = 31;
                break;
            case 4:
            case 6:
            case 9:
            case 11:
                $dayOfMonth = 30;
                break;
            case 2:
                if(($year%400 == 0) || ($year%4 == 0 && $year%100 != 0)) {
                    $dayOfMonth = 29;
                }                
                else $dayOfMonth = 28;
                break;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="section show">
        <?php
            if($name != null) {
                print "Chào $name! <br>";
                print "Bạn đã đặt cuộc hẹn vào $hour:$minute:$second, $date/$month/$year. <br> <br>";
                print "Thông tin thêm. <br>";
                
                print "Trong chế độ 12 giờ, ngày giờ là $newHour:$minute:$second $dayTime, $date/$month/$year. <br>";
                print "Tháng này có $dayOfMonth ngày!";
            }
            else {
                print "Bạn chưa điền tên. <br>";
                print "Hãy nhập đầy đủ thông tin trước.";
            }
        ?>
    </div>
</body>
</html>