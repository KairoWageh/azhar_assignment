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
     * UserRequest constructor.
     * @param $action
     */
    public function __construct( $action){
        $this->action = $action;
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
                'email'                 => 'required|email',
                'password'              => 'required|min:8',
                'password_confirmation' => 'required|same:password',

            ];
        }elseif($this->action == 'edit'){
            $rules = [
                'edit_name'  => 'required|min:3|max:100',
                'edit_email' => 'required|email'
            ];
        }

        return $rules;
    }
}
