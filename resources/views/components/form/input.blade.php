@props(['name', 'value' => '', 'type' => 'text' ,'label'=> false])

@if ($label)
    <label for="" >{{ $label }}</label>
@endif


<input type="{{ $type}}" name="{{ $name }}" @class([
    'form-control',
    'is-invalid' => $errors->has('{{ $name }}')])
    value ="{{ old('$name' , $value) }}"
    {{ $attributes }}
    >
@error($name)
<div class="text-danger">
    {{ $errors->first($name) }}
</div>
@enderror
