<?php
$fs = new Firestore('messages');

$messages = $fs->getDocuments();
foreach ($messages as $msg){
	if($msg['login']==$_SESSION['login']){
		echo "
			<div class='msg my-msg'>
				<b>&lt;".$msg['login']."&gt;</b>: ".$msg['text']." //".$msg['time']."
			</div><br/><br/>
		";
	} else {
		echo "
			<div class='msg'>
				<b>&lt;".$msg['login']."&gt;</b>: ".$msg['text']." //".$msg['time']."
			</div><br/><br/>
		";
	}
}


echo "<br/><br/>";

echo '<button id="loadNew">Load New Messages</button>';
?>

<div id="input">
	<form>
		<input type="text"/>
		<input type="submit" value="Wyślij">
	</form>
</div>


<script>
var lastRead = 0;//Math.round((new Date()).getTime()/1000);
console.log(lastRead);

$('#loadNew').click(function(){
	$.ajax({
	  url: "../service/loadNewMessages.php",
	  contentType: "application/x-www-form-urlencoded; charset=utf-8",
	  data: {time: lastRead},
	  method: "POST",
	  async:false
	}).done(function(res){
	  	$('#content').html(res);
	 	});
})
</script>