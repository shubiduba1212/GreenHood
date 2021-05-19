<?php
  session_start();

  if(isset($_SESSION['userid'])){
    $userid = $_SESSION['userid'];
  }else{
    $userid = "";
  }
  if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
  }else{
    $username = "";
  }
  if(isset($_SESSION['userlevel'])){
    $userlevel = $_SESSION['userlevel'];
  }else{
    $userlevel = "";
  }
  if(isset($_SESSION['userpoint'])){
    $userpoint = $_SESSION['userpoint'];
  }else{
    $userpoint = "";
  }
  
?>
  <div id="header">
    <div class="frame">
      <div class="logo">
        <a href="./index.php"></a>
      </div>
      <div id="middle_menu">
        <div class="menu_close_btn">
          <a href="#">×</a>
        </div>
        <ul class="main_menu">
          <li><a href="#">ABOUT</a>
              <ul>
                <li><a href="./about.php">Green Hood</a></li>
                <li><a href="./notice_list.php">Notice</a></li>
                <li><a href="./article_list.php">Article</a></li>
              </ul> 
          </li>
          <li><a href="./shop_list.php?sort=num">SHOPPING</a></li>
          <li><a href="./class_list.php?sort=num">CLASS</a></li>
          <li><a href="./event_list.php">EVENT</a></li>
        </ul>
        <div class="search">
          <div class="label">
            <label for="search" name="search"></label>
          </div>
          <div class="input">
            <input type="text" name="search" placeholder="검색어를 입력하세요">
          </div>
          <div class="s_icon">
            <a href="#"></a>
          </div>
        </div>
        <div class="right_menu">
          <ul class="icon_menu">
          <?php
  if(!$userid){
?>        
            <li><a href="./join_form.php"><span class="join"></span><strong>JOIN</strong></a></li>
            <li><a href="./login_form.php"><span class="login"></span ><strong>LOGIN</strong></a></li>
            <li><a href="./cart_list.php"><span class="cart"></span><strong>0</strong></a></li>
<?php
  }else{
            if($userlevel=="Admin"){
?>  
            <li><a href="./logout.php"><span class="logout"></span><strong>LOGOUT</strong></a></li>            
            <li><a href="./admin.php?menu=member"><span class="admin"></span><strong>관리자</strong></a></li>
<?php            
            }else{
?>          
            <li><a href="./logout.php"><span class="logout"></span><strong>LOGOUT</strong></a></li>  
            <li><a href="./myPage.php?id=<?=$userid?>"><span class="my"></span><strong>MY</strong></a></li>
<?php
    include "./db_con.php";
    $sql = "select * from cart where id='$userid' order by num desc";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    $count = mysqli_num_rows($result); 
    if(!$row){
      $count = "0";
    }else{
      $count;
    }
?>          
            <li><a href="./cart_list.php"><span class="cart"></span><strong><?=$count?></strong></a></li>
<?php
            }
    }
?>
          </ul>
        </div>
      </div>
      <div class="toggle_btn">
        <a href="#">
          <span></span>
          <span></span>
          <span></span>
        </a>
      </div>
    </div>
  </div>