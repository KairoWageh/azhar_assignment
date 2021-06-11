<?php
namespace App\Repository\contracts;

use Illuminate\Http\Request;
/**
 * Interface BaseRepositoryInterface
 * @package App\Repository\contracts
 */

interface UserRepositoryInterface
{
    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function updateUser(Request $request, $id);

    /**
     * @param $id
     * @return mixed
     */
    public function deleteUser($id);
}
