function check_input(){
  if(!document.event_form.title.value){
     alert("이벤트 타이틀을 작성하세요");
     document.event_form.title.focus();
     return;
  }
  if(!document.event_form.sub.value){
     alert("이벤트 서브 타이틀을 작성하세요");
     document.event_form.sub.focus();
     return;
  }
  if(!document.event_form.content.value){
     alert("클래스 상세 내용을 작성하세요");
     document.event_form.content.focus();
     return;
  }
  if(!document.event_form.upfile.value){
     alert("클래스 이미지를 업로드하세요");
     document.event_form.upfile.focus();
     return;
  }

  document.event_form.submit();
}
