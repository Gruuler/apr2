<script type="text/javascript">
var $ = function(x){
	return document.getElementById(x);
}
var createXMLHttp = function(){
	//job of this function is to create an XMLHttpRequest object
	if(window.XMLHttpRequest){
		xHttp = new XMLHttpRequest();
	}else{
		xHttp = new ActiveXObject("Microsoft/XMLHttp");
	}
	return xHttp;
}
var checkHandle = function(){
	var xHttp = createXMLHttp();
	var user = $("userId").value;
	var url = 'taskCheck.php?user='+user;
	xHttp.open("GET",url);
	xHttp.send();
	xHttp.onreadystatechange=function(){
		if(xHttp.readyState==4){
			if(xHttp.responseText==1){
				$("userErrorId").innerHTML = "Username is not available";
			}else{
				$("userErrorId").innerHTML = "Username is available";
			}
		}
		
	}
	
}

window.onload=function(){
  $("userId").onblur= checkHandle;	
}
</script>
<form method="post" action="">
<label for='userId'>User</label>
<input type='text' name='user' id='userId'>
<span id='userErrorId'></span>
</form>