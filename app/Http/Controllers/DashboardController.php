<?php

namespace App\Http\Controllers;

use App\Models\DocumentArchive;
use App\Models\DocumentType;
use App\Models\Projects;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $project = Projects::count();

        return view('pages.dashboard.index', compact('project'));
    }
}
