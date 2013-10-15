<?php include "inc/header.php"; ?>

<div class="sixteen columns">
		<?php include "inc/notification.php"; ?>
	<div class="box clearfix">
			<?php 
			$task = 'get_all_front';
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
				$('.notification').click(function(){
					$(this).fadeOut();
				})
			})
		</script>
<?php include "inc/footer.php"; ?>
