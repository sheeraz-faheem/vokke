<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Kangaroo;
use App\Services\KangarooService;
use App\Http\Requests\StoreKangarooRequest;

class KangarooController extends Controller
{
    /**
     * @var KangarooService
     */
    private $kangarooService;

    /**
     * @param KangarooService $kangarooService
     */
    public function __construct(KangarooService $kangarooService)
    {
        $this->kangarooService = $kangarooService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        $kangaroos = $this->kangarooService->list();

        return response()->json([
            "status" => "success", 
            "count"  => count($kangaroos), 
            "data"   => $kangaroos,
        ], 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\StoreKangarooRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreKangarooRequest $request): JsonResponse
    {
        try {
            $kangaroo = $this->kangarooService->store($request->input());

            return response()->json([
                "status"  => "success",
                "message" => "Kangaroo added.",
                "data" => $kangaroo
            ], 201);
        } catch (Exception $exception) {
            return response()->json([
                "status" => "failed", 
                "error"  => $exception->getMessage()
            ], 404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $kangaroo = $this->kangarooService->find($id);

        if($kangaroo) {
            return response()->json([
                "status" => "success", 
                "data"   => $kangaroo
            ], 200);
        }

        return response()->json([
            "status"  => "failed", 
            "message" => "Kangaroo not found."
        ], 404);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $kangaroo = $this->kangarooService->find($id);

        if($kangaroo) {
            $kangarooUpdate = $this->kangarooService->update($request, $id);

            return response()->json([
                "status"  => "success",
                "message" => "Kangaroo updated.",
                "data" => $kangarooUpdate
            ], 201);
        }

        return response()->json([
            "status"  => "failed", 
            "message" => "Kangaroo not found."
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $kangaroo = $this->kangarooService->find($id);

        if($kangaroo) {
            $kangaroo->delete();

            return response()->json([
                "status"  => "success",
                "message" => "Kangaroo deleted."
            ], 200);
        }

        return response()->json([
            "status"  => "failed", 
            "message" => "Kangaroo not found."
        ], 404);
    }
}