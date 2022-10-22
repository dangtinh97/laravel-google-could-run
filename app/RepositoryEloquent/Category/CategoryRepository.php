<?php

namespace App\RepositoryEloquent\Category;

use App\Models\Category;
use App\RepositoryEloquent\BaseRepository;
use Illuminate\Http\Request;

class  CategoryRepository extends BaseRepository implements CategoryInterface
{
    const PAGINATE_CATEGORY = 15;

    /**
     * @return string
     */
    public function model()
    {
        return Category::class;
    }

    /**
     * @return mixed
     */
    public function getAll(){
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
    public function createCategory(Request $request)
    {
        $data = [
            'name' => $request->get('name'),
            'parent_id' => $request->get('parent'),
            'slug' => changeTitle($request->get('name')),
            'status' => $request->get('status') == 'on' ? 1 : 0,
        ];

        return $this->create($data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getId($id){
        return $this->model->find($id);
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function updateCategory(Request $request, $id)
    {
        $data = [
            'name' => $request->get('name'),
            'parent_id' => $request->get('parent'),
            'slug' => changeTitle($request->get('name')),
            'status' => $request->get('status') == 'on' ? 1 : 0,
        ];

        return $this->update($data, $id);
    }

    /**
     * @param $id
     * @return mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function deleteCategory($id)
    {
        return $this->delete($id);
    }

}


