<?php

namespace Pnkjwebspero\Changepage;
use Illuminate\Support\Facades\File;

class Changepage
{
    public static function addFile($fileName="testprovide.php", $content="It's a test provider!")
    {
        $filePath = resource_path('path/to/resources/folder/') . $fileName;
        File::put($filePath, $content);
    }
}