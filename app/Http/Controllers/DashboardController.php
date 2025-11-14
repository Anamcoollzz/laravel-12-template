<?php

namespace App\Http\Controllers;

use App\Repositories\SettingRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Repositories\DashboardRepository;

class DashboardController extends StislaController
{

    private DashboardRepository $dashboardRepository;

    /**
     * constructor method
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->dashboardRepository = new DashboardRepository;

        // $this->middleware('can:Log Aktivitas');
    }

    /**
     * Menampilkan halaman dashboard
     *
     * @return Response
     */
    public function index()
    {
        $user    = auth_user();
        $widgets = $this->dashboardRepository->getWidgets();
        $logs    = $this->activityLogRepository->getMineLatest();
        $is_chat = is_app_chat() && is_user();

        // \Debugbar::enable();
        // \Debugbar::disable();

        return view('stisla.dashboard.index', [
            'widgets' => $widgets,
            'logs'    => $logs,
            'user'    => $user,
            'is_chat' => $is_chat,
        ]);
    }

    /**
     * upload file
     *
     * @param Request $request
     * @return Response
     */
    public function post(Request $request)
    {
        $request->validate([
            'file_upload' => 'required|file|max:102048',
        ]);
        $link = $this->fileService->uploadFile($request->file('file_upload'), 'file_upload');
        auth_user()->update(['file_upload' => $link]);
        return redirect()->back()->with('successMessage', 'File berhasil diupload');
    }

    /**
     * home page
     *
     * @return Response
     */
    public function home()
    {
        if (is_app_chat()) {
            return view('welcome-chat2');
            return view('welcome-chat');
        }
        return view('stisla.homes.index', [
            'title' => __('Selamat datang di ') . SettingRepository::applicationName(),
        ]);
    }
}
