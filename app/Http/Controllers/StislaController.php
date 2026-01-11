<?php

namespace App\Http\Controllers;

use App\Exports\GeneralExport;
use App\Http\Requests\ImportExcelRequest;
use App\Imports\GeneralImport;
use App\Models\User;
use App\Repositories\ActivityLogRepository;
use App\Repositories\Repository;
use App\Repositories\RequestLogRepository;
use App\Repositories\SettingRepository;
use App\Repositories\UserRepository;
use App\Services\DropBoxService;
use App\Services\EmailService;
use App\Services\FileService;
use App\Services\PDFService;
use App\Utils\FileUtil;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Illuminate\Support\Str;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Schema;

class StislaController extends Controller implements HasMiddleware
{
    /**
     * file service
     *
     * @var FileService
     */
    protected FileService $fileService;

    /**
     * pdf service
     *
     * @var PDFService
     */
    protected PDFService $pdfService;

    /**
     * email service
     *
     * @var EmailService
     */
    protected EmailService $emailService;

    /**
     * repository
     *
     * @var Repository
     */
    protected Repository $repository;

    /**
     * user repository
     *
     * @var UserRepository
     */
    protected UserRepository $userRepository;

    /**
     * activity log repository
     *
     * @var ActivityLogRepository
     */
    protected ActivityLogRepository $activityLogRepository;

    /**
     * request log repository
     *
     * @var RequestLogRepository
     */
    protected RequestLogRepository $requestLogRepository;

    /**
     * icon of module
     *
     * @var String
     */
    protected String $icon;

    /**
     * can export
     *
     * @var String
     */
    protected String $canExport;

    /**
     * prefix route of module
     *
     * @var String
     */
    protected String $prefixRoute;

    /**
     * name orientation pdf
     *
     * @var String
     */
    protected String $orientationPdf = 'landscape';

    /**
     * name paper size pdf
     *
     * @var String
     */
    protected String $paperSize = 'Letter';

    /**
     * name view folder
     *
     * @var String
     */
    protected String $viewFolder;

    /**
     * title
     *
     * @var String
     */
    protected String $title;

    /**
     * prefix
     *
     * @var String
     */
    protected String $prefix;

    /**
     * import excel example path
     *
     * @var String
     */
    protected String $importExcelExamplePath;

    /**
     * pdf paper size
     *
     * @var String
     */
    protected String $pdfPaperSize = 'A4';

    /**
     * dropbox service
     *
     * @var DropBoxService
     */
    protected DropBoxService $dropBoxService;

    /**
     * setting repository
     *
     * @var SettingRepository
     */
    protected SettingRepository $settingRepository;

    /**
     * middlewares
     *
     * @var array
     */
    protected array $middlewares = [];

    /**
     * data
     *
     * @var array
     */
    protected array $data = [];

    /**
     * html columns
     *
     * @var array
     */
    protected array $htmlColumns = [];

    /**
     * with columns
     *
     * @var array
     */
    protected array $withColumns = [];

    /**
     * import
     *
     * @var GeneralImport
     */
    protected GeneralImport $import;

    /**
     * is crud
     *
     * @var bool
     */
    protected bool $isCrud = false;

    /**
     * is app crud
     *
     * @var bool
     */
    protected bool $isAppCrud = false;

    /**
     * file util
     *
     * @var FileUtil
     */
    protected FileUtil $fileUtil;

    /**
     * form request
     *
     * @var FormRequest
     */
    protected FormRequest $request;

    /**
     * file columns
     *
     * @var array
     */
    protected array $fileColumns = [];

    protected ?string $exportTitle;

    protected string $excelFileName;

    /**
     * excel data
     *
     * @var array|Collection
     */
    protected array|Collection $excelData = [];

    /**
     * debug data
     *
     * @var bool
     */
    protected bool $dd = false;

    /**
     * show export datatable
     *
     * @var bool
     */
    protected bool $isShowExportDatatable = true;

    /**
     * constructor method
     *
     * @return void
     */
    public function __construct()
    {
        $this->fileService           = new FileService;
        $this->pdfService            = new PDFService;
        $this->emailService          = new EmailService;
        $this->userRepository        = new UserRepository;
        $this->dropBoxService        = new DropBoxService;
        $this->activityLogRepository = new ActivityLogRepository;
        $this->requestLogRepository  = new RequestLogRepository;
        $this->dropBoxService        = new DropBoxService;
        $this->settingRepository     = new SettingRepository;
        $this->import                = new GeneralImport;
        $this->fileUtil              = new FileUtil;
        $this->request               = new FormRequest;
    }

    /**
     * determine can show deleted data
     *
     * @return boolean
     */
    protected function canShowDeleted()
    {
        return can($this->title . ' Terhapus') && method_exists($this->repository->getModel(), 'trashed');
    }

