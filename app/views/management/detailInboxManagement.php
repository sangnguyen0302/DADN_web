<?php
session_start();
require_once '../views/inc/head.php';
require_once '../DB.php';
require_once '../models/chatModel.php';
?>

 
<style>
	a {
		text-decoration : none;
	}
	a:hover {
		text-decoration : underline;
	}
</style>
<title>Quản trị thành viên</title>
</head>
<body>
    <?php require_once '../views/inc/sidebar.php' ?>
    <div class="d-flex flex-column p-9 text-white bg-secondary" style=" position: fixed; height:100%; top:0; left:220px; width:100%">
        <section class="chat-area-admin">
        <header>
            <?php 
            $incoming_id = $user_id;
            $result = ChatModel::getContentById($incoming_id);
            $row = mysqli_fetch_assoc($result);
            $user_id = '1000';
            ?>
            <img  src="../../image/<?php echo $row['image']; ?>" width="40px" height ="40px" margin ="0 15px" alt="">
            <div class="details">
            <span><?php echo $row['fullName'] ?></span>
            <p><?php if ($row['status'] == 1) echo "Đang hoạt động"; else echo "Đang ngoại tuyến" ; ?></p>
            </div>
        </header>
        
        <div class="chat-box-admin">  
        </div>
        <div class="typing">
        <form action="#" class="typing-area">
            <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $incoming_id; ?>" hidden>
            <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
            <button><i class="fab fa-telegram-plane"></i></button>
        </form>
        </div>
        </section>
    </div>
    </div>
    
<script src="../../javascript/chatmanagem.js"></script>
</body>
</html>