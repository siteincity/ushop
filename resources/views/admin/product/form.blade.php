@extends('admin.layout.main')


@section('content')
	
	
	@if (isset($product))
		@include('admin.layout.title', ['name' => 'Редактор', 'description' => $product->title])
		{{ Form::model($product, ['route' => ['product.update', $product->id], 'method'=>'POST']) }}
	@else
		@include('admin.layout.title', ['name' => 'Новый товар', 'description' => $groupGetList[Request::get('group_id')]])
		{{ Form::open(['route' => 'product.store', 'method'=>'POST']) }}
	@endif
	

	{{-- Form Start --}}
	<section class="app-content app-content-form">
	
		{{-- Nav --}}
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link app-nav-link" data-toggle="tab" href="#tab-description">Общее</a>
			</li>
			<li class="nav-item">
				<a class="nav-link app-nav-link active" data-toggle="tab" href="#tab-features">Характеристики</a>
			</li>
		</ul>

		{{-- Tabs --}}
		<div class="tab-content">

			{{-- Tab:description --}}	
			<div class="tab-pane app-tab-pane" id="tab-description">	

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
			<div class="tab-pane show active app-tab-pane" id="tab-features">
				
				@foreach ($features as $feature)
					{{-- {{ dd($feature) }} --}}
					<div class="form-group">

						@include('admin.widget.form.label', ['name' => $feature['slug'], 'value' => $feature['caption']])

						@switch($feature['type'])
							@case('select') 
					            @include('admin.widget.form.select', [
					            	'name' => 'features['.$feature['id'].'][]',
					            	'options' => $feature['options'],
					            	'values' => $feature['values'],
					            ])  
						    @break
						    
						    @case('multiselect')
								@include('admin.widget.form.select', [
					            	'name' => 'features['.$feature['id'].'][]',
					            	'options' => $feature['options'],
					            	'values' => $feature['values'],
					            	'attributes' => ['multiple'=>'multiple'],
					            ]) 
						    @break

						    {{-- @case('textarea')
								@include('admin.widget.form.textarea', [
					            	'name' => 'features[text]['.$feature['values']['id'].']',
					            	'value' => $feature['values']['value'],
					            ]) 
						    @break --}}

						    @default
							    {{-- {{ dd($feature['values']['id']) }} --}}
							    @include('admin.widget.form.text', [
					            	'name' => 'features['.$feature['id'].']['.$feature['values']['id'].']',
					            	'value' => $feature['values']['value'],
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
	{{-- /Form --}}

	{{ Form::close() }}

@endsection


{{-- JS:Code --}}
@section('js')	
	
	<script>
		$(function(){

			$('.app-input__select').select2();
			
			$('.btn-delete').appButtonDelete({
				token: _token,
				success: function(response) {
					if (response.type == 'success') {
						window.location.href = '{{ route('product') }}'   
					}
				}
			});

			$('#group_id').on('change', function(){
				var group_id = $(this).val();
				window.location.href = _current_url + '?group_id=' + group_id;
			})

		})
	</script>

@endsection

