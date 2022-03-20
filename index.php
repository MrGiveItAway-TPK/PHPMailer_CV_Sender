<style>
::-webkit-scrollbar {
    width: 0;
    background: transparent;
}
.container {
	display: flex;
}

#data_div {
    margin-right: 20px;
	width:80%;
} 
#sender_div {
	width:20%;
}
iframe {
	width: -webkit-fill-available;
    flex-grow: 1;
	border: none;
	margin: 0;
	padding: 0;
	height: 100%;
}
</style>
<div class="container">
	<div id="data_div">
	</div>
	
	<div id="sender_div">
	<iframe src="php/sendmail.php" ></iframe>
	</div>
</div>
<script>
function getXMLHTTP() {
var xmlhttp=false;
try{
xmlhttp=new XMLHttpRequest();
}
catch(e) {
try{
xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
}
catch(e){
try{
xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
}
catch(e1){
xmlhttp=false;
}
}
}
return xmlhttp;
}
function Show_Data() {

if (window.XMLHttpRequest) {
xmlhttp=new XMLHttpRequest();
} else {
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function() {
if (xmlhttp.readyState==4 && xmlhttp.status==200) {
document.getElementById("data_div").innerHTML=xmlhttp.response;
}
}
xmlhttp.open("GET","php/view_emails.php",true);
xmlhttp.send();
}

function B_Timer() {t = setInterval(function() {Show_Data();}, 1000);}
Show_Data();
B_Timer();
</script>