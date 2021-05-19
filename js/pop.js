$(document).ready(function(){
	$("#dark, #popup .close").click(function(){
		$("#popup").removeClass("active");
		$("#dark").removeClass("active");
	});
});


function setCookie(name, value, expirehours){
	var todayDate = new Date();
	todayDate.setHours(todayDate.getHours() + expirehours);  
	document.cookie = name + "=" + escape(value) + "; path=/; expires=" + todayDate.toGMTString() + ";"
	
}

function todayClosePop(){
	setCookie("ncookie", "done", 1);  
	document.getElementById("popup").setAttribute("class", ""); 
	document.getElementById("dark").setAttribute("class", ""); 
}

cookiedata = document.cookie;
if(cookiedata.indexOf("ncookie=done") < 0){  
	document.getElementById("popup").setAttribute("class", "active");  
	document.getElementById("dark").setAttribute("class", "active"); 
}else{ 
	document.getElementById("popup").setAttribute("class", "");   
	document.getElementById("dark").setAttribute("class", ""); 
}