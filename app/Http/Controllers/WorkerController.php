<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWorkerRequest;
use App\Http\Requests\UpdateWorkerRequest;
use App\Http\Requests\LoginWorkerRequest;
use App\Models\Models\VideoRolling\Worker;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use Str;
use Carbon\Carbon;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(LoginWorkerRequest $request)
    {
        $mail=$request->mail;

        $password=$request->password;
        $user=Worker::where("mail",$request->mail)
                ->get()
                ->first(function(Model $model) use ($password){
                    return $password==Crypt::decryptString($model->password); 
                });

        if (is_null($user)){
            $errors=[
                'status'=>'Failed',
                'message'=>'Login or password are incorrect'
            ];
            return response()->json($errors, 401);
        }

        $token=Str::random(32);
        $expired_time=Carbon::now()->addHours(4);

        $user->api_token=$token;
        $user->token_expired_at=$expired_time;
        $user->save();

        $message=[
            'status'=>'Successfull',
            'token'=>$token,
            'token_expired_at'=>$expired_time
        ];

        return response()->json($message, 201);
    }

    public function logout(Request $request)
    {
        $user=Worker::where('api_token',$request->bearerToken())->first();
        $user->api_token=null;
        $user->save();
        $message=[
            'status'=>'Successfull',
            
        ];
        return response()->json($message, 200);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWorkerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function register(StoreWorkerRequest $request)
    {
        $user=new Worker();

        $user->first_name=$request->first_name;
        $user->last_name=$request->last_name;
        $user->mail=$request->mail;
        $user->password=Crypt::encryptString($request->password);

        $user->save();

        $data=[
            'status'=>'Successfull',
        ];

        return response()->json($data, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Models\VideoRolling\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function show(Worker $worker)
    {
        
        return response()->json($worker->all()->transform(function($w){
        	return [
        		'id'=>$w->id,
        		'first_name'=>$w->first_name,
				'last_name'=>$w->last_name,
				'mail'=>$w->mail
				];
        }), 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Models\VideoRolling\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function edit(Worker $worker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWorkerRequest  $request
     * @param  \App\Models\Models\VideoRolling\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWorkerRequest $request, Worker $worker)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\VideoRolling\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function destroy(Worker $worker)
    {
        //
    }
}
