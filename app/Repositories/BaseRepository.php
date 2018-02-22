<?php

namespace HereAfterLegacy\Repositories;

abstract class BaseRepository
{

    /**
     * The Model instance.
     *
     * @var Illuminate\Database\Eloquent\Model
     */
    protected $model;


    /**
     * Get number of records.
     *
     * @return array
     */
    public function getNumber()
    {
        $total = $this->model->count();

        $new = $this->model->whereSeen(0)->count();

        return compact('total', 'new');
    }


    /**
     * Get all records.
     *
     * @return array
     */
    public function getAll()
    {
        return $this->model->all();
    }


    /**
     * Destroy a model.
     *
     * @param  int $id
     * @return void
     */
    public function destroy($id)
    {
        $this->getById($id)->delete();
    }


    /**
     * Get Model by id.
     *
     * @param  int  $id
     * @return App\Models\Model
     */
    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }


    /**
     * Get Model by array of ids.
     *
     * @param  array  $ids
     * @return App\Models\Model
     */
    public function getByIds($ids) {
        return $this->model->wherein('id', $ids)->get();
    }

}
