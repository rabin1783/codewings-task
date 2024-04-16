<?php

namespace App\Http\Controllers;

use App\Http\Requests\Json\JsonRequest;
use App\Services\JsonService;
use App\Upload;
use Illuminate\Http\Request;
use File;
use App\Jobs\ConvertJsonToExcelJob;

class JsonController extends Controller
{
    use Upload;
    /**
     * Create a new controller instance.
     */

    public function __construct(
        private JsonService $jsons

    ) {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jsons = $this->jsons->query()->get();

        return view('admin.jsons.index', compact('jsons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.jsons.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JsonRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('file')) {

            $validated['file'] = $this->uploadFile($request->file);
        }

        $this->jsons->create($validated);

        return redirect()->route('jsons.index')->with('success', 'Json File Added Successfully..');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $json = $this->jsons->findOrFail($id);

        return view('admin.jsons.form', compact('json'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JsonRequest $request, string $id)
    {
        $json = $this->jsons->findOrFail($id);

        $validated = $request->validated();


        if ($request->file) {
            $file = $this->uploadFile($request->file);


            $oldfile = $json->file;

            if ($oldfile != 'assets/json/users.json') {
                if (File::exists($oldfile)) {
                    File::delete($oldfile);
                }
            }

            $validated['file'] = $file;
        }

        $json->update($validated);

        return redirect()->route('jsons.index')->with('success', 'Json File Updated Successfully..');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $json = $this->jsons->findOrFail($id);

        $oldfile = $json->file;
        
        if ($oldfile != 'assets/json/users.json') {
            if (File::exists($oldfile)) {
                File::delete($oldfile);
            }
        }

        $json->delete();

        return redirect()->route('jsons.index')->with('success', 'Json File Deleted Successfully..');
    }

    public function convertIntoExcel($id)
    {
        $json = $this->jsons->findOrFail($id);

        $filePath = $json->file;

        // Dispatch the job for Excel conversion
        ConvertJsonToExcelJob::dispatch($filePath);

        return $this->downloadExcelFile();

        return redirect()->back()->with('success', 'JSON file uploaded and queued for conversion.');
    }

    protected function downloadExcelFile()
    {
        $excelFileName = 'data.xlsx';

        $excelFilePath = storage_path('app/public/excel/' . $excelFileName); // Adjust the path as per your configuration

        // Check if the Excel file exists
        if (file_exists($excelFilePath)) {
            // Generate the downloadable response
            return response()->download($excelFilePath, $excelFileName)->deleteFileAfterSend();;
        }
        
        // Handle the case where the file doesn't exist
        return redirect()->back()->with('error', 'Excel file not found.');
    }
}
