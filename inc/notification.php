<?php 
if(isset($_SESSION['flash_message'])) {
	echo '<div class="notification" title="Click to close">' . $_SESSION['flash_message'] .'</div>';
	unset($_SESSION['flash_message']);
}
?>
