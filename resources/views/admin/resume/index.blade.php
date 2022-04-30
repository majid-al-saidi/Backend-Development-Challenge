@extends('layouts.app')
@section('content')
    <div class="w-full">
        <div class="px-10 bg-white">
            <div class="flex">
                <div class="w-1/2">
                    <h3 class=" py-6 text-2xl text-gray-900 font-bold md:text-4xl">
                        {{ trans('cruds.resume.title_singular') }}
                        {{ trans('global.list') }}
                    </h3>
                </div>
                <div class="w-1/2">
                    <div class="float-right py-6">
                        @can('resume_create')
                            <a class="btn btn-indigo" href="{{ route('admin.resumes.create') }}">
                                {{ trans('global.add') }} {{ trans('cruds.resume.title_singular') }}
                            </a>
                        @endcan
                    </div>
                </div>
            </div>
            @livewire('resume.index')

        </div>
    </div>
@endsection
