<?php

namespace App\Http\Controllers\Api\Traits;

use App\Models\Api\ApiLog;
use App\Models\ApiLogs;
use Illuminate\Support\Facades\Auth;

trait Methods {

    private function logRequest($request)
    {
        $log = new ApiLogs();

        $log->user_id = Auth::id();
        $log->type = 'request';
        $log->url = $request->getUri();
        $log->method = $request->getMethod();
        $log->body = json_encode($request->all());

        $log->save();
    }

    private function logResponse($request, $result)
    {
        $log = new ApiLogs();

        $log->user_id = Auth::id();
        $log->type = 'response';
        $log->url = $request->getUri();
        $log->method = $request->getMethod();
        $log->body = json_encode($result);

        $log->save();
    }

    private function logResult($result)
    {
        $trace = debug_backtrace();
        $caller = $trace[1];

        $log = new ApiLogs();

        $log->user_id = Auth::id();
        $log->type = 'response';
        $log->url = 'null';
        $log->method = $caller['function'];
        $log->body = json_encode($result);

        $log->save();
    }
}
