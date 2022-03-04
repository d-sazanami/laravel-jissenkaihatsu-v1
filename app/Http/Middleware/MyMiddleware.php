<?php

namespace App\Http\Middleware;

use App\Facades\MyService;
use Closure;
use Illuminate\Http\Request;

class MyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $id = rand(0, count(MyService::alldata()));
        MyService::setId($id);

        $merge_data = [
            'id' => $id,
            'msg' => MyService::say(),
            'alldata' => MyService::alldata()
        ];
        $request->merge($merge_data);

        $response = $next($request);

        $content = $response->content();
        $content .= '<sytle>
            body { background-color:#eef; }
            p { font-size: 18pt; }
            li { color:red; font-weight:bold; }
            </style>';
        $response->setContent($content);

        return $response;
    }
}
