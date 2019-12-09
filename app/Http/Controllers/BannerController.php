<?php

namespace App\Http\Controllers;

use App\Services\BannerServiceInterface;
use App\Http\Requests\BannerRequest;
use App\Http\Resources\Banner\BannerCollection;
use App\Http\Resources\Banner\BannerResource;
use App\Model\Banner;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Image;

class BannerController extends Controller
{

        protected $bannerService;
        // public function __construct(BannerServiceInterface $bannerService)
        // {
        //     $this->bannerService=$bannerService;
        //     // $this->middleware('auth:api')->except('index','show');

        // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BannerCollection::collection(Banner::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {
        $banner = new Banner;
        $banner->image=$request->image_name;
        $banner->title=$request->title;
        $banner->link=$request->link;
        $banner->status=$request->status;
        $banner->save();
        return response([
            'data'=>new BannerResource($banner)
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        return new BannerResource($banner);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        $request['image']=$request->image_name;
        unset($request['image_name']);
        $banner->update($request->all());
        return response([
            'data'=>new BannerResource($banner)
        ],Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }
    public function addBanner(Request $request){
    	if($request->isMethod('post')){
    		$data = $request->all();
    		//echo "<pre>"; print_r($data); die;
    		$banner = new Banner;
			$banner->title = $data['title'];
			$banner->link = $data['link'];
            if(empty($data['status'])){
                $status='0';
            }else{
                $status='1';
            }
			// Upload Image
            if($request->hasFile('image')){
            	$image_tmp = $request->file('image');
                if ($image_tmp->isValid()) {
                    // Upload Images after Resize
                    $extension = $image_tmp->getClientOriginalExtension();
	                $fileName = rand(111,99999).'.'.$extension;
                    $banner_path = 'images/frontend_images/banners/'.$fileName;
     				Image::make($image_tmp)->resize(1140, 340)->save($banner_path);
     				$banner->image = $fileName;
                }
            }
            $banner->status = $status;
			$banner->save();
			return redirect()->back()->with('flash_message_success', 'Banner has been added successfully');
    	}

    	return view('admin.banners.add_banner');
    }
    public function editBanner(Request $request, $id=null){
        if($request->isMethod('post')){
            $data = $request->all();
            /*echo "<pre>"; print_r($data); die;*/
            if(empty($data['status'])){
                $status='0';
            }else{
                $status='1';
            }
            if(empty($data['title'])){
                $data['title'] = '';
            }
            if(empty($data['link'])){
                $data['link'] = '';
            }
            // Upload Image
            if($request->hasFile('image')){
                $image_tmp = $request->file('image');
                if ($image_tmp->isValid()) {
                    // Upload Images after Resize
                    $extension = $image_tmp->getClientOriginalExtension();
                    $fileName = rand(111,99999).'.'.$extension;
                    $banner_path = 'images/frontend_images/banners/'.$fileName;
                    Image::make($image_tmp)->resize(1140, 340)->save($banner_path);
                }
            }else if(!empty($data['current_image'])){
                $fileName = $data['current_image'];
            }else{
                $fileName = '';
            }
            Banner::where('id',$id)->update(['status'=>$status,'title'=>$data['title'],'link'=>$data['link'],'image'=>$fileName]);
            return redirect()->back()->with('flash_message_success','Banner has been edited Successfully');
        }
        $bannerDetails = Banner::where('id',$id)->first();
        return view('admin.banners.edit_banner')->with(compact('bannerDetails'));
    }
    public function deleteBanner($id = null){
        Banner::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Banner has been deleted successfully');
    }

    public function viewBanner(){
        $banners = Banner::get();
        return view('admin.banners.view_banners')->with(compact('banners'));
    }
}
