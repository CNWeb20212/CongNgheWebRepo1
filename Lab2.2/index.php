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
    <div class="detail section">
        <h1 class="section-heading">Nhập tên và cài đặt lịch hẹn</h1>
       
        <form action="showPage.php" method="get">
            <div class="detail-box">
                <div class="box-40percent">
                    <p class="line-heading">Nhập tên:</p>
                </div>
                <div class="box-half">
                    <input type="text" name="name" class="input-name">
                </div>
                <div class="clear"></div>
            </div>
            <div class="detail-box">
                <div class="box-40percent">
                    <p class="line-heading">Nhập ngày:</p>
                </div>
                <div class="box-half">
                    <div class="box-third">
                        <select name="date">
                            <?php
                                for($i=1; $i<=31; $i++){
                                    print "<option>$i</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="box-third">
                        <select name="month">
                            <?php
                                for($i=1; $i<=12; $i++){
                                    print "<option>$i</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="box-third">
                        <select name="year">
                            <?php
                                for($i=1500; $i<=3000; $i++){
                                    if($i == 2000) print "<option selected>$i</option>";
                                    else print "<option>$i</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="clear"></div>
            </div>

            <div class="detail-box">
                <div class="box-40percent">
                    <p class="line-heading">Nhập giờ:</p>
                </div>
                <div class="box-half">
                    <div class="box-third">
                        <select name="hour">
                            <?php
                                for($i=0; $i<=23; $i++){
                                    print "<option>$i</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="box-third">
                        <select name="minute">
                            <?php
                                for($i=0; $i<=59; $i++){
                                    print "<option>$i</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="box-third">
                        <select name="second">
                            <?php
                                for($i=0; $i<=59; $i++){
                                    print "<option>$i</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="clear"></div>
            </div>

            <div class="detail-box">
                <div class="box-half">
                    <input class="submit btn" type="submit" value="Xác nhận">
                </div>
                <div class="box-half">
                    <input class="reset btn" type="reset" value="Làm mới">
                </div>
            </div>
        </form>
    </div>
</body>
</html>