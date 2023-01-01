<?php require_once 'inc/head.php'; ?>
	<title>Nhận xét và đánh giá</title>
<style>
.button {
    text-decoration: none;
    appearance: none;
    background: none;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 10px 20px;
    border-radius: 8px;
    color: #212121;
    font-size: 15px;
    font-weight: 600;
    margin: 0 15px;
}

.btn-send {
    background: linear-gradient(-45deg, DodgerBlue, DeepSkyBlue, Blue);
}

.btn-send:hover {
	color: black;
    background: linear-gradient(45deg, DodgerBlue, DeepSkyBlue, Blue );
}

.btn-return {
    background: linear-gradient(-45deg, #A9A9A9, #F0FFFF, #A9A9A9);
}

.btn-return:hover {
	color: black;
    background: linear-gradient(45deg, #A9A9A9, #F0FFFF, #A9A9A9 );
}

</style>
</head>
<body>
    <div class="container my-5 py-5">
        <div class="row justify-content-center">
            <div class="col-6 bg-light p-3">
                <form action="../controllers/productMnController.php" method="post">
		            
                    <?php $productId=$_GET['productId'];?>
                    <input type="hidden" name="productId" value="<?=$productId?>">

                    <label for="" class="form-label">Đánh giá của bạn</label>
                    <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" checked name="rateValue" id="radio1" value="1">
                                <label class="form-check-label" for="radio1">
                                    <i class="fa-solid fa-star check"></i>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="rateValue" id="radio2" value="2">
                                <label class="form-check-label" for="radio2">
                                    <i class="fa-solid fa-star check"></i>
                                    <i class="fa-solid fa-star check"></i>
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="rateValue" id="radio3" value="3">
                                <label class="form-check-label" for="radio3">
                                    <i class="fa-solid fa-star check"></i>
                                    <i class="fa-solid fa-star check"></i>
                                    <i class="fa-solid fa-star check"></i>
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="rateValue" id="radio4" value="4">
                                <label class="form-check-label" for="radio4">
                                    <i class="fa-solid fa-star check"></i>
                                    <i class="fa-solid fa-star check"></i>
                                    <i class="fa-solid fa-star check"></i>
                                    <i class="fa-solid fa-star check"></i>
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="rateValue" id="radio5" value="5">
                                <label class="form-check-label" for="radio5">
                                    <i class="fa-solid fa-star check"></i>
                                    <i class="fa-solid fa-star check"></i>
                                    <i class="fa-solid fa-star check"></i>
                                    <i class="fa-solid fa-star check"></i>
                                    <i class="fa-solid fa-star check"></i>
                                </label>
                            </div>
                    </div>
                    
		            <div class="my-3 mb-5">
                        <label for="" class="form-label">Bình luận của bạn</label>
      	                <textarea class="form-control" name="user_comment"  rows="7" placeholder="Bình luận" required></textarea>
                    </div>
      	            
                    <div class="row">
                        <div class="col-6 d-flex">
                            <a class="button btn-return" href="../controllers/orderController.php?action=myOrder">Quay lại</a>
                        </div>
                        <div class="col-6 d-flex">
                            <input class="button btn-send" type="submit" name="Rate" value="Gửi nhận xét">
                        </div>
                    </div>
	            </form>
            </div>
        </div>
    </div>
	
</body>
</html>