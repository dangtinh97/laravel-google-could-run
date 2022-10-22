<?php

namespace App\RepositoryEloquent\Category;

use Illuminate\Http\Request;

interface CategoryInterface
{
    public function getAll();

    public function listParam(Request $request);

    public function createCategory(Request $request);

    public function getId($id);

    public function updateCategory(Request $request, $id);

    public function deleteCategory($id);

}
