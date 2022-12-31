<?php 
require_once '../models/chatModel.php';
require_once '../DB.php';
?>
 <script>
  jQuery(document).ready(function () {
  jQuery(".chat_fb").click(function() {
    jQuery('.fchat').toggle('slow');
  });
  });
  jQuery(document).ready(function () {
  jQuery(".back-icon").click(function() {
    jQuery('.fchat').toggle('slow');
  });
  });
  </script>
  <div class="chat_wrapper">
  <?php
  if (isset($_SESSION['user_id']))
   echo '<div  class="chat_fb"> <i class="far fa-comments fa-5x"></i></div>'
  ?>
  <div class="fchat">
  <div class="wrapper">
    <section class="chat-area">
      <header>
        <?php 
          $incoming_id = '1000';
          $result = ChatModel::getContentById($incoming_id);
          $row = mysqli_fetch_assoc($result);
          $user_id = $_SESSION['user_id'];
        ?>
        <a href="login.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="../../image/<?php echo $row['image']; ?>" alt="">
        <div class="details">
          <span><?php echo $row['fullName'] ?></span>
          <p><?php if ($row['status'] == 1) echo "active now"; else echo "offline now" ; ?></p>
        </div>
      </header>
      <div class="chat-box">

      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $incoming_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>
  </div>
  </div>
<footer class="container-fluid">
    <div class="row pt-4">
      <div class="col">
      <h1>LOGO</h1>
      </div>
      <div class="col-lg-2 col-link">
        <h4>Liên kết</h4>
        <ul>
          <li><a href="../views/intro.php">Giới thiệu</a></li>
          <li><a href="#">Chính sách đổi trả</a></li>
          <li><a href="#">Chính sách bảo mật</a></li>
          <li><a href="#">Điều khoản dịch vụ</a></li>
        </ul>
      </div>

      <div class="col-lg-3 col-con">
        <h4>Thông tin liên hệ</h4>
        <ul>
          <li class="contact-1"> <span> 268 Lý Thường Kiệt, Q.10, TP.HCM</span></li>
          <li class="contact-2"> <span>0123.456.789</span></li>
          <li class="contact-3"> <span>somekind.ofmail@hcmut.edu.vn</span></li>
        </ul>
      </div>

      <div class="col">
        <h4>Mạng xã hội</h4>
        <ul>
          <li><a target="_blank" href="https://www.facebook.com/nts.926"><i class="fa-brands fa-facebook-f"></i></a></li>
          </ul>
      </div>
    </div>
    <div id="fb-root"></div>
  <!-- <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>
  <style>#cfacebook{position:fixed;bottom:0px;right:8px;z-index:999999999999999;width:250px;height:auto;box-shadow:6px 6px 6px 10px rgba(0,0,0,0.2);border-top-left-radius:5px;border-top-right-radius:5px;overflow:hidden;}#cfacebook .fchat{float:left;width:100%;height:270px;overflow:hidden;display:none;background-color:#fff;}#cfacebook .fchat .fb-page{margin-top:-130px;float:left;}#cfacebook a.chat_fb{float:left;padding:0 25px;width:250px;color:#fff;text-decoration:none;height:40px;line-height:40px;text-shadow:0 1px 0 rgba(0,0,0,0.1);background-image:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAAqCAMAAABFoMFOAAAAWlBMV…8/UxBxQDQuFwlpqgBZBq6+P+unVY1GnDgwqbD2zGz5e1lBdwvGGPE6OgAAAABJRU5ErkJggg==);background-repeat:repeat-x;background-size:auto;background-position:0 0;background-color:#3a5795;border:0;border-bottom:1px solid #133783;z-index:9999999;margin-right:12px;font-size:18px;}#cfacebook a.chat_fb:hover{color:yellow;text-decoration:none;}</style> -->
 
  </footer>
  <script src="../../javascript/chat.js"></script>