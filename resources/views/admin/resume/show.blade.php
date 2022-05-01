@extends('layouts.app')
@section('content')
    <div class=" w-full min-h-screen bg-gray-50 flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <div class="w-full p-5 mx-auto">
            <h2 class="mb-12 text-center text-4xl font-extrabold uppercase ">View And Search</h2>
            <div>
                <center>
                    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                    <lottie-player src="https://assets3.lottiefiles.com/packages/lf20_4DLPlW.json" background="transparent"
                        speed="1" style="width: 200px; height: 200px;" loop autoplay></lottie-player>
                </center>
            </div>
            <div class="flex">
                {{-- side 1 --}}
                <div class="w-1/2">
                    <table class="table table-view w-full">
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
                            {{-- <tr>
                                <th>
                                    Content
                                </th>
                                <td>
                                    {{ $resume->content }}
                                </td>
                            </tr> --}}
                            <tr>
                                <th>
                                    {{ trans('cruds.resume.fields.resume') }}
                                </th>
                                <td>
                                    @foreach ($resume->resume as $key => $entry)
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
                                    
                                    
                                    @livewire('resume-status-control', ['resume' => $resume])
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.resume.fields.job') }}
                                </th>
                                <td>
                                    @if ($resume->job)
                                        <span class="badge badge-relationship">{{ $resume->job->job_title ?? '' }}</span>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    {{-- Search: --}}
                    {{-- <livewire:search-resume :resume="$resume" /> --}}
                    @livewire('search-resume', ['resume' => $resume])

                </div>
                {{-- side2 --}}
                <div class="w-1/2 h-screen">
                    @foreach ($resume->resume as $key => $entry)
                        <iframe src="{{ $entry['url'] }}" width="100%" height="100%" style="border: 0;"></iframe>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
