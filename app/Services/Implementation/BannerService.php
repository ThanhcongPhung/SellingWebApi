<?php

namespace App\Services\Implementation;
use App\Model\Banner;
use App\Services\BannerServiceInterface;
use League\Flysystem\FileExistsException;
use Illuminate\Http\Request;
class BannerService implements BannerServiceInterface
{
    const PAGE_SIZE = 8;

    function index(Request $request) {
        $query = Banner::query();
        if($request->has('image_name')){
            $query = $query->where('banners.image', 'LIKE', '%'.$request->query('image_name').'%');
        }
        if($request->has('title')){
            $query = $query->where('banners.title', 'LIKE', '%'.$request->query('title').'%');
        }
        if($request->has('link')){
            $query = $query->where('banners.link', 'LIKE', '%'.$request->query('link').'%');
        }
        if($request->has('status')){
            $query = $query->where('banners.link',$request->query('status'));
        }

        $banners = $query->paginate(self::PAGE_SIZE);
        return $banners;
    }
    /**
     * @param $request
     * @return mixed
     */
    function store(Request $request)
    {

        $banner = Banner::create([
            'image_name' => $request->get('image_name'),
            'title' => $request->get('title'),
            'link' => $request->get('link'),
            'status' => $request->get('status')
        ]);
        return $banner;
    }
    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    function update(Request $request, $id)
    {
        $banner = Banner::find($id);

        $banner = $banner->update([
            'image_name' => $request->get('image_name'),
            'title' => $request->get('title'),
            'link' => $request->get('link'),
            'status' => $request->get('status')
        ]);
        return $banner;
    }

    /**
     * @param $id
     * @return mixed
     */
    function delete($id)
    {
        $banner = Banner::find($id);
        if(!is_null($banner))
            $banner->delete();
    }

    function find($id)
    {
        return Banner::find($id);
    }

    /**
     * Count product
     * @return number
     */
    public function count(){
        return Banner::count();
    }
}
