<?php

namespace App\RepositoryEloquent\Post;

use Illuminate\Http\Request;

interface PostInterface
{
    public function getAll();

    public function listParam(Request $request);

    public function createPost(Request $request);

    public function getId($id);

    public function updatePost(Request $request, $id);

    public function deletePost($id);

}
