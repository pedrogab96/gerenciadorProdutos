@extends('adminlte::page')

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Produtos</h1>
        <div>
            <a class= 'btn btn-dark' href="{{route('admin.products.create')}}">Adicionar novo</a>
        </div>
    </div>
@stop

@section('content')
    @include('admin.product.table')
@stop


@section('js')
    @stack('scripts')
@stop
