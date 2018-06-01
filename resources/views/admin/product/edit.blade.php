@extends('admin.layout.main')

{{-- Action Title --}}
@section('title') Управление товарами  @endsection

@section('content')
	
	@if (isset($product))
		{{-- Action Desc --}}	
		@section('title-description') Редактор @endsection
		@section('title-actions')
			<a href="{{ route('product.create') }}" class="btn btn-info"><i class="fa fa-plus-circle"></i> Новый товар</a>
			<button type="button" 
				class="btn btn-danger btn-delete" 
				data-url="{{ route('product.destroy', ['id' => $product->id]) }}">
				<i class="fa fa-minus-circle"></i> Удалить
			</button>
		@endsection
		{{ Form::model($product, ['route' => ['product.update', $product->id], 'method'=>'POST']) }}
	@else
		{{-- Action Desc --}}
		@section('title-description') Новый товар @endsection
		{{ Form::open(['route' => 'product.store', 'method'=>'POST']) }}
	@endif

		@include('admin.product.form')

	{{ Form::close() }}

@endsection


{{-- JS:Code --}}
@section('js')	
	<script>
		$(function(){

			$('.app-input__select').material_select();
			
			$('.btn-delete').appButtonDelete({
				token: _token,
				success: function(response) {
					if (response.type == 'success') {
						window.location.href = '{{ route('product') }}'   
					}
				}
			});

		})
	</script>	
@endsection

