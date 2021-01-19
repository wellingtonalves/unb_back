<?php

namespace App\Providers;

use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\ServiceProvider;

class ResponseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('custom', function ($message = 'list', $response = null, $status = Response::HTTP_OK, $messageType = null) {
            $data = [];

            if ($response instanceof \Exception) {
                $data['message'] = $message ? __('messages.' . $message) : $response->getMessage();
                $data['status'] = Response::HTTP_INTERNAL_SERVER_ERROR;
                $data['messageType'] = __('messages.message_type.erro');

                return response()->json($data, $data['status']);
            }

            if (!$response instanceof LengthAwarePaginator) {
                $data['message'] = __('messages.' . $message);
                $data['messageType'] = $messageType ? __('messages.message_type.' . $messageType) : __('messages.message_type.sucesso');
                $data['data'] = $response;
                $data['status'] = $status;

                return response()->json($data, $data['status']);
            }

            $fields = collect([
                'message' => __('messages.' . $message),
                'status' => $status,
            ]);
            $data = $fields->merge($response);

            return response()->json($data, $data['status']);
        });
    }
}
