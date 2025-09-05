@if ($isExport)
  <td>{{ $item->qr_code }}</td>
@else
  <td>{!! \Milon\Barcode\Facades\DNS2DFacade::getBarcodeHTML($item->qr_code, 'QRCODE', 3, 3) !!}</td>
@endif
