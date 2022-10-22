<?php

namespace App\RepositoryEloquent\User;

use Illuminate\Http\Request;

interface UserInterface
{
    public function getAll();

    public function listParam(Request $request);

    public function createUser(Request $request);

    public function getId($id);

    public function updateUser(Request $request, $id);

    public function deleteUser($id);

}
