@extends('admin.layout.main')

{{-- Action Title --}}
@section('title') Панель управления  @endsection
@section('title-description') 1.0 @endsection



@section('content')
	
	<section class="section">

	           
	<div class="card">
		<div class="card-header">
			test
		</div>
		<div class="card-body">
			@include('admin.widget.table', ['some' => 'data'])
		</div>
	</div>                
	                

	</section>


@endsection