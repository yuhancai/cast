<h2>
	Editing <span class='muted'>Item</span>
</h2>
<br>

<?php echo render('item/_form'); ?>
<p>
	<?php echo Html::anchor('item/view/'.$item->id, 'View'); ?> |
	<?php echo Html::anchor('item', 'Back'); ?></p>
