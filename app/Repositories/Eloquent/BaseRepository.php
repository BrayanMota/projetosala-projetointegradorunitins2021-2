<?php

namespace App\Repositories\Eloquent;

use App\Exceptions\CustomException;
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
    if (!$attr) {
      throw new CustomException('Array null', 403);
    }

    return $this->model->create($attr);
  }

  public function update(array $attr, $id)
  {
    return $this->find($id)
      ->fill($attr)
      ->save();
  }

  public function all()
  {
    return $this->model->get();
  }

  public function delete($id)
  {
    return $this->find($id)
      ->delete();
  }

  public function find($id)
  {
    return $this->model->findOrFail($id);
  }
}
