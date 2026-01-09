<?php

namespace App\Http\Controllers;

use App\Repositories\SettingRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Repositories\DashboardRepository;
use Illuminate\Support\Facades\Auth;

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

        if (is_app_pocari())
            $statuses = \App\Models\Status::with(['picas.category', 'picas.assignedto', 'picas' => function ($query) {
                $query
                    ->when(is_cabang(), function ($query) {
                        $query->where('assigned_to', auth_id());
                    })
                    ->when(request('filter_assigned_to'), function ($query) {
                        $query->where('assigned_to', request('filter_assigned_to'));
                    });
            }])->get()->transform(function ($item) {
                $item->type = 'primary';
                // $item->color = '#b71c2e';
                // if ($item->name === 'Open') {
                //     $item->type = 'secondary';
                //     $item->color = '#6c757d';
                // } elseif ($item->name === 'On Progress') {
                //     $item->type = 'warning';
                //     $item->color = '#ff9800';
                // } elseif ($item->name === 'Overdue') {
                //     $item->type = 'danger';
                //     $item->color = '#dc3545';
                // } elseif ($item->name === 'Need Approval') {
                //     $item->type = 'secondary';
                //     $item->color = 'purple';
                // } elseif ($item->name === 'Need Revision') {
                //     $item->type = 'secondary';
                //     $item->color = '#f552eb';
                // } elseif ($item->name === 'Done') {
                //     $item->type = 'secondary';
                //     $item->color = 'green';
                // }
                $item->count = \App\Models\Pica::when(is_cabang(), function ($query) {
                    $query->where('assigned_to', auth_id());
                })
                    ->when(request('filter_assigned_to'), function ($query) {
                        $query->where('assigned_to', request('filter_assigned_to'));
                    })
                    ->where('status_id', $item->id)->count();
                return $item;
            });

        return view('stisla.dashboard.index', [
            'widgets'  => $widgets,
            'logs'     => $logs,
            'user'     => $user,
            'is_chat'  => $is_chat,
            'statuses' => $statuses ?? [],
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

        if (is_app_siaga_desa()) {
            return view('stisla.homes.home-siaga-desa', [
                // 'title' => __('Selamat datang di ') . SettingRepository::applicationName(),
            ]);
        }

        return view('stisla.homes.index', [
            'title' => __('Selamat datang di ') . SettingRepository::applicationName(),
        ]);
    }
}
