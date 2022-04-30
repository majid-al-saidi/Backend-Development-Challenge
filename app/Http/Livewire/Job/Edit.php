<?php

namespace App\Http\Livewire\Job;

use App\Models\Job;
use Livewire\Component;

class Edit extends Component
{
    public Job $job;

    public function mount(Job $job)
    {
        $this->job = $job;
    }

    public function render()
    {
        return view('livewire.job.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->job->save();

        return redirect()->route('admin.jobs.index');
    }

    protected function rules(): array
    {
        return [
            'job.job_title' => [
                'string',
                'required',
            ],
        ];
    }
}
