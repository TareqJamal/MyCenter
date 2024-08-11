<?php

namespace App\Http\Actions;

use App\Models\MaterialVideo;
use App\Traits\ImageTrait;

class MaterialVideoAction extends MainAction
{
    use ImageTrait;
    public function __construct()
    {
        $this->model = new MaterialVideo();
        $this->fileFolder = 'material_videos';
    }
    public function storeMaterialVideo($data)
    {
        if (isset($data['video'])) {
            $data['video'] = $this->uploadImage($data['video'], $this->fileFolder);
            return $this->store($data);
        }
    }
    public function updateMateriaVideo($id, $data)
    {
        if (isset($data['video'])) {
            unlink($this->find($id)->video);
            $data['video'] = $this->uploadImage($data['video'], $this->fileFolder);
        }
        return $this->find($id)->update($data);
    }
    public function deleteMaterialVideo($id)
    {
        unlink($this->find($id)->video);
        return $this->delete($id);
    }

}
