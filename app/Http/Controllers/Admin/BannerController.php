<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Banner\CreateRequest;
use App\Http\Requests\Banner\EditRequest;
use App\RepositoryEloquent\Banner\BannerInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class BannerController extends Controller
{
    private $repository;

    /**
     * CategoryController constructor.
     * @param BannerInterface $repository
     */
    public function __construct(BannerInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        abort_if(Gate::denies('banner_index'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $banners = $this->repository->listParam();

        return view('admin.banner.index', compact('banners'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        abort_if(Gate::denies('banner_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.banner.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateRequest $request)
    {
        $this->repository->createBanner($request);
        return redirect()->route('banner.index')->with('success', 'create banner success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        abort_if(Gate::denies('banner_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $banner = $this->repository->getId($id);
        return view('admin.banner.update', compact('banner'));
    }

    /**
     * @param EditRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EditRequest $request, $id)
    {
        $this->repository->updateBanner($request, $id);
        return redirect()->route('banner.index')->with('success', 'update banner success');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('banner_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->repository->deleteBanner($id);
        return redirect() ->route('banner.index')->with('success', 'Delete Banner Success');
    }

}
