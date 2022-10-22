<?php

namespace App\RepositoryEloquent\Role;

use Illuminate\Http\Request;

interface RoleInterface
{
    public function getAll();

    public function listParam(Request $request);

    public function createRole(Request $request);

    public function getId($id);

    public function updateRole(Request $request, $id);

    public function deleteRole($id);

}
