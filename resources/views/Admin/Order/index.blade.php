@extends('adminlte::page')

@section('content_header')
    <h1>Pedidos</h1>
@stop


@section('content')
    @include('admin.order.table')
@stop


@section('js')
    @stack('scripts')
@stop