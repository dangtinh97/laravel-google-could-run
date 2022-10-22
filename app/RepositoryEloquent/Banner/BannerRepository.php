<?php

namespace App\RepositoryEloquent\Banner;

use App\Models\Banner;
use App\RepositoryEloquent\BaseRepository;
use Illuminate\Http\Request;

class  BannerRepository extends BaseRepository implements BannerInterface
{
    const PAGINATE_Banner = 15;

    const URL_IMAGE_BANNER = 'images/banner/';

    /**
     * @return string
     */
    public function model()
    {
        return Banner::class;
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->model->all();
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function listParam()
    {
        $query = $this->model->paginate(self::PAGINATE_Banner);

        return $query;
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function createBanner(Request $request)
    {
        $image = time() . $request->file('image')->getClientOriginalName();

        $request->file('image')->move(self::URL_IMAGE_BANNER, $image);

        $imageName = self::URL_IMAGE_BANNER . $image;

        $data = [
            'title' => $request->get('title'),
            'slug' => changeTitle($request->get('title')),
            'status' => $request->get('status') == 'on' ? 1 : 0,
            'image' => $imageName,
        ];

        return $this->create($data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getId($id)
    {
        return $this->model->find($id);
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function updateBanner(Request $request, $id)
    {

        if ($request->file('image') == null) {
            $images = $request->get('image_current');
        } else {
            $image = time() . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(self::URL_IMAGE_BANNER, $image);

            $images = self::URL_IMAGE_BANNER . $image;
        }

        $data = [
            'title' => $request->get('title'),
            'slug' => changeTitle($request->get('title')),
            'status' => $request->get('status') == 'on' ? 1 : 0,
            'image' => $images,
        ];

        return $this->update($data, $id);
    }

    /**
     * @param $id
     * @return mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function deleteBanner($id)
    {
        return $this->delete($id);
    }

}


