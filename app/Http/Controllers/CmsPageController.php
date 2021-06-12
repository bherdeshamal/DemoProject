<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CmsPage;
use App\Category;

class CmsPageController extends Controller
{
    public function addcmspage(){
		
        return view('cms.add_cms_page');
    }

    public function storeDevice(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' =>'required|max:255',
            'url'=>'required|max:255'
              ]);
            
        $cms = new CmsPage();
        $cms->title = request('title');
        $cms->description = request('description');
        $cms->url = request('url');
        $cms->status=request('status');
        $cms->save();
        return redirect('/view_cms_page')->with('success','CMS Page Inserted Successfully');
		
    }
    public function indexcms()
    {
	    $cms = CmsPage::latest()->paginate(5);
        return view('cms.view_cms_page', ['cmss'=>$cms]);
    }

    public function editcms($id)
    {
		$cms = CmsPage::find($id);
        return view('cms.edit_cms_page', compact('cms'));
    }

    public function updatecms(Request $request,$id)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' =>'required|max:255',
            'url'=>'required|max:255'
              ]);
            
         $categoryData = CmsPage::find($id);
         
         $categoryData->title = $request->title;
         $categoryData->description = $request->description;
         $categoryData->url = $request->url;
         
         $categoryData->status = $request->status;
         $categoryData->save();
         return redirect('view_cms_page')->with('success','CMS Page Updated Successfully');
    }

    public function deletecms($id)
    {
        $categoryData = CmsPage::find($id);
		$categoryData->delete();
        return redirect('view_cms_page')->with('danger','CMS PAGE Deleted Successfully');
    }

    public function cmsPage($url)
    {
        $page = CmsPage::select('id','title','url','description')->distinct()->get()->sortByDesc('id');
      
        $key = Category::select('id','name')->distinct()->get()->sortByDesc('id');
        $cmsPageCount=CmsPage::where(['url'=>$url,'status'=>1])->count();
        if($cmsPageCount >0)
        {
            $cmsPageDetails = CmsPage::where('url',$url)->first();
     
        }
        else
        {
           abort(404);
        }
         return view('frontend.cms_page')->with(compact('page','key','cmsPageDetails'));
    }
}