    /**
     * Default middleware
     *
     * @param string|null $moduleName
     * @param array $only
     * @return void
     */
    public function defaultMiddleware($moduleName = null, ?array $only = [])
    {
        if (empty($moduleName)) {
            return;
        }
        $middlewares = [];
        foreach ($this->middlewares as $middleware) {
            if (is_string($middleware)) {
                $middlewares[] = new Middleware('permission:' . $middleware);
            } else {
                $middlewares[] = $middleware;
            }
        }
        if ($moduleName) {
            $moduleName = str_replace('can:', '', $moduleName);
            if (count($only) > 0) {
                $middlewares[] = new Middleware('permission:' . $moduleName, only: $only);
            } else {
                $middlewares[] = new Middleware('permission:' . $moduleName);
            }
        }
        $this->middlewares = array_merge([
            new Middleware('permission:' . $moduleName),
            new Middleware('permission:' . $moduleName . ' Tambah', only: ['create', 'store', 'storeData']),
            new Middleware('permission:' . $moduleName . ' Ubah', only: ['edit', 'update', 'updateData']),
            new Middleware('permission:' . $moduleName . ' Detail', only: ['show']),
            new Middleware('permission:' . $moduleName . ' Hapus', only: ['destroy', 'destroyUsingCheckbox', 'destroyData', 'truncate']),
            new Middleware('permission:' . $moduleName . ' Ekspor', only: ['json', 'excel', 'csv', 'pdf', 'exportJson', 'exportExcel', 'exportCsv', 'exportPdf']),
            new Middleware('permission:' . $moduleName . ' Impor Excel', only: ['importExcel', 'importExcelExample']),
            new Middleware('permission:' . $moduleName . ' Force Login', only: ['forceLogin']),
            new Middleware('permission:' . $moduleName . ' Terhapus', only: ['restore', 'restoreAll', 'forceDelete', 'forceDeleteAll']),
        ], $middlewares);
    }

    /**
     * set permissions
     *
     * @param array $middlewares
     * @return void
     */
    protected function setPermissions(array $middlewares)
    {
        foreach ($middlewares as $middleware) {
            $middlewareName = str_replace('can:', '', $middleware['name']);
            if (count($middleware['only'] ?? []) > 0) {
                $middlewares[] = new Middleware('permission:' . $middlewareName, only: $middleware['only']);
            } else {
                $middlewares[] = new Middleware('permission:' . $middlewareName);
            }
        }
        $this->middlewares = array_merge($this->middlewares, $middlewares);
    }

    /**
     * Default data index
     *
     * @param string $title
     * @param string $permissionPrefix
     * @param string $routePrefix
     * @return array
     */
    public function getDefaultDataIndex(string $title, string $permissionPrefix, string $routePrefix)
    {
        $canCreate      = can($permissionPrefix . ' Tambah');
        $canUpdate      = can($permissionPrefix . ' Ubah');
        $canDuplicate   = can($permissionPrefix . ' Duplikat');
        $canDetail      = can($permissionPrefix . ' Detail');
        $canDelete      = can($permissionPrefix . ' Hapus');
        $canImportExcel = can($permissionPrefix . ' Impor Excel');
        $canExport      = can($permissionPrefix . ' Ekspor');
        $canForceLogin  = can($permissionPrefix . ' Force Login');
        $canBlock       = can($permissionPrefix . ' Blokir');
        $canFilterData  = can($permissionPrefix . ' Filter Data');
        $canShowDeleted = can($permissionPrefix . ' Terhapus') && method_exists($this->repository->getModel(), 'trashed');

        return [
            'canCreate'              => $canCreate,
            'canUpdate'              => $canUpdate,
            'canDetail'              => $canDetail,
            'canDelete'              => $canDelete,
            'canImportExcel'         => $canImportExcel,
            'canExport'              => $canExport,
            'canForceLogin'          => $canForceLogin,
            'canBlock'               => $canBlock,
            'canFilterData'          => $canFilterData,
            'canShowDeleted'         => $canShowDeleted,
            'canDuplicate'           => $canDuplicate,
            'title'                  => $title,
            'moduleIcon'             => $this->icon,
            'route_create'           => $canCreate ? route($routePrefix . '.create', ['filter_role' => request('filter_role')]) : null,
            'route_restore_all'      => $canShowDeleted && Route::has($routePrefix . '.restore-all') ? route($routePrefix . '.restore-all') : null,
            'route_force_delete_all' => $canShowDeleted && Route::has($routePrefix . '.force-delete-all') ? route($routePrefix . '.force-delete-all') : null,
            'routeImportExcel'       => $canImportExcel && Route::has($routePrefix . '.import-excel') ? route($routePrefix . '.import-excel', ['filter_role' => request('filter_role')]) : null,
            'routeExampleExcel'      => $canImportExcel && Route::has($routePrefix . '.import-excel') ? route($routePrefix . '.import-excel-example', ['filter_role' => request('filter_role')]) : null,
            'routePdf'               => $canExport && Route::has($routePrefix . '.pdf') ? route($routePrefix . '.pdf') : null,
            'routeExcel'             => $canExport && Route::has($routePrefix . '.excel') ? route($routePrefix . '.excel') : null,
            'routeCsv'               => $canExport && Route::has($routePrefix . '.csv') ? route($routePrefix . '.csv') : null,
            'routeJson'              => $canExport && Route::has($routePrefix . '.json') ? route($routePrefix . '.json') : null,
            'routeYajra'             => Route::has($routePrefix . '.ajax-yajra') ? route($routePrefix . '.ajax-yajra') : null,
            'routeStore'             => Route::has($routePrefix . '.store') ? route($routePrefix . '.store') : null,
            'routePrefix'            => $routePrefix,
            'isExport'               => false,
            'folder'                 => $routePrefix,
            'viewFolder'             => $this->viewFolder,
            'prefix'                 => $this->prefix ?? null,
        ];
    }

