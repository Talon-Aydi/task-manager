<div class="form-floating mb-3">
  <select 
    class="form-select w-full" 
    id="floatingSelect" 
    aria-label="Floating label select example">
    @foreach ($taskStates as $status )
        <option value="{{$status->name}}">{{$status
            }}</option>
    @endforeach
  </select>
  <label for="floatingSelect">Status</label>
</div>