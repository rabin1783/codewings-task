<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\JsonToExcelExport;

class ConvertJsonToExcelJob implements ShouldQueue
{

    /**
     * Create a new job instance.
     */
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $filePath;

    public function __construct($filePath)
    {
        
        $this->filePath = $filePath;
    }

    public function handle()
    {
        
        // Convert JSON data to Excel
        $export = new JsonToExcelExport($this->filePath);
        
        Excel::store($export, 'public/excel/data.xlsx');    
    }

    

}
