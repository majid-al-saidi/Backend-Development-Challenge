@extends('layouts.app')
@section('content')
    <div class="w-full">
        <div class="px-10 ">
            <div class="flex">
                <div class="w-1/2">
                    <h3 class=" py-6 text-2xl text-gray-900 font-bold md:text-4xl">
                        Resume Controll Panel Home
                    </h3>
                </div>
                <div class="w-1/2">
                    <div class="float-right py-6">
                        <a href="https://majid-alsaidi.me" target="_blank">Visit My Website</a>
                    </div>
                </div>
            </div>

            <div class="flex flex-wrap">
                {{-- Pie chart --}}
                <div class="{{ $chart1->options['column_class'] }} px-4">
                    <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 shadow-lg">
                        <div class="flex-auto p-4">
                            <div class="flex flex-wrap">
                                <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                    <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                                        {{ $chart1->options['chart_title'] }}
                                    </h5>
                                </div>

                                <div class="w-full">
                                    {{ $chart1->renderHtml() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Pie chart --}}
                <div class="{{ $chart2->options['column_class'] }} px-4">
                    <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 shadow-lg">
                        <div class="flex-auto p-4">
                            <div class="flex flex-wrap">
                                <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                    <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                                        {{ $chart2->options['chart_title'] }}
                                    </h5>
                                </div>

                                <div class="w-full">
                                    {{ $chart2->renderHtml() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-1/3 px-4">
                    Latest 5 Resumes:
                    <table class="table table-index w-full">
                        <thead>
                            <tr>
                                <th class="w-28">
                                    {{ trans('cruds.resume.fields.id') }}
                                    
                                </th>
                                <th>
                                    {{ trans('cruds.resume.fields.title') }}
                                   
                                </th>
                                <th>
                                    {{ trans('cruds.resume.fields.status') }}
                                    
                                </th>
                                <th>
                                    {{ trans('cruds.resume.fields.job') }}
                                    
                                </th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($resumes as $resume)
                                <tr>
                                    <td>
                                        {{ $resume->id }}
                                    </td>
                                    <td>
                                        {{ $resume->title }}
                                    </td>
                                    
                                    <td>
                                        {{ $resume->status_label }}
                                    </td>
                                    <td>
                                        @if($resume->job)
                                            <span class="badge badge-relationship">{{ $resume->job->job_title ?? '' }}</span>
                                        @endif
                                    </td>
                                    
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="10">No entries found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    {{ $chart1->renderJs() }}
    {{ $chart2->renderJs() }}
@endpush
