$(document).ready(function(){

  $(".cart_btn").click(function(){
    var $rel = $(this).attr("rel");
    var $dataUserId = $(this).attr("data-userid"); 
    var $price = $(this).attr("price"); 
    var $code = $(this).attr("cate"); 
    console.log($rel);
    console.log($dataUserId);
    console.log($price);
    console.log($code);
    if(!$dataUserId){   
      alert("로그인 후 이용 바랍니다");
      location.href="./login_form.php";
    }else{   
      $.ajax({
        url : './cart_insert.php?num='+$rel+'&userid='+$dataUserId+'&price='+$price+'&code='+$code,
        dataType : "json",
        type : 'GET',
        cache : false,
        error : function(){
          alert("error");
        },
        success : function(data){
            console.log(data);
            console.log(data[0]);
            console.log(data[1]);
            if(data[0] != "added"){
              $(".icon_menu li:last a strong").text(data[1]);
              alert("해당 클래스가 장바구니에 담겼습니다.");              
            }else{
              alert("해당 클래스는 이미 장바구니에 추가되었습니다.");
            }
        }
      });
    return false;
    }
  });

  $(".pd_fav button").click(function(){
    var $fav = $(this).attr("class");
    
    if($fav == "unfav"){
      $(this).removeClass($fav);
      $(this).addClass("faved"); 
    }else{
      $(this).removeClass($fav);
      $(this).addClass("unfav");
    }
  });


});