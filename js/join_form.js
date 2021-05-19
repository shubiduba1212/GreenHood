function check_input(){
  if(!document.join_form.id.value){ 
      alert("아이디를 입력하세요.");
      document.join_form.id.focus();
      
      return;  
  }

  //비밀번호 작성여부 확인
  if(!document.join_form.pass.value){
      alert("비밀번호를 입력하세요.");
      document.join_form.pass.focus();
      return;
  }
  //비밀번호확인 작성여부 확인
  if(!document.join_form.pass_confirm.value){
      alert("비밀번호 확인을 입력하세요.");
      document.join_form.pass_confirm.focus();
      return;
  }
  //이름 작성여부 확인
  if(!document.join_form.name.value){
      alert("이름을 입력하세요.");
      document.join_form.name.focus();
      return;
  }
  //비밀번호와 비밀번호 확인 입력값의 일치여부를 확인
  if(document.join_form.pass.value != document.join_form.pass_confirm.value){
      alert("비밀번호와 비밀번호 확인이 일치하지 않습니다.");
      document.join_form.pass.focus();
      return;
  }
  document.join_form.submit();
}


function reset_form(){
  document.join_form.id.value = "";  
  document.join_form.pass.value = "";
  document.join_form.pass_confirm.value = "";
  document.join_form.name.value = "";
  document.join_form.id.focus();
  return;
}


function check_id(){
  window.open("join_check_id.php?id="+document.join_form.id.value, "checkID", "width=500, height=250");

  
}