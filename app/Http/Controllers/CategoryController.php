<?php

namespace App\Http\Controllers;
use Image;
use Exception;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        $deleteItemCounts = Category::onlyTrashed()->count();

        return view('backend.categories.index', compact('categories', 'deleteItemCounts'));
    }

    public function create()
    {
        return view('backend.categories.create');
    }


    public function show($id)
    {
        $category = Category::find($id);
        return view('backend.categories.show', compact('category'));
    }


    public function store(CategoryRequest $request)
    {
        try{

          
            $data = $request->all(); 

            if($request->image){
              $image = $this->uploadImage($request->title, $request->image);
            }

            $data['image'] = $image;

            Category::create($data);
            return redirect()->route('category_index');

        }catch(Exception $e){
           return redirect()->route('category_create')->withErrors($e->getMessage());
        }
    }


    public function edit($id)
    {
        $category = Category::find($id);
        return view('backend.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        try{
            $data = $request->except('_token'); 


            if($request->hasFile('image')) {   
                $category = Category::where('id', $id)->first();

                $this->unlink($category->image);
                
                $data['image'] = $this->uploadImage($request->title, $request->image);
            }
    


            Category::where('id', $id)->update($data);

            return redirect()->route('category_index');

        }catch(Exception $e){
            dd($e->getMessage());
        }
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->back();
    }

    public function trashList()
    {
        $categories = Category::onlyTrashed()->get();

        return view('backend.categories.trash-list', compact('categories'));
    }

    public function restore($id)
    {
        Category::withTrashed()
                 ->where('id', $id)
                 ->restore();

        return redirect()->route('category_index');

    }

    // function for image upload 
    public function uploadImage($title, $image)
    {
        
        $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
        

        $file_name = $timestamp .'-'.$title. '.' . $image->getClientOriginalExtension();

        $pathToUpload = storage_path().'/app/public/categories/';  // image  upload application save korbo

        if(!is_dir($pathToUpload)) {

            mkdir($pathToUpload, 0755, true);

        }

        Image::make($image)->resize(634,792)->save($pathToUpload.$file_name);

        return $file_name;
    }

    private function unlink($image)
    {
        $pathToUpload = storage_path().'/app/public/categories/';
        if ($image != '' && file_exists($pathToUpload. $image)) {
            @unlink($pathToUpload. $image);
        }
    }

}
