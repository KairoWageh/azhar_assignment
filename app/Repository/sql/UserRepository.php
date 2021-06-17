<?php

namespace App\Repository\sql;


use App\Repository\contracts\UserRepositoryInterface;
use App\Repository\sql\BaseRepository;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;

/**
 * Class UserRepository
 * @package App\Repository\sql
 */
class UserRepository extends BaseRepository implements UserRepositoryInterface{
    /**
     * @param Request $request
     * @return mixed
     */
    public function addUser(Request $request)
    {
        $action = 'add';
        $user_request = new UserRequest($action, null);
        /**
         * validation messages
         */
        $messages = [
            'name.required'                  => __('name_required'),
            'name.min'                       => __('name_min'),
            'name.max'                       => __('name_max'),
            'email.required'                 => __('email_required'),
            'email.email'                    => __('email_email'),
            'email.unique'                   => __('email_unique'),
            'password.required'              => __('password_required'),
            'password.min'                   => __('password_min'),
            'password_confirmation.required' => __('password_confirmation_required'),
            'password_confirmation.same'     => __('password_confirmation_same')
        ];
        $validated = $request->validate($user_request->rules(), $messages);
        if($validated == true){
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);
        }
        $user->assignRole($request->role);
        $user->role = $request->role;
        return $user;
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function updateUser(Request $request, $id){
        $action = 'edit';
        $user_request = new UserRequest($action, $id);
        /**
         * validation messages
         */
        $messages = [
            'edit_name.required'                  => __('name_required'),
            'edit_name.min'                       => __('name_min'),
            'edit_name.max'                       => __('name_max'),
            'edit_email.required'                 => __('email_required'),
            'edit_email.email'                    => __('email_email'),
            'edit_email.unique'                   => __('email_unique'),
        ];
        $validated = $request->validate($user_request->rules(), $messages);
        if($validated == true){
            $user = User::find($id);
            $user->update([
                'name' => $request->edit_name,
                'email' => $request->edit_email
            ]);
        }
        return $user;
    }

    /**
     * @param $id
     * @return mixed|void
     */
    public function deleteUser($id)
    {
        $user = User::find($id);
        if($user){
            $user->delete();
            $data = [
                'toast'    => 'success',
                'message' => __('deleted')
            ];
        }else{
            $data = [
                'toast'    => 'error',
                'message' => __('admin.not_deleted')
            ];
        }
        return $data;
    }
}
