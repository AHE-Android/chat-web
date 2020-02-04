var lastRead = '2020-02-02T11:00:00.000000Z';//Math.round((new Date()).getTime()/1000);

document.querySelector('#loadNew').addEventListener('click', function(){
	var xhr = new XMLHttpRequest();
	console.log(lastRead);
	xhr.open("POST", "../service/loadNewMessages.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.onload = ()=>{
		if(xhr.readyState != 4 || xhr.status != 200) return;
		console.log(this.responseText);
		var data = JSON.parse(xhr.responseText);
		lastRead = data['time']; //data.time;
		console.log(lastRead);
		//console.log(data['msg'][0]['text']);
		mesBox = document.querySelector('#messages');

		data['msg'].forEach(msg => {
			mesBox.innerHTML += "<div class='msg'><b>&lt;"+msg['login']+"&gt;</b>"+msg['text']+" //"+msg['time']+"</div><br/><br/>";
		});
		// mesBox.innerHTML += data['msg'].time;
	};
	xhr.send("time="+lastRead);
});

var msg = document.querySelector('#input-form input[type="text"]');
function sendMessage(){
	if(msg.value == "") return;
	var xhr = new XMLHttpRequest();
	xhr.open("POST", "../service/sendMessage.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.onload = ()=>{
		if(xhr.readyState != 4 || xhr.status != 200) return;
		msg.value = "";
	};
	xhr.send("message="+msg.value);
}