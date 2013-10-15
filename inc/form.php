<?php //echo "<pre>"; print_r($question); echo "</pre>";?>

<form action="admin.php?task=save" method="post">
	<fieldset>
		<label for="regularTextarea">Regular Textarea</label>
		<textarea id="regularTextarea" name="title"><?php echo (isset($question['title']))?$question['title']:'';?></textarea>
		<input type="hidden" name="id" value="<?php echo (isset($question['id']))?$question['id']:'new';?>">
		<div>
			<strong>Options:</strong>
		</div>
		<ol class="options">
		<?php if(!empty($question['options'])): ?>
			<?php foreach ($question['options'] as $option): ?>
				<li>
					<input name="options[]" type="text" value="<?php echo $option; ?>">  <a href="#remove" class="button remove">-</a>
				</li>
			<?php endforeach; ?>

		<?php else: ?>
				<li>
					<input name="options[]" type="text">
				</li>
		<?php endif; ?>
				
		</ol>
		<a href="#add_more" class="button add_more">Add more options</a>
	</fieldset>
	<button type="submit">Save</button>
</form>
