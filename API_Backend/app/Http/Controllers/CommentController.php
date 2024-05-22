<?php

namespace App\Http\Controllers;

use App\Http\Resources\CommentsResource;
use App\Http\Resources\listCommentResource;
use App\Services\CommentService;
use App\Traits\APIResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    use APIResponseTrait;

    public function __construct(protected CommentService $commentService)
    {
    }

    public function getComment(): JsonResponse
    {
//        try {
//            $data = $this->commentService->getAll();
//            return $this->successResponse(listCommentResource::collection($data), 'Successfully', 200);
//        } catch (\Exception $exception) {
//            return $this->errorResponse($exception->getMessage(), 'Somethings went wrong', 500);
//        }

        try {
            // Sử dụng eager loading để load dữ liệu từ mối quan hệ 'user'
            $data = $this->commentService->getAllWithUser();

            // Sử dụng resource để định dạng dữ liệu trước khi trả về
            return $this->successResponse(
                $data,
//                CommentsResource::collection($data),
                'Successfully',
                200);
//            return $this->successResponse(
//                listCommentResource::collection($data),
//                'Successfully',
//                200);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Somethings went wrong', 500);
        }
    }
}
