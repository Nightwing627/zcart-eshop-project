<?php namespace App\Http\Controllers\Admin;

use Auth;
use App\Tag;
use App\Blog;
use App\Common\Authorizable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Validations\CreateBlogRequest;
use App\Http\Requests\Validations\UpdateBlogRequest;

class BlogController extends Controller
{
    use Authorizable;

    private $model_name;

    /**
     * construct
     */
    public function __construct()
    {
        $this->model_name = trans('app.model.blog');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['blogs'] = Blog::with('user')->withCount('comments')->get();

        $data['trashes'] = Blog::onlyTrashed()->get();

        return view('admin.blog.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog._create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBlogRequest $request)
    {
        $blog = new Blog($request->all());

        Auth::user()->blogs()->save($blog);

        if ($request->input('tag_list'))
        {
            $this->syncTags($blog, $request->input('tag_list'));
        }

        return back()->with('success', trans('messages.created', ['model' => $this->model_name]));
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
     * @param  Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('admin.blog._edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $blog->update($request->all());

        if ($request->input('tag_list'))
        {
            $this->syncTags($blog, $request->input('tag_list'));
        }

        return back()->with('success', trans('messages.updated', ['model' => $this->model_name]));
    }

    /**
     * Trash the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function trash(Request $request, Blog $blog)
    {
        $blog->delete();

        return back()->with('success', trans('messages.trashed', ['model' => $this->model_name]));
    }

    /**
     * Restore the specified resource from soft delete.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request, $id)
    {
        Blog::onlyTrashed()->where('id',$id)->restore();

        return back()->with('success', trans('messages.restored', ['model' => $this->model_name]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $blog = Blog::onlyTrashed()->find($id);

        $blog->forceDelete();

        $this->syncTags($blog, []);

        return back()->with('success', trans('messages.deleted', ['model' => $this->model_name]));
    }

    /**
     * Sync up the tag list for blog post create new tags if not exist
     *
     * @param  Blog $blog
     * @param  array $tagIds
     * @return void
     */
    public function syncTags(Blog $blog, array $tagIds)
    {
        $tagArr = [];

        foreach ($tagIds as $tag)
        {
            $oldTagId = Tag::find($tag);

            if ($oldTagId){
                $tagArr[] =  $tag;
            }else{
                // if the tag not numeric thats meaninig that its new tag and we should create it
                $newTag = Tag::create(['name' => $tag]);

                $tagArr[] = $newTag->id;
            }
        }

        $blog->tags()->sync($tagArr);
    }

}
