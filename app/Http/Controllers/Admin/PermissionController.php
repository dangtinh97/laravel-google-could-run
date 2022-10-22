<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Permission\CreateRequest;
use App\Http\Requests\Permission\EditRequest;
use App\RepositoryEloquent\Permission\PermissionInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class PermissionController extends Controller
{
    private $repository;

    /**
     * PermissionController constructor.
     * @param PermissionInterface $repository
     */
    public function __construct(PermissionInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('permission_index'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $count = $this->repository->getAll()->count();
        $permissions = $this->repository->listParam($request);
        return view('admin.permission.index', compact('permissions', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('permission_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.permission.create');
    }

    /**
     * @param CreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateRequest $request)
    {
        $createData = $this->repository->createPermission($request);

        if (!$createData) {
            return redirect()->route('permission.index')->with('error', "Create permission error");
        }
        return redirect()->route('permission.index')->with('success', "Create permission success");
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $dataShow = $this->repository->getId($id);
        return view('admin.permission.index', compact('dataShow'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        abort_if(Gate::denies('permission_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $permission = $this->repository->getId($id);
        return view('admin.permission.update', compact('permission'));
    }

    /**
     * @param EditRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EditRequest $request, $id)
    {
        $this->repository->updatePermission($request, $id);
        return redirect()->route('permission.index')->with('success', "Update permission success");
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('permission_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->repository->deletePermission($id);
        return redirect()->route('permission.index')->with('success', "Delete permission success");
    }

}