    /**
     * Default data create
     *
     * @param string $title
     * @param string $prefixRoute
     * @return array
     */
    public function getDefaultDataCreate(string $title, string $prefixRoute)
    {
        if (request()->ajax()) {
            $isAjax = true;
        }
        $routeIndex = route($prefixRoute . '.index');
        return [
            'title'           => $title,
            'routeIndex'      => $routeIndex,
            'action'          => route($prefixRoute . '.store'),
            'moduleIcon'      => $this->icon,
            'isDetail'        => false,
            'isAjax'          => $isAjax ?? false,
            'breadcrumbs'     => [
                [
                    'label' => __('Dashboard'),
                    'link'  => route('dashboard.index')
                ],
                [
                    'label' => $title,
                    'link'  => $routeIndex
                ],
                [
                    'label' => 'Tambah'
                ]
            ],
            'viewFolder' => $this->viewFolder,
        ];
    }

    /**
     * get index data
     *
     * @return Collection|null
     */
    protected function getIndexData()
    {
        return null;
    }

    /**
     * Default data detail
     *
     * @param string $title
     * @param string $prefixRoute
     * @param Model $row
     * @param boolean $isDetail
     * @return array
     */
    public function getDefaultDataDetail(string $title, string $prefixRoute, Model $row, bool $isDetail)
    {
        $routeIndex  = route($prefixRoute . '.index');
        $breadcrumbs = [
            [
                'label' => __('Dashboard'),
                'link'  => route('dashboard.index')
            ],
            [
                'label' => $title,
                'link'  => $routeIndex
            ],
            [
                'label' => $isDetail ? 'Detail' : 'Ubah'
            ]
        ];
        return [
            'd'           => $row,
            'title'       => $title,
            'routeIndex'  => $routeIndex,
            'action'      => route($prefixRoute . '.update', [$row->id]),
            'moduleIcon'  => $this->icon,
            'isDetail'    => $isDetail,
            'breadcrumbs' => $breadcrumbs,
            'viewFolder'  => $this->viewFolder,
            'prefix'      => $this->prefix ?? null,
        ];
    }

    /**
     * download import example
     *
     * @return BinaryFileResponse
     */
    public function importExcelExample(): BinaryFileResponse
    {
        return response()->download($this->importExcelExamplePath);
    }

    /**
     * get export data
     *
     * @return array
     */
    protected function getExportData(): array
    {
        $times      = date('Y-m-d_H.i.s');
        $moduleName = $this->title;
        $data       = [
            'isExport'    => true,
            'pdf_name'    => $times . '_' . $moduleName . '.pdf',
            'excel_name'  => $times . '_' . $moduleName . '.xlsx',
            'csv_name'    => $times . '_' . $moduleName . '.csv',
            'json_name'   => $times . '_' . $moduleName . '.json',
            'prefix'      => $this->prefix ?? null,
            'exportTitle' => $this->exportTitle ?? $this->title,
            'isAppCrud'   => $this->isAppCrud,
            'htmlColumns' => $this->htmlColumns,
        ];

        return array_merge($data, $this->getIndexDataFromParent());
    }

    /**
     * download export data as json
     *
     * @return BinaryFileResponse
     */
    public function json(): BinaryFileResponse
    {
        $data  = $this->getExportData();
        return $this->fileUtil->downloadJson($data['data'], $data['json_name']);
    }

    /**
     * download export data as xlsx
     *
     * @param bool $isXlsx
     * @return BinaryFileResponse
     */
    private function execExcel($isXlsx = true): BinaryFileResponse
    {
        $data  = array_merge($this->getExportData(), [
            'exportTitle' => $this->exportTitle ?? $this->title,
        ]);
        $path = 'stisla.' . $this->viewFolder . '.table';
        if (!file_exists(resource_path('views/' . $path . '.blade.php'))) {
            $path = 'stisla.' . $this->prefix . '.table';
        }
        if ($isXlsx)
            return $this->fileUtil->downloadExcelGeneral($path, $data, $this->excelFileName ?? $data['excel_name']);
        return $this->fileUtil->downloadCsvGeneral($path, $data, $data['csv_name']);
    }

