@php
  $arr = $arr ?? ($item->select2_multiple ?? []);
@endphp
<td>
  {{ is_array($arr) ? implode(', ', $arr) : $arr }}
</td>
