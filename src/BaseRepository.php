<?php

namespace Nikidze\RepositoryGenerator;

use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements RepositoryInterface
{
    protected $model;

    /**
     * Create a new repository instance.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all()
	{
		return $this->model->get();
	}

	public function trashOnly()
	{
		return $this->model->onlyTrashed()->get();
	}

	public function find($id)
	{
		return $this->model->findOrFail($id);
	}

	public function findTrash($id)
	{
		return $this->model->onlyTrashed()->findOrFail($id);
	}

	public function findBy($filed, $value)
	{
		return $this->model->where($filed, $value)->first();
	}

	public function recent($limit)
	{
		return $this->model->take($limit)->get();
	}

    public function store($data)
    {
        return $this->model->create($data);
    }

    public function update($data, $id)
    {
        $model = $this->model->findOrFail($id);
        $model->update($data);
        return $model;
    }

	public function trash($id)
	{
		return $this->model->findOrFail($id)->delete();
	}

	public function restore($id)
	{
		return $this->model->onlyTrashed()->findOrFail($id)->restore();
	}

	public function destroy($id)
	{
		return $this->model->onlyTrashed()->findOrFail($id)->forceDelete();
	}
}