    /**
     * download export data as xlsx
     *
     * @return BinaryFileResponse
     */
    public function excel(): BinaryFileResponse
    {
        return $this->execExcel(true);
    }

    /**
     * download export data as csv
     *
     * @return Response
     */
    public function csv()
    {
        return $this->execExcel(false);
    }

    /**
     * download export data as pdf
     *
     * @return Response
     */
    public function pdf(): Response
    {
        $data  = array_merge($this->getExportData(), [
            'exportTitle' => $this->exportTitle ?? $this->title,
        ]);
        $html = view('stisla.includes.others.export-pdf', $data)->render();
        return $this->fileUtil->downloadPdfFromHtml($html, $data['pdf_name'], $this->paperSize, $this->orientationPdf);
    }

    /**
     * get index data
     *
     * @param array $data
     * @return array
     */
    protected function getIndexDataFromParent(array $data = [])
    {
        $prefix = $this->prefix;
        $title  = $this->title;

        $isYajra     = Route::is($prefix . '.index-yajra');
        $isAjax      = Route::is($prefix . '.index-ajax');
        $isAjaxYajra = Route::is($prefix . '.index-ajax-yajra');

        if ($isYajra || $isAjaxYajra)
            $data = collect([]);
        else {
            if (isset($data['data']))
                $data = $data['data'];
            // else if (count($this->data) > 0)
            //     $data = $this->data;
            else
                $data = $this->getIndexData2() ?? $this->getIndexData() ?? $this->repository->getFullData();
        }

        $defaultData = $this->getDefaultDataIndex($title, $title, $prefix . '');
        $users = [];

        if (Route::is($prefix . '.index') || Route::is($prefix . '.index-ajax'))
            $users = $this->userRepository->getLatest();

        $times    = date('Y-m-d_H.i.s');
        $filename = $times . '_' . $title;

        return array_merge($defaultData, [
            'data'         => $data,
            'isYajra'      => $isYajra,
            'isAjax'       => $isAjax,
            'isAjaxYajra'  => $isAjaxYajra,
            'yajraColumns' => $this->repository->getYajraColumns(),
            'users'        => $users,
            'isExport'     => false,
            'pdf_name'     => $filename . '.pdf',
            'excel_name'   => $filename . '.xlsx',
            'csv_name'     => $filename . '.csv',
            'json_name'    => $filename . '.json',
            'moduleIcon'   => $this->icon,
            'canExport'    => $this->canExport ?? $defaultData['canExport'],
            'exportTitle'  => $this->exportTitle ?? $this->title,
        ], $this->getHasColumns());
    }

    /**
     * import excel file to db
     *
     * @param ImportExcelRequest $request
     * @return Response
     */
    public function importExcel(ImportExcelRequest $request)
    {
        $this->fileUtil->importExcel($this->import, $request->file('import_file'));
        $successMessage = successMessageImportExcel($this->title);

        return backSuccess($successMessage);
    }

    /**
     * download export data as json
     *
     * @return Response
     */
    public function exportJson()
    {
        $filename = date('Y-m-d_H.i.s') . '_' . $this->title . '.json';
        if ($this->excelData instanceof Collection) {
            $data = $this->excelData;
        } else
            $data     = $this->getIndexData() ?? $this->repository->getLatest();

        return $this->fileUtil->downloadJson($data, $filename);
    }

    /**
     * download export data as xlsx
     *
     * @return Response
     */
    public function exportExcel()
    {
        $data  = $this->getExportData();
        if ($this->excelData instanceof Collection) {
            $data['data'] = $this->excelData;
        }
        $data['isExport'] = true;

        if ($this->isAppCrud) {
            return $this->fileUtil->downloadExcelGeneral('stisla.' . $this->prefix . '.only-table', $data, $data['excel_name']);
        }
        return $this->fileUtil->downloadExcelGeneral('stisla.' . $this->prefix . '.table', $data, $data['excel_name']);
    }

    /**
     * download export data as csv
     *
     * @return Response
     */
    public function exportCsv()
    {
        $data  = $this->getExportData();
        if ($this->excelData instanceof Collection) {
            $data['data'] = $this->excelData;
        }
        $data['isExport'] = true;

        if ($this->isAppCrud)
            return $this->fileUtil->downloadCsvGeneral('stisla.' . $this->prefix . '.only-table', $data, $data['csv_name']);
        return $this->fileUtil->downloadCsvGeneral('stisla.' . $this->prefix . '.table', $data, $data['csv_name']);
    }

