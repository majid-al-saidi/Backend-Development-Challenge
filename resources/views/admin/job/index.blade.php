@extends('layouts.app')
@section('content')
    <div class="w-full">
        <div class="px-10 ">
            <div class="flex">
                <div class="w-1/2">
                    <h3 class=" py-6 text-2xl text-gray-900 font-bold md:text-4xl">
                        {{ trans('cruds.job.title_singular') }}
                    {{ trans('global.list') }}
                    </h3>
                </div>
                <div class="w-1/2">
                    <div class="float-right py-6">
                        @can('job_create')
                    <a class="btn btn-indigo" href="{{ route('admin.jobs.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.job.title_singular') }}
                    </a>
                @endcan
                    </div>
                </div>
            </div>
            @livewire('job.index')

        </div>
    </div>
@endsection
