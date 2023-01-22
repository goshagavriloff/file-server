<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Requests\ShareProjectRequest;
use App\Models\Models\VideoRolling\Project;
use App\Models\Models\VideoRolling\Worker;
use App\Models\Models\VideoRolling\Rule;
use App\Models\Models\VideoRolling\ProjectType;


use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

use \File;
use \Response;
use Illuminate\Http\Exceptions\FileNotFoundException;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id,Request $request)
    {
        $token = $request->bearerToken(); 
        $user = Worker::where('api_token', $token)->first();
        
        $uid=$user->id;
        $resource=Project::whereId($id)->get();

        $data=$this->getProjectByUserRules($resource,$uid);

        return response()->json($data, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $ext=$request->file('project')->extension();
        $name=$request->file('project')->getClientOriginalName();

        $project_type=ProjectType::where('name',$request->name)->first();
        $user=Worker::where('api_token',$request->bearerToken())->first();



        $install_path='/post_projects/'.$user->mail.'/'.$project_type->name;
         $storagePath = \Storage::disk('myDisk')->put($install_path, $request->project);

        $storageName = basename($storagePath);

        $project = Project::create([
            'url'=>request()->getSchemeAndHttpHost()."/uploads".$install_path.'/'.$storageName,
            'name'=>$name,
            'type_id'=>$project_type->id
        ]);
        $rule=Rule::create(
            [
                'project_id'=>$project->id,
                'worker_id'=>$user->id,
                'read'=>true,
                'update'=>true,
                'delete'=>true
            ]
        );

        $message=[
            'status'=>true,
            'project_id'=>$project->id,
            'url'=>$project->url,
            'rule'=>$rule
        ];

        return response()->json($message, 201);
    }


    public function returnFile($file)
    {
        $path = storage_path('app/uploads/post_projects/' . $file);
        try {
            $file = File::get($path);
            $type = File::mimeType($path);
            $response = Response::make($file, 200);
            $response->header("Content-Type", $type);
            return $response;
        } catch (FileNotFoundException $exception) {            
            $errors=[
            'status'=>'Failed',
            'message'=>'Media not Found'
        ];
        return response()->json($errors, 404);
        }
    }

    public function licenceFileShow($mail,$project_type,$filename)
    {
        $filename=$mail."/".$project_type."/".$filename;

        if (strpos($filename, '.') !== false) {
            return $this->returnFile($filename);
        } else {
            return redirect()->route('/');
        }
    }



    public function share($id,ShareProjectRequest $request)
    {
        $project=Project::where('id',$id)->first();
        $rule=Rule::updateOrCreate(
            [
                'project_id'=>$project->id,
                'worker_id'=>$id              
            ],
            [
                'project_id'=>$project->id,
                'worker_id'=>$id,
                'read'=>$request->read,
                'update'=>$request->update,
                'delete'=>$request->delete
            ]
        );
        return $rule;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Models\VideoRolling\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project,Request $request)
    {
        $token = $request->bearerToken(); 
        $user = Worker::where('api_token', $token)->first();
        
        $id=$user->id;

        $resource=Project::all();
        $data=$this->getProjectByUserRules($resource,$id);

        return response()->json($data, 200);
    }

    protected function getProjectByUserRules($project,$id,$key='read'){
        return $project->filter(function ($item) use ($id,$key){
            $item=$item->rules;
            return $item->contains(function($rule) use ($id,$key){
                return $rule->worker_id==$id&& $rule[$key];
            });
        })->values();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Models\VideoRolling\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Models\VideoRolling\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update($id,UpdateProjectRequest $request, Project $project)
    {



        $token = $request->bearerToken(); 
        $user = Worker::where('api_token', $token)->first();
        
        $uid=$user->id;
        $resource=Project::whereId($id)->get();

        $data=$this->getProjectByUserRules($resource,$uid,'update');
        if (!is_null($data->first())){
            $ext=$request->file('project')->extension();
            $name=$request->file('project')->getClientOriginalName();
            
            $project = Project::find($id);

            $project_type=$project->project_type;



            $install_path='/post_projects/'.$user->mail.'/'.$project_type->name;
            $storagePath = \Storage::disk('myDisk')->put($install_path, $request->project);

            $storageName = basename($storagePath);


            $project->url=request()->getSchemeAndHttpHost()."/uploads".$install_path.'/'.$storageName;
            $project->save();
            return $project;

        }
        return response()->json(    [
            'message'=>'Update is denied'
        ], 401);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\VideoRolling\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request,Project $project)
    {
        $token = $request->bearerToken(); 
        $user = Worker::where('api_token', $token)->first();
        
        $uid=$user->id;
        $resource=Project::whereId($id)->get();

        $data=$this->getProjectByUserRules($resource,$uid,'delete');
        if (!is_null($data->first())){
            $flight = Project::find($id);
            $flight->delete();
            return response()->json([
                'message'=>'Successful deletion'
            ], 201);
        } 
        return response()->json(    [
            'message'=>'Deletion is denied'
        ], 401);
        //
    }
}
