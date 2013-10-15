<?php include "inc/header.php"; ?>
<div class="sixteen columns">
	<div class="box clearfix" id="login">
		<h3>You need to login in to manage questions</h3>
		<form method="post" action="admin.php?task=login" >
				<div class="input">
					<label for="pwd">Password: </label>
					<input type="password" name="pwd" id="pwd" >
				</div>
				<input type="submit" name="submit" value="Login">
		</form>
	</div>
</div>
<?php include "inc/footer.php"; ?>
