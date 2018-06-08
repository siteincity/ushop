<section class="app-content app-content-form">
	
	{{-- Tabs:Nav --}}
	<ul class="nav nav-tabs">
		<li class="nav-item">
			<a class="nav-link app-nav-link active" data-toggle="tab" href="#tab-description">Общее</a>
		</li>
		<li class="nav-item">
			<a class="nav-link app-nav-link " data-toggle="tab" href="#tab-attributes">Характеристики</a>
		</li>
	</ul>

	{{-- Tabs --}}
	<div class="tab-content">

		{{-- Tab:description --}}	
		<div class="tab-pane show active app-tab-pane" id="tab-description">	

			<div class="form-group">
				{{ Form::label('group_id', 'Тип товара') }} 
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

		{{-- Tab:attributes --}}
		<div class="tab-pane app-tab-pane" id="tab-attributes">
			
			{{-- {{ dd($product->values()->attributes) }} --}}

			@foreach ($attributes as $attribute)
				
				<div class="form-group">
					
					{{ Form::label($attribute->slug, $attribute->caption) }}

					@switch($attribute->type)
						@case('select')
						    {{ Form::select(
								'attributes['.$attribute->type.'][]', 
								$attribute->values->pluck('value','id'), 
								$product->values->where('attribute_id', $attribute->id)->pluck('id'), 
								['id' => $attribute->slug, 'class' => 'app-input__select form-control']
							)}}  
					    @break
					    
					    @case('multiselect')
						    {{ Form::select(
								'attributes['.$attribute->type.'][]', 
								$attribute->values->pluck('value','id'), 
								$product->values->where('attribute_id', $attribute->id)->pluck('id'), 
								['id' => $attribute->slug, 'class' => 'app-input__select form-control', 'multiple' => 'multiple']
							)}}  
					    @break

					    @default
						    {{ Form::text(
						    	'attributes['.$attribute->type.']['.$attribute->id.']', 
						    	$product->values->where('attribute_id', $attribute->id)->first()->value, 
						    	['class' => 'form-control']) 
						    }}  
					    	
					@endswitch

				</div>

			@endforeach
			
			

			{{-- {{ dd($attributes) }} --}}
			
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

