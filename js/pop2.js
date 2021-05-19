$(document).ready(function(){
	$("#dark2, #popup2 .close").click(function(){
		$("#popup2").removeClass("active");
		$("#dark2").removeClass("active");
	});
});


function setCookie(name, value, expirehours){
	var todayDate = new Date();
	todayDate.setHours(todayDate.getHours() + expirehours);  
	document.cookie = name + "=" + escape(value) + "; path=/; expires=" + todayDate.toGMTString() + ";"
	
}

function todayClosePop2(){
	setCookie("ncookie", "done", 1);  
	document.getElementById("popup2").setAttribute("class", ""); 
	document.getElementById("dark2").setAttribute("class", ""); 
}


cookiedata = document.cookie;
if(cookiedata.indexOf("ncookie2=done") < 0){   
	document.getElementById("popup2").setAttribute("class", "active"); 
	document.getElementById("dark2").setAttribute("class", "active"); 
}else{  
	document.getElementById("popup2").setAttribute("class", ""); 
	document.getElementById("dark2").setAttribute("class", ""); 
}