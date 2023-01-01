<?php
session_start();
 require_once '../views/inc/head.php'; 
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
  <div class="d-flex flex-column p-9 text-black bg-secondary" style=" position: fixed; height:100%; top:0; left:220px; width: 85%">
    <div class="chat-users-admin">
    <section class="users">
      <header>
        <div class="content">
          <img src="../../image/<?php echo $row['image']; ?>" alt="">
          <div class="details">
            <span><?php echo $row['fullName'] ?></span>
            <p><?php 
            if( $row['status']=='1') echo "Đang hoạt động";
            else echo "Đang ngoại tuyến" ?></p>
          </div>
        </div>
      </header>
      <div class="search">
        <span class="text">Select an user to start chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
  
      </div>
    </section>
  </div>

 
  </div>
  <script src="../../javascript/users.js"></script>
</body>
</html>