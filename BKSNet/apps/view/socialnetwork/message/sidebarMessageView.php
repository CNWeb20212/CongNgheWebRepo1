<div class="leftSide">
    <div class="heading">
        <div class="userimg">
            <img src="/BKSnet/img/avatar.jpg" alt="" class="cover">
        </div>
        <ul class="nav_icons">
            <li>
                <ion-icon name="scan-circle-outline"></ion-icon>
            </li>
            <li>
                <ion-icon name="chatbox"></ion-icon>
            </li>
            <li>
                <ion-icon name="ellipsis-vertical"></ion-icon>
            </li>
        </ul>
    </div>
    <div class="search_chat">
        <div class="">
            <input type="text" placeholder="Search..." class="search_input" id="searchText">
            <ion-icon name="search-outline"></ion-icon>
            <div class="header__search-history">
                <ul class="header__search-list" id="listuser">
                </ul>
                <!-- <ul class="header__search-list">
                    <li class="header__search-item">
                        <a href="#" class="header__item-link">NCT</a>
                    </li>
                    <li class="header__search-item">
                        <a href="#" class="header__item-link">NCT</a>
                    </li>
                    <li class="header__search-item">
                        <a href="#" class="header__item-link">NCT</a>
                    </li>
                    <li class="header__search-item">
                        <a href="#" class="header__item-link">NCT</a>
                    </li>
                    <li class="header__search-item">
                        <a href="#" class="header__item-link">NCT</a>
                    </li>
                </ul> -->
            </div>
        </div>
    </div>
    <div class="chatlist">
        <?php
            foreach ($userchats as $userchat) { ?>
                <a href="/BKSNet/messagecontroller/viewchat/<?php echo $userchat['chatid']; ?>" class="block">
                    <div class="imgbx">
                        <img src="/BKSnet/img/avatar.jpg" alt="" class="cover">
                    </div>
                    <div class="details">
                        <div class="listHeader">
                            <h4><?php echo $userchat['username']; ?> </h4>
                            <p class="time"></p>
                        </div>
                        <div class="message_p">
                            <p>Hoc lap trih web php Hoc lap trih web php Hoc lap trih web php</p>
                        </div>
                    </div>
                </a>
            <?php } 
        ?>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {

        // Search
        $("#searchText").on("input", function() {
            var searchText = $(this).val();
            if (searchText == "") return;
            $.post('/BKSNet/messagecontroller/searchuser', {
                input: searchText
            }, function(data) {
                $("#listuser").html(data);
            })
        });

    });
</script>