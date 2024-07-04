<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laptop; // Import the laptop model
use Barryvdh\DomPDF\Facade\Pdf;
use League\Csv\Reader;
use League\Csv\Writer;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LaptopsExport;

class LaptopController extends Controller
{
    public function index() {
        $laptops = laptop::orderBy('id')->get();
        return view('laptop', compact('laptops')); // Adjust the view name if necessary
    }

    public function generateCSV() {
        $laptops = laptop::orderBy('id')->get();

        $filename = 'laptops.csv';

        $file = fopen('php://temp', 'w+');

        fputcsv($file, ['Brand Name', 'Description', 'Price']);

        foreach($laptops as $laptop) {
            fputcsv($file, [
                $laptop->brand_name,
                $laptop->description,
                $laptop->price,
            ]);
        }

        rewind($file);

        $response = response(stream_get_contents($file), 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ]);

        fclose($file);

        return $response;
    }

    public function pdf(){
        $laptops = laptop::orderBy('brand_name')->get();
        $pdf = Pdf::loadView('laptop-list', compact('laptops'));

        return $pdf->download('laptop-list.pdf');
    }

    // public function importCsv(Request $request)
    // {
    //     $request->validate([
    //         'csv_file' => 'required|file|mimes:csv,txt',
    //     ]);
    
    //     // Get the uploaded file
    //     $file = $request->file('csv_file');
    
    //     // Read the contents of the file
    //     $csvData = array_map('str_getcsv', file($file->getPathname()));
    
    //     $headersSkipped = false;
    
    //     foreach ($csvData as $row) {
    //         // Skip the first row (headers)
    //         if (!$headersSkipped) {
    //             $headersSkipped = true;
    //             continue;
    //         }
    
    //         $brand_name = $row[0];
    //         $description = $row[1];
    //         $price = $row[2];
    
    //         if (is_numeric($price)) {
    //             laptop::create([
    //                 'brand_name' => $brand_name,
    //                 'description' => $description,
    //                 'price' => $price,
    //             ]);
    //         } else {
    //             error_log("Invalid price value for row: " . implode(', ', $row));
    //         }
    //     }
    
    //     return redirect()->route('laptop')->with('success', 'Laptops imported successfully.');
    // }

    public function importCsv(Request $request)
    {
        $request->validate([
            'import_file' => 'required|max:2048', // Adjust max file size as needed
        ]);

        $importFile = $request->file('import_file');
        $extension = $importFile->getClientOriginalExtension();

        if ($extension === 'csv') {
            // Handle CSV import
            $csv = Reader::createFromPath($importFile->getPathname(), 'r');
            $csv->setHeaderOffset(0);
            $csvData = $csv->getRecords();

            // Iterate through CSV data and insert records into the database
            foreach ($csvData as $row) {
                laptop::create([
                    'brand_name'      => $row['Brand Name'],
                    'description'     => $row['Description'],
                    'price'           => $row['Price'], 
                ]);
            }

            return redirect()->back()->with('success', 'CSV uploaded and songs imported successfully.');
        } elseif ($extension === 'pdf') {
            // Handle PDF import
            $pdfData = File::get($importFile->getPathname());
            // Process PDF data and import songs
            // This part needs to be implemented based on your specific requirements

            return redirect()->back()->with('success', 'PDF uploaded and songs imported successfully.');
        }

        return redirect()->back()->with('error', 'Invalid file format. Please upload a CSV or PDF file.');
    }

    public function exportExcel()
    {
        return Excel::download(new LaptopsExport, 'laptops.xlsx');
    }
}