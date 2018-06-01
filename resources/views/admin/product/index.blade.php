@extends('admin.layout.main')

{{-- Title --}}
@section('title') Управление товарами  @endsection
@section('title-description') Все товары @endsection
@section('title-actions')
	<a href="{{ route('product.create') }}" class="btn btn-info"><i class="fa fa-plus-circle"></i> Новый товар</a>
@endsection


@section('content')

	<section class="app-section">

		{{-- <div class="app-grid-actions">
			<div class="btn-group">
				{{ Form::button('Удалить', ['type'=>'submit','class' => 'btn btn-danger btn-sm']) }}	
			</div>
		</div> --}}
		
		<table class="table app-grid app-grid__product">
			<thead>
				<tr>
					<th>all</th>
					<th>ID</th>
					<th>Наименование</th>
					<th>Опубликовано?</th>
					<th>Action</th>
				</tr>	
			</thead>
			<tbody>

			{{-- list --}}
			@foreach ($products as $product)
				<tr id="row_{{ $product->id }}">
					<td>cb</td>
					<td>{{ $product->id }}</td>
					<td><a href="{{ route('product.edit', $product->id) }}">{{ $product->title }}</a></td>
					<td>{{ $product->published ? 'Да' : 'Нет' }}</td>
					<td>	
						<button type="button" class="btn btn-danger btn-sm" data-url="{{ route('product.destroy', ['id' => $product->id]) }}"><i class="fa fa-minus-circle"></i></button>	
					</td>
				</tr>
			@endforeach	
			

			</tbody>	
		</table>
		
		{{ $products->render() }}
               
	</section>
	
@endsection



{{-- JS:Code --}}
@section('js')	
	<script>
		$(function(){

			$('.app-grid__product .btn-danger').appButtonDelete({
				token: _token,
				success: function(response) {
					if (response.type == 'success') {
						$('.app-grid__product #row_' + response.ids).remove();
						$.appMessage('Товар ' + response.ids + ' удален');    
					}
				}
			});

		})
	</script>	
@endsection
