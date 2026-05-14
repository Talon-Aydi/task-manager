<div class="input-group input-group-sm mb-3">
  <div class="form-floating">
    <input 
        name="{{ $inputId }}"
        type="{{ $inputType }}" 
        class="form-control" 
        id="{{ $inputId }}" 
        value="{{ $value ?? '' }}">
    <label for="{{ $inputId }}">{{ $inputLabel }}</label>
  </div>
</div>