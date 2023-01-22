<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use App\Models\Models\VideoRolling\Project;
use App\Models\Models\VideoRolling\ProjectType;
class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        try {
            
            $id = $this->id;
            $project=Project::find($id);

            $types=$project->project_type;

            $mimes=$types->extensions->transform(function ($ext){
                return $ext->name; 
            });

            if ($mimes->count()==0){
                throw ValidationException::withMessages(['extensions' => 'extensions not exist']);
            }

            $ext='|mimes:'.$mimes->join(',').'|';
            
            return [
                'project' => 'file|required'.$ext.'max:2097152'
            ];
            

        } catch (\Throwable $th) {
            throw ValidationException::withMessages(['name' => 'This project type is null']);
        }
    }
    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors(); // Here is your array of errors
        throw new HttpResponseException(response()->json($errors, 422)); 
    }
}
