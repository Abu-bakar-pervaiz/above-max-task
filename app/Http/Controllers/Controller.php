<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function image($image, $folder, $deleteOld = false, $oldName = ''){

        $filename = uniqid('logo_').'.'.$image->getClientOriginalExtension();
        $image->storeAs('public/'.$folder, $filename);
        if ($deleteOld) {
            Storage::delete('public/'.$folder.'/' . $oldName);
        }
        return $filename;
        
    }
}
