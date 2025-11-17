@if (count($options) > 10)
  @include('stisla.includes.forms.selects.select2')
@else
  @php
    $name = $name ?? $id;
    $oldValue = old($name);
    $isMultiple = $multiple ?? ($isMultiple ?? false);
    $isRequired = isset($required) && $required === true;
    $dname = $d[$name] ?? false;
    if ($isMultiple) {
        $selectedArray = is_array($dname) ? $dname : ($dname ? [$dname] : []);
        $selected = $oldValue ?? ($selected ?? $selectedArray);
    } else {
        $selected = $oldValue ?? ($selected ?? ($dname ?? false));
    }
    $has_error = $errors->has($name ?? $id);
  @endphp

  <div class="form-group">
    <label @isset($id) for="{{ $id }}" @endisset>
      {{ $label }}
      @if ($isRequired)
        <span class="text-danger">*</span>
      @endif
    </label>
    <select @if ($isRequired) required @endif @if ($isMultiple) multiple @endif name="{{ $isMultiple ? $name . '[]' : $name }}" id="{{ $id }}"
      class="form-control {{ $has_error ? 'is-invalid' : '' }}" @if (isset($disabled) && $disabled) disabled @endif>
      @if ($with_all ?? false)
        <option value="">{{ __('Semua') }}</option>
      @endif
      @if ($isMultiple)
        @foreach ($options as $value => $text)
          <option @if (in_array($value, $selected)) selected @endif value="{{ $value }}">{{ $text }}</option>
        @endforeach
      @else
        @foreach ($options as $value => $text)
          <option @if ($selected == $value) selected @endif value="{{ $value }}">{{ $text }}</option>
        @endforeach
      @endif
    </select>
    @if (isset($hint))
      <small class="form-text text-muted">{{ $hint }}</small>
    @endif
    @error($name ?? $id)
      <div id="{{ $name ?? $id }}-error-feedback" class="invalid-feedback" for="{{ $name ?? $id }}">
        {{ $message }}
      </div>
    @enderror
  </div>

@endif
