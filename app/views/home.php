<?php 
    session_start();
    require_once  '../views/inc/head.php';
    require_once("../DB.php");
    require_once '../models/ProductModel.php';
 ?>

<title>Trang chủ</title>

</head>

<body>
        <?php require_once("inc/nav.php"); ?>
        <!-- Carousel-->
        <div id="thecarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#thecarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#thecarousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#thecarousel" data-bs-slide-to="2"></button>
                <button type="button" data-bs-target="#thecarousel" data-bs-slide-to="3"></button>
                <button type="button" data-bs-target="#thecarousel" data-bs-slide-to="4"></button>
            </div>

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://www.satyaday.com/wp-content/uploads/2020/04/165-1656705_e-commerce-news-online-shopping-wallpaper-hd.jpg" alt="First slide" class="d-block w-100" height="500px">
                </div>
                <div class="carousel-item">
                    <img src="http://tyinternety.cz/wp-content/uploads/2017/04/e-commerce.jpg" alt="Second slide" class="d-block w-100" height="500px">
                </div>
                <div class="carousel-item">
                    <img src="https://i0.wp.com/themommydictionary.com/wp-content/uploads/2018/03/free-vector-fashion-shopping-01-vector_000527_fashion_shopping_01_vector.jpg?fit=3898%2C1598&ssl=1" alt="Third slide" class="d-block w-100" height="500px">
                </div>
                <div class="carousel-item">
                    <img src="https://wallpapercave.com/wp/wp5470800.jpg" alt="Third slide" class="d-block w-100" height="500px">
                </div>
                <div class="carousel-item">
                    <img src="https://i.pinimg.com/originals/be/f6/81/bef6819812d0bdd5731a22a7040eae48.png" alt="Third slide" class="d-block w-100" height="500px">
                </div>
            </div>

            <button type="button" class="carousel-control-prev" data-bs-target="#thecarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button type="button" class="carousel-control-next" data-bs-target="#thecarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>


        
    <!-- product card grid-->
    <div class="container my-5">
    <div class="row row-cols-2 row-cols-md-3 g-4">
        <!--<span class="row row-cols-2 row-cols-md-3 g-4">ABC</span>-->
            <?php 
			    // Fetching the products from the JSON file 
                $prod = new ProductModel();

                // Look for a GET variable page if not found default is 1.        
                if (isset($_GET["page"])) {    
                    $page  = $_GET["page"];    
                }    
                else {    
                    $page=1;    
                }
                if(isset($_GET['search-submit'])){
                    $key = $_GET['search-key'];
                    $result=$prod->getPageandSearch($page,$key);
                    if($result&&mysqli_num_rows($result)>0){
                        
                    }else{
                        echo "<div class='message'>Không tồn tại sản phẩm tìm kiếm</div>";
                    }
                } else{
                    if(isset($_GET['cateid'])){
                        $result=$prod->getPageandCateid($page,$_GET['cateid']);
                    }
                    else{
                        $result = $prod->getPage($page);
                    }
                }
                if($result){
                    while($data=$result->fetch_assoc()) 
			    {
				?>
					<!-- The product element -->
					<div class="col">
                        <div class="card h-100 text-center">
					<!-- The products image -->
                        <a href="javascript:App.navigateTo('../controllers/orderController.php?action=viewDetail&id=<?=$data['id']?>')">
                        <div class="zoom">
                            <img src="<?php echo "../../image/".$data['image'] ?>" class="card-img-top" alt="...">
                        </div>
                        </a>
					<!-- The products name -->
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $data['name'] ?></h5>
						<!--p class="name"><,?php echo $data['name'] ?></p-->
					<!-- The products price formatted with two decimals  -->
                            <p class="card-text text-danger"><?php echo number_format($data['originalPrice']) ?> VNĐ</p>
						    <!--p class="price">$<,?php echo number_format($data['originalPrice'], 2) ?></p-->
					<!-- The add cart button -->
                            <?php 
                                if(!isset($_SESSION['user_id'])){
                                    $url = "../controllers/script.php?store-product-id=".$data['id'];
                                }else{
                                    $url = "../controllers/script.php?store-product-id-user=".$data['id'];
                                }
                                
                            ?>
						    <a class="btn-add btn-buy" onclick="sendTo('<?=$url?>')"' >Thêm vào giỏ hàng</a> 
                        </div>
                        </div>
					</div> <!-- End of product element -->
				<?php				
			}
            }     
		 ?>
        </div> <!-- End of products -->

        <nav aria-label="Page navigation" class="my-3 text-dark">
            <ul class="pagination justify-content-center">
            <?php  
                if(isset($_GET['cateid'])){
                    $result=$prod->getByCateid($_GET['cateid']);
                }
                else if(isset($_GET['search-submit'])){
                    $key=$_GET['search-key'];
                    $result=$prod->searchKey($key);
                }
                else{
                    $result = $prod->getAll();
                }
                $total_records = mysqli_num_rows($result);    
          
                $per_page_record = 6;
                $total_pages = ceil($total_records / $per_page_record);    
                $pagLink = "";
                if($page >= 2) {      
            ?>
                <li class="page-item">
                <a class="page-link" href="javascript:App.navigateTo('home.php?page=<?=($page-1) ?>')"><i class="fa-solid fa-chevron-left"></i></a>
                </li> 
            
            <?php 
                }
                for ($i=1; $i<=$total_pages; $i++) {   
                    if ($i == $page) {   
                    $pagLink .= "<li class='page-item active'><a class = 'page-link' href='home.php?page="  
                                                .$i."'>".$i." </a></li>";   
                }               
                else  {   
                    $pagLink .= "<li class='page-item'><a class = 'page-link' href='home.php?page="  
                                                .$i."'>".$i." </a></li>";     
                }   
                };     
                echo $pagLink;   
  
                if($page<$total_pages) {
                ?>
                <li class="page-item">
                <a class="page-link" href="javascript:App.navigateTo('home.php?page=<?=($page+1) ?>')"><i class="fa-solid fa-chevron-right"></i></a>
                </li>
                <?php } ?>
            </ul>
        </nav>    
    </div>
             
        <?php require_once("inc/footer.php"); ?>
</body>
</html>