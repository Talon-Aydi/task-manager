<div class="form-floating mb-3">
  <select 
    class="form-select" 
    id="{{$idKey}}" 
    name="{{$inputName}}">
    @foreach ($options as $option)
        <option value="{{ $option['id'] }}">
          {{  $option['label'] }}
        </option>
    @endforeach
  </select>
  <label for="{{$idKey}}">{{$labelName}}</label>
</div>