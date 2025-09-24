@php
  $status = $item->status ?? ($item->job_status ?? '');
@endphp
<td>
  @if ($status == 'approved' || $status == 'bekerja' || $status == 'kuliah' || $status == 'active')
    <span class="badge badge-success">{{ $status }}</span>
  @elseif($status == 'done' || $status == 'completed' || $status == 'lulus')
    <span class="badge badge-primary">{{ $status }}</span>
  @elseif($status == 'pending')
    <span class="badge badge-warning">{{ $status }}</span>
  @elseif($status == 'rejected' || $status == 'unemployed' || $status == 'drop out' || $status == 'non active' || $status == 'resign')
    <span class="badge badge-danger">{{ $status }}</span>
  @else
    <span class="badge badge-secondary">{{ $status }}</span>
  @endif
</td>
