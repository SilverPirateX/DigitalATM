<?php if(count($errors2) > 0): ?>
	<?php //displaying the errors mechanism ?>
	<div class="error2">
		<?php foreach ($errors2 as $error): ?>
			<p><?php echo $error; ?></p>
		<?php endforeach ?>
	</div>
<?php endif ?>