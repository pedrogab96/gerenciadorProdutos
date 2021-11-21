<div class="form-group {{$classForm ?? ''}}">
    {{ html()->label($name)->class('font-weight-bold')->text($label ?? '') }}
    {{ html()
        ->text($name, $value ?? null)
        ->disabled($disabled ?? false)
        ->class(['form-control'])
        ->addClass($class ?? null)
        ->type($type ?? 'text')
        ->placeholder($placeholder ?? '')
        ->attributeIf($required ?? false, 'required')
    }}
    @include('admin.layouts.components.forms.erros')
</div>