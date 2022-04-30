@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.job.title_singular') }}:
                    {{ trans('cruds.job.fields.id') }}
                    {{ $job->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.job.fields.id') }}
                            </th>
                            <td>
                                {{ $job->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.job.fields.job_title') }}
                            </th>
                            <td>
                                {{ $job->job_title }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('job_edit')
                    <a href="{{ route('admin.jobs.edit', $job) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.jobs.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection