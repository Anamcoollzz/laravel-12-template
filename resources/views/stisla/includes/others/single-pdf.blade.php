<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ $title }}</title>

  @include('stisla.includes.others.css-pdf')
</head>

<body>
  <h1>{{ $exportTitle ?? $title }}</h1>
  @if ($isAppCrud)

    @if ($col)
      {!! $d->$col !!}
    @else
      @if ($photo ?? $avatar)
        <div style="text-align: center; margin-bottom: 10px;">
          <img src="{{ $photo ?? ($avatar ?? $d->photo) }}" alt="{{ $d->name }}" style="max-width: 150px;">
        </div>
      @endif

      <table>
        <tbody>
          @foreach ($columns as $column)
            @continue (in_array($column, $htmlColumns) || $column === 'password')

            <tr>
              <td>{{ __('validation.attributes.' . $column) }}</td>
              @if (is_array($d->$column))
                <td>{{ implode(', ', $d->$column) }}</td>
              @elseif (in_array($column, $fileColumns))
                <td>
                  <a target="_blank" href="{{ $d->$column }}">Cek</a>
                </td>
              @elseif ($column === 'created_by_id')
                <td>
                  <a target="_blank" href="{{ $d->$column }}">Cek</a>
                </td>
              @else
                <td>{{ $d->$column }}</td>
              @endif
            </tr>
          @endforeach
        </tbody>
      </table>
    @endif
  @else
    @include('stisla.' . $prefix . '.single-export')
  @endif
</body>

</html>
