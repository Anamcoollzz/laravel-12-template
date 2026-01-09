@php
  $props = [];
  $id = $id ?? Str::random(5);
  $name = $name ?? $id;
  array_push($props, 'id="' . $id . '"');
  array_push($props, 'name="' . $name . '"');
  array_push($props, 'value="' . (old($name) ?? ($value ?? ($d[$name] ?? ''))) . '"');
  array_push($props, isset($placeholder) ? 'placeholder="' . $placeholder . '"' : '');
  array_push($props, isset($accept) ? 'accept="' . $accept . '"' : '');
  array_push($props, isset($min) ? 'min="' . $min . '"' : '');
  array_push($props, isset($max) ? 'max="' . $max . '"' : '');
  array_push($props, isset($disabled) && $disabled === true ? 'disabled' : '');
  array_push($props, isset($readonly) ? 'readonly' : '');
  if (isset($required)) {
      if ($required == false) {
          $required = false;
      }
  } else {
      $required = $required ?? false;
  }
  array_push($props, $required ? 'required' : '');
  array_push($props, isset($type) ? 'type="' . $type . '"' : 'type="text"');
  $has_error = $errors->has($name ?? $id);
@endphp

<div class="form-group is-invalid">
  <label for="{{ $id ?? $name }}" style="{{ $has_error ? 'color: #dc3545' : '' }}" class="{{ $has_error ? '' : '' }}">{{ $label ?? $id }}
    @if ($required)
      <span style="color: #dc3545;">*</span>
    @endif
  </label>
  <div class="input-group">
    <div class="input-group-prepend">
      <div class="input-group-text {{ $has_error ? 'border-danger' : '' }}">
        <i class="fas fa-calendar"></i>
      </div>
    </div>
    <input {!! implode(' ', $props) !!} class="form-control daterange-cus {{ $has_error ? 'is-invalid' : '' }} {{ $addClass ?? '' }} {{ $is_valid ?? '' }}" step="any"
      autocomplete="{{ $autocomplete ?? 'off' }}">
  </div>

  @if ($hint ?? false)
    <small class="form-text text-muted">{{ $hint }}</small>
  @endif
  @if ($has_error)
    <div id="{{ $name ?? $id }}-error-feedback" style="display: block" class="invalid-feedback" for="{{ $name ?? $id }}">
      {{ $errors->first($name ?? $id) }}
    </div>
  @endif
  @isset($is_valid)
    <div id="{{ $name ?? $id }}-valid-feedback" style="display: block;" class="valid-feedback" for="{{ $name ?? $id }}">
      {{ $has_error ? '' : $valid_feedback }}
    </div>
  @endisset
</div>
