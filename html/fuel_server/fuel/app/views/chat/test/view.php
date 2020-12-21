<h2>Viewing <span class='muted'>#<?php echo $chat_test->id; ?></span></h2>

<p>
	<strong>Id:</strong>
	<?php echo $chat_test->id; ?></p>
<p>
	<strong>Name:</strong>
	<?php echo $chat_test->name; ?></p>
<p>
	<strong>Published at:</strong>
	<?php echo $chat_test->published_at; ?></p>
<p>
	<strong>Body:</strong>
	<?php echo $chat_test->body; ?></p>

<?php echo Html::anchor('chat/test/edit/'.$chat_test->id, 'Edit'); ?> |
<?php echo Html::anchor('chat/test', 'Back'); ?>