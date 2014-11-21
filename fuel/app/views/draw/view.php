<h2>Viewing <span class='muted'>#<?php echo $draw->id; ?></span></h2>

<p>
	<strong>Qishu:</strong>
	<?php echo $draw->qishu; ?></p>
<p>
	<strong>Luckynum:</strong>
	<?php echo $draw->luckynum; ?></p>
<p>
	<strong>Begin at:</strong>
	<?php echo $draw->begin_at; ?></p>
<p>
	<strong>Lucky at:</strong>
	<?php echo $draw->lucky_at; ?></p>
<p>
	<strong>Open at:</strong>
	<?php echo $draw->open_at; ?></p>
<p>
	<strong>Itemid:</strong>
	<?php echo $draw->itemid; ?></p>

<?php echo Html::anchor('draw/edit/'.$draw->id, 'Edit'); ?> |
<?php echo Html::anchor('draw', 'Back'); ?>