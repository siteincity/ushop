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
			<div class="form-group md-form">
				{{ Form::label('title', 'Наименование') }}
				{{ Form::text('title', null, ['class' => 'form-control']) }}	
			</div>
			
			<div class="switch">
			    {{-- {{ Form::checkbox('published', 1, true, ['id' => 'published']) }} --}}
			    {{-- {{ Form::label('published', 'Публиковать?') }} --}}
			    <label>
			        Нет
			        <input type="checkbox" name="published[]" value="1" checked>
			        <span class="lever"></span>
			        Да
			    </label>
			</div>

			{{-- <div class="form-group">
				<label>Blue select</label>
				<select class="app-input__select colorful-select dropdown-default">
				    <option value="1">Option 1</option>
				    <option value="2">Option 2</option>
				    <option value="3">Option 3</option>
				    <option value="4">Option 4</option>
				    <option value="5">Option 5</option>
				</select>
			</div> --}}
			

			

		</div>
		<div class="tab-pane app-tab-pane" id="tab-attributes">
				
		</div>
		
	</div>
	
	{{-- Form:control:bottom --}}
	<div class="container-fluid">
		<div class="form-group">
			{{ Form::button('Сохранить', ['type'=>'submit','class' => 'btn btn-success btn-md']) }}	
		</div>	
	</div>
	

</section>

