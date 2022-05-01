@extends('layouts.app')

@section('content')
 
<!-- component -->
<div class=" w-full min-h-screen bg-gray-50 flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
    <div class="w-full sm:max-w-md p-5 mx-auto">
      <h2 class="mb-12 text-center text-4xl font-extrabold uppercase ">View A Job
          <center>
            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
            <lottie-player src="https://assets3.lottiefiles.com/packages/lf20_tf6wSv.json"  background="transparent"  speed="1"  style="width: 150px; height: 150px;"  loop  autoplay></lottie-player>
          </center>
      </h2>
      <table class="table table-view  w-full">
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
    <center>
        <div class="form-group py-5 flex">
            @can('job_edit')
                <a href="{{ route('admin.jobs.edit', $job) }}" class="btn mx-5 justify-self-center bg-green-50 w-1/2 py-3 rounded-full text-black shadow-sm hover:shadow-inner  transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-95">
                    {{ trans('global.edit') }}
                </a>
            @endcan
            <a href="{{ route('admin.jobs.index') }}" class="btn mx-5 justify-self-center bg-red-50 w-1/2 py-3 rounded-full text-black shadow-sm hover:shadow-inner  transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-95">
                {{ trans('global.back') }}
            </a>
        </div>
    </center>
    </div>
  </div>
@endsection
