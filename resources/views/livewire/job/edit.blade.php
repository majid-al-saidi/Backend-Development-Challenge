<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('job.job_title') ? 'invalid' : '' }}">
        <label class="form-label required" for="job_title">{{ trans('cruds.job.fields.job_title') }}</label>
        <input class="form-control" type="text" name="job_title" id="job_title" required wire:model.defer="job.job_title">
        <div class="validation-message">
            {{ $errors->first('job.job_title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.job.fields.job_title_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.jobs.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>