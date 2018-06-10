<section class="app-content app-content-form">
	
	{{-- Tabs:Nav --}}
	<ul class="nav nav-tabs">
		<li class="nav-item">
			<a class="nav-link app-nav-link active" data-toggle="tab" href="#tab-description">Общее</a>
		</li>
		<li class="nav-item">
			<a class="nav-link app-nav-link " data-toggle="tab" href="#tab-features">Характеристики</a>
		</li>
	</ul>

	{{-- Tabs --}}
	<div class="tab-content">

		{{-- Tab:description --}}	
		<div class="tab-pane show active app-tab-pane" id="tab-description">	

			<div class="form-group">
				{{ Form::label('group_id', 'Группа') }} 
				{{ Form::select('group_id', $groupGetList, null, ['id' => 'group_id', 'class' => 'app-input__select form-control']) }}		
			</div>
			
			<div class="form-group">
				{{ Form::label('title', 'Наименование') }}
				{{ Form::text('title', null, ['class' => 'form-control']) }}	
			</div>
			
			<div class="form-group">
				{{ Form::label('published', 'Публиковать?') }}
			    {{ Form::select('published', ['1'=>'Да','0'=>'Нет'], null, ['id' => 'published', 'class' => 'app-input__select form-control']) }}
			</div>

		</div>

		{{-- Tab:features --}}
		<div class="tab-pane app-tab-pane" id="tab-features">
			
			@foreach ($features as $feature)
				
				<div class="form-group">

					@include('admin.widget.form.label', ['name' => $feature->slug, 'value' => $feature->caption])

					@switch($feature->type)
						@case('select') 
				            @include('admin.widget.form.select', [
				            	'name' => 'features['.$feature->type.'][]',
				            	'options' => $feature->values->pluck('value','id'),
				            	'values' => $product->values->where('feature_id', $feature->id)->pluck('id'),
				            ])  
					    @break
					    
					    @case('multiselect')
							@include('admin.widget.form.select', [
				            	'name' => 'features['.$feature->type.'][]',
				            	'options' => $feature->values->pluck('value','id'),
				            	'values' => $product->values->where('feature_id', $feature->id)->pluck('id'),
				            	'attributes' => ['multiple'=>'multiple'],
				            ]) 
					    @break

					    @default
						    @include('admin.widget.form.text', [
				            	'name' => 'features['.$feature->type.']['.$feature->id.']',
				            	'value' => 'weight 111',
				            ])   
					    	
					@endswitch

				</div>

			@endforeach
			

			
		</div>


		{{-- Form:control:bottom --}}
		<div class="container-fluid">
			<div class="btn-group btn-group-md">
				{{ Form::button('Сохранить', ['type'=>'submit','class' => 'btn btn-default']) }}	

				@isset($product)  
					{{ Form::button('<i class="fa fa-minus-circle"></i>', [
						'type'=>'button',
						'class' => 'btn btn-danger btn-delete',
						'data-url' => route('product.destroy', ['id' => $product->id])
					]) }}	
				@endisset
		
			</div>	
		</div>

	</div>
	
	
	

</section>

