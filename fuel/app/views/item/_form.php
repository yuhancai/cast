<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Itemname', 'itemname', array('class'=>'control-label')); ?>

				<?php echo Form::input('itemname', Input::post('itemname', isset($item) ? $item->itemname : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Itemname')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Itemtype', 'itemtype', array('class'=>'control-label')); ?>

				<?php echo Form::input('itemtype', Input::post('itemtype', isset($item) ? $item->itemtype : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Itemtype')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Itemabbr', 'itemabbr', array('class'=>'control-label')); ?>

				<?php echo Form::input('itemabbr', Input::post('itemabbr', isset($item) ? $item->itemabbr : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Itemabbr')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>