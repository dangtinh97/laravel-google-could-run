<?php

namespace App\RepositoryEloquent\Role;

use App\RepositoryEloquent\BaseRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class  RoleRepository extends BaseRepository implements RoleInterface
{
    const PAGINATE_ROLE = 15;

    /**
     * @return string
     */
    public function model()
    {
        return \App\Models\Role::class;
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
            $query = $this->model->where('name', 'like', '%' . $search . '%')->paginate(self::PAGINATE_ROLE);
        } else {
            $query = $this->model->paginate(self::PAGINATE_ROLE);
        }
        return $query;
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function createRole(Request $request)
    {
        DB::transaction(function () use ($request) {
            $roleData = [
                'name' => $request->get('name')
            ];

            $role = $this->create($roleData);

            $permissionRole = $role->permissions()->sync($request->input('permissions', []));

            if (!$role && !$permissionRole)
            {
                return false;
            }
            return true;
        });
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
    public function updateRole(Request $request, $id)
    {
        DB::transaction(function () use ($request, $id) {
            $roleData = [
                'name' => $request->get('name')
            ];

            $role = $this->updates($id, $roleData);

            $permissionRole = $role->permissions()->sync($request->input('permissions', []));

            if (!$role && !$permissionRole)
            {
                return false;
            }
            return true;
        });
    }

    /**
     * @param $id
     * @return mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function deleteRole($id)
    {
        return $this->delete($id);
    }

}
