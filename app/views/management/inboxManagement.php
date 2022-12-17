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
	<main style="margin-left: 220px" class="p-3">
    <div class="wrapper">
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

  <script src="../../javascript/users.js"></script>

	</main>

</body>
</html>