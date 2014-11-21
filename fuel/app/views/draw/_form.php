<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Qishu', 'qishu', array('class'=>'control-label')); ?>

				<?php echo Form::input('qishu', Input::post('qishu', isset($draw) ? $draw->qishu : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Qishu')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Luckynum', 'luckynum', array('class'=>'control-label')); ?>

				<?php echo Form::input('luckynum', Input::post('luckynum', isset($draw) ? $draw->luckynum : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Luckynum')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Begin at', 'begin_at', array('class'=>'control-label')); ?>

				<?php echo Form::input('begin_at', Input::post('begin_at', isset($draw) ? $draw->begin_at : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Begin at')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Lucky at', 'lucky_at', array('class'=>'control-label')); ?>

				<?php echo Form::input('lucky_at', Input::post('lucky_at', isset($draw) ? $draw->lucky_at : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Lucky at')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Open at', 'open_at', array('class'=>'control-label')); ?>

				<?php echo Form::input('open_at', Input::post('open_at', isset($draw) ? $draw->open_at : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Open at')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Itemid', 'itemid', array('class'=>'control-label')); ?>

				<?php echo Form::input('itemid', Input::post('itemid', isset($draw) ? $draw->itemid : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Itemid')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>