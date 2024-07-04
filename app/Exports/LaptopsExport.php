<?php

namespace App\Exports;

use App\Models\Laptop;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class LaptopsExport implements FromView, ShouldAutoSize
{
    use Exportable;

    private $laptops;

    public function __construct() {
        $this->laptops = Laptop::all();
    }

    public function view() : View 
    {
        return view('laptop.laptopdetails', [
            'laptops' => $this->laptops
        ]);
    }
}
