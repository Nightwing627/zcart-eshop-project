<?php

namespace App\Repositories\Blog;

use App\Blog;
use App\Common\Taggable;
use Illuminate\Http\Request;
use App\Helpers\ImageHelper;
use App\Repositories\BaseRepository;
use App\Repositories\EloquentRepository;

class EloquentBlog extends EloquentRepository implements BaseRepository, BlogRepository
{
    use Taggable;

	protected $model;

	public function __construct(Blog $blog)
	{
		$this->model = $blog;
	}

    public function all()
    {
        return $this->model->with('author')->withCount('comments')->get();
    }

    public function store(Request $request)
    {
        $blog = parent::store($request);

        if ($request->input('tag_list'))
            $this->syncTags($blog, $request->input('tag_list'));

        if ($request->hasFile('image'))
            $this->uploadImages($request, $blog->id);

        return $blog;
    }

    public function update(Request $request, $id)
    {
        $blog = parent::update($request, $id);

        if ($request->input('tag_list'))
            $this->syncTags($blog, $request->input('tag_list'));

        if ($request->input('delete_image') == 1)
            $this->removeImages($blog->id);

        if ($request->hasFile('image'))
            $this->uploadImages($request, $blog->id);

        return $blog;
    }

	public function destroy($id)
	{
        $this->removeImages($id);
        $this->detachTags($id, 'Blog');
		return parent::destroy($id);
	}

    public function uploadImages(Request $request, $id)
    {
        ImageHelper::UploadImages($request, 'blogs', $id);
    }

    public function removeImages($id)
    {
        ImageHelper::RemoveImages('blogs', $id);
    }

}