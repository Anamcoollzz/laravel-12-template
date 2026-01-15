<?php

namespace App\Http\Controllers;

use App\Repositories\SiagaOrderRepository;
use Illuminate\Http\Request;

class SiagaDesaController extends Controller
{
    private SiagaOrderRepository $siagaOrderRepository;

    public function __construct()
    {
        $this->siagaOrderRepository = new SiagaOrderRepository();
    }

    public function index()
    {
        $data = $this->siagaOrderRepository->getLatest(where: [
            'created_by_id' => auth_id()
        ]);

        return view('stisla.homes.siaga-desa.order-history', [
            'data' => $data
        ]);
    }

    public function orderForm()
    {
        return view('stisla.homes.siaga-desa.order-form');
    }

    public function submitOrderForm(Request $request)
    {
        // return $request->all();
        $this->siagaOrderRepository->createWithUser([
            'full_name'            => $request->input('nama_lengkap'),
            'phone_number'         => $request->input('nomor_hp'),
            'lokasi_keberangkatan' => $request->input('lokasi_keberangkatan'),
            'alamat_tujuan'        => $request->input('alamat_tujuan'),
            'car_type'             => $request->input('jenis_mobil'),
            'tgl_penggunaan'       => $request->input('tanggal_penggunaan'),
            'perkiraan_jam'        => $request->input('waktu_penggunaan'),
            'additional_notes'     => $request->input('catatan_tambahan'),
            'status' => 'Menunggu',
        ]);
        return redirect()->route('siaga-desa.index')->with('success', 'Formulir pesanan berhasil dikirim!');
    }
}
