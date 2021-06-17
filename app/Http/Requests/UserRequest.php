<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * @var
     */
    protected $action;

    /**
     * @var
     */
    protected $id;

    /**
     * UserRequest constructor.
     * @param $action
     * @param $id
     */
    public function __construct($action, $id){
        $this->action = $action;
        $this->id = $id;
    }

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
     * @return array
     */
    public function rules()
    {
        if($this->action =='add'){
            $rules = [
                'name'                  => 'required|min:3|max:100',
                'email'                 => 'required|email|unique:users',
                'password'              => 'required|min:8',
                'password_confirmation' => 'required|same:password',

            ];
        }elseif($this->action == 'edit'){
            $rules = [
                'edit_name'  => 'required|min:3|max:100',
                'edit_email' => 'required|email|unique:users,email='.$this->id
            ];
        }

        return $rules;
    }
}
