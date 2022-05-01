<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('job.job_title') ? 'invalid' : '' }}">
        <label class="form-label required" for="job_title">{{ trans('cruds.job.fields.job_title') }}</label>
        <input class="form-controle mt-1 block w-full border-none bg-gray-100 h-11 rounded-full text-center shadow-sm hover:bg-blue-100 focus:bg-blue-100 focus:ring-0" type="text" name="job_title" id="job_title" required wire:model.defer="job.job_title">
        <div class="validation-message">
            {{ $errors->first('job.job_title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.job.fields.job_title_helper') }}
        </div>
    </div>

  
    <div class="flex form-group">
        <button class="bg-green-500 mx-5 w-1/2 py-3 rounded-full text-white shadow-sm hover:shadow-inner  transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-95" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.jobs.index') }}" class="btn mx-5 justify-self-center bg-red-50 w-1/2 py-3 rounded-full text-black shadow-sm hover:shadow-inner  transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-95">
           <p style="margin: 0;
           position: absolute;
           top: 50%;
           left: 50%;
           transform: translate(-50%, -50%);"> {{ trans('global.cancel') }} </p>
        </a>
    </div>
</form>