<div class="form-floating mb-3">
    <select class="form-select" id="{{ $inputName }}" name="{{ $inputName }}">
        @foreach ($options as $option)
            <option
                value="{{ $option["id"] }}"
                @selected($value === $option["label"])
            >
                {{ $option["label"] }}
            </option>
        @endforeach
    </select>
    <label for="{{ $inputName }}">{{ $labelName }}</label>
</div>
