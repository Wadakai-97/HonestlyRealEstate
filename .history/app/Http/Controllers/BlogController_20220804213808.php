<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Staff;
use App\Http\Requests\BlogRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    // For User
    public function show() {
        return view('user.blog.top');
    }
    public function detail() {
        return view('user.blog.article');
    }


    // For Admin
    public function showForm() {
        $staffs = Staff::all();
        return view('admin.blog.sign_up', compact('staffs'));
    }
    public function signUp(BlogRequest $request) {
        $post = new Blog;
        $post->signUp($request);
        $request->session()->regenerateToken();
        return redirect()->route('admin.blog.signUp')->with('message', '登録が完了しました。');
    }
    public function list() {
        $blogs = Blog::select('id', 'title', 'staff_name', 'content')
                    ->paginate(10);
                    
        return view('admin.blog.list', compact('blogs'));
    }
    public function delete($id) {
        DB::transaction(function() use($id) {
            $target = Blog::find($id);
            $target->delete();
        });
    }
    public function imageDelete($id) {
        DB::transaction(function() use($id) {
            $blog = Blog::find($id);
            $delete_image = $blog->images;
            Storage::disk('public')->delete('/blog_images/' . $delete_image);
        });
    }
    public function showDetail($id) {
        $blog = Blog::find($id);
        return view('admin.blog.detail', compact('blog'));
    }
    public function edit($id) {
        $blog = Blog::find($id);
        $staffs = Staff::all();
        return view('admin.blog.edit', compact('blog', 'staffs'));
    }
    public function update($id, BlogRequest $request) {
        $blog = Blog::find($id);
        $blog->updateBlog($id, $request);
        $staffs = Staff::all();
        return redirect()->route('admin.blog.edit', ['id' => $blog->id])->with('message', '変更内容を登録しました。');
    }
}
