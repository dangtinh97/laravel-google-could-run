<?php

namespace App\RepositoryEloquent\Permission;

use Illuminate\Http\Request;

interface PermissionInterface
{
    public function getAll();

    public function listParam(Request $request);

    public function createPermission(Request $request);

    public function getId($id);

    public function updatePermission(Request $request, $id);

    public function deletePermission($id);

}

