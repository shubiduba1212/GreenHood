$(document).ready(function(){
  $(".shop_contents .shop_sort button").click(function(){
      if($(this).hasClass("active")){
        $(this).removeClass("active");
        $(".shop_contents .shop_sort ul").hide();
      }else{
        $(this).addClass("active");
        $(".shop_contents .shop_sort ul").show();
      };
  }); 
  $(".shop_contents .shop_sort ul li").click(function(){
    let $sort_name = $(this).find("a").text();
    $(".shop_contents .shop_sort button .sort_name").text($sort_name);
    $(".shop_contents .shop_sort button").removeClass("active");
    $(".shop_contents .shop_sort ul").hide();
  });
  
  $(".shop_contents .shop_list li .pd_info .pd_fav button").click(function(){
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



function check_input(){
  if(!document.shop_form.brand.value){
     alert("제품 브랜드명을 작성하세요");
     document.shop_form.brand.focus();
     return;
  }
  if(!document.shop_form.product.value){
     alert("제품명을 작성하세요");
     document.shop_form.product.focus();
     return;
  }
  if(!document.shop_form.content.value){
     alert("제품 상세내용을 작성하세요");
     document.shop_form.content.focus();
     return;
  }
  if(!document.shop_form.price.value){
     alert("제품 가격을 작성하세요");
     document.shop_form.price.focus();
     return;
  }
  if(!document.shop_form.upfile.value){
     alert("제품 이미지를 업로드하세요");
     document.shop_form.upfile.focus();
     return;
  }
  if(!document.shop_form.category.value){
     alert("제품 카테고리를 지정하세요");
     document.shop_form.category.focus();
     return;
  }

  document.shop_form.submit();
}

