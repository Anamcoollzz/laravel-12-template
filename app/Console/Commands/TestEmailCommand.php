<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TestEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-email-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to test sending email via Brevo service';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $emailService = app(\App\Services\EmailService::class);
        $emailService->sendBrevo(
            'hairulanam21@gmail.com',
            'Hairul Anam',
            'Test Email from Brevo',
            '<!DOCTYPE html>
            <html lang="id">
            <head>
            <meta charset="UTF-8" />
            <title>Kode OTP</title>
            <meta name="viewport" content="width=device-width,initial-scale=1" />
            <style>
                body { font-family: Arial, sans-serif; background:#f5f7fa; margin:0; padding:0; }
                .wrapper { max-width:560px; margin:0 auto; background:#ffffff; border:1px solid #e2e6ea; border-radius:8px; overflow:hidden; }
                .header { background:#0d6efd; color:#ffffff; padding:20px; text-align:center; }
                .content { padding:28px 32px; color:#333333; line-height:1.5; }
                .otp-box { letter-spacing:6px; font-size:32px; font-weight:700; background:#f0f4ff; padding:18px 24px; text-align:center; border:2px dashed #0d6efd; border-radius:8px; color:#0d2b52; }
                .note { font-size:13px; color:#555555; margin-top:20px; }
                .footer { padding:18px 24px; font-size:12px; text-align:center; color:#777777; background:#fafbfc; }
                @media (max-width:600px){ .content { padding:20px 22px; } .otp-box { font-size:28px; letter-spacing:5px; } }
            </style>
            </head>
            <body>
                <div class="wrapper">
                    <div class="header">
                        <h1 style="margin:0;font-size:22px;font-weight:600;">Verifikasi Kode OTP</h1>
                    </div>
                    <div class="content">
                        <p>Halo,</p>
                        <p>Gunakan kode berikut untuk menyelesaikan proses verifikasi. Jangan bagikan kode ini kepada siapa pun.</p>
                        <div class="otp-box">123456</div>
                        <p style="margin-top:24px;">Kode berlaku selama <strong>5 menit</strong>. Jika Anda tidak meminta kode ini, abaikan email ini.</p>
                        <div class="note">Tips keamanan: Selalu pastikan Anda berada di situs resmi sebelum memasukkan kode.</div>
                    </div>
                    <div class="footer">
                        &copy; 2025 Aplikasi Anda. Semua hak dilindungi.
                    </div>
                </div>
            </body>
            </html>'
        );
    }
}
