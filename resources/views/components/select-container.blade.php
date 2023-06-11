@props(['name' => '','id' => '','label'=>'', 'required' => false ,'readonly' => false ])

@if ($label != '')
<div class="mb-3">
    <label for="" class="form-label">{{ $label }} 
        @if ($required == true)
        <span><small class="text-danger">*</small></span>
        @endif
    </label>
    <select {!! $attributes->merge(['class' => 'form-select',]) !!} name="{{ $name }}" id="{{ $id }}" >
        {{ $slot }}
    </select>
</div>
@else
<select class="form-select  mb-3" name="{{ $name }}" id="{{ $id }}">
    {{ $slot }}
</select>
@endif

