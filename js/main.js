$(document).ready(function(){
  
  
  setTimeout(function(){
    $("#main_01 .frame .left").addClass("active");
    $("#main_01 .frame .right").addClass("active");
  }, 500)

  setTimeout(function(){
    $(".left .introduce .intro_title span").addClass("active");
    $(".intro_txt").addClass("active");
    $(".left .introduce .intro_img ul li").addClass("active");
    $(".left .introduce .join_btn").addClass("active");
  }, 1500)

  setTimeout(function(){
    $(".left .introduce .intro_img ul.water_box .waterDrop").addClass("ani");
  }, 2000);


  $("#main_01 .frame .right .top .slider li").hover(function(){
    $("#main_01 .frame .right .top .slider li").removeClass("pause");   
    $(this).addClass("pause");
  },function(){
    $(this).removeClass("pause");
  });

    setInterval(function(){
      let $pause = $("#main_01 .frame .right .top .slider li").hasClass("pause");
      
      if(!$pause){
      let $first = $("#main_01 .frame .right .top .slider li").first();
      $("#main_01 .frame .right .top .slider").delay(500).animate({"margin-left":"-100%"}, 1000,function(){
        $("#main_01 .frame .right .top .slider").append($first).css("margin-left","0");
        });
      }else{
      };

     
    let $rb_pause = $("#main_01 .frame .right .bottom .slider li").hasClass("pause");
    let $h_bottom = -($("#main_01 .frame .right .bottom").height());
    if(!$rb_pause){
      let $first = $("#main_01 .frame .right .bottom .slider li").first();
      $("#main_01 .frame .right .bottom .slider").animate({"margin-top":$h_bottom+"px"}, 700 ,function(){
        $("#main_01 .frame .right .bottom .slider").append($first).css("margin-top","0");
        });
      }else{
      };
 
    let $r_pause = $(".review_box .rev_slider li").hasClass("pause");
    let $r_first = $(".review_box .rev_slider li").first();
    let $second = $(".review_box .rev_slider li").eq(2);
    let $m_left = -(100 / 3);
        if(!$r_pause){
          $(".review_box .rev_slider li").removeClass("active");
          $($second).addClass("active");
          $(".review_box .rev_slider").animate({"margin-left":+$m_left+"%"},
          1000, function(){
              $(".review_box .rev_slider").append($r_first).css("margin-left","0");
          });
          }else{

          }; 
  }, 3000);

  
  $("#main_01 .frame .right .bottom .slider li").hover(function(){
    $("#main_01 .frame .right .bottom .slider li").removeClass("pause");   
    $(this).addClass("pause");
  },function(){
    $(this).removeClass("pause");
  });

  $("#main_03 .frame .weekly_tab .weekly_tag .hash_tag li").click(function(){
    $index = $(this).index();
      $("#main_03 .frame .weekly_tab .weekly_tag .hash_tag li").removeClass("active");
      $("#main_03 .frame .weekly_tab .weekly_cont .weekly_pd").removeClass("active");
      $(this).addClass("active");      
      $("#main_03 .frame .weekly_tab .weekly_cont .weekly_pd").eq($index).addClass("active");

    return false;
  });


 
  $(".review_box .rev_slider li").hover(function(){
    $(".review_box .rev_slider li").removeClass("pause");   
    $(this).addClass("pause");
  },function(){
    $(this).removeClass("pause");
  });


  $(".video").hover(hoverVideo, hideVideo);

  function hoverVideo(e){
     $("video", this).get(0).pause();
  }
  function hideVideo(e){
     $("video", this).get(0).play();
  }


});


     

    