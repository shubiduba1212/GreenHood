$(document).ready(function(){
  $(".fav_list li .pd_info .pd_fav button").click(function(){    
    var $rel = $(this).attr("rel");
    var $code = $(this).attr("code");
    var $dataUserId = $(this).attr("data-userid");  
    console.log($code);    
      $.ajax({
        url : './myP_fav.php?num='+$rel+'&userid='+$dataUserId+'&code='+$code,
        dataType : "json",
        type : 'GET',
        cache : false,
        error : function(){
          alert("error");
        },
        success : function(data){
          console.log(data);
            //if(data.added != "added"){
            if(data[0] != "add"){          
              alert("해당 제품을 관심 목록에서 삭제했습니다.");              
            }
        }
      });
    return false;
  });

  $(".fav_list li .pd_info .pd_fav button").click(function(){
    $(this).closest("li").hide();
  });

});