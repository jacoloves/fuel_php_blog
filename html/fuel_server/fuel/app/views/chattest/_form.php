<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Id', 'id', array('class'=>'control-label')); ?>

				<?php echo Form::input('id', Input::post('id', isset($chattest) ? $chattest->id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Name', 'name', array('class'=>'control-label')); ?>

				<?php echo Form::input('name', Input::post('name', isset($chattest) ? $chattest->name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Name')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Published at', 'published_at', array('class'=>'control-label')); ?>

				<?php echo Form::input('published_at', Input::post('published_at', isset($chattest) ? $chattest->published_at : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Published at')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Body', 'body', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('body', Input::post('body', isset($chattest) ? $chattest->body : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Body')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>