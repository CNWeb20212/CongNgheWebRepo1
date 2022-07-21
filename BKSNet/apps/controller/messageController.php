<?php

class messagecontroller
{
    public function postmessage()
    {
        $message = $_POST['message'];
        $chatid = $_POST['chatid'];
        (new message())->insertMessage($_COOKIE['ttk'], $chatid, $message);
        header("location: /BKSNet/messagecontroller/view");
        return;
    }

    public function viewchat($chatid) 
    {   
        $userchats = $this->userchatof();
        $user = $this->getuser($chatid);
        $messages = (new message)->getMessage($chatid);
        include ROOT . "/apps/view/layout/header.php";

        include ROOT . "/apps/view/socialnetwork/message/message.php";

        include ROOT . "/apps/view/layout/footer.php"; 
    }

    public function view() 
    {   
        $userchats = $this->userchatof();

        include ROOT . "/apps/view/layout/header.php";

        include ROOT . "/apps/view/socialnetwork/message/message.php";

        include ROOT . "/apps/view/layout/footer.php";
    }

    public function userchatof()
    {
        $acc = (new student())->getRow($_COOKIE['ttk']);
        $db = new message();
		$res = $db->selectUserChatOf($_COOKIE['ttk']);
        return $res;
    }

    public function getuser($chatid)
    {
        $acc = (new student())->getRow($_COOKIE['ttk']);
        $db = new message();
		$res = $db->getUser($chatid, $_COOKIE['ttk']);
        return $res;
    }

    public function searchuser()
    {
        $input = isset($_POST['input']) ? $_POST['input'] : null;

        $messageInstance = new Message();
        $users = $messageInstance->selectSearchUser($input);

        if ($users) {
            foreach ($users as $user) {
            ?>
                <li class="header__search-item">
                    <a href="#" class="header__item-link">
                        <?= $user['hoten'] ?>
                    </a>
                </li>
            <?php }
        } else {
        ?>
            <h3>Not Found</h3>
        <?php }
    }

    public function isEmpty($val){
		for ($i = 0; $i < strlen($val); $i++){
			if ($val[$i] != ' ') return false;
		}
		return true;
	}
}