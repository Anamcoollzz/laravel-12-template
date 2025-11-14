@if (!defined('TINYMCE'))
  @php
    define('TINYMCE', true);
  @endphp

  @push('js')
    <script script src="https://cdn.tiny.cloud/1/jxvffz1ahm5v7gvf683q2c4npxdy51qbvr2guyusd2wicvgw/tinymce/8/tinymce.min.js" referrerpolicy="origin" crossorigin="anonymous"></script>
    {{-- <script src="https://your_server/tinymce.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/8/plugins.min.js" referrerpolicy="origin" crossorigin="anonymous"></script> --}}
  @endpush

  @push('css')
  @endpush

  @push('styles')
  @endpush

  @push('scripts')
    <script>
      tinymce.init({
        selector: '.tinymce, .tinymce-simple',
        plugins: [
          // Core editing features
          'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
          // Your account includes a free trial of TinyMCE premium features
          // Try the most popular premium features until Nov 26, 2025:
          'checklist', 'mediaembed', 'casechange', 'formatpainter', 'pageembed', 'a11ychecker', 'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'advtemplate', 'ai',
          'uploadcare', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags', 'autocorrect', 'typography', 'inlinecss', 'markdown', 'importword', 'exportword', 'exportpdf'
        ],
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography uploadcare | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        mergetags_list: [{
            value: 'First.Name',
            title: 'First Name'
          },
          {
            value: 'Email',
            title: 'Email'
          },
        ],
        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
        uploadcare_public_key: '176eaf57a06497723863',
      });
    </script>
  @endpush
@endif

<div class="form-group">
  <label for="{{ $id }}">{{ $label ?? 'TinyMCE' }}
    @if ($required)
      <span class="text-danger">*</span>
    @endif
  </label>
  <textarea @if ($required) required @endif class="{{ $simple ?? false ? 'tinymce-simple' : 'tinymce' }}" name="{{ $name ?? $id }}" id="{{ $id }}">{{ $value ?? ($d[$name ?? $id] ?? old($name ?? $id)) }}</textarea>
  @error($name ?? $id)
    <div id="{{ $id }}-error-feedback" class="invalid-feedback" style="display: block;" for="{{ $id }}">
      {{ $message }}
    </div>
  @enderror
</div>
