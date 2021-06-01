<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ValidateRequest;
use App\Category;
use Session;
use DB;

class CategoriesController extends Controller
{
    public function create(){
		
        return view('categories.category');
    }

    public function storeDevice(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'desc' =>'required|max:255',
            'url' =>'required|max:255'
              ]);
        $category = new Category();
        $category->name = request('name');
        $category->desc = request('desc');
        $category->url = request('url');
        $category->save();
        //Session::flash('success','Category Inserted Successfully.');
        //$this->session->set_flashdata('success', 'Category Updated successfully');
        Session::flash('success','Category Inserted Successfully.');
        return redirect('/categoryview');
		
    }
    public function indexc()
    {
	    $category = Category::latest()->paginate(5);
        return view('categories.categoryview', ['categories'=>$category]);
    }

    public function edit($id)
    {
		$category = Category::find($id);
        return view('categories.edit', compact('category'));
    }

    public function updatec(Request $request,$id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'desc' =>'required|max:255',
            'url' =>'required|max:255'
              ]);
         $categoryData = Category::find($id);
         $categoryData->name = $request->name;
         $categoryData->desc = $request->desc;
         $categoryData->url = $request->url;
         $categoryData->save();
       //Session::flash('flash_message_success','Category Updated Successfully.');
     //  $this->session->set_flashdata('success', 'Category Updated successfully');
         Session::flash('success','Category Updated Successfully.');
         return redirect('categoryview');
    }

    public function delete($id)
    {
        $categoryData = Category::find($id);
		$categoryData->delete();
     //   Session::flash('flash_message_success','Category Deleted Successfully.');
         Session::flash('danger','Category Deleted Successfully.');
        return redirect('categoryview');
    }
    
}
