@props(['label' => '', 'name' => '', 'required' => false, 'tip' => '', 'placeholder' => '', 'id' => '', 'required' => false,'type' => '','value' => '','disabled'=> '', 'step' => ''])

<div class="mb-3">
    <label for="user_password" class="form-label">{{ $label }} 
        @if ($required == true)
        <span><small class="text-danger">*</small></span>
        @endif
    </label>
    <input type="{{ $type }}" class="form-control" id="{{ $id }}" name="{{ $name }}"
        placeholder="{{ $placeholder }}" {{ $required == true ? 'required' : ' '}} value="{{ $value }}" {{ $disabled == true ? 'disabled' : ' '}} step="{{ $step != null ? $step : ' ' }}">
    @error($name)
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
