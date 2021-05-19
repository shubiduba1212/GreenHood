$(document).ready(function(){

  $(".cl_view_box .cl_bottom_bx").hover(function(){
    $(".cl_view_box .cl_bottom_bx .cl_bottom").hover(function(){
        $image = $(this).find("a").css("background-image");
        $(".cl_view_box .cl_top").css("background-image", $image);
    }, function(){

    });
  }, function(){
    $(".cl_view_box .cl_top").css("background-image","url('http://jyejye.dothome.co.kr/project/img/mask_class01.jpg')");
  });

  $(".class_contents .class_sort button").click(function(){
      if($(this).hasClass("active")){
        $(this).removeClass("active");
        $(".class_contents .class_sort ul").hide();
      }else{
        $(this).addClass("active");
        $(".class_contents .class_sort ul").show();
      };
  }); 
  $(".class_contents .class_sort ul li").click(function(){
    let $sort_name = $(this).find("a").text();
    $(".class_contents .class_sort button .sort_name").text($sort_name);
    $(".class_contents .class_sort button").removeClass("active");
    $(".class_contents .class_sort ul").hide();
  });

  $(".pd_fav button").click(function(){
    var $fav = $(this).attr("class");
    console.log($fav);
    if($fav == "unfav"){
      $(this).removeClass($fav);
      $(this).addClass("faved"); 
    }else{
      $(this).removeClass($fav);
      $(this).addClass("unfav");
    }
  });


  
});



function check_input(){
  if(!document.class_form.title.value){
     alert("클래스 타이틀을 작성하세요");
     document.class_form.title.focus();
     return;
  }
  if(!document.class_form.tutor.value){
     alert("클래스 강사명을 작성하세요");
     document.class_form.tutor.focus();
     return;
  }
  if(!document.class_form.sub.value){
     alert("클래스 서브 타이틀을 작성하세요");
     document.class_form.sub.focus();
     return;
  }
  if(!document.class_form.content.value){
     alert("클래스 상세 내용을 작성하세요");
     document.class_form.content.focus();
     return;
  }
  if(!document.class_form.price.value){
     alert("클래스 가격을 작성하세요");
     document.class_form.price.focus();
     return;
  }
  if(!document.class_form.upfile.value){
     alert("클래스 이미지를 업로드하세요");
     document.class_form.upfile.focus();
     return;
  }
  if(!document.class_form.category.value){
     alert("클래스 카테고리를 설정하세요");
     document.class_form.category.focus();
     return;
  }

  document.class_form.submit();
}