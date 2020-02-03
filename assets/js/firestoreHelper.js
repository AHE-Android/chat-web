var lastRead = 0;//Math.round((new Date()).getTime()/1000);

document.querySelector('#loadNew').addEventListener('click', function(){
	var xhr = new XMLHttpRequest();
	xhr.open("POST", "../service/loadNewMessages.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.onload = ()=>{
		if(xhr.readyState != 4 || xhr.status != 200) return;
		mesBox = document.querySelector('#messages');
		alert(xhr.responseText);
		mesBox.innerHTML += xhr.responseText;
	};
	xhr.send("time="+lastRead);
});

var msg = document.querySelector('#input-form input[type="text"]');

function sendMessage(){
	var xhr = new XMLHttpRequest();
	xhr.open("POST", "../service/sendMessage.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.onload = ()=>{
		if(xhr.readyState != 4 || xhr.status != 200) return;
	};
	xhr.send("message="+msg.value);
}