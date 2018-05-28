@extends('admin.layout.main')

{{-- Action Title --}}
@section('title') Управление товарами  @endsection

@section('content')
	
	@if (isset($product))
		{{-- Action Desc --}}	
		@section('title-description') Редактор @endsection
		{{ Form::model($product, ['route' => ['product.update', $product->id], 'method'=>'PUT']) }}
	@else
		{{-- Action Desc --}}
		@section('title-description') Новый товар @endsection
		{{ Form::open(['route' => 'product.store', 'method'=>'POST']) }}
	@endif

		@include('admin.product.form')

	{{ Form::close() }}

@endsection

