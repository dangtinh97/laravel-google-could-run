<?php

namespace App\RepositoryEloquent\Permission;

use App\Models\Permission;
use App\RepositoryEloquent\BaseRepository;
use Illuminate\Http\Request;

class  PermissionRepository extends BaseRepository implements PermissionInterface
{
    const PAGINATE_PERMISSION = 15;

    /**
     * @return string
     */
    public function model()
    {
        return Permission::class;
    }

    /**
     * @return mixed
     */
    public function getAll(){
        return $this->model->all();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model[]|mixed[]
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function listParam(Request $request)
    {
        $search = $request->get('search');
        if ($search != null) {
            $query = $this->model->where('name', 'like', '%' . $search . '%')->paginate(self::PAGINATE_PERMISSION);
        } else {
            $query = $this->model->paginate(self::PAGINATE_PERMISSION);
        }
        return $query;
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function createPermission(Request $request)
    {
        $data = [
            'name' => $request->get('name'),
            'code' => $request->get('permission')
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
    public function updatePermission(Request $request, $id)
    {
        $data = [
            'name' => $request->get('name'),
            'code' => $request->get('permission')
        ];

        return $this->update($data, $id);
    }

    /**
     * @param $id
     * @return mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function deletePermission($id)
    {
        return $this->delete($id);
    }

}

