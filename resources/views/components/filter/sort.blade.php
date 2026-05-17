<div class="form-floating border mb-3 px-3 py-1 rounded-2">
  <select id="sort-filter">
    @forelse ($options as $option)
        <option value="{{ $option->value }}">{{$option->value}}</option>
    @empty
       <option>No sorting elements available</option>
    @endforelse

  </select>
</div>