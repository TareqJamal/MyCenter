<?php

namespace App\Http\Controllers\Admin;

use App\Http\Actions\ChapterAction;
use App\Http\Actions\MaterialVideoAction;
use App\Http\Controllers\Controller;
use App\Models\MaterialPdf;
use App\Models\MaterialVideo;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MatreialVideoController extends Controller
{
    public string $folderPath = "Admin.material_videos.";
    public array $data = ['title', 'video', 'chapter_id'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (\request()->ajax()) {
            $materials_videos = MaterialVideo::query()->get();
            return DataTables::of($materials_videos)
                ->addIndexColumn()
                ->editColumn('title', function ($row) {
                    return $row->title;
                })
                ->editColumn('video', function ($row) {
                    return '<a href="' . $row->video . '" download=""> تحميل الفيديو</a>';
                })
                ->editColumn('chapter_id', function ($row) {
                    return @$row->chapters->name;
                })
                ->addColumn('actions', function ($row) {
                    return
                        '<button class="btn btn-warning" id="btnEdit" data-id=" ' . $row->id . ' ">تعديل</button>
                         <button class="btn btn-danger" id="btnDelete" data-id=" ' . $row->id . ' ">حذف</button>
                         ';
                })
                ->rawColumns(['actions', 'title', 'video', 'chapter_id'])
                ->toJson();
        } else {
            return view($this->folderPath . 'index');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(ChapterAction $action)
    {
        if (\request()->ajax()) {
            $html = view($this->folderPath . 'create')
                ->with(['chapters' => $action->get()])
                ->render();
            return response()->json(['html' => $html]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request , MaterialVideoAction $action)
    {
        $data = $request->only($this->data);
        $action->storeMaterialVideo($data);
        return response()->json(['success' => 'تم اضافة الفيديو الدراسي بنجاح']);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id , MaterialVideoAction $action, ChapterAction $chapterAction)
    {
        if (\request()->ajax()) {
            $html = view($this->folderPath . 'edit')
                ->with(['chapters' => $chapterAction->get(), 'obj' => $action->find($id)])
                ->render();
            return response()->json(['html' => $html]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id , MaterialVideoAction $action)
    {
        $data = $request->only($this->data);
        $action->updateMateriaVideo($id, $data);
        return response()->json(['success' => 'تم تعديل الفيديو الدراسي بنجاح']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id  , MaterialVideoAction $action)
    {
        $action->deleteMaterialVideo($id);
        return response()->json(['success' => 'تم حذف الفيديو الدراسي بنجاح']);
    }
}
