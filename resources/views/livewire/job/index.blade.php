<div>
    <div class="card-controls sm:flex my-2">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="w-20 border-none bg-gray-100 rounded-full text-center shadow-sm hover:bg-blue-100">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('resume_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Resume" format="csv" />
                <livewire:excel-export model="Resume" format="xlsx" />
                <livewire:excel-export model="Resume" format="pdf" />
            @endif




        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
            Search:
            <input type="text" wire:model.debounce.300ms="search" class="w-20 border-none bg-gray-100 rounded-full text-center shadow-sm hover:bg-blue-100" />
        </div>
    </div>
    <div wire:loading.delay>
        Loading...
    </div>

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                <thead>
                    <tr>
                        <th class="w-9">
                        </th>
                        <th class="w-28">
                            {{ trans('cruds.job.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.job_title') }}
                            @include('components.table.sort', ['field' => 'job_title'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($jobs as $job)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $job->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $job->id }}
                            </td>
                            <td>
                                {{ $job->job_title }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('job_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.jobs.show', $job) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('job_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.jobs.edit', $job) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('job_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $job->id }})" wire:loading.attr="disabled">
                                            {{ trans('global.delete') }}
                                        </button>
                                    @endcan
                                </div>
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

    <div class="card-body">
        <div class="pt-3">
            @if($this->selectedCount)
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                    {{ __('Entries selected') }}
                </p>
            @endif
            {{ $jobs->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
    if (!confirm("{{ trans('global.areYouSure') }}")) {
        return
    }
@this[e.callback](...e.argv)
})
    </script>
@endpush