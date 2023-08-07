@props(['id', 'name', 'label', 'placeholder', 'value' => '', 'options'])

<div class="mb-3">
    <label for="{{ $name }}">{{ $label }}</label>
    <div>
        <select class="form-select form-control" id="{{ $id }}" name="{{ $name }}">
            <option></option>
            @foreach ($options as $option_value => $option_text)
                <option value="{{ $option_value }}" {{ $option_value == old($name, $value) ? 'selected' : '' }}>
                    {{ $option_text }}
                </option>
            @endforeach
        </select>
        <x-form.error name="{{ $name }}" />
    </div>
</div>
