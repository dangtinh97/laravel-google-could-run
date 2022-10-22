<?php

namespace App\RepositoryEloquent\Setting;

use App\Models\Setting;
use App\RepositoryEloquent\BaseRepository;
use Illuminate\Http\Request;

class  SettingRepository extends BaseRepository implements SettingInterface
{

    const URL_IMAGE_SETTING = 'images/setting/';

    /**
     * @return string
     */
    public function model()
    {
        return Setting::class;
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
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function createOrUpdateSetting(Request $request)
    {
        $setting = $this->getAll();

        $update = false;

        $profile = collect([
            'address' => $request->get('address'),
            'phone' => $request->get('phone'),
            'contact' => $request->get('contact'),
        ])->toJson();

        $links = collect([
            'facebook' => $request->get('facebook'),
            'youtube' => $request->get('youtube'),
            'twitter' => $request->get('twitter'),
            'instagram' => $request->get('instagram'),
        ]);

        if ($setting->count() > 0) {
            $update = true;
        }

        $data = [
            'title' => $request->get('title'),
            'profile' => $profile,
            'favicon' => $this->getNameImage($request, 'favicon'),
            'logo' => $this->getNameImage($request, 'logo'),
            'banner' => $this->getNameImage($request, 'banner'),
            'links' => $links
        ];

        if ($update) {
            return $this->update($data, $request->get('id'));
        }
        return $this->create($data);
    }

    /**
     * @param $request
     * @param $str
     * @return string
     */
    public function getNameImage($request, $str)
    {
        if ($request->file($str) == null) {
            $nameImage = 'images/setting/' . $str . '.jpg';
        } else {
            $image = time() . '_' . $request->file($str)->getClientOriginalName();
            $request->file($str)->move(self::URL_IMAGE_SETTING, $image);

            $nameImage = self::URL_IMAGE_SETTING . $image;
        }
        return $nameImage;
    }
}


