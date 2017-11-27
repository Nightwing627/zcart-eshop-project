<?php

namespace App\Repositories\CategoryGroup;

use App\CategoryGroup;
use App\Repositories\BaseRepository;
use App\Repositories\EloquentRepository;

class EloquentCategoryGroup extends EloquentRepository implements BaseRepository, CategoryGroupRepository
{
	protected $model;

	public function __construct(CategoryGroup $categoryGroup)
	{
		$this->model = $categoryGroup;
	}

    public function all()
    {
        return $this->model->withCount('subGroups')->get();
    }

    public function trashOnly()
    {
        return $this->model->onlyTrashed()->withCount('subGroups')->get();
    }
}