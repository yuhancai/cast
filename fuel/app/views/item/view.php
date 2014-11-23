<h2>
	Viewing <span class='muted'>#<?php echo $item->id; ?></span>
</h2>

<p>
	<strong>Itemname:</strong>
	<?php echo $item->itemname; ?></p>
<p>
	<strong>Itemtype:</strong>
	<?php echo $item->itemtype; ?></p>
<p>
	<strong>Itemabbr:</strong>
	<?php echo $item->itemabbr; ?></p>

<?php echo Html::anchor('item/edit/'.$item->id, 'Edit'); ?> |
<?php echo Html::anchor('item', 'Back'); ?>