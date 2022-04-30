<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('resume.title') ? 'invalid' : '' }}">
        <label class="form-label required" for="title">{{ trans('cruds.resume.fields.title') }}</label>
        <input
            class="form-controle mt-1 block w-full border-none bg-gray-100 h-11 rounded-full text-center shadow-sm hover:bg-blue-100 focus:bg-blue-100 focus:ring-0"
            type="text" name="title" id="title" required wire:model.defer="resume.title">
        <div class="validation-message">
            {{ $errors->first('resume.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.resume.fields.title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.resume_resume') ? 'invalid' : '' }}">
        <label class="form-label required" for="resume">{{ trans('cruds.resume.fields.resume') }}</label>
        <x-dropzone id="resume"
            style="border: none; --tw-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow); background-color: rgb(243 244 246);"
            name="resume" action="{{ route('admin.resumes.storeMedia') }}" collection-name="resume_resume"
            max-file-size="5" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.resume_resume') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.resume.fields.resume_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('resume.status') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.resume.fields.status') }}</label>
        <select class="w-full h-11 border-none bg-gray-100 rounded-full text-center shadow-sm hover:bg-blue-100" wire:model="resume.status">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach ($this->listsForFields['status'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('resume.status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.resume.fields.status_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('resume.job_id') ? 'invalid' : '' }}">
        <label class="form-label" for="job">{{ trans('cruds.resume.fields.job') }}</label>
        <x-select-list class="form-control" id="job" name="job" :options="$this->listsForFields['job']" wire:model="resume.job_id" />
        <div class="validation-message">
            {{ $errors->first('resume.job_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.resume.fields.job_helper') }}
        </div>
    </div>

    <div class="flex form-group">
        <button class="bg-green-500 mx-5 w-1/2 py-3 rounded-full text-white shadow-sm hover:shadow-inner  transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-95" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.resumes.index') }}" class="btn mx-5 justify-self-center bg-red-50 w-1/2 py-3 rounded-full text-black shadow-sm hover:shadow-inner  transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-95">
           <p style="margin: 0;
           position: absolute;
           top: 50%;
           left: 50%;
           transform: translate(-50%, -50%);"> {{ trans('global.cancel') }} </p>
        </a>
    </div>
</form>
