<div class="form-floating rounded-2 mb-3 border px-3 py-1">
    <select id="sort-filter">
        @forelse ($options as $option)
            <option value="{{ $option->value }}">{{ $option->value }}</option>
        @empty
            <option>No sorting elements available</option>
        @endforelse
    </select>
</div>
