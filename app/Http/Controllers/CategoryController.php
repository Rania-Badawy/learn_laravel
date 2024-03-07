<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function all(){
       $categories= Category::paginate(3);
    //    return view("Categories.allCategory",compact("categories"));
       return view("Categories.allCategory",get_defined_vars());
    }

    public function add(){
        return view("Categories.addCategory",);
     }

     public function insert(Request $request){
       $data = $request->validate([
          "title" =>"required|string|max:100",
          "desc"  =>"required|string",
          "image"  =>"required|image|mimes:jpg,png",
        ]);
        $data['image']=Storage::putFile('categories',$data['image']);
        Category::create($data);
        session()->flash("success","data inserted successfully");
        return redirect(url("/"));
     }

     public function edit($id){
        $category=Category::findOrFail($id);
        return view("Categories.editCategory",get_defined_vars());
     }

     public function update($id,Request $request){
       $data = $request->validate([
          "title" =>"required|string|max:100",
          "desc"  =>"required|string",
          "image"  =>"required|image|mimes:png",
        ]);
        $category=Category::findOrFail($id);
        if($request->has("image") && $category->image){
         Storage::delete($category->image);
        }
        $data['image']=Storage::putFile('categories',$data['image']);

        $category->update($data);
        session()->flash("success","data updated successfully");
        return redirect(url("/"));
     }

     public function delete($id){
        $category=Category::findOrFail($id);
        Storage::delete($category->image);
        $category->delete();
        session()->flash("success","data deleted successfully");
        return redirect(url("/"));
     }
}
