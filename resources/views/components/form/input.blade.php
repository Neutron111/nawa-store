
{{-- تستخدم لتعريف المتغيرات اللي بدك نمررها للكمبوننت --}}
@props([
    'id', 'name', 'label', 'value' => '', 'type' => 'text'
])

<div class="form-floating mb-3">
    <label for="{{$name}}">{{$label}}</label>
    <input type="{{$type}}" class="form-control" id="{{$id}}" name="{{$name}}" placeholder="{{$label}}" value="{{ old($name, $value) }}">
    <x-form.error name="{{$name}}"/>
</div>

