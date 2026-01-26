<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>PICA Notification</title>
</head>

<body style="margin:0;padding:0;background-color:#f4f6f8;font-family:Arial, Helvetica, sans-serif;">
  <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f6f8;padding:20px;">
    <tr>
      <td align="center">
        <table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff;border-radius:6px;overflow:hidden;">

          <!-- Header -->
          <tr>
            <td style="background:#d32f2f;padding:20px;color:#ffffff;">
              <h2 style="margin:0;font-size:20px;">PICA Notification</h2>
            </td>
          </tr>

          <!-- Content -->
          <tr>
            <td style="padding:20px;color:#333333;">
              <p style="margin-top:0;">Berikut detail PICA terbaru:</p>

              <table width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
                <tr>
                  <td style="padding:8px 0;font-weight:bold;width:150px;">Notes</td>
                  <td style="padding:8px 0;">: {{ $judul_pica }}</td>
                </tr>
                @foreach ($pica->additionalnotes as $additionalnote)
                  <tr>
                    <td style="padding:8px 0;font-weight:bold;width:150px;">Notes {{ $loop->iteration + 1 }}</td>
                    <td style="padding:8px 0;">: {{ $additionalnote->note }}</td>
                  </tr>
                @endforeach
                <tr>
                  <td style="padding:8px 0;font-weight:bold;">Kategori</td>
                  <td style="padding:8px 0;">: {{ $kategori }}</td>
                </tr>
                <tr>
                  <td style="padding:8px 0;font-weight:bold;">Status</td>
                  <td style="padding:8px 0;">
                    : <span style="color:#d32f2f;font-weight:bold;">{{ $status }}</span>
                  </td>
                </tr>
              </table>

              <p style="margin-top:20px;">
                Silakan login ke sistem untuk melihat detail lengkap PICA.
              </p>
              <p style="margin-top:20px;text-align:center;">
                <a href="{{ route('picas.index') }}" style="display:inline-block;padding:12px 30px;background-color:#d32f2f;color:#ffffff;text-decoration:none;border-radius:4px;font-weight:bold;">
                  Lihat Detail PICA
                </a>
              </p>
            </td>
          </tr>

          <!-- Footer -->
          <tr>
            <td style="background:#f1f1f1;padding:15px;text-align:center;font-size:12px;color:#777;">
              © {{ $tahun }} Honda Bengkulu<br>
              Email ini dikirim secara otomatis, mohon tidak membalas email ini.
            </td>
          </tr>

        </table>
      </td>
    </tr>
  </table>
</body>

</html>
