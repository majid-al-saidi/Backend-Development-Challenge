<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('resume.title') ? 'invalid' : '' }}">
        <label class="form-label required" for="title">{{ trans('cruds.resume.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" required wire:model.defer="resume.title">
        <div class="validation-message">
            {{ $errors->first('resume.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.resume.fields.title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.resume_resume') ? 'invalid' : '' }}">
        <label class="form-label required" for="resume">{{ trans('cruds.resume.fields.resume') }}</label>
        <x-dropzone id="resume" name="resume" action="{{ route('admin.resumes.storeMedia') }}" collection-name="resume_resume" max-file-size="5" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.resume_resume') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.resume.fields.resume_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('resume.status') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.resume.fields.status') }}</label>
        <select class="form-control" wire:model="resume.status">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['status'] as $key => $value)
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

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.resumes.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>