<h2>Editing <span class='muted'>Chattest</span></h2>
<br>

<?php echo render('chattest/_form'); ?>
<p>
	<?php echo Html::anchor('chattest/view/'.$chattest->id, 'View'); ?> |
	<?php echo Html::anchor('chattest', 'Back'); ?></p>
