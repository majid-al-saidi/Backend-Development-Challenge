<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ResumeStatusControl extends Component
{
    public $resume;
    public $status_title;


    public const STATUS_SELECT = [
        'approved'   => 'Approved',
        'rejected'   => 'Rejected',
        'processing' => 'Processing',
    ];

    public function render()
    {
        $this->status_title = $this->resume->status_label;
        return view('livewire.resume-status-control');
    }

    public function mount($resume)
    {
        $this->resume = $resume;
    }

    public function accept()
    {
        $this->resume->status = "approved";
        $this->resume->save();
        
    }

    public function reject()
    {
        $this->resume->status = "rejected";
        $this->resume->save();
    }

    

}
