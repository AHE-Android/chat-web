var lastRead = '2020-02-02T11:00:00.000000Z';

function readNewMessages()
{
	setInterval(function(){
		var xhr = new XMLHttpRequest();
		xhr.open("POST", "../service/loadNewMessages.php", true);
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhr.onload = ()=>{
			if(xhr.readyState != 4 || xhr.status != 200) return;
			if(xhr.responseText==false) return;
			console.log(this.responseText);
			var data = JSON.parse(xhr.responseText);
			lastRead = data['time'];
			mesBox = document.querySelector('#messages');

			data['msg'].forEach(msg => {
				if(msg['login']==login)
					mesBox.innerHTML += "<div class='msg my-msg'><b>&lt;"+msg['login']+"&gt;</b>"+msg['text']+" //"+msg['time']+"</div><br/><br/>";
				else
					mesBox.innerHTML += "<div class='msg'><b>&lt;"+msg['login']+"&gt;</b>"+msg['text']+" //"+msg['time']+"</div><br/><br/>";
			});
		};
		xhr.send("time="+lastRead);
	}, 1800);
}
readNewMessages();

var msg = document.querySelector('#input-form input[type="text"]');
function sendMessage(){
	if(msg.value == "") return;
	var xhr = new XMLHttpRequest();
	xhr.open("POST", "../service/sendMessage.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.onload = ()=>{
		if(xhr.readyState != 4 || xhr.status != 200) return;
	};
	xhr.send("message="+msg.value);
	msg.value = "";
}