$(document).ready(function(){

  $(".pd_fav button").click(function(){    
    var $rel = $(this).attr("rel");
    var $dataUserId = $(this).attr("data-userid"); 
    var $code = $(this).attr("cate");
    console.log($code); 
    if($dataUserId.length < 1){   
      alert("로그인 후 이용 바랍니다");
      location.href="./login_form.php";
    }else{       
      $.ajax({
        url : './fav.php?num='+$rel+'&userid='+$dataUserId+'&code='+$code,
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
            //if(data.added != "added"){
            if(data[0] != "add"){          
              alert("해당 제품을 관심 목록에서 삭제했습니다.");              
            }else{
              alert("해당 제품을 관심 목록에서 추가했습니다.");
            }
        }
      });
    return false;
    }
  });
});  