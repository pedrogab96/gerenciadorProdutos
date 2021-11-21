@extends('adminlte::page')

@section('content_header')
    <h1>Novo produto</h1>
@stop

@section('content')
    {{ html()->form('POST', route("admin.products.store"))->id('form-product')->open() }}
        <div class="row">
            <div class="col-12 col-lg-10">
                <div class="card">
                    @include('admin.product.form')
                </div>
                <div class="d-flex justify-content-end">
                    {{ html()->input('submit')->name('submit')->value('CADASTRAR')->class('btn btn-success') }}
                </div>
            </div>
        </div>
    {{ html()->form()->close() }}
@stop

@section('js')
    @stack('scripts')
@stop