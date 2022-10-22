<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\RepositoryEloquent\Setting\SettingInterface;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    private $repository;

    /**
     * PermissionController constructor.
     * @param SettingInterface $repository
     */
    public function __construct(SettingInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $setting = $this->repository->getAll();
        return view('admin.setting.index', compact('setting'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
//        abort_if(Gate::denies('permission_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->repository->createOrUpdateSetting($request);
        return redirect()->route('setting.index')->with('success', 'Config Success');

    }


}
