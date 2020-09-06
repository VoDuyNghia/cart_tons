<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param array $errors
     * @param int $httpCode
     * @return JsonResponse
     */
    public function sendResult(
        array $errors,
        int $httpCode
    ): JsonResponse {
        return response()->json(
            $errors,
            $httpCode
        );
    }

    public function handleIsStatus($is_status)
    {
        if ($is_status == 'on') {
            $is_status = 1;
        } else {
            $is_status = 0;
        }

        return $is_status;
    }
}
