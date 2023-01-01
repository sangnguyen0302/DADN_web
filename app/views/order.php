<?php
	require_once '../views/inc/head.php';
	require_once '../DB.php';
	$db=new DB();
	$user= $db->getInstance();
?>
<title>Đơn hàng của tôi</title>

<style>
.button {
	display: inline-block;
    appearance: none;
    background: none;
    border: none;
    outline: none;
    cursor: pointer;
	text-decoration: none;

    padding: 5px 10px;
    border-radius: 8px;
    color: #212121;
    font-size: 15px;
    font-weight: 600;
    margin: 0 15px;
    transition: 0.4s;
}

.btn-evaluate {
	color: black;
	border: 3px solid #68DEA0;
	background-image: linear-gradient(to top, transparent 50%, #68DEA0 50%);
	background-size: 100% 200%;
	background-position: 0% 100%; 
}

.btn-evaluate:hover {
	color: #FFF;
	background-position: 0% 0%;
}

.btn-next {
	color: black;
	border: 3px solid #FFCE00;
	background-image: linear-gradient(to right, transparent 50%, #FFCE00 50% );
	background-size: 200%;
	background-position: 0%;
}

.btn-next:hover {
	color: #FFF;
	background-position: 100%;
}

</style>

</head>
<body>
	<?php require_once '../views/inc/nav.php' ?>
	<div class="container-fluid mb-5 py-5">
	<div class="container mb-5 p-3">
		<h4>Đơn hàng của tôi</h4>
			<?php
				if(count($list)>0){  
					$total=0;
			?>
			
				<?php foreach ($list as $key => $value) {
                    $total=0;
					$count=0;
					$sum =0;
					?>
					<div class="table-responsive-xxl bg-light mb-5">
					<table id = "order_table" class="table table-hover">
						<thead class="text-center align-middle">
						<tr>
							<!--th>STT</th-->
							<th class="text-start">Sản phẩm</th>
							<th>Giá</th>
							<th>Số lượng</th>
							<th>Tạm tính</th>					
						</tr>
						</thead>

						<tbody class="text-center align-middle">
							<?php
								$orderId=$value['id'];
								$sql = "SELECT * FROM order_details WHERE orderId='$orderId'";
								$result=mysqli_query($user->con,$sql);
								while($value2=$result->fetch_assoc()){
                                    $sum = 0;
									$productId=$value2['productId'];
									$sql="SELECT * FROM products WHERE id='$productId'";
									$result2 = mysqli_query($user->con, $sql);
									$prod = $result2->fetch_assoc(); 
							?>
						
							<tr>
						<!--td><,?php echo ++$count; ?></td-->
								<td class="text-start">
									<div>
										<div>
										<?php
											echo "<img src='../../image/".$prod['image']."' alt='Ảnh sản phẩm' width='100px' height='100px'>";
											echo "<span class='d-inline-block ms-3'>".$prod['name']."</span>";
										?>
										</div>
								

									<?php  
                                    if(empty($value2['comment'])){
										$productId=$prod['id'];
									?>
										<a class="button btn-evaluate" href="../controllers/orderController.php?action=rateComment&id=<?=$productId?>">Viết nhận xét và đánh giá</a>
									<?php 
									}
									?>
									</div>
								</td>
								<td><?php echo  number_format($prod['originalPrice'],0)." VND"; ?></td>
								<td><?php echo  $value2['productQty']; ?></td>
								<td><?php 
                                $sum = $prod['originalPrice']*$value2['productQty'];
								$total +=$sum;
                                echo  number_format($sum)." VND"; ?></td>              
							</tr>

							<?php
								}
                                
							?>
						</tbody>

						<tfoot class="text-center align-middle">
						<tr>
            				<td></td>
            				<td></td>
            				<td>Tổng tiền</td>
            				<td class="text-danger fs-5"><?= number_format($total, 0, '', ',') ?>VND</td>
        				</tr>
						</tfoot>
					</table>
					</div>
				<?php
				}
        		?>
	
				 <div class="text-end">
				 <a class="button btn-next" href="../views/home.php">Tiếp tục mua hàng</a>
				 </div>
				
	
		<?php  
			}else{
		?> 
				<div class="text-center">
					<img src="../../image/mascot2x.png" alt="..">
					<h6>Bạn không có đơn hàng nào</h6>
					<a class="button btn-next"href="../views/home.php">Đi mua sắm</a>
				</div>
	<?php
		}
	?>
		
	</div>
	</div>

	
	<?php require_once '../views/inc/footer.php' ?>
</body>
</html>