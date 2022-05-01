@extends('layouts.app')
@section('content')
    <div class=" w-full min-h-screen bg-gray-50 flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <div class="w-full p-5 mx-auto">
            <h2 class="mb-12 text-center text-4xl font-extrabold uppercase ">View And Search</h2>
            <div>
                <center>
                    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                    <lottie-player src="https://assets6.lottiefiles.com/packages/lf20_lqge6px5.json"
                        background="transparent" speed="1" style="width: 200px; height: 200px;" loop autoplay>
                    </lottie-player>
                </center>
            </div>
                <section>
                    <div class="max-w-screen-xl ">
                        <div class="grid grid-cols-1 lg:grid-cols-2">
                            
                            <div class="max-w-lg mx-auto text-center lg:text-left lg:mx-0">
                                {{-- side 1 --}}
                                <div>
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
                                                        <span
                                                            class="badge badge-relationship">{{ $resume->job->job_title ?? '' }}</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    {{-- Search: --}}

                                    @livewire('search-resume', ['resume' => $resume])

                                </div>
                            </div>

                            <div>
                                {{-- side2 --}}
                                <div class=" h-screen">
                                    @foreach ($resume->resume as $key => $entry)
                                        <iframe src="{{ $entry['url'] }}" width="100%" height="100%"
                                            style="border: 0;"></iframe>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            
        </div>
    </div>
@endsection
