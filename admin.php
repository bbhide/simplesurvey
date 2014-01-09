<?php
include "inc/header.php";
if(!isset($_SESSION['username'])) {
	@header('location:login.php');
}
?>
<div class="sixteen columns">
	<div class="box clearfix">
		<?php 
			$task = 'get_all';
			if(isset($_GET['task'])) {
				$task = $_GET['task'];
			}
			$mysurvey->process($task);
		?>
	</div>
</div>
	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script type="text/javascript">
		jQuery(function ($) {
			$('.add_more').click(function(e){
				e.preventDefault();
				$('.options').append('<li><input name="options[]" type="text"></li>');
				return false;
			});

			$('.remove').click(function(e){
				e.preventDefault();
				$(this).parents('li').remove();
				return false;
			})
		})
	</script>
<?php include "inc/footer.php"; ?>
