<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function all(){
        $books= Book::paginate(3);
        return view("Books.allBook",get_defined_vars());
     }
 
     public function add(){
        $categories= Category::all();
         return view("Books.addBook",get_defined_vars());
      }
 
      public function insert(Request $request){
        $data = $request->validate([
           "name" =>"required|string|max:100",
           "desc"  =>"required|string",
           "image"  =>"required|image|mimes:jpg,png",
           "price"  =>"required|numeric",
           "category_id"  =>"required|exists:categories,id",
         ]);
         $data['image']=Storage::putFile('Books',$data['image']);
         $data['user_id']=1;
         Book::create($data);
         session()->flash("success","data inserted successfully");
         return redirect(url("/books"));
      }
 
      public function edit($id){
         $book=Book::findOrFail($id);
         $categories= Category::all();
         return view("Books.editBook",get_defined_vars());
      }
 
      public function update($id,Request $request){
        $data = $request->validate([
           "name"  =>"required|string|max:100",
           "desc"   =>"required|string",
           "image"  =>"required|image|mimes:png",
           "price"  =>"required|numeric",
           "category_id"  =>"required",
         ]);
         $Book=Book::findOrFail($id);
         if($request->has("image") && $Book->image){
          Storage::delete($Book->image);
         }
         $data['image']=Storage::putFile('Books',$data['image']);
         $data['user_id']=1;
         $Book->update($data);
         session()->flash("success","data updated successfully");
         return redirect(url("/books"));
      }
 
      public function delete($id){
         $Book=Book::findOrFail($id);
         Storage::delete($Book->image);
         $Book->delete();
         session()->flash("success","data deleted successfully");
         return redirect(url("/books"));
      }
}
