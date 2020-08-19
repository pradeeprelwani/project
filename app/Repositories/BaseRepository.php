<?php

namespace App\Repositories;

class BaseRepository implements BaseRepositoryInterface {

    protected $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function show($id) {
        return $this->model->findOrFail($id);
    }

    public function destroy($id) {
        $record = $this->show($id);
        $path = $record->picture_url->upload_path;
        _unlink($path . "/" . $record->picture);
        return $this->model->destroy($id);
    }

    public function listing($condition = null) {
        $result = $this->model;
        if ($condition) {
            $result = $result->where($condition);
        }
        return $result->orderBy('id', 'DESC')->get();
    }

    public function create($request) {
        $dataArr = $request->all();
        if ($request->has('picture')) {
            $dataArr['picture'] = $this->upload($request);
        }
        //insert record
        return $this->model->create($dataArr);
    }

    public function update($request, $id) {
        $user = $this->show($id);
        $dataArr = $request->all();
        if ($request->has('picture')) {
            $dataArr['picture'] = $this->upload($request);
        }
        if ($user->update($dataArr)) {
            return $this->show($id);
        }
        return false;
    }

    public function upload($request) {
        //remove already existing file
        $path = $this->model->picture_url->upload_path;
        _unlink($path . "/" . $request->picture);
        //upload and update image
        return uploadFile($path, $request->picture);
    }

}
