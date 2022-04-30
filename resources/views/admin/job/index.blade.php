@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.job.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('job_create')
                    <a class="btn btn-indigo" href="{{ route('admin.jobs.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.job.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('job.index')

    </div>
</div>
@endsection