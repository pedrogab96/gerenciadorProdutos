@extends('adminlte::page')

@section('content_header')
    <h1>Editar produto</h1>
@stop

@section('content')
    {{ html()->form('put', route("admin.products.update", $product->id))->id('form-product')->open() }}
        <div class="row">
            <div class="col-12 col-lg-10">
                <div class="card">
                    @include('admin.product.form')
                </div>
                <div class="d-flex justify-content-end">
                    {{ html()->a()->href(route('admin.products.index'))->class('btn btn-secondary mr-2')->text('Cancelar') }}
                    {{ html()->input('submit')->name('submit')->value('ATUALIZAR')->class('btn btn-success btn-sm') }}
                </div>
            </div>
        </div>
    {{ html()->form()->close() }}
@stop

@section('js')
    @stack('scripts')
@stop