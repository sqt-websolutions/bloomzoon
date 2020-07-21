<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\FileBag;

class ParseFileFromFileMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return void
     */
    public function handle($request, Closure $next)
    {
        $files = $request->files->all();

        foreach ($files as $key => $file) {
            $file_name = md5($file->getClientOriginalName()).'.'.$file->getClientOriginalExtension();
            $path = Storage::disk('public')->putFileAs(
                '/uploads',
                $file,
                $file_name
            );
            $request->files->remove($key);
            $request->offsetSet($key, $path);
        }
        return $next($request);
    }
}
