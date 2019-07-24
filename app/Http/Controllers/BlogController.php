<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $blogs = Blog::all();
        return view('admin/blog/index')->with(["blogs" => $blogs]);
    }
    public function indexBlogs()
    {
        //
        $blogs = Blog::all();
        return view('blog')->with(["blogs" => $blogs]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/blog/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $blog = new Blog();
        $blog->title = $request->blog_title;
        $blog->description = $request->blog_description;
        $blog->slug = str_slug($blog->title, '-');
        $blog->content = $request->blog_content;
        $blog->image = 'default';
        $blog->save();
        if ($request->hasFile('blog_image')) {
            $image      = $request->file('blog_image');
            $fileName   = time() . '.'.$blog->slug.'.'. $image->getClientOriginalExtension();
            $blog->image = $fileName;
            $img = Image::make($image->getRealPath());
            $img->stream(); 
            Storage::disk('public')->put('blog/images/'.$blog->id.'/large'.'/'.$fileName, $img, 'public');
            $img->resize(400, 400, function ($constraint) {
                $constraint->aspectRatio();                 
            });
            $img->stream(); // <-- Key point
            Storage::disk('public')->put('blog/images/'.$blog->id.'/smalls'.'/'.$fileName, $img, 'public');
            $blog->update();
        }
        $blogs = Blog::all();
        return redirect('admin/blog')->with('success', 'Creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
        $blog = Blog::where('slug', $slug)->get()->first();
        if($blog){
            return view('blogDetail')->with(["blog" => $blog]);
        } 
        return response()->view('errors.' . '404', [], 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
        $blog = Blog::find($blog)->first();
        return view('admin/blog/edit')->with('blog', $blog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
        $blog = Blog::find($blog)->first();
        $blog->title = $request->blog_title;
        $blog->description = $request->blog_description;
        $blog->slug = str_slug($blog->title, '-');
        $blog->content = $request->blog_content;
        $blog->update();
        if ($request->hasFile('blog_image')) {
            $image      = $request->file('blog_image');
            $fileName   = time() . '.'.$blog->slug.'.'. $image->getClientOriginalExtension();
            $blog->image = $fileName;
            $img = Image::make($image->getRealPath());
            $img->stream(); 
            Storage::disk('public')->put('blog/images/'.$blog->id.'/large'.'/'.$fileName, $img, 'public');
            $img->resize(400, 400, function ($constraint) {
                $constraint->aspectRatio();                 
            });
            $img->stream(); // <-- Key point
            Storage::disk('public')->put('blog/images/'.$blog->id.'/smalls'.'/'.$fileName, $img, 'public');
            $blog->update();
        }
        $blogs = Blog::all();
        return redirect('admin/blog')->with('success', 'Guardado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog = Blog::find($blog)->first();
        Storage::deleteDirectory('public/blog/images/'.$blog->id);
        $blog->delete();
        return redirect('admin/blog')->with('success', 'Eliminado satisfactoriamente');
    }
}
