@if (!defined('CKEDITOR'))
  @php
    define('CKEDITOR', true);
  @endphp

  @push('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/47.2.0/ckeditor5.umd.js" crossorigin></script>
    <script src="https://cdn.ckeditor.com/ckeditor5-premium-features/47.2.0/ckeditor5-premium-features.umd.js" crossorigin></script>
    <script src="https://cdn.ckbox.io/ckbox/2.6.1/ckbox.js" crossorigin></script>
    <script src="{{ asset('js/ckeditor.js') }}"></script>
  @endpush

  @push('css')
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/47.2.0/ckeditor5.css" crossorigin>
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5-premium-features/47.2.0/ckeditor5-premium-features.css" crossorigin>
    <link rel="stylesheet" href="{{ asset('css/ckeditor.css') }}" crossorigin>
  @endpush

  @push('styles')
  @endpush

  @push('scripts')
    <script></script>
  @endpush
@endif
<div class="form-group">
  <label for="{{ $id }}">{{ $label ?? 'CKEditor' }}
    @if ($required)
      <span class="text-danger">*</span>
    @endif
  </label>

  <div class="main-container" style="width: 100%;">
    <div class="editor-container editor-container_classic-editor editor-container_include-fullscreen" id="editor-container">
      <div class="editor-container__editor" style="width: 100%; max-width: 100%; min-height: 300px;">
        <textarea style="min-height: 300px;" @if ($required) required @endif class="{{ $simple ?? false ? 'ckeditor5-simple' : 'ckeditor5' }}" name="{{ $name ?? $id }}"
          id="{{ $id }}">{{ $value ?? ($d[$name ?? $id] ?? old($name ?? $id)) }}</textarea>
      </div>
    </div>
  </div>
  @error($name ?? $id)
    <div id="{{ $id }}-error-feedback" class="invalid-feedback" style="display: block;" for="{{ $id }}">
      {{ $message }}
    </div>
  @enderror
</div>
