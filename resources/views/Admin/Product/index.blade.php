@extends('adminlte::page')

@section('content_header')
    @if (session('success'))
        <div class="d-flex">
            <div class="alert alert-success border-left-success d-flex" role="alert">
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif
    <div class="d-flex justify-content-between col-12">
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
