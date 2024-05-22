<?php

namespace App\Http\Controllers;

use App\Http\Resources\listNotifieResource;
use App\Services\NotifieService;
use App\Traits\APIResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NotifieController extends Controller
{
    use APIResponseTrait;

    public function __construct(protected NotifieService $notifieService)
    {

    }

    public function getNotifie(): JsonResponse
    {
        try {
            $data = $this->notifieService->getAll();
            return $this->successResponse(listNotifieResource::collection($data), 'Successfully', 200);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Somethings went wrong', 500);
        }
    }
}
