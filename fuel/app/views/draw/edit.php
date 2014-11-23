<h2>
	Editing <span class='muted'>Draw</span>
</h2>
<br>

<?php echo render('draw/_form'); ?>
<p>
	<?php echo Html::anchor('draw/view/'.$draw->id, 'View'); ?> |
	<?php echo Html::anchor('draw', 'Back'); ?></p>
