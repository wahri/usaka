<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use App\Models\Team;

class HomeController extends Controller
{
    public function index()
    {
        $projectAll = Projects::with(['projectImages' => function ($query) {
            $query->where('is_main', 1);
        }])->get();
        // dd($projectAll[1]->projectImages[0]->image);
        return view('home', compact('projectAll'));
    }
    
    public function about()
    {
        $teams = Team::all();
        return view('about', compact('teams'));
    }
    public function contact()
    {
        return view('contact');
    }
    public function project($id)
    {
        $project = Projects::where('id', $id)->with('projectImages')->first();
        return view('project', compact(['project']));
    }
}
