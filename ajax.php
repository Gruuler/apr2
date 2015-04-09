<script type="text/javascript">
var createXMLHttp = function(){
  //job of this function is to create an XMLHttpRequest object
  //window.XMLHttpRequest is defined in Chrome, Safari, Firefox, Opera
  if(window.XMLHttpRequest){
      xHttp = new XMLHttpRequest();
  }else{
      //ActiveXObjext is what Microsoft uses and API names are different across IE versions. 
      xHttp = new ActiveXObject("Microsoft/XMLHttp");
  } 
  return xHttp;
}

var $ = function(x){
  return document.getElementById(x);
}
var callAjax = function(){
  var sTerm = $("sTerm").value;
  //We did not use document.getElementsByTagName here because we did not want to get options from other list boxes such as "something else"
  //By using $("sCat") we are getting options that are child to sCat node
  //var options stores the array of all the options in the list box sCat
  var options = $("sCat").getElementsByTagName("option");
  var countCat = options.length;
  var sCat = "";
  for(i=0;i<countCat;i++){
    //var opt points to the node option. the first time loop runs it points to the 1st option and so on
    var opt = options[i];
    //if an option is selected opt.selected would return true. next, we store its value in var sCat and break the loop
    if(opt.selected){
        sCat=opt.value;
        break;
    }
  }
  //alert(sTerm +"  " + sCat);
  var url = "search.php?sTerm="+sTerm+"&sCat="+sCat;
  
  //creates XMLHttpRequest object
  var xmlHttp = createXMLHttp();
  //XMLHttpRequest object makes asynchronous call to webservice--search.php
  xmlHttp.open("GET",url);
  //send function does not take parameters when method is get, and you will append parameters to the url
  //send function takes parameters when method is post, and you will not append parameters to the url
  xmlHttp.send();
  var results="";
 //onreadystatechange gets called anytime the state of your XMLHttpRequest changes from 0 to 4. 
 //state 4 suggests that JS has received results from the service
  xmlHttp.onreadystatechange = function(){
      if(xmlHttp.readyState == 4){
         //responseText will return you the response from the service.
         //JSON.parse changes JSON response to an array
         var rows = JSON.parse(xmlHttp.responseText);
         for(i=0; i<rows.length; i++){
              results= results+"<br>"+rows[i]["id"]+" "+rows[i]["name"]+" "+rows[i]["price"];
         }
         $("results").innerHTML=results;
      }   

  }

}

window.onload=function(){
  $("sTerm").onkeyup = callAjax;
}
</script>
<select name="somethingElse" id="somethingElse">
  <option value='test'>asdf</option>
</select>
<form method="get" action="">
Search <input type='text' name='sTerm' id='sTerm'>
<select name='sCat' id='sCat'>
  <option value='0'>All</option>
  <option value='1'>Books</option>
  <option value='2'>Movies</option>
</select>
<input type='submit' value='Go'>
</form>
<div id='results'></div>