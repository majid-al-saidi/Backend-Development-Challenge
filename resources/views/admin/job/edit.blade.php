@extends('layouts.app')

@section('content')
 
<!-- component -->
<div class=" w-full min-h-screen bg-gray-50 flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
    <div class="w-full sm:max-w-md p-5 mx-auto">
      <h2 class="mb-12 text-center text-4xl font-extrabold uppercase ">Edit A Job
      </h2>
      @livewire('job.edit', [$job])
    </div>
  </div>
@endsection
