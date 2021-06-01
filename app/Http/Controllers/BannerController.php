<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Banner;
use Session;

class BannerController extends Controller
{
    public function createbanner()
    {
       return view('banners.banner');
    }

    public function storebanner(Request $request)
    {

      $this->validate($request, [
        'image' => 'required|image|mimes:jpeg,jpg,png,gif',
        'title' =>'required|max:255',
           ]);
        $uploadImage='';
        $banner = new Banner();
        if($files=$request->file('image'))
        {
            $dest= public_path('/bannerimg/');
            $img=date('YmdHis').".".$files->getClientOriginalExtension();
            $files->move($dest,$img);
            $uploadImage=$img;
        }
        $banner->image=$uploadImage;
	    	$banner->title = request('title');
        $banner->url = request('url');
        $banner->save();
        Session::flash('success','Banner Inserted Successfully');

        return redirect('/bannerview');

    }

    public function indexbanner()
    {
     //  $banners = Banner::all()->sortByDesc("id");
       $banners=Banner::latest()->paginate(3);
       return view('banners.bannerview', ['banners'=>$banners]);
    }

    public function editbanner($id)
    {
      
		$banner = Banner::find($id);
        return view('banners.edit', compact('banner'));
    }

    public function updatebanner(Request $request,$id)
    {
      $this->validate($request, [
        
        'title' =>'required|max:255',
           ]);
     
         $banner = Banner::find($id);
         $banner->title = $request->title;
         $banner->url = $request->url;
         $banner->save();
         Session::flash('success','Banner Updated Successfully.');

         return redirect('bannerview');
    }

    public function deletebanner($id)
    {
      $banner = Banner::find($id);
	    $banner->delete();
      Session::flash('danger','Banner deleted Successfully.');

      return redirect('bannerview');
    }
}
