$(document).ready(function(){
  setTimeout(function(){
    $("#header").addClass("active")
  }, 100);

  $(window).resize(function(){
    $width = $(this).width();
    console.log($width);
    if($width > 991){
      $("#header .frame #middle_menu").removeClass("active");
      $("#header .frame #middle_menu").addClass("close");
    }
  });

  $(".toggle_btn").click(function(){
    $("#header .frame #middle_menu").removeClass("close");
    $("#header .frame #middle_menu").addClass("active");
  });

  $(".menu_close_btn").click(function(){
    $("#header .frame #middle_menu").addClass("close");
    $("#header .frame #middle_menu").removeClass("active");
  })



  $("#header .frame #middle_menu .main_menu > li").hover(function(){
      $(this).find("ul").stop().slideDown();
  }, function(){
      $(this).find("ul").stop().slideUp();
  });



});

