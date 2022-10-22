<?php

namespace App\RepositoryEloquent\Banner;

use Illuminate\Http\Request;

interface BannerInterface
{
    public function getAll();

    public function listParam();

    public function createBanner(Request $request);

    public function getId($id);

    public function updateBanner(Request $request, $id);

    public function deleteBanner($id);

}

