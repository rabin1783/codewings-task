<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class JsonToExcelExport implements FromCollection, WithHeadings
{
    protected $export;

    public function __construct($export)
    {
        $this->export = $export;
    }

    public function collection()
    {
        // Load and parse JSON data from the uploaded JSON file
        $jsonContent = file_get_contents(public_path($this->export));
        
        $jsonData = json_decode($jsonContent, true);

        // Convert JSON data to a collection
        $collection = collect($jsonData);

        return $collection;
    }

    public function headings(): array
    {
        // Define Excel column headings
        return ['Name', 'Email', 'Phone', 'Address'];
    }

    public function map($row): array
    {
        // Map JSON data to Excel rows
        return [
            $row['name'],
            $row['email'],
            $row['phone'],
            $row['address'],
        ];
    }
}
