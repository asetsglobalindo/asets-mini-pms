<?php

namespace App\Http\Controllers\ManajemenBisnis;

use App\Models\Document;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class DocumentController extends Controller
{
    public function index()
    {

        $documents = Document::all();

        return view('manajemen-bisnis.document.index', compact('documents'));
    }

    public function quotation(Request $request)
    {
        // RAW DATAS
        $date = $request->date;
        $number = $request->number;
        $listing = $request->spbu; // Assuming 'listing' maps to 'spbu'
        $recipient = $request->recipient;
        $space = $request->space;
        $area_size = $request->area_size;
        $price_per_meter = $request->price_per_meter;
        $total_price = $request->total_price;
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $contact_person = $request->contact_person;
        $contact_number = $request->contact_number;
        $sales_area = $request->sales_area;
        $signature_name = $request->signature_name;

        // PERIOD DATE
        $period_date = "$start_date - $end_date";

        // Extract data from request
        $payload = [
            'date' => $date,
            'number' => $number,
            'spbu' => $listing,
            'recipient' => $recipient,
            'spbu_detail' => $listing,
            'area_size' => $area_size,
            'period' => $period_date,
            'price_per_meter' => $price_per_meter,
            'total_price' => $total_price,
            'contact_person' => $contact_person,
            'contact_number' => $contact_number,
            'sales_area' => $sales_area,
            'signature_name' => $signature_name,
        ];

        // Send POST request to the API
        $response = Http::asForm()->post('http://127.0.0.1:8001/api/generate-quotation', $payload);

        // Check if the request was successful
        if ($response->successful()) {
            $responseData = $response->json();

            // Insert data into the documents table
            $document = Document::create([
                'listing' => $listing,
                'space' => $space,
                'number' => $number,
                'date' => $date,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'type' => 'Quotation',
                'area_size' => $area_size,
                'size_per_meter' => $price_per_meter,
                'contact_person' => $contact_person,
                'contact_number' => $contact_number,
                'signature_name' => $signature_name,
                'file_url' => $responseData['file_url'],
            ]);
            return redirect()->route('document.index')->message('Dokumen berhasil dibuat');
        }

        return redirect()->route('document.index')->message('Dokumen gagal dibuat');
    }
}
