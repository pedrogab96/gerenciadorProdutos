
<div class="row">
    <div class="col m-4">
        @component('admin.layouts.components.forms.input_text')
            @slot('name', 'name')
            @slot('label', 'Nome')
            @slot('required', true)
            @slot('value', $product->name ?? '')
        @endcomponent

        @component('admin.layouts.components.forms.input_text')
            @slot('name', 'price')
            @slot('label', 'Preço')
            @slot('class', 'money-format')
            @slot('type', 'double')
            @slot('required', true)
            @slot('value', $product->price ?? '')
        @endcomponent
    </div>
</div>


@push('scripts')
    <script>
        $(function () {
            var money = $('.money-format');
            money.mask("#.##0,00", {reverse: true});
        });
    </script>
@endpush