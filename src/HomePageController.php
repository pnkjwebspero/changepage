<?php

namespace Pnkjwebspero\Changepage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        return view('changepage::index');
    }
}