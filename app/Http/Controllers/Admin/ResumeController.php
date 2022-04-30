<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Resume;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\PdfToText\Pdf;

class ResumeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('resume_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.resume.index');
    }

    public function create()
    {
        abort_if(Gate::denies('resume_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.resume.create');
    }

    public function edit(Resume $resume)
    {
        abort_if(Gate::denies('resume_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.resume.edit', compact('resume'));
    }

    public function show(Resume $resume)
    {
        abort_if(Gate::denies('resume_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $resume->load('job');



        


        return view('admin.resume.show', compact('resume'));
    }

    public function storeMedia(Request $request)
    {
        abort_if(Gate::none(['resume_create', 'resume_edit']), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('size')) {
            $this->validate($request, [
                'file' => 'max:' . $request->input('size') * 1024,
            ]);
        }

        $model                     = new Resume();
        $model->id                 = $request->input('model_id', 0);
        $model->exists             = true;
        $media                     = $model->addMediaFromRequest('file')->toMediaCollection($request->input('collection_name'));
        $media->wasRecentlyCreated = true;

        return response()->json(compact('media'), Response::HTTP_CREATED);
    }
}
