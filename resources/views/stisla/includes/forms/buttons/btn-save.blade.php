<button type="submit" class="btn btn-{{ $type ?? 'primary' }} btn-save-form btn-icon icon-left">
  <i class="fas fa-{{ $icon ?? 'check' }}"></i>
  {{ $label ?? __('Simpan') }}
</button>
