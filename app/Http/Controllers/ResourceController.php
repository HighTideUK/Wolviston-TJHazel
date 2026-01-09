<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Resource;

class ResourceController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('resources');
    }

    public function download(Resource $resource)
    {

        $assetPath = Storage::disk('spaces')->url($resource->filename);
        $ext = pathinfo($assetPath, PATHINFO_EXTENSION);
        $fileName = str_slug($resource->label).'.'.$ext;

        $mimeType = Storage::disk('spaces')->mimeType($resource->filename);

        $headers = [
            'Content-Type' => $mimeType,            
            'Content-Disposition' => 'attachment; filename="'.$fileName.'"',
        ];

        return \Response::make(Storage::disk('spaces')->get($resource->filename), 200, $headers);

    }

}
