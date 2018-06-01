<section class="app-content app-content-form">
	<ul class="nav nav-tabs">
		<li class="nav-item">
			<a class="nav-link app-nav-link active" data-toggle="tab" href="#tab-description">Общее</a>
		</li>
		<li class="nav-item">
			<a class="nav-link app-nav-link" data-toggle="tab" href="#tab-attributes">Характеристики</a>
		</li>
	</ul>
	<div class="tab-content card">
		<div class="tab-pane show active app-tab-pane" id="tab-description">
			
			{{-- Tab:description --}}	
			<div class="form-group md-form">
				{{ Form::label('title', 'Наименование') }}
				{{ Form::text('title', null, ['class' => 'form-control']) }}	
			</div>
			
			<div class="form-group md-form">
			    {{ Form::select('published', ['1'=>'Да','0'=>'Нет'], null, ['id' => 'published', 'class' => 'app-input__select colorful-select dropdown-default']) }}
				{{ Form::label('published', 'Публиковать?') }}
			</div>

		</div>
		<div class="tab-pane app-tab-pane" id="tab-attributes">
				
		</div>

		{{-- Form:control:bottom --}}
		<div class="container-fluid">
			<div class="form-group">
				{{ Form::button('Сохранить', ['type'=>'submit','class' => 'btn btn-success btn-md']) }}	
			</div>	
		</div>

	</div>
	
	
	

</section>