    /**
     * download export data as pdf
     *
     * @param null|Collection $data
     * @return Response
     */
    protected function executePdf($data = null)
    {
        $filename = date('Y-m-d H.i.s') . '_' . $this->title . '.pdf';
        $canDuplicate   = can($this->title . ' Duplikat');
        $data = array_merge([
            'title'          => $this->title,
            'data'           => ($this->getIndexData2() ?? $this->getIndexData() ?? $data ?? $this->repository->getFullData()),
            'isExport'       => true,
            'prefix'         => $this->prefix,
            'isAppCrud'      => $this->isAppCrud,
            'canShowDeleted' => $this->canShowDeleted(),
            'canDuplicate'   => $canDuplicate,
        ], $this->getHasColumns());

        $html     = view('stisla.includes.others.export-pdf', $data)->render();

        if ($this->pdfPaperSize === 'A2') {
            return $this->pdfService->downloadPdfA2($html, $filename);
        } else if ($this->pdfPaperSize === 'A4') {
            return $this->pdfService->downloadPdfA4($html, $filename);
        } else if ($this->pdfPaperSize === 'A3') {
            return $this->pdfService->downloadPdfA3($html, $filename);
        }
        return $this->pdfService->downloadPdf($html, $filename, $this->pdfPaperSize, $this->orientationPdf);
    }

    /**
     * download export data as pdf
     *
     * @return Response
     */
    public function exportPdf()
    {
        return $this->executePdf();
    }

    /**
     * download import example
     *
     * @return BinaryFileResponse
     */
    protected function executeImportExcelExample(): BinaryFileResponse
    {
        $excelInstance = new GeneralExport('stisla.' . $this->prefix . '.table', [
            'data' => $this->repository->getFullData(),
            'isExport' => true,
        ]);
        return $this->fileUtil->downloadExcel($excelInstance, Str::snake($this->prefix) . '_import.xlsx');
    }

