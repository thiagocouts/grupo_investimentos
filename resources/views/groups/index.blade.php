@extends('templates.master')

@section('conteudo-view')

	@if(session('success'))
		<h3>{{session('success')['message']}}</h3>
	@endif
	
	{!! Form::open(['route' => 'group.store', 'method' => 'post', 'class' => 'form-padrao']) !!}

		@include('templates.formulario.input', ['label' => 'Grupo', 'input' => 'name', 'attributes' => ['placeholder' => 'Nome do Grupo']])
		@include('templates.formulario.select', ['label' => 'User', 'select' => 'user_id', 'data' => $users,  'attributes' => ['placeholder' => 'User']])
		@include('templates.formulario.select', ['label' => 'Instituição', 'select' => 'instituition_id', 'data' => $instituitions, 'attributes' => ['placeholder' => 'Instituição']])
		@include('templates.formulario.submit', ['input' => 'Cadastrar'])

	{!! Form::close() !!}

	@include('groups.list', ['group_list' => $groups])


@endsection