<?php

namespace App\Http\Controllers;

use App\Constants\CommonConstants\StatusCodeConstant;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Http\Request;

/**
 * A badic controller just to Attach roles to the users
 */
class UserController extends Controller
{
    public function assignRoleToUser(Request $request, User $user)
    {
        try {
            $role = Role::find($request->roleId);
            $user->addRoles([$role]);
            return response()->json(data: ['status' => StatusCodeConstant::OK, 'message' => 'role attached to user successfully!', 'data' => ['role' => $role->name, 'user' => $user->name]]);
        } catch (UniqueConstraintViolationException $ex) {
            return response()->json(['status' => $ex->getCode(), 'message' => 'the role has alredy been attached to the user', 'data' => null]);
        }
    }
}
