<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Resume extends Model implements HasMedia
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;
    use InteractsWithMedia;

    public const STATUS_SELECT = [
        'approved'   => 'Approved',
        'rejected'   => 'Rejected',
        'processing' => 'Processing',
    ];

    public $table = 'resumes';

    public $orderable = [
        'id',
        'title',
        'status',
        'job.job_title',
    ];

    public $filterable = [
        'id',
        'title',
        'status',
        'job.job_title',
        'content',
    ];

    protected $appends = [
        'resume',
    ];

    protected $fillable = [
        'title',
        'status',
        'job_id',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getResumeAttribute()
    {
        return $this->getMedia('resume_resume')->map(function ($item) {
            $media = $item->toArray();
            $media['url'] = $item->getUrl();

            return $media;
        });
    }

    public function getStatusLabelAttribute($value)
    {
        return static::STATUS_SELECT[$this->status] ?? null;
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
