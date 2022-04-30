<?php

namespace App\Http\Livewire\Resume;

use App\Models\Job;
use App\Models\Resume;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\PdfToText\Pdf;

class Create extends Component
{
    public Resume $resume;

    public array $mediaToRemove = [];

    public array $listsForFields = [];

    public array $mediaCollections = [];

    public function addMedia($media): void
    {
        $this->mediaCollections[$media['collection_name']][] = $media;
    }

    public function removeMedia($media): void
    {
        $collection = collect($this->mediaCollections[$media['collection_name']]);

        $this->mediaCollections[$media['collection_name']] = $collection->reject(fn ($item) => $item['uuid'] === $media['uuid'])->toArray();

        $this->mediaToRemove[] = $media['uuid'];
    }

    public function mount(Resume $resume)
    {
        $this->resume         = $resume;
        $this->resume->status = 'processing';
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.resume.create');
    }

    public function submit()
    {
        $this->validate();

        $this->resume->save();
        $this->syncMedia();
      
        //get the media url:
        $m_url = $this->resume->media[0]->getPath();
        // convert it to text
        $content = Pdf::getText($m_url, '/usr/bin/pdftotext');

        //get the resume and save content,
        $resume = Resume::find($this->resume->id);
        $resume->content = $content;
        $resume->save();

        return redirect()->route('admin.resumes.index');
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->resume->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    protected function rules(): array
    {
        return [
            'resume.title' => [
                'string',
                'required',
            ],
            'mediaCollections.resume_resume' => [
                'array',
                'required',
            ],
            'mediaCollections.resume_resume.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'resume.status' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['status'])),
            ],
            'resume.job_id' => [
                'integer',
                'exists:jobs,id',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['status'] = $this->resume::STATUS_SELECT;
        $this->listsForFields['job']    = Job::pluck('job_title', 'id')->toArray();
    }
}
