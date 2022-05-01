<?php

namespace App\Http\Controllers\Admin;

use App\Models\Resume;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class HomeController
{
    public function index()
    {
        $settings1 = [
            'chart_title'        => 'Pie Chart Resume Per Job',
            'chart_type'         => 'pie',
            'report_type'        => 'group_by_relationship',
            'model'              => 'App\Models\Resume',
            'group_by_field'     => 'job_title',
            'aggregate_function' => 'count',
            'filter_field'       => 'created_at',
            'column_class'       => 'w-full xl:w-1/3',
            'entries_number'     => '5',
            'relationship_name'  => 'job',
            'translation_key'    => 'resume',
        ];

        $chart1 = new LaravelChart($settings1);

        $settings2 = [
            'chart_title'        => 'Pie Chart Resume Per Status',
            'chart_type'         => 'pie',
            'report_type'        => 'group_by_string',
            'model'              => 'App\Models\Resume',
            'group_by_field'     => 'status',
            'aggregate_function' => 'count',
            'filter_field'       => 'created_at',
            'column_class'       => 'w-full xl:w-1/3',
            'entries_number'     => '5',
            'translation_key'    => 'resume',
        ];

        $chart2 = new LaravelChart($settings2);

        $resumes = Resume::latest()->take(5)->get();

        return view('admin.home', compact('chart1', 'chart2', 'resumes'));
    }
}
