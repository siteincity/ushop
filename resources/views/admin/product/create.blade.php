@extends('admin.layout.main')


{{-- Action Title --}}
@section('title') Управление товарами  @endsection
@section('title-description') Новый товар @endsection


@section('content')
	
 	
	<section class="container-fluid">
		<div class="row">
			<div class="card col-7">
				<div class="card-body">
					{{ Form::open(['route' => 'products.store', 'method'=>'POST']) }}
					
						<div class="form-group">
							{{ Form::label('title', 'Наименование') }}
							{{ Form::text('title', null, ['class' => 'form-control']) }}	
						</div>

						<div class="form-group">
							{{ Form::label('price', 'Цена') }}
							{{ Form::text('price', null, ['class' => 'form-control']) }}	
						</div>

						<div class="form-group">
							{{ Form::button('Добавить', ['type'=>'submit','class' => 'btn btn-danger']) }}	
						</div>
						
					{{ Form::close() }}	
				</div>
			</div>		
		</div>
	</section>
	
	


		




	



@endsection