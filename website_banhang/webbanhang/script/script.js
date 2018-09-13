function myfunction(){

//document.getElementById("clickme").innerHTML = " hello world " ;
window.alert("hello world") ;
//document.write(5+6);
}

function login(){

var text1,text2 ;

function login1(){
var x1,x2;
x1=document.getElementById("name").value;
if(isNaN(x1)) text1="nhap lai" ;
x2=document.getElementById("password").value;
if(isNaN(x2)) text2="nhap lai" ;
}
login1();
document.getElementById("comment1").innerHTML = text1;
document.getElementById("comment2").innerHTML = text2;
}
