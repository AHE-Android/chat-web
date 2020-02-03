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
?>

<div id="messages"></div>

<button id="loadNew">Load New Messages</button>

<div id="input">
	<form id="input-form" method="POST" onsubmit="sendMessage();return false">
		<input type="text" name='message' autocomplete="off"/>
		<input type="submit" value="Wyślij"/>
	</form>
</div>

<script src="../../assets/js/firestoreHelper.js"></script>