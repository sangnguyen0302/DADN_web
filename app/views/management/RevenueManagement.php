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
<title>Thống kê doanh số</title>
</head>
<body>

<?php require_once '../views/inc/sidebar.php'; ?>

 <main style="margin-left: 220px" class="p-3">
 <div class="container-fluid my-5 bg-light py-3">
	<h4>Thống kê doanh số 123</h4>
	<div class="table-responsive-lg">
	<div class="input-group">
            <input type='text' id='search' class="form-control search-form" placeholder="Tìm theo mã sản phẩm">
            <span class="input-group-btn" style="width:39px">
              <button id="search-this"type="button" class="pull-right btn btn-default search-btn">
                  <i class="fa fa-search"></i>
              </button>
            </span>
          </div>
	<table id = "table" class="table table-hover">
		<?php 
			$count=0;
		?>
		<thead class="text-center align-middle">
		<tr>
			<td>Mã sản phẩm</td>
			<td>Tên sản phẩm</td>
			<td>Số lượng đã bán</td>
			<td>Doanh số</td>

		</tr>
		</thead>

		<tbody class="text-center align-middle">
		<?php 
			foreach ($productsList as $key => $value) {
        ?>
		<tr>
			
			<td><?php echo ++$count ?></td>
			<!--td><,?php echo $value['id']; ?></td-->
			<td class="text-start">
				<img src="../../image/<?= $value['image'] ?>" alt="." width="50px" height="50px">
				<?php echo $value['name']; ?>
			</td>
			<td><?php echo $value['soldCount']; ?></td>
			<td><?php echo $value['promotionPrice']*$value['soldCount']; ?></td>
			
		</tr>

		<?php  
			}
		?>
		</tbody>




	</table>
	</div>
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