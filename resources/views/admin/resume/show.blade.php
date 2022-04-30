@extends('layouts.app')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.resume.title_singular') }}:
                    {{ trans('cruds.resume.fields.id') }}
                    {{ $resume->id }}
                </h6>
            </div>
        </div>

        <div class="card-body flex">
            <div class="w1/2">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.resume.fields.id') }}
                            </th>
                            <td>
                                {{ $resume->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.resume.fields.title') }}
                            </th>
                            <td>
                                {{ $resume->title }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.resume.fields.resume') }}
                            </th>
                            <td>
                                @foreach($resume->resume as $key => $entry)
                                    <a class="link-light-blue" href="{{ $entry['url'] }}">
                                        <i class="far fa-file">
                                        </i>
                                        {{ $entry['file_name'] }}
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.resume.fields.status') }}
                            </th>
                            <td>
                                {{ $resume->status_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.resume.fields.job') }}
                            </th>
                            <td>
                                @if($resume->job)
                                    <span class="badge badge-relationship">{{ $resume->job->job_title ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="w1/2 w-full h-full">

            <iframe src="{{ $resume->resume[0]['url'] }}entry['url'] }}" width="100%" height="100%" style="border: 0;" ></iframe>

        
            
        
        </div>
            <div class="form-group">
                @can('resume_edit')
                    <a href="{{ route('admin.resumes.edit', $resume) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.resumes.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection