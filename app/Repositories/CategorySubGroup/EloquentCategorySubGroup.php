<?php

namespace App\Repositories\CategorySubGroup;

use App\CategorySubGroup;
use App\Repositories\BaseRepository;
use App\Repositories\EloquentRepository;

class EloquentCategorySubGroup extends EloquentRepository implements BaseRepository, CategorySubGroupRepository
{
	protected $model;

	public function __construct(CategorySubGroup $categorySubGroup)
	{
		$this->model = $categorySubGroup;
	}

    public function all()
    {
        return $this->model->with('group')->withCount('categories')->get();
    }

}