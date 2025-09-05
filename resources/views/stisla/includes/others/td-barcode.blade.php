@if ($isExport)
  <td>{{ $item->barcode }}</td>
@else
  <td>{!! \Milon\Barcode\Facades\DNS1DFacade::getBarcodeHTML($item->barcode, 'C39', 1, 10) !!}</td>
@endif
