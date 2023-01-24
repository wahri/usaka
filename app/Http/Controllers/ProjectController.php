<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projects;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project = Projects::all();
        return view('pages.project.index', compact(['project']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.project.create');
        // return view('pages.project.index', compact(['document_type','project']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = [];
        $result['code'] = 400;
        // dd($request->image);

        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        try {
            $project = new Projects;
            $project->title = $request->title;
            $project->description = $request->description;
            $project->save();

            
            DB::commit();
            return redirect()->route('dashboard.project.index', $project->id);
        } catch (Exception $e) {
            DB::rollBack();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Projects::where('id', $id)->with('projectImages')->first();
        // dd($project);
        // $image = ProjectImages::where('id_project', $id)->get();

        // dd($project);
        return view('pages.project.show', compact(['project']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Projects::where("id", $id)->first();
        return view("pages.project.edit", compact("project"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $result = [];
        $result['code'] = 400;

        $validation = Validator::make($request->all(), Projects::$rules, Projects::$messages);

        if (!$validation->fails()) {
            $saveProject = Projects::updateProject($request, $id);

            if ($saveProject) {
                $result['message'] = "Berhasil mengupdate project!";
                return response()->json($result, 200);
            }
        }

        $result['message'] = "{$validation->errors()->first()}";
        return response()->json($result, 400);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $project = Projects::where("id", $id)->delete();
            // dd($project);
            // $project->delete();

            DB::commit();
            $result['message'] = "Berhasil menghapus project!";
            return response()->json($result, 200);
        } catch (Exception $e) {
            DB::rollback();
            $result['message'] = "Gagal menghapus project!";
            return response()->json($result, 500);
        }
    }
}
