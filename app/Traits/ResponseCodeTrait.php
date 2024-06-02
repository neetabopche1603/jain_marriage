<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

// use Illuminate\Support\Facades\Response;

trait ResponseCodeTrait
{
    /**
     * to get data for responseCode
     * @author Nita Bopche
     * @param int $code  Response code param
     *  @param string $token Response message param
     * @param string|array $data Response data param
     * @param string $message Response message param

     * @return array
     */


    public function getResponseCode($code, $token = null, $data = null, $message = null, $errorMsg = null)
    {
        $responseCode = [
            /*
        |---------------------------------------------------------------------
        |SEND TOKEN RESPONSE CODE (OK)[200 OK: The request has succeeded, and the response body contains the requested data.]
        |---------------------------------------------------------------------
        */
            // send Token
            '200' => [
                'status' => true,
                'token' => $token,
                'message' => $message,
                'data' => $data,
                'http_code' => 200

            ],
            /*
        |---------------------------------------------------------------------
        |GENERAL SUCCESS RESPONSE CODE (SUCCESS)[201 Created: The request has been fulfilled and a new resource has been created.]
        |---------------------------------------------------------------------
        */
            '201' => [
                'status' => true,
                'message' => $message,
                'data' => $data,
                'http_code' => 201

            ],

        /*
        |---------------------------------------------------------------------
        |VALIDATION ERROR RESPONSE CODE
        |---------------------------------------------------------------------
        */
            // 422 Unprocessable Entity: The server understands the request, but the request content (e.g. JSON payload) is invalid or incomplete due to validation errors.
            '422' => [
                'status' => false,
                'message' => 'Validation error',
                'error_message' => $message,
                'http_code' => 422

            ],

            // 400 Bad Request: The request was invalid or could not be understood by the server.
            '400' => [
                'status' => false,
                'message' => 'HTTP_BAD_REQUEST',
                'error_message' => $message,
                'http_code' => 400

            ],

            // 401 Unauthorized: The request requires user authentication, or the user credentials provided are invalid.
            '401' => [
                'status' => false,
                'message' => 'HTTP_UNAUTHORIZED',
                'error_message' => $message,
                'http_code' => 401

            ],

            // Not Found

            '404' => [
                'status' => false,
                'message' => $message,
                'http_code' => 404

            ],

            '500' => [
                'status' => false,
                'message' => $message,
                'http_code' => 500,
                'error_message' => $errorMsg
            ],

        ];
        return $responseCode[$code];
    }


    /**
     * Generate JSON response with provided response code and message.
     *
     * @param int $code
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    protected function tokenResponse($code, $message): JsonResponse
    {
        return response()->json([
            'response_code' => $code,
            'message' => $message,
            'timestamp' => now()->timestamp
        ], $code);
    }
}
