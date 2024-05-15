<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Page;
use Illuminate\Support\Str;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Blog::orderBy('id','desc')->get();
                return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('image', function($row){
                    if($row->image != ''){
                        $img = '<img src="'.asset("public/blogs/".$row->image).'" width="50px">';
                    }else{
                        $img = '<img src="'.asset("public/blogs/").'" width="50px">';
                    }
                    return $img;
                })
                ->addColumn('action', function($row){
                    $btn = '<a href="blogs/'.$row->id.'/edit" class="btn btn-success btn-sm">Edit</a> 
                            <a href="javascript:void(0)" class="delete-blog btn btn-danger btn-sm" data-id="'.$row->id.'">Delete</a>';
                    return $btn;
                })
                ->editColumn('status', function($row){
                    if($row->status == '1'){
                        $status = '<span class="badge badge-success">Active</span>';
                    }else{
                        $status = '<span class="badge badge-danger">Inactive</span>';
                    }
                    return $status;
                })
                ->rawColumns(['image','action','status'])
                ->make(true);
        }
        return view('admin.blogs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = BlogCategory::all();
        return view('admin.blogs.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=> 'required',
            'category_id'=> 'required',
            'blog_status'=> 'required',
            'image'=> 'required|image|mimes:jpeg,jpg,png,svg|max:2048',
            'status'=> 'required',
            'content'=> 'required',
            'excerpt'=> 'required',
        ]);

        if($request->image){
            $image = $request->image->getClientOriginalName();
            $request->image->move(public_path('blogs'), $image);
        }

        $blog = new Blog();
        if($request->image){
            $blog->image = $image;
        }
        $blog->title = $request->input('title');
        $blog->author_id = Session::get('user_id');
        $blog->slug = Str::slug($request->input('title'));
        $blog->published_at = now();
        $blog->category_id = $request->input('category_id');
        $blog->content = $request->input('content');
        $blog->excerpt = $request->input('excerpt');
        $blog->blog_status = $request->get('blog_status');
        $blog->status = $request->get('status');
        $result = $blog->save();
        return $result;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = BlogCategory::all();
        $blog = Blog::where(['id' => $id])->first();
        return view('admin.blogs.edit',['blog' => $blog, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=> 'required',
            'category_id'=> 'required',
            'blog_status'=> 'required',
            'image'=> 'nullable|image|mimes:jpeg,jpg,png,svg|max:2048',
            'status'=> 'required',
            'content'=> 'required',
            'excerpt'=> 'required',
        ]);

        $blog = Blog::find($id);

        if($request->image != ''){
            $path = public_path().'/blogs/';
            //code for remove old file
            if($request->old_image != '' && $request->old_image != null){
                $file_old = $path.$request->old_image;
                if(file_exists($file_old)){
                    unlink($file_old);
                }
            }

            //upload new file
            $file = $request->image;
            $image = $request->image->getClientOriginalName();
            $file->move($path, $image);
        }else{
            $image = $request->old_image;
        }

        if($request->image){
            $blog->image = $image;
        }
        $blog->title = $request->input('title');
        $blog->author_id = Session::get('user_id');
        $blog->slug = Str::slug($request->input('title'));
        $blog->published_at = now();
        $blog->category_id = $request->input('category_id');
        $blog->content = $request->input('content');
        $blog->excerpt = $request->input('excerpt');
        $blog->blog_status = $request->get('blog_status');
        $blog->status = $request->get('status');
        $result = $blog->save();
        return $result;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
        $path = public_path().'/blogs/';
        //code for remove old file
        if($blog->image != '' && $blog->image != null){
            $file = $path.$blog->image;
            if(file_exists($file)){
                unlink($file);
            }
        }
        return  $blog->delete();
    }
}
