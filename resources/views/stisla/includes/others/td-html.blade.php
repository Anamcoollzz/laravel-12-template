@if ($isExport)
  <td>
    @if (Str::contains($item->image, 'http') || Str::contains($item->image, 'https://'))
      <a href="{{ $item->image }}">cek</a>
    @elseif($item->image)
      <a href="{{ $urlLink = Storage::url($prefix . '/' . $item->image) }}">cek</a>
    @else
      -
    @endif
  </td>
@else
  <td>
    @php
      $htmlItem = $htmlItem ?? ($item->htmlItem ?? $item->html);
    @endphp
    <a onclick="showHtmlModal(event, '{{ $id ?? 'html' . $item->id }}')" href="#" class="btn btn-primary">Preview</a>
  </td>
@endif

@push('htmls')
  <div id="{{ $id ?? 'html' . $item->id }}" style="display: none;">
    {!! $htmlItem !!}
  </div>
@endpush
