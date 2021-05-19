function check_input(){
  if(!document.login_form.id.value){ 
      alert("아이디를 입력하세요.");
      document.login_form.id.focus();
      
      return;  
  }

  //비밀번호 작성여부 확인
  if(!document.login_form.pw.value){
      alert("비밀번호를 입력하세요.");
      document.login_form.pw.focus();
      return;
  }
  document.login_form.submit();
}  

$(document).ready(function(){
  $("#header .frame #middle_menu .main_menu > li").hover(function(){
    $(this).find("ul").stop().slideDown();
  }, function(){
      $(this).find("ul").stop().slideUp();
  });

  $(".login_box").keypress(function(event){
    var $keyCode = event.keyCode;
    if($keyCode == 13){
        check_input();
    }
  });
})

function kakao(){
  window.open("https://accounts.kakao.com/login?continue=https%3A%2F%2Fkauth.kakao.com", "kakaotalk 로그인", "width=400, height=500, top=100, left=100")
}
function naver(){
  window.open("https://nid.naver.com/nidlogin.login?mode=form&url=https%3A%2F%2Fwww.naver.com", "kakaotalk 로그인", "width=400, height=500, top=100, left=100")
}
function fbook(){
  window.open("https://www.facebook.com/login.php?", "kakaotalk 로그인", "width=400, height=500, top=100, left=-100")
}


