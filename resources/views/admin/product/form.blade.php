<section class="app-content app-content-form">
	<ul class="nav nav-tabs app-nav-tabs">
		<li class="nav-item">
			<a class="nav-link app-nav-link active" data-toggle="tab" href="#tab-description">Общее</a>
		</li>
		<li class="nav-item">
			<a class="nav-link app-nav-link" data-toggle="tab" href="#tab-attributes">Характеристики</a>
		</li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane show active app-tab-pane" id="tab-description">
			
			{{-- Tab:description --}}	
			<div class="form-group">
				{{ Form::label('title', 'Наименование') }}
				{{ Form::text('title', null, ['class' => 'form-control']) }}	
			</div>
			
			<div class="form-group">
				{{ Form::label('published', 'Публикация') }}
				{{ Form::checkbox('published', '1', true) }}	
			</div>

			<div class="form-group">
				{{ Form::button('Сохранить', ['type'=>'submit','class' => 'btn btn-danger']) }}	
			</div>

		</div>
		<div class="tab-pane app-tab-pane" id="tab-attributes">
				
		</div>
		
	</div>
</section>