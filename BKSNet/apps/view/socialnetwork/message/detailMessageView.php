<style>

</style>
<div class="rightSide">
    <?php
    if (!empty($user)) {
    ?>
        <div class="heading">
            <div class="imgText">
                <div class="userimg">
                    <img src="/BKSnet/img/avatar.jpg" alt="" class="cover">
                </div>
                <h4><?php echo $user; ?></h4>
            </div>
            <ul class="nav_icons">
                <li>
                    <ion-icon name="search-outline"></ion-icon>
                </li>
                <li>
                    <ion-icon name="ellipsis-vertical"></ion-icon>
                </li>
            </ul>
        </div>
        <div class="chatBox">
            <?php
                foreach ($messages as $message) { ?>
                    <div class="message <?php if($message['ttk']==$_COOKIE['ttk']){echo 'my_message';} else {echo 'frnd_message';} ?> ">
                        <p><?php echo $message['content']; ?></p>
                    </div>
                <?php } 
            ?>
        </div>
        <div class="chatbox_input">
            <ion-icon name="happy-outline"></ion-icon>
            <ion-icon name="attach-outline"></ion-icon>
            <input type="text" name="" placeholder="Type a message..." id="input_message">
            <ion-icon name="mic"></ion-icon>
        </div>
        <!-- <?php include ROOT . "/apps/view/socialnetwork/message/messageFormView.php" ?> -->
    <?php } else { ?>

    <?php }
    ?>

</div>
<script>
    var scrollDown = function() {
        let chatBox = document.getElementsByClassName('chatBox');
        chatBox[0].scrollTop = chatBox[0].scrollHeight;
    }
    scrollDown();
    $("#input_message").on('keypress', function(){
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            $(document).ready(function() {
            message = $("#input_message").val();
            if (message == "") return;
            $.post('/BKSNet/messagecontroller/postmessage', { 
                message: message,
				chatid: <?= $userchat['chatid'] ?>
            },
            function(data){

            })
            })      

        }
    })
</script>