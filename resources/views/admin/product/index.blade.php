@extends('admin.layout.main')

{{-- Title --}}
@section('title') Управление товарами  @endsection
@section('title-description') Все товары @endsection
@section('title-actions')
	<a href="{{ route('product.create') }}" class="btn btn-info"><i class="fa fa-plus-circle"></i> Новый товар</a>
@endsection


@section('content')

	<section class="app-section app-grid">

		<div class="app-grid-actions">
			<div class="btn-group">
				{{ Form::button('Удалить', ['type'=>'submit','class' => 'btn btn-danger btn-sm']) }}	
			</div>
		</div>
		
		<table class="table app-grid">
			<thead>
				<tr>
					<th><input type="checkbox" name="" value="111"></th>
					<th>ID</th>
					<th>Наименование</th>
					<th>Action</th>
				</tr>	
			</thead>
			<tbody>

			{{-- list --}}
			@foreach ($products as $product)
				<tr>
					<td><input type="checkbox" name="product_id[]" value="{{ $product->id }}"></td>
					<td>{{ $product->id }}</td>
					<td><a href="{{ route('product.edit', $product->id) }}">{{ $product->title }}</a></td>
					<td>
						<div class="btn-group">
							<button class="btn btn-delete btn-danger btn-sm" type="button" data-id="{{ $product->id }}">
								<i class="fa fa-minus-circle"></i>
							</button>	
						</div>
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
		
@endsection
