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
    public function updateUser(Request $request, $id){
        $user_request = new UserRequest;
        $validated = $request->validate($user_request->rules());
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
