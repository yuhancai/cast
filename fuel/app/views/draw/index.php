<h2>
	Listing <span class='muted'>Draws</span>
</h2>
<br>
<?php if ($draws): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Qishu</th>
			<th>Luckynum</th>
			<th>Begin at</th>
			<th>Lucky at</th>
			<th>minutes</th>
			<th>Open at</th>
			<th>Itemid</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($draws as $item): ?>		<tr>

			<td><?php echo $item->qishu; ?></td>
			<td><?php echo $item->luckynum; ?></td>
			<td><?php echo $item->begin_at; ?></td>
			<td><?php echo $item->lucky_at; ?></td>
			<td><?php echo Model_Draw::caculateDiffByMinutes($item->begin_at, $item->lucky_at); ?></td>
			<td><?php echo $item->open_at; ?></td>
			<td><?php echo $item->itemid; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('draw/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-small')); ?>						<?php echo Html::anchor('draw/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-small')); ?>						<?php echo Html::anchor('draw/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-small btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Draws.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('draw/create', 'Add new Draw', array('class' => 'btn btn-success')); ?>

</p>
