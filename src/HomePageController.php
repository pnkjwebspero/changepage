<?php

namespace Pnkjwebspero\Changepage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HomePageController extends Controller
{
    public function index()
    {
        return view('changepage::index');
    }

    public function addFile()
    {
        $fileName = "testProvider.php";
        $content = "This Provider for testing!";
        $filePath = resource_path('path/to/resources/folder/') . $fileName;
        File::put($filePath, $content);
    }
}