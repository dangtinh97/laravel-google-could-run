<?php

namespace App\RepositoryEloquent\User;

use App\RepositoryEloquent\BaseRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class  UserRepository extends BaseRepository implements UserInterface
{
    const PAGINATE_USER = 10;
    const URL_IMAGE_USER = 'images/user';
    const STATUS_DISABLE = 0;
    const STATUS_ENABLE = 1;


    /**
     * @return string
     */
    public function model()
    {
        return \App\Models\User::class;
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
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model[]|mixed[]
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function listParam(Request $request)
    {
        $search = $request->get('search');
        $user = auth()->user();
        if ($search != null) {
            $query = $user->email == env('EMAIL_ADMIN') ?
                $this->model->where('name', 'like', '%' . $search . '%')->paginate(self::PAGINATE_USER) :
                $this->model
                    ->where('name', 'like', '%' . $search . '%')
                    ->where('parent_id', '=', $user->id)
                    ->paginate(self::PAGINATE_USER);

        } else {
            $query = $user->email == env('EMAIL_ADMIN') ?
                $this->model->paginate(self::PAGINATE_USER) :
                $this->model->where('parent_id', '=', $user->id)->paginate(self::PAGINATE_USER);

        }
        return $query;
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function createUser(Request $request)
    {
        return  DB::transaction(function () use ($request) {
            $user = auth()->user();
            $images = 'images/no-user.jpg';

            if (file_exists($request->file('images'))) {

                $file_name = time().$request->file('images')->getClientOriginalName();

                $images = self::URL_IMAGE_USER.'/'.$file_name;

                $request->file('images')->move(self::URL_IMAGE_USER, $file_name);
            }

            $profiles = collect([
                'address' => $request->get('address'),
                'phone' => $request->get('phone'),
            ]);

            $data = [
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => bcrypt($request->get('password')),
                'image' => $images,
                'profile' => $profiles->toJson(),
                'parent_id' => $user->id,
                'status' => $request->get('status') == null ? self::STATUS_DISABLE : self::STATUS_ENABLE,
            ];

            $saveDataUser = $this->create($data);

            $userRole = $saveDataUser->roles()->sync($request->input('roles', []));

            if (!$saveDataUser && !$userRole)
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
    public function getId($id)
    {
        return $this->model->find($id);
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function updateUser(Request $request, $id)
    {
        return  DB::transaction(function () use ($request, $id) {
            $user = auth()->user();

            $images = $request->get('img_curr');

            if (file_exists($request->file('images'))) {

                $file_name = time().$request->file('images')->getClientOriginalName();

                $images = self::URL_IMAGE_USER.'/'.$file_name;

                $request->file('images')->move(self::URL_IMAGE_USER, $file_name);
            }

            $profiles = collect([
                'address' => $request->get('address'),
                'phone' => $request->get('phone'),
            ]);

            $data = [
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'image' => $images,
                'profile' => $profiles->toJson(),
                'parent_id' => $user->id,
                'status' => $request->get('status') == null ? self::STATUS_DISABLE : self::STATUS_ENABLE,
            ];

            if ($request->get('password') != null)
            {
                $data['password'] = bcrypt($request->get('password'));
            }

            $updateUser = $this->updates($id, $data);

            $userRole = $updateUser->roles()->sync($request->input('roles', []));

            if (!$updateUser && !$userRole)
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
    public function deleteUser($id)
    {
        return $this->delete($id);
    }

}


