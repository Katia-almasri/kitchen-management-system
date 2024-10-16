<?php

namespace App\Http\Controllers;

use App\Constants\CommonConstants\StatusCodeConstant;
use App\Models\Role;
use Illuminate\Http\Request;

/**
 * 
 * A basic controller to create new role
 */
class RoleController extends Controller
{
    /**
     * 
     * Create new role using Laratrust package
     * @param mixed $roleName
     * @param mixed $displayName
     * @param mixed $description
     * @return Role|\Illuminate\Database\Eloquent\Model
     */
    public function store(Request $request)
    {
        $role = Role::create([
            'name' => $request->name,
            'display_name' => $request->displayName,
            'description' => $request->description,
        ]);
        return response()->json(data: ['status' => StatusCodeConstant::OK, 'message' => 'role created successfully!', 'data' => $role]);
    }

    /**
     * 
     * Get set of roles to let user choose role and assign it to the user
     * @return Role[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return response()->json(data: ['status' => StatusCodeConstant::OK, 'message' => 'role created successfully!', 'data' => Role::get()]);
    }
}
