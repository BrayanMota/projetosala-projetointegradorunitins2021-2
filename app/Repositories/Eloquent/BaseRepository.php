<?php

namespace App\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Model;

class BaseRepository
{

  protected $model;

  public function __construct(Model $model)
  {
    $this->model = $model;
  }

  public function store(array $attr)
  {
    return $this->model->create($attr);
  }

  public function update(array $attr, $id)
  {
    return $this->model->find($id)
      ->fill($attr)
      ->save();
  }

  public function all()
  {
    return $this->model->get();
  }

  public function destroy($id)
  {
    return $this->model->find()
      ->delete();
  }

  public function find($id)
  {
    return $this->model->findOrFail($id);
  }
}
