<div id="messages"></div>

<div id="input">
	<form id="input-form" method="POST" onsubmit="sendMessage();return false">
		<input type="text" name='message' autocomplete="off"/>
		<input type="submit" value="Wyślij"/>
	</form>
</div>

<script>
	var login = "<?php echo $_SESSION['login'] ?>";
</script>
<script src="../../assets/js/firestoreHelper.js"></script>