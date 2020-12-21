<h2>Editing <span class='muted'>Chat_test</span></h2>
<br>

<?php echo render('chat/test/_form'); ?>
<p>
	<?php echo Html::anchor('chat/test/view/'.$chat_test->id, 'View'); ?> |
	<?php echo Html::anchor('chat/test', 'Back'); ?></p>
