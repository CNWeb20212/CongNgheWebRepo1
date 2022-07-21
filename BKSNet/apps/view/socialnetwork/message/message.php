<style type="text/css">
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .container {
        margin: 16px;
        position: relative;
        max-width: 100%;
        width: 1396px;
        height: calc(88vh - 40px);
        background: #fff;
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.06), 0 2px 5px 0 rgba(0, 0, 0, 0.06);
        display: flex;
    }

    .leftSide {
        position: relative;
        flex: 30%;
        background: #fff;
        border-right: 1px solid rgba(0, 0, 0, 0.2);
    }

    .rightSide {
        position: relative;
        flex: 70%;
        background: #e5ddd5;
    }

    .container .rightSide::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url('/BKSNet/img/message.jpg');
        opacity: 0.06;
    }

    .heading {
        position: relative;
        width: 100%;
        height: 60px;
        background: #ededed;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 15px;
    }

    .userimg {
        position: relative;
        width: 40px;
        height: 40px;
        overflow: hidden;
        border-radius: 50%;
        cursor: pointer;
    }

    .cover {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: none;
    }

    .nav_icons {
        display: flex;
    }

    .nav_icons li {
        display: flex;
        list-style: none;
        cursor: pointer;
        color: #51585c;
        font-size: 1.5rem;
        margin-left: 22px;
    }

    .search_chat {
        position: relative;
        width: 100%;
        height: 50px;
        background: #f6f6f6;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0 15px;
    }

    .search_chat div {
        width: 100%;
    }

    .search_chat input {
        width: 100%;
        outline: none;
        border: none;
        background: #fff;
        padding: 6px;
        height: 38px;
        border-radius: 30px;
        font-size: 14px;
        padding-left: 40px;
    }

    .search_chat input::placeholder {
        color: #bbb;
    }

    .search_chat ion-icon {
        position: absolute;
        left: 30px;
        top: 14px;
        font-size: 1.2rem;
    }

    .header__search-history {
        position: absolute;
        top: 44px;
        left: 12px;
        right: 0px;
        z-index: 300;
        display: none;
        max-width: calc(100% - 30px);
        border-radius: 20px;
        background-color: #f5f5f5;
    }

    .search_input:focus~.header__search-history {
        display: block !important;
    }

    .header__search-list {
        width: 100%;
        margin: 0;
        display: flex;
        list-style: none;
        padding: 13px 10px;
        flex-direction: column;
        align-items: flex-start;
        justify-content: center;
    }

    .header__search-item {
        width: 100%;
        display: flex;
        padding: 8px 10px;
        border-radius: 4px;
        align-items: center;
        justify-content: flex-start;
    }

    .header__search-item:hover {
        background-color: #a8b3b9;
    }

    .header__item-link {
        flex: 1;
        font-size: 1.1rem;
        text-decoration: none;
        color: rgba(0, 0, 0, 0.85);
    }

    .chatlist {
        position: relative;
        height: calc(100% - 110px);
        overflow-y: auto;
    }

    .chatlist .block {
        position: relative;
        width: 100%;
        display: flex;
        align-items: center;
        padding: 15px;
        border-bottom: 1px solid rgba(0, 0, 0, 0.06);
        cursor: pointer;
    }

    .chatlist .block.active {
        background: #ebebeb;
    }

    .chatlist .block:hover {
        background: #f5f5f5;
    }

    .chatlist .block .imgbx {
        position: relative;
        min-width: 45px;
        height: 45px;
        overflow: hidden;
        border-radius: 50%;
        margin-right: 10px;
    }

    .chatlist .block .details {
        position: relative;
        width: 100%;
    }

    .chatlist .block .details .listHeader {
        display: flex;
        justify-content: space-between;
        margin-bottom: 5px;
    }

    .chatlist .block .details .listHeader h4 {
        font-size: 1.1em;
        font-weight: 600;
        color: #111;
    }

    .chatlist .block .details .listHeader .time {
        font-size: 0.75em;
        color: #aaa;
    }

    .message_p {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .message_p p {
        color: #aaa;
        display: -webkit-box;
        -webkit-line-clamp: 1;
        font-size: 0.9em;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .message_p b {
        background: #06d755;
        color: #fff;
        min-width: 20px;
        height: 20px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 0.75em;
    }

    .imgText {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .imgText h4 {
        font-weight: 500;
        line-height: 1.4em;
        margin-left: 15px;
    }

    .chatBox {
        position: relative;
        width: 100%;
        height: calc(100% - 120px);
        padding: 50px;
        overflow-y: auto;
    }

    .message {
        position: relative;
        display: flex;
        width: 100%;
        margin: 5px 0;
    }

    .message p {
        position: relative;
        right: 0;
        text-align: right;
        max-width: 65%;
        padding: 12px;
        background: #dcf8c6;
        border-radius: 10px;
    }

    .message p::before {
        content: '';
        position: absolute;
        top: 0;
        right: -12px;
        width: 20px;
        height: 20px;
        background: linear-gradient(135deg, #dcf8c6 0%, #dcf8c6 50%, transparent 50%, transparent);
    }

    .my_message {
        justify-content: flex-end;
    }

    .frnd_message {
        justify-self: flex-start;
    }

    .frnd_message p {
        background: #fff;
        text-align: left;
    }

    .message.frnd_message p::before {
        content: '';
        position: absolute;
        top: 0;
        left: -12px;
        width: 20px;
        height: 20px;
        background: linear-gradient(225deg, #fff 0%, #fff 50%, transparent 50%, transparent);
    }

    .chatbox_input {
        position: relative;
        width: 100%;
        height: 60px;
        background: #f0f0f0;
        padding: 15px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .chatbox_input ion-icon {
        cursor: pointer;
        font-size: 1.8em;
        color: #51585c;
    }

    .chatbox_input ion-icon:nth-child(1) {
        margin-right: 15px;
    }

    .chatbox_input input {
        position: relative;
        width: 90%;
        margin: 0 20px;
        padding: 10px 20px;
        border: none;
        outline: none;
        border-radius: 30px;
        font-size: 1em;
    }

</style>
<div class="container">
    <?php include ROOT . "/apps/view/socialnetwork/message/sidebarMessageView.php" ?>
    <?php include ROOT . "/apps/view/socialnetwork/message/detailMessageView.php" ?>
</div>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>