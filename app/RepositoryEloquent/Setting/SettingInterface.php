<?php

namespace App\RepositoryEloquent\Setting;

use Illuminate\Http\Request;

interface SettingInterface
{

    public function getAll();

    public function createOrUpdateSetting(Request $request);

}

