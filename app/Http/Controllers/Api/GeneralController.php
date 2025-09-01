<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Repository;

class GeneralController extends Controller
{
    /**
     * Repository $repository
     *
     * @var Repository
     */
    private Repository $repository;

    /**
     * constructor method
     *
     * @param Repository $repository
     * @return void
     */
    public function __construct()
    {
        $this->repository = new Repository();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = $this->repository->getGeneralApi();

        return response()->json([
            'message' => 'Data berhasil ditampilkan',
            'data'    => $result
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $result = $this->repository->insertGeneralApi();

        return response()->json([
            'message' => 'Data berhasil ditambahkan',
            'data'    => $result
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $result = $this->repository->getGeneralApiById($id);

        return response()->json([
            'message' => 'Data berhasil ditampilkan',
            'data'    => $result
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id)
    {
        $result = $this->repository->updateGeneralApi($id);

        return response()->json([
            'message' => 'Data berhasil diperbarui',
            'data'    => $result
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = $this->repository->deleteGeneralApi($id);

        return response()->json([
            'message' => 'Data berhasil dihapus',
            'data'    => $result
        ]);
    }
}
