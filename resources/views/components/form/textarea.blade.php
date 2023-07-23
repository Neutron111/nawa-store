
@props([
    'id', 'name', 'label', 'placeholder', 'value' => ''
])

<div class="form-floating mb-3">
    <label for="{{$id}}">{{$label}}</label>
    <textarea class="form-control" id="{{$id}}" name="{{$name}}" placeholder="{{$placeholder}}">{{ old($name, $value) }}</textarea>
</div>
