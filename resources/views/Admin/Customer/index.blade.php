@extends('adminlte::page')

@section('content_header')
    <h1>Clientes</h1>
@stop


@section('content')
    <div class="m-4">
        @include('admin.customer.table')
    </div>
@stop


@section('js')
    @stack('scripts')
@stop