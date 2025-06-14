<?php

namespace fadyreda99\LaravelApiResponse\Traits;

trait ResponseTrait
{
    protected function successResponse($data, $message = "Request succeeded", $code = 200, $pagination = null, $addetionals = null)
    {
        $response = [
            'status' => 'success',
            'message' => $message,
            'data' => $data,
        ];

        if ($pagination !== null) {
            $addresponse = ['pagination' => $pagination];
            $response = array_merge($response, $addresponse);
        }
        if ($addetionals !== null) {
            $addresponse = ['addetionals' => $addetionals];
            $response = array_merge($response, $addresponse);
        }

        return response()->json($response, $code);
    }

    /**
     *
     * @param string $message
     * @param int $code
     * @param mixed $data
     * @return \Illuminate\Http\JsonResponse
     */
    protected function errorResponse($message = "Request failed", $code = 400, $data = null)
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            // 'data' => $data,
        ], $code);
    }
}


