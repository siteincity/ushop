<section class="app-content app-content-form">
	
	{{-- Tabs:Nav --}}
	<ul class="nav nav-tabs">
		<li class="nav-item">
			<a class="nav-link app-nav-link active" data-toggle="tab" href="#tab-description">Общее</a>
		</li>
		<li class="nav-item">
			<a class="nav-link app-nav-link" data-toggle="tab" href="#tab-attributes">Характеристики</a>
		</li>
	</ul>

	{{-- Tabs --}}
	<div class="tab-content card">

		{{-- Tab:description --}}	
		<div class="tab-pane show active app-tab-pane" id="tab-description">
				
			<div class="form-group md-form">
				{{ Form::select('group_id', $groupGetList, null, ['id' => 'group_id', 'class' => 'app-input__select colorful-select dropdown-default', $disabled]) }}	
				{{ Form::label('group_id', 'Тип товара') }}
			</div>
			
			<div class="form-group md-form">
				{{ Form::label('title', 'Наименование') }}
				{{ Form::text('title', null, ['class' => 'form-control']) }}	
			</div>
			
			<div class="form-group md-form">
			    {{ Form::select('published', ['1'=>'Да','0'=>'Нет'], null, ['id' => 'published', 'class' => 'app-input__select colorful-select dropdown-default']) }}
				{{ Form::label('published', 'Публиковать?') }}
			</div>

		</div>

		{{-- Tab:attributes --}}
		<div class="tab-pane app-tab-pane" id="tab-attributes">
			
			attributes	

		</div>


		{{-- Form:control:bottom --}}
		<div class="container-fluid">
			<div class="form-group">
				{{ Form::button('Сохранить', ['type'=>'submit','class' => 'btn btn-success btn-md']) }}	
			</div>	
		</div>
		{{-- <button type="button" 
			class="btn btn-danger btn-delete" 
			data-url="{{ route('product.destroy', ['id' => $product->id]) }}">
			<i class="fa fa-minus-circle"></i> Удалить
		</button> --}}

	</div>
	
	
	

</section>

