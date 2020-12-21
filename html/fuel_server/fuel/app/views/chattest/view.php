<h2>Viewing <span class='muted'>#<?php echo $chattest->id; ?></span></h2>

<p>
	<strong>Id:</strong>
	<?php echo $chattest->id; ?></p>
<p>
	<strong>Name:</strong>
	<?php echo $chattest->name; ?></p>
<p>
	<strong>Published at:</strong>
	<?php echo $chattest->published_at; ?></p>
<p>
	<strong>Body:</strong>
	<?php echo $chattest->body; ?></p>

<?php echo Html::anchor('chattest/edit/'.$chattest->id, 'Edit'); ?> |
<?php echo Html::anchor('chattest', 'Back'); ?>