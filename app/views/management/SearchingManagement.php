<?php 
	require_once '../views/inc/head.php';
?>
<style>
#content {
  padding: 25% 25% 5%;  
}

.search-form {
  border-radius: 30px 0 0 30px;
}

.input-group {
  width:100%;
}

.input-group-btn {
  max-width:38px;
}

#search {
  border: 1px;
}

.search-btn {
  cursor:pointer;
  border-radius: 0 30px 30px 0; 
  background-color:#fff;
  color:#669;
}
</style>
<title>Tìm kiếm sản phẩm theo mã</title>
</head>
<body>

<?php require_once '../views/inc/sidebar.php'; ?>

 <main style="margin-left: 220px" class="p-3">
	<h3>Tìm kiếm sản phẩm theo mã</h3>

    <div class="container">
      <div id="content">
        <form class='form-inline'>
          <div class="input-group">
            <input type='text' id='search' class="form-control search-form" placeholder="Nhập mã sản phẩm">
            <span class="input-group-btn" style="width:39px">
              <button id="search-this"type="button" class="pull-right btn btn-default search-btn">
                  <i class="fa fa-search"></i>
              </button>
            </span>
          </div>
        </form> 
        
    </div>
  </div>
	
</body>
</html>