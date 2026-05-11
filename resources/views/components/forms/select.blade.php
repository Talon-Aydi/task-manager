<div class="form-floating mb-3">
  <select 
    class="form-select" 
    id="{{$selectId}}" 
    name="{{$selectId}}">
    @foreach ($options as $option)
        <option value="{{ $option['id'] }}">
          {{  $option['label'] }}
        </option>
    @endforeach
  </select>
  <label for="{{$selectId}}">{{$selectId}}</label>
</div>