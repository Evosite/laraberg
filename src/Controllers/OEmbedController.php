<?php

namespace Evosite\Laraberg\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Evosite\Laraberg\Services\OEmbedService;

class OEmbedController extends Controller
{
    public function show(Request $request, OEmbedService $oembed)
    {
        try {
            return $oembed->parse(
                $request->get('url')
            );
        } catch (\Exception $e) {
            return [];
        }
    }
}
