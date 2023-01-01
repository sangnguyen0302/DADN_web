<?php 
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
<title>Quản trị sản phẩm</title>
<script src="https://code.jquery.com/jquery-3.6.1.js"></script>
</head>
<body>

<?php require_once '../views/inc/sidebar.php'; ?>

 <main style="margin-left: 220px" class="p-3">
  <div class="container-fluid my-5 bg-light py-3">
	<h4>Danh sách sản phẩm</h4>
	<div class="table-responsive-lg">
	<div class="input-group">
            <input type='text' id='search' class="form-control search-form" placeholder="Tìm theo mã sản phẩm">
            <span class="input-group-btn" style="width:39px">
              <button id="search-this"type="button" class="pull-right btn btn-default search-btn">
                  <i class="fa fa-search"></i>
              </button>
            </span>
          </div>
	<table class="table table-hover" id = "table">
		<?php 
			$count=0;
		?>
		<thead class="text-center align-middle">
		<tr>
			<td>Mã sản phẩm</td>
			<!--td>Id</td-->
			<td>Tên sản phẩm</td>
			<td>Giá gốc</td>
			<td>Giá bán</td>
			<td>Ngày tạo</td>
			<td>Tồn kho</td>
			<!--td>Mô tả</td-->
			<!--td>Trạng thái</td-->
			<td>Đã bán</td>
			<td>Thao tác</td>

		</tr>
		</thead>

		<tbody class="text-center align-middle">
		<?php 
			$result = $product->searchKey("");
			$productsList= $result->fetch_all(MYSQLI_ASSOC);
			foreach ($productsList as $key => $value) {
				
        ?>
		<tr>
			
			<td><?php echo ++$count ?></td>
			<!--td><,?php echo $value['id']; ?></td-->
			<td class="text-start">
				<img src="../../image/<?= $value['image'] ?>" alt="." width="50px" height="50px">
				<?php echo $value['name']; ?>
			</td>
			<td><?php echo $value['originalPrice']; ?></td>
			<td><?php echo $value['promotionPrice']; ?></td>
			<td><?php echo $value['createdDate']; ?></td>
			<td><?php echo $value['qty']; ?></td>
			<!--td><,?php echo $value['des']; ?></td-->
			<!--td><,?php echo $value['status']; ?></td-->
			<td><?php echo $value['soldCount']; ?></td>
			<td>
				<a href="../controllers/productMnController.php?action=editInfor&id=<?php echo $value['id'] ?>">Sửa thông tin</a><br>
				<a class="text-danger" href="../controllers/productMnController.php?action=remove&id=<?php echo $value['id'] ?>">Xóa</a>
			</td>
		</tr>

		<?php  
			}
		?>
		</tbody>


	</table>
	</div>
	
	<div class="text-end">
	<a class="btn btn-primary text-decoration-none" href="../controllers/productMnController.php?action=add">Thêm sản phẩm</a>
  </main>
<script type="text/javascript"> 
var $rows = $('#table tr');
			$('#search').keyup(function() {
			var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
			
			$rows.show().filter(function() {
				//var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
				var text = ($(this)[0].getElementsByTagName("td")[0].innerText).replace(/\s+/g, ' ').toLowerCase(); 
				if (text == "mã sản phẩm") return !true;
				else return !~text.indexOf(val);
			}).hide();
		});
</script>	

	
</body>
</html>