<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;


class BluehpatenschaftController extends Controller
{
    const QUANTITIES = [
        50 => 18,
        100 => 34,
        250 => 80,
        500 => 155,
        1000 => 300,
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quantity_max = 750;

        $response = Http::baseUrl(config('services.rechnungspilot.base_url'))
            ->withToken(config('services.rechnungspilot.api_token'))
            ->get('/api/companies/' . config('services.rechnungspilot.company_id') . '/invoices', [
                'item_id' => config('services.rechnungspilot.bluehpatenschaft_item_id'),
        ]);

        $invoices = $response->json()['data'];
        $bluehpaten = [];
        $quantity_sum = 0;
        foreach ($invoices as $invoice) {

            foreach ($invoice['items'] as $item) {
                if ($item['item_id'] != config('services.rechnungspilot.bluehpatenschaft_item_id')) {
                    continue;
                }

                $quantity_sum += $item['quantity'];

                if ($invoice['outstanding'] > 0) {
                    continue;
                }

                if ($item['description']) {
                    $bluehpaten[] = $item['description'];
                }
            }
        }

        $quantity_available = $quantity_max - $quantity_sum;
        $quantities = [];
        $quantities_count = 0;
        foreach (self::QUANTITIES as $quantity => $gross_formatted) {
            if ($quantity > $quantity_available) {
                continue;
            }

            $quantities[$quantity] = $gross_formatted;
            $quantities_count++;
        }

        $images = [];
        $image_directories = Storage::disk('public')->directories('bluehpatenschaft');
        rsort($image_directories);
        foreach ($image_directories as $directory) {
            $date = new Carbon(basename($directory));
            $file_paths = Storage::disk('public')->files($directory);
            $files = [];
            foreach($file_paths as $file_path) {
                if (! Str::startsWith(basename($file_path), 'image')) {
                    continue;
                }

                $width = str_replace(['image,w_', '.png'], '', basename($file_path));
                $files[$width] = $file_path;
            }
            $images[] = [
                'name' => $date->format('d.m.Y'),
                'files' => $files,
                'biggest_path' => $file_path,
            ];
        }

        return view('bluehpatenschaft.index')
            ->with('bluehpaten', $bluehpaten)
            ->with('images', $images)
            ->with('quantities', $quantities)
            ->with('has_available_quantities', $quantities_count > 0);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'address' => 'required|string',
            'postcode' => 'required|string',
            'city' => 'required|string',
            'email' => 'required|email',
            'quantity' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        $response = Http::baseUrl(config('services.rechnungspilot.base_url'))
            ->withToken(config('services.rechnungspilot.api_token'))
            ->get('/api/companies/' . config('services.rechnungspilot.company_id') . '/contacts', [
                'email' => $attributes['email'],
        ]);

        $json = $response->json();

        $response = Http::baseUrl(config('services.rechnungspilot.base_url'))
            ->withToken(config('services.rechnungspilot.api_token'))
            ->post('/api/companies/' . config('services.rechnungspilot.company_id') . '/invoices', [
                'receipt' => [],
                'contact' => [
                    'company_id' => config('services.rechnungspilot.company_id'),
                    'id' => count($json['data']) ? $json['data'][0]['id'] : null,
                    'email' => $attributes['email'],
                    'firstname' => $attributes['firstname'],
                    'lastname' => $attributes['lastname'],
                    'postcode' => $attributes['postcode'],
                    'address' => $attributes['address'],
                    'city' => $attributes['city'],
                ],
                'items' => [
                    0 => [
                        'id' => config('services.rechnungspilot.bluehpatenschaft_item_id'),
                        'description' => $attributes['description'],
                        'quantity' => $attributes['quantity'],
                        'gross' => self::QUANTITIES[$attributes['quantity']],
                    ],
                ],
        ]);

        if ($response->failed()) {
            return back()->with('status', [
                'type' => 'danger',
                'text' => 'Bestellung konnte nicht verarbeitet werden.',
            ]);
        }

        Mail::to('daniel@hof-sundermeier.de')
            ->queue(new \App\Mail\Orders\Created());

        return back()->with('status', [
            'type' => 'success',
            'text' => 'Vielen Dank für Ihre Unterstützung. Sie bekommen eine Rechnung.',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
