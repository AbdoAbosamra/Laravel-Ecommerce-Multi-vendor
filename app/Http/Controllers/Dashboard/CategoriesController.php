<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categories = Category::all(); // return all data from category class return collection object but interact with it as array
        //so i can
//        $categories->first();
        // and can also interact with it as array
//        $categories[0];
        return view('dashboard.categories.index' , compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parents  = Category::all();
        $category = new Category();
        return view('dashboard.categories.create' , compact('parents' , 'category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $clean_data = $request->validate(Category::rules(), [
            'name.unique' => 'This :attribute is exists' ,

        ]);

//        $request->input('name'); // from POST or from GET
//        $request->post('name');
//        $request->query('name'); // but this get data from url query
//        $request->get('name');
//        $request->name;
//        $request['name'];
//        $request->all();
//        $request->only(['name' ,'parent_id']);
//        $request->except(['image' ,'status']);
//        $category = new Category($request->all());
//        $category->save();
        // The file system in laravel is local by "default" and public
        // if i want to specify public not local
        $request->merge(
            ['slug'=> Str::slug($request->post('name'))]
        );
        $data = $request->except('image');
        if($request->hasFile('image')){
            $file = $request->file('image');    // uploadedFile
             $path = $file->store('uploads' , [
                 'disk' => 'public'
             ]); // The defulat route is storage/app/uploads
            $data['image'] =$path;
        }
        //Request Merge
        // this is will add to the request this data before store to the database
        // The merge add filed that didn't found on the request


        // The Shortest way
        // Mass Assignment
        $category = Category::create($data);


//        $category->name = $request->post('name');
//        $category->parent_id = $request->post('parent_id');
//        $category->save();
        return redirect()->route('dashboard.categories.index')->with('success','Category Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category =Category::findOrFail($id); // if found this id will return the object else will return null.
        // if(!$category){
        //     abort(404);
        // }




        // SELECT * FROM categories where id<> $id;
        $parents =Category::where('id' , '<>' , $id)
                            ->where(function($query) use($id){ // This cluser function to use () beteen two queries
                                $query->whereNull('parent_id')
                                    ->orWhere('parent_id' ,'<>' ,$id);  // To check if the parent_id != id Thats when deleted
                            })
                            ->get(); // not use all() or use first to return the object
                            // ->dd(); // That can make us debug the sql statement

        return view('dashboard.categories.edit' , compact('category' , 'parents'));//Dashboard.categories.edit' ,compact('category' , 'parents'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
//        $request->validate(Category::rules($id));
        $category = Category::findOrFail($id); // if null here will redirct to 404 not found
//        dd($category);
        // $category->name = $request->name;
        // $category->parent_id = $request->parent_id;
        // $category->save();
        $old_image = $category->image; // The old image = The image already in the category
        $data = $request->except('image'); // We felter all data request expect the image
        $new_image= $this->UploadImage($request); // Uploaded iage have path or null very tricky return path or null
//        dd($new_image);
        if($new_image){
            $data['image'] = $new_image; // if we have a new image  add it into the request data
        }

//        if($request->hasFile('image')){
//            $file = $request->file('image');    // uploadedFile
////            $file->getClientOriginalName(); // Theoriginal name that user uploaded
////            $file->getSize();
////            $file->getClientOriginalExtension();
////            $file->getMimeType(); // image/png
//            $path = $file->store('uploads' , [
//                'disk' => 'public'
//            ]); // The defulat route is storage/app/uploads
//            $data['image'] =$path;
//        }
        if($old_image && $data['image']){
            Storage::disk('public')->delete($old_image);  // if we have two images the old one and new one so replace new with the old and delete old one
        }
        $category->update($data);

        // Another way
        // $category->fill($request->all())->save(); // The same as above
        return Redirect::route('dashboard.categories.index')->with('success','Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $category = Category::findOrFail($id);
         $category->delete();
        // First delete category Then delete His image
         if($category->image){
             Storage::disk('public')->delete($category->image);
         }

        // Now i have a shortcut to this two commands with Eloquent ORM
//        Category::destroy($id); // based on the primary key of the model to destroy

        // The equivalent to the above
        // Category::where('id' , '=' ,$id)->delete();

        // To delete all data from the database
        // Category::delete();

        return Redirect::route('dashboard.categories.index')->with('success','Category Deleted');

    }

    protected function UploadImage(Request $request){
        if(!$request->hasFile('image')) {
            return;
        }
        $file = $request->file('image');    // uploadedFile
        //            $file->getClientOriginalName(); // Theoriginal name that user uploaded
        //            $file->getSize();
        //            $file->getClientOriginalExtension();
        //            $file->getMimeType(); // image/png
        $path = $file->store('uploads', [
            'disk' => 'public'
        ]); // The defulat route is storage/app/uploads
        return $path;

    }
}

