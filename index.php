<?php
if (!$link = mysql_connect('localhost', 'root', '')) {
    echo 'Could not connect to mysql';
    exit;
}

if (!mysql_select_db('survey', $link)) {
    echo 'Could not select database';
    exit;
}
//Saving answers 
if(isset($_POST['answer'])){
	//echo "<pre>";print_r($_POST);echo "</pre>";
	$u_id = $_POST['u_id'];
	foreach($_POST['answer'] as $q_id => $opt_id) {
		$values[] = " ($u_id,$q_id,$opt_id)";
	}
	$insert = "INSERT INTO `survey`.`answers` (`u_id`, `q_id`, `opt_id`) VALUES " . implode($values,', ');
	mysql_query($insert);
	echo $insert;
}

$questions = mysql_query('SELECT * FROM questions');
?>
<style>
.options label {
	min-width: 200px;
	display: inline-block;
}
</style>
<form method="post">
<?php 
if(!empty($questions)) {
	while ($q = mysql_fetch_object($questions)) { ?>
	<div class="question">
		<div class="question_title">
		<?php echo $q->q_title;?>
		</div>
		<div class="options">
		<?php
			$options = mysql_query('SELECT * FROM options WHERE opt_id IN('. $q->q_options .')');
			if(!empty($options)) {
				while ($option = mysql_fetch_object($options)) {
					
					$hits_count = mysql_num_rows(mysql_query("SELECT * FROM answers WHERE q_id = $q->q_id AND opt_id = $option->opt_id"));
					echo "<div><label><input type='radio' name='answer[$q->q_id]' value='$option->opt_id'>$option->opt_title</label> <span class='hits_count'>$hits_count</span></div>";
					
				}
			}
		?>
		</div>
	</div>
<?php }
} ?>

<input type="hidden" name="u_id" value="1">
<input type="submit" value="Submit">
</form>
