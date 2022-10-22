<?php

namespace App\RepositoryEloquent\Post;

use App\Models\Posts;
use App\RepositoryEloquent\BaseRepository;
use Illuminate\Http\Request;

class  ProductRepository extends BaseRepository implements PostInterface
{
    const PAGINATE_CATEGORY = 15;

    const URL_IMAGE_PRODUCT = 'images/product/';

    /**
     * @return string
     */
    public function model()
    {
        return Posts::class;
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
    public function listParam(Request $request)
    {
        $search = $request->get('search');
        if ($search != null) {
            $query = $this->model->where('name', 'like', '%' . $search . '%')->paginate(self::PAGINATE_CATEGORY);
        } else {
            $query = $this->model->paginate(self::PAGINATE_CATEGORY);
        }
        return $query;
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function createPost(Request $request)
    {
        $image = time() . $request->file('image')->getClientOriginalName();

        $request->file('image')->move(self::URL_IMAGE_PRODUCT, $image);

        $imageName = self::URL_IMAGE_PRODUCT . $image;

        $data = [
            'title' => $request->get('title'),
            'cate_id' => $request->get('parent'),
            'description' => $request->get('description'),
            'slug' => changeTitle($request->get('title')),
            'status' => $request->get('status') == 'on' ? 1 : 0,
            'image' => $imageName,
            'content' => $request->get('content'),
            'profiles' => null,
            'type' => 0,
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
    public function updatePost(Request $request, $id)
    {

        if ($request->file('image') == null)
        {
            $images = $request->get('image_current');
        } else {

            $image = time() . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(self::URL_IMAGE_PRODUCT, $image);

            $images = self::URL_IMAGE_PRODUCT . $image;
        }

        $data = [
            'title' => $request->get('title'),
            'cate_id' => $request->get('parent'),
            'description' => $request->get('description'),
            'slug' => changeTitle($request->get('title')),
            'status' => $request->get('status') == 'on' ? 1 : 0,
            'image' => $images,
            'content' => $request->get('content'),
            'profiles' => null,
            'type' => 0,
        ];

        return $this->update($data, $id);
    }

    /**
     * @param $id
     * @return mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function deletePost($id)
    {
        return $this->delete($id);
    }

}
