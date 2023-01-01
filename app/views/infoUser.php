<?php 
    session_start();
    require_once("inc/head.php");
    require_once("../DB.php");
 ?>
<link type="text/css" rel="stylesheet" href= "../../css/profile.css">
<title>Thông tin tài khoản</title>
</head>
<?php
    if(isset($_GET['user_id'])){
        $user_id= $_GET['user_id'];
        $db = DB::getInstance();
        $sql = "SELECT * FROM users WHERE id='$user_id'";
        $result = mysqli_query($db->con, $sql); 
        if(!$result){
            echo mysqli_error($db->con);
        }
        $value = $result->fetch_assoc();
?>

<style>
.button {
    appearance: none;
    background: none;
    border: none;
    outline: none;
    cursor: pointer;

    padding: 5px 10px;
    border-radius: 8px;
    color: #212121;
    font-size: 15px;
    font-weight: 300;
    margin: 0 15px;
    transition: 0.4s;
}

.btn-change {
    color: #FFF;
    background-color: #68A0DE;
    box-shadow: inset 0 -8px 0 0 rgba(0, 0, 0, 0.2);
    transition: 0.1s;
    text-shadow: 0 3px rgba(0, 0, 0, 0.2);
}

.btn-change:hover {
    box-shadow: inset 0 -6px 0 0 rgba(0, 0, 0, 0.2);
}

.btn-change:active {
    box-shadow: inset 0 -1px 0 0 rgba(0, 0, 0, 0.2);
}

.btn-update {
    position: relative;
}

.btn-update:after, .btn-update:before {
    content: '';
    position: absolute;
    width: 0;
    height: 0;
    transition: all 0.4s, opacity 0.1s 0.4s;
    opacity: 0;
}

.btn-update:after {
    bottom: 0;
    right: 0;
    border-bottom: 3px solid #212121;
    border-right: 3px solid #212121;
}

.btn-update:before {
    top: 0;
    left: 0;
    border-left: 3px solid #212121;
    border-top: 3px solid #212121;
}

.btn-update:hover:after, .btn-update:hover:before {
    width: 100%;
    height: 100%;
    transition: 0.4s; opacity: 0.1s;
    opacity: 1;
}
</style>

<body>
    <?php require_once 'inc/nav.php'; ?>
    <div class="container-md my-5 px-5">
        <h3>Thông tin tài khoản</h3>
        <div class="container-fluid px-3 bg-light">
            <div class="row">
                <div class="col-md-6 self-info border border-2 border-start-0 border-top-0 border-bottom-0 py-3">
                    <h5>Thông tin cá nhân</h5>
                    <div class="avatar text-center">
                        <?php
                            if($value['image']==''){
                                echo '<img src="../../image/default-avatar.png" class="rounded-circle" width="200px" height="200px">';
                            }else{
                                echo '<img src="../../image/'.$value['image'].'" class="rounded-circle" width="200px" height="200px">';
                            }
                        ?>
                    </div>
                        <form action="../controllers/infoController.php" method="POST" enctype="multipart/form-data">
                            <div class="text-center my-3">
                            <input type="file" name="image" accept="image/jpg, image/jpeg, image/png">
                            </div>
                            <input type="hidden" name="user-id" value=<?=$user_id?>>
                            <!--input class="btn btn-outline-secondary" type="submit" name="change-avt" value="Đổi ảnh đại diện"-->

                            <div class="mb-3 fullName">
                                <label for="" class="input-label">Họ và tên</label>
                                <input type="text" name="change-fullname" id="fullname" value="<?= $value['fullName'] ?>">
                            </div>

                            <div class="mb-3 birthDate">
                                <label for="" class="input-label">Ngày sinh</label>
                                <input type="date" name="change-dob" value="<?=$value['dob']?>"/>
                            </div>
                        
                            <div class="mb-3 address">
                                <label for="" class="input-label">Địa chỉ</label>
                                <input type="text" name="change-address" id="address" value="<?= $value['address'] ?>">
                            </div>
                        
                        <!--p class="card-text">Mã số tài khoản: <,?php echo $value['id'];?></p-->
                            <div class="mb-3 address">
                                <label for="" class="input-label"></label>
                                <button class="button btn-change" type="submit" name="change-avt">Lưu thay đổi</button>
                            </div>
                            
                        </form>
                        
                </div>

                <div class="col-md-6 self-contact py-3">
                    <div class="contact mb-3">
                    <h5>Thông tin liên hệ</h5>
                        <ul class="list-group">
                            <li class="phoneli">
                                <form action="../controllers/infoController.php" method="post" enctype="multipart/form-data">
                                <div class="py-1 phone-num ms-4 d-flex">
                                    <div>
                                        <span>Số điện thoại</span> <br>
                                        <input class="form-control-plaintext" type="text" name="phone" value="<?= $value['phone']?>">
                                        <input type="hidden" name="user-id-phone" value="<?=$user_id?>">
                                    </div>
                                    <div class="text-end flex-fill">
                                        <button type="submit" class="button btn-update" name="change-phone-user">Cập nhật</button>
                                    </div>
                                </div>
                                <?php 
                                        if(isset($_GET['messagephone'])&&$_GET['messagephone']!=""){
                                        ?>
                                        <span class="text-danger"><?php echo $_GET['messagephone']?></span>
                                        <?php
                                            }       
                                        ?>
                                </form>
                            </li>

                            <li class="emaili">
                            
                                <form action="../controllers/infoController.php" method="post">
                                <div class="py-1 email d-inline-block ms-4 d-flex">
                                    <div>
                                        
                                        <span>Địa chỉ email</span> <br>
                                        <input class="form-control-plaintext" type="text" name="new-email" value="<?= $value['email'] ?>">
                                        <input type="hidden" name="user-id-email" value="<?=$user_id?>">
                                    </div>
                                    <div class="text-end flex-fill">
                                        <button type="submit" class="button btn-update" name="change-email-user">Cập nhật</button>
                                    </div>
                                </div>
                                <?php 
                                        if(isset($_GET['message'])&&$_GET['message']!=""){
                                        ?>
                                        <span class="text-danger"><?php echo $_GET['message']?></span>
                                        <?php
                                            }       
                                        ?>
                                </form>
                                
                            </li>
                        </ul>
                    </div>

                    <div class="security mb-3">
                    <h5>Bảo mật</h5>
                        <ul class="list-group">
                            <li class="lockli">
                            <div class="py-2 pwd d-inline-block ms-4 d-flex">
                                <div>
                                    <span>
                                        Thiết lập mật khẩu
                                    </span>
                                    <div class="card card-body collapse" id="collapsepwd">

                                        <?php
                                        if(isset($_POST['submit-change-pass'])){
                                            $id = $_POST['user_id'];
                                            $sql="SELECT * FROM users WHERE id='$id'";
                                            $result= mysqli_query($db->con, $sql);
                                            $value=$result->fetch_assoc();
                                            $new_pass=$_POST['new-pass'];
                                            if($_POST['old-pass']!=$value['password']){
                                                $message="Sai mật khẩu";
                                            }else if($_POST['new-pass']!=$_POST['confirm-pass']){
                                                $message="Mật khẩu xác nhận không khớp";
                                            }else if(strlen($_POST['new-pass'])<6 || strlen($_POST['new-pass'])>15){
                                                $message="Mật khẩu không hợp lệ";
                                            }else{
                                                $sql = "UPDATE users SET password='$new_pass' WHERE id='$id'";
                                                $result= mysqli_query($db->con, $sql);
                                                if($result){
                                                    echo "Change password successfully";
                                                }else{
                                                    echo mysqli_error($db->con);
                                                }
                            
                                            }
                                        }
                                        ?>
                                        <form action="" method="POST" >
                                            <?php
                                                if(isset($message)){
                                                echo "<span class='text-danger'>".$message.'</span>';
                                                }
                                            ?>
                                            <input type="hidden" name="user_id" value="<?=$user_id?>">
                                            <!--input type="hidden" name="change-pass" value="Đổi mật khẩu"-->
                                            <div class="mb-2 old-pwd">
                                                <label for="">Mật khẩu hiện tại :</label>
                                                <input class="form-control" type="password" name="old-pass" placeholder="Mật khẩu hiện tại" required>
                                            </div>

                                            <div class="mb-2 new-pwd">
                                                <label for="">Mật khẩu mới :</label>
                                                <input class="form-control" type="password" name="new-pass" placeholder="Mật khẩu mới" required>
                                            </div>
                                            
                                            <div class="mb-2 confirm-pwd">
                                                <label for="">Nhập lại mật khẩu mới :</label>
                                                <input class="form-control" type="password" name="confirm-pass" placeholder="Nhập lại mật khẩu mới" required>
                                            </div>
                                            <input class="button btn-change" type="submit" name="submit-change-pass" value="Xác nhận">
                                        </form>
                                    </div> 
                                </div>
                                <div class="text-end flex-fill">
                                        <a href="#collapsepwd" class="btn border border-2" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapsepwd">Đổi mật khẩu</a>
                                </div>
                            </div>
                            </li>
                        </ul>
                    </div>

                    <div class="role">
                    <h5>Tư cách</h5>
                        <ul class="list-group">
                            <li class="roleli">
                                <form action="">
                                <div class="py-1 rol d-inline-block ms-4 d-flex">
                                    <div>
                                    <select name="roleId" id="roleID" class="form-control-plaintext">
				                        <?php
                                            if($value['roleId']== 1 ) {
                                        ?>
                                            <option value="1" selected>Quản trị viên</option>
                                            <option value="2">Khách hàng</option>
                                        <?php } else {
                                        ?>
                                            <option value="1">Quản trị viên</option>
                                            <option value="2" selected>Khách hàng</option>
                                        <?php } ?>
			                        </select>
                                    </div>
                                    <div class="text-end flex-fill">
                                        <button type="submit" class="button btn-update">Cập nhật</button>
                                    </div>
                                </div>
                                </form>
                            
                            </li>
                        </ul>
                    </div>
                    
                </div>

            </div>
        </div>
    </div>
                
               
            </div>
        </div>
        </div>
        <?php require_once 'inc/footer.php'; ?>

</body>
<?php } ?>
</html>