    /**
     * execute destroy
     *
     * @param Model $model
     * @return Response
     */
    protected function executeDestroy(Model $model)
    {
        $this->repository->delete($model->id);
        logDelete($this->title, $model);
        $successMessage = successMessageDelete($this->title);

        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => $successMessage,
            ]);
        }

        return backSuccess($successMessage);
    }

    /**
     * get store data
     *
     * @return array
     */
    protected function getStoreData()
    {
        return request()->all();
    }

    /**
     * execute update
     *
     * @param Request $request
     * @param Model $model
     * @param bool|null $withUser
     * @return Response
     */
    protected function executeUpdate(Request $request, Model $model, ?bool $withUser = false)
    {
        $data    = $this->getStoreData($request);
        $newData = $withUser ? $this->repository->updateWithUser($data, $model->id) : $this->repository->update($data, $model->id);
        logUpdate($this->title, $model, $newData);
        $successMessage = successMessageUpdate($this->title);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => $successMessage,
            ]);
        }

        if (is_app_pocari())
            return redirect()->route($this->prefix . '.index')->with('successMessage', $successMessage);

        return backSuccess($successMessage);
    }

    /**
     * execute duplicate
     *
     * @param Request $request
     * @param Model $model
     * @param bool|null $withUser
     * @return Response
     */
    protected function executeDuplicate(Model $model, ?bool $withUser = false)
    {
        $data    = $model->toArray();
        unset($data['id']);
        if ($data['email'] ?? false) {
            $data['email'] = 'copy_' . $data['email'];
        } else if ($data['username'] ?? false) {
            $data['username'] = 'copy_' . $data['username'];
        } else if ($data['slug'] ?? false) {
            $data['slug'] = 'copy-' . $data['slug'];
        } else if ($data['code'] ?? false) {
            $data['code'] = 'copy-' . $data['code'];
        } else if ($data['number'] ?? false) {
            $data['number'] = 'copy-' . $data['number'];
        } else if ($data['title'] ?? false) {
            $data['title'] = 'Copy of ' . $data['title'];
        } else if ($data['name'] ?? false) {
            $data['name'] = 'Copy of ' . $data['name'];
        } else if ($data['nik'] ?? false) {
            $data['nik'] = 'copy_' . $data['nik'];
        }
        $newData = $withUser ? $this->repository->createWithUser($data) : $this->repository->create($data);
        logDuplicate($this->title, $newData);
        $successMessage = successMessageDuplicate($this->title, model: $newData);

        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => $successMessage,
                'data'    => $newData,
            ]);
        }

        return backSuccess($successMessage);
    }

    /**
     * save data to db
     *
     * @param Request $request
     * @param bool|null $withUser
     * @return Response
     */
    protected function executeStore(Request $request, ?bool $withUser = false, ?callable $callback = null, ?array $data = [])
    {
        $data   = array_merge($data, $this->getStoreData($request));
        $result = $withUser ? $this->repository->createWithUser($data) : $this->repository->create($data);
        logCreate($this->title, $result);
        $successMessage = successMessageCreate($this->title);

        if ($callback) {
            $callback($data, $result);
        }

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => $successMessage,
            ]);
        }
        if (is_app_pocari())
            return redirect()->route($this->prefix . '.index')->with('successMessage', $successMessage);
        return backSuccess($successMessage);
    }

    /**
     * get form data
     *
     * @return array
     */
    protected function formData(): array
    {
        return [];
    }

    /**
     * prepare create form
     *
     * @param Request $request
     * @param array $data
     * @return Response
     */
    protected function prepareCreateForm(Request $request, array $data = [])
    {
        $fullTitle  = __('Tambah ' . $this->title);
        $data       = array_merge($this->getDefaultDataCreate($this->title, $this->prefix), $data, ['prefix' => $this->prefix]);
        $data       = array_merge($data, [
            'selectOptions'   => get_options(10, true),
            'select2Options'  => get_options(10),
            'radioOptions'    => get_options(4),
            'checkboxOptions' => get_options(5),
            'fullTitle'       => $fullTitle,
        ], $this->getHasColumns(), $this->formData());

        if ($this->dd) {
            dd($data);
        }

        if ($request->ajax()) {
            return view('stisla.' . $this->prefix . '.only-form', $data);
        }

        if ($this->isCrud)
            return view('stisla.layouts.app-crud-form', $data);
        return view('stisla.' . $this->prefix . '.form', $data);
    }

    /**
     * get detail data
     *
     * @param Model|Illuminate\Foundation\Auth\User $model
     * @param bool $isDetail
     * @param array $data
     * @return array
     */
    protected function getDetailData(Model $model, bool $isDetail = false, array $data = []): array
    {
        $defaultData = $this->getDefaultDataDetail($this->title, $this->prefix, $model, $isDetail);
        return array_merge($defaultData, [
            'selectOptions'   => get_options(10, true),
            'select2Options'  => get_options(10, true),
            'radioOptions'    => get_options(4),
            'checkboxOptions' => get_options(5),
            'fullTitle'       => $isDetail ? __('Detail ' . $this->title) : __('Ubah ' . $this->title),
        ], $data, $this->getHasColumns());
    }

    /**
     * prepare index
     *
     * @param Request $request
     * @param array $data
     * @return Response
     */
    protected function prepareIndex(Request $request, array $data2 = [])
    {
        $data = array_merge($this->getIndexDataFromParent($data2), $data2, [
            'prefix'      => $this->prefix,
            'htmlColumns' => $this->getHtmlColumns(),
            'fileColumns' => $this->fileColumns,
            'isAppCrud'   => $this->isAppCrud,
        ]);

        if ($this->dd) {
            dd($data);
        }

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'data'    => view('stisla.' . $this->prefix . '.table', $data)->render(),
            ]);
        }

        if ($this->isAppCrud) {
            return view('stisla.' . $this->prefix . '.table', $data);
        }

        if ($this->isCrud) {
            return view('stisla.layouts.app-crud-index', $data);
        }

        return view('stisla.' . $this->prefix . '.index', $data);
    }

    /**
     * prepare detail form
     *
     * @param Request $request
     * @param Model $model
     * @param bool $isDetail
     * @param array $data
     * @return Response
     */
    protected function prepareDetailForm(Request $request, Model $model, bool $isDetail = false, array $data = [])
    {
        $data = array_merge($this->getDetailData($model, $isDetail), $data, $this->formData());

        if ($request->ajax()) {
            return view('stisla.' . $this->prefix . '.only-form', $data);
        }

        if ($this->isAppCrud) {
            return view('stisla.' . $this->prefix . '.form', $data);
        }

        if ($this->isCrud)
            return view('stisla.layouts.app-crud-form', $data);
        return view('stisla.' . $this->prefix . '.form', $data);
    }

    /**
     * datatable yajra index
     *
     * @return Response
     */
    public function yajraAjax()
    {
        $defaultData = $this->getDefaultDataIndex(__($this->title), $this->title, $this->prefix);
        return $this->repository->getYajraDataTables($defaultData);
    }

    public static function middleware(): array
    {
        $class = new static();
        if (count($class->middlewares) > 0) {
            return $class->middlewares;
        }
        return [];
    }

    /**
     * check is demo
     *
     * @param string $title
     * @return array|Response|null
     */
    public function checkIsDemo($title)
    {
        if (config('app.is_demo')) {
            if (request()->isMethod('get')) {
                return [true, view('stisla.ubuntu.index', ['title' => $title])->render()];
            } else {
                abort(403, 'Dalam versi demo, fitur ini tidak tersedia.');
            }
        }
    }

    /**
     * construct is demo
     *
     * @return void
     */
    protected function constructIsDemo()
    {
        if (config('app.is_demo')) {
            if (request()->isMethod('get')) {
            } else {
                abort(403, 'Dalam versi demo, fitur ini tidak tersedia.');
            }
        }
    }

    /**
     * execute restore
     *
     * @param Model $model
     * @return Response
     */
    protected function executeRestore(Model $model)
    {
        $this->repository->restore($model->id);
        logRestore($this->title, $model, $model);
        $successMessage = successMessageRestore($this->title);

        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => $successMessage,
            ]);
        }

        return backSuccess($successMessage);
    }

    /**
     * execute force delete
     *
     * @param Model $model
     * @return Response
     */
    protected function executeForceDelete(Model $model)
    {
        $this->repository->forceDelete($model->id);
        logForceDelete($this->title, $model);
        $successMessage = successMessageForceDelete($this->title);

        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => $successMessage,
            ]);
        }

        return backSuccess($successMessage);
    }

    /**
     * restore deleted data
     *
     * @param string $id
     * @return Response
     */
    public function restore(string $id)
    {
        $model = $this->repository->find($id, deleted: true);
        return $this->executeRestore($model);
    }

    /**
     * duplicate data in db
     *
     * @param string $id
     * @return Response
     */
    public function duplicate(string $id)
    {
        $model = $this->repository->findOrFail($id);
        return $this->executeDuplicate($model);
    }

    /**
     * show detail page
     *
     * @param Request $request
     * @param string $id
     * @return Response
     */
    public function showData(Request $request, string $id)
    {
        $model = $this->repository->findOrFail($id);
        return $this->prepareDetailForm($request, $model, true);
    }

    /**
     * showing edit data page
     *
     * @param Request $request
     * @param string $id
     * @return Response
     */
    public function editData(Request $request, string $id)
    {
        $model = $this->repository->findOrFail($id);
        // return $model;
        return $this->prepareDetailForm($request, $model);
    }

    /**
     * showing add new data page
     *
     * @param Request $request
     * @return Response
     */
    public function createData(Request $request)
    {
        return $this->prepareCreateForm($request);
    }

    /**
     * update data to db
     *
     * @param Request $request
     * @param string $id
     * @return Response
     */
    public function updateData(Request $request, string $id)
    {
        $model = $this->repository->findOrFail($id);
        $request->validate($this->request->rules(isMethodPut: true, id: $id));
        return $this->executeUpdate($request, $model, withUser: true);
    }

    /**
     * save new data to db
     *
     * @param Request $request
     * @return Response
     */
    public function storeData(Request $request)
    {
        $request->validate($this->request->rules());
        return $this->executeStore($request, withUser: true);
    }

    /**
     * force delete data from db
     *
     * @param string $id
     * @return Response
     */
    public function forceDelete(string $id)
    {
        $model = $this->repository->find($id, deleted: true);
        $this->fileUtil->deleteFiles($model, $this->fileColumns);
        return $this->executeForceDelete($model);
    }

    /**
     * delete data from db
     *
     * @param string $id
     * @return Response
     */
    public function destroyData(string $id)
    {
        $model = $this->repository->findOrFail($id);
        if (!Schema::hasColumn($model->getTable(), 'deleted_at'))
            $this->fileUtil->deleteFiles($model, $this->fileColumns);
        return $this->executeDestroy($model);
    }

    /**
     * execute get checkeds
     *
     * @return Collection|Response
     */
    protected function execCheckeds()
    {
        request()->validate([
            'checkeds'   => 'required',
        ]);
        $ids = json_decode(request('checkeds', []), true);
        $models = $this->repository->getWhereIn('id', $ids);
        if ($models->isEmpty()) {
            return backError('Tidak ada data yang dipilih.');
        }
        return $models;
    }

    /**
     * delete data using checkbox
     *
     * @return Response
     */
    public function destroyUsingCheckbox()
    {
        $models = $this->execCheckeds();
        $ids = $models->pluck('id')->toArray();
        $this->repository->deleteWhereIn('id', $ids);
        logDelete($this->title, $models);
        $successMessage = successMessageDelete($this->title);

        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => $successMessage,
            ]);
        }

        return backSuccess($successMessage);
    }

    /**
     * truncate all data from db
     *
     * @return Response
     */
    public function truncate()
    {
        if (is_superadmin() == false) {
            return backError('Hanya superadmin yang dapat melakukan aksi ini.');
        }
        $models = $this->repository->all();
        $this->repository->truncate();
        logDelete($this->title, $models);
        $successMessage = successMessageDelete($this->title);

        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => $successMessage,
            ]);
        }

        return backSuccess($successMessage);
    }

    /**
     * get has columns
     *
     * @return array
     */
    protected function getHasColumns(): array
    {
        $columns = $this->repository->getColumns();
        $data = [];
        foreach ($columns as $column) {
            $data['is_has_' . $column] = true;
        }
        return array_merge([
            'columns' => $columns,
        ], $data);
    }

    /**
     * before index data
     *
     * @return void
     */
    protected function beforeIndexData()
    {
        // to be overridden in child class if needed
    }

    /**
     * additional index data
     *
     * @return array
     */
    protected function additionalIndexData(): array
    {
        // to be overridden in child class if needed
        return [];
    }

    /**
     * showing data page
     *
     * @param Request $request
     * @return Response
     */
    public function indexData(Request $request)
    {
        $this->beforeIndexData();
        $columns = $this->getHasColumns();
        return $this->prepareIndex($request, array_merge([
            'data'                  => $this->getIndexData2(),
            'deletedData'           => $this->canShowDeleted() ? $this->getIndexData2(deleted: true) : collect([]),
            'countData'             => $this->repository->count(),
            'isShowExportDatatable' => $this->isShowExportDatatable,
        ], $columns, $this->additionalIndexData()));
    }

    /**
     * get data for index page
     *
     * @return Collection|null
     */
    public function getIndexData2(?bool $deleted = false)
    {
        return $this->repository->getFullDataWith(
            array_merge($this->withColumns, [
                'createdBy',
                'lastUpdatedBy',
            ]),
            where: [],
            whereHas: [],
            deleted: $deleted
        );
    }

    /**
     * force delete all deleted data from db
     *
     * @return Response
     */
    public function forceDeleteAll()
    {
        $models = $this->getIndexData2(deleted: true);
        foreach ($models as $model) {
            $this->fileUtil->deleteFiles($model, $this->fileColumns);
            $this->repository->forceDelete($model->id);
            logForceDelete($this->title, $model);
        }
        $successMessage = successMessageForceDeleteAll($this->title);

        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => $successMessage,
            ]);
        }

        return backSuccess($successMessage);
    }

    /**
     * restore all deleted data
     *
     * @return Response
     */
    public function restoreAll()
    {
        $models = $this->getIndexData2(deleted: true);
        foreach ($models as $model) {
            $this->repository->restore($model->id);
            logRestore($this->title, $model, $model);
        }
        $successMessage = successMessageRestoreAll($this->title);

        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => $successMessage,
            ]);
        }

        return backSuccess($successMessage);
    }

    /**
     * show single pdf page
     *
     * @param string $id
     * @return Response
     */
    public function singlePdf(string $id)
    {
        $model = $this->repository->findOrFail($id);
        if ($model instanceof User) {
            $isSiswa = $model->hasRole('siswa');
            $isGuru = $model->hasRole('guru');
            $this->exportTitle = $model->roles->count() ? ucwords($model->roles->first()->name ?? null) : null;
            $photo = $this->fileUtil->urlToFilePath($model->photo) ?? null;
            $avatar = $this->fileUtil->urlToFilePath($model->avatar ?? null);
        }
        $html = view('stisla.includes.others.single-pdf', [
            'd'           => $model,
            'title'       => $this->title,
            'prefix'      => $this->prefix,
            'exportTitle' => $this->exportTitle ?? $this->title,
            'isSiswa'     => $isSiswa ?? false,
            'isGuru'      => $isGuru ?? false,
            'photo'       => $photo ?? false,
            'avatar'      => $avatar ?? false,
            'isAppCrud'   => $this->isAppCrud,
            'columns'     => $this->repository->getColumns(),
            'htmlColumns' => $this->getHtmlColumns(),
            'fileColumns' => $this->fileColumns,
            'col'         => request('col'),
        ])->render();
        return $this->pdfService->downloadPdf($html, filename: Str::snake($this->title . ' ' . $model->name . '_' . date('Y_m_d_h_i_s')) . '.pdf', paper: 'legal', orientation: 'portrait');
    }

    /**
     * get html columns
     *
     * @return array
     */
    protected function getHtmlColumns(): array
    {
        $columns = $this->repository->getColumns();
        $htmlColumns = [];
        foreach ($columns as $column) {
            if (in_array($column, $this->htmlColumns)) {
                $htmlColumns[] = $column;
            }
        }
        return $htmlColumns;
    }

    /**
     * download export data as pdf using checkbox
     *
     * @return Response
     */
    public function exportPdfUsingCheckbox()
    {
        return $this->executePdf($this->execCheckeds());
    }

    /**
     * download export data as xlsx using checkbox
     *
     * @return Response
     */
    public function exportExcelUsingCheckbox()
    {
        $this->excelData = $this->execCheckeds();
        return $this->exportExcel();
    }

    /**
     * download export data as csv using checkbox
     *
     * @return Response
     */
    public function exportCsvUsingCheckbox()
    {
        $this->excelData = $this->execCheckeds();
        return $this->exportCsv();
    }

    /**
     * download export data as json using checkbox
     *
     * @return Response
     */
    public function exportJsonUsingCheckbox()
    {
        $this->excelData = $this->execCheckeds();
        return $this->exportJson();
    }
}
