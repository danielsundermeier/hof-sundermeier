<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BluehpatenschaftController extends Controller
{
    const QUANTITIES = [
        50 => 18,
        100 => 34,
        250 => 62,
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
        $response = Http::baseUrl(config('services.rechnungspilot.base_url'))
            ->withToken(config('services.rechnungspilot.api_token'))
            ->get('/api/companies/' . config('services.rechnungspilot.company_id') . '/invoices', [
                'item_id' => config('services.rechnungspilot.bluehpatenschaft_item_id'),
        ]);

        $invoices = $response->json()['data'];
        $bluehpaten = [];
        foreach ($invoices as $invoice) {
            if ($invoice['outstanding'] > 0) {
                continue;
            }

            foreach ($invoice['items'] as $item) {
                if ($item['item_id'] != config('services.rechnungspilot.bluehpatenschaft_item_id')) {
                    continue;
                }

                if ($item['description']) {
                    $bluehpaten[] = $item['description'];
                }
            }
        }

        return view('bluehpatenschaft.index')
            ->with('bluehpaten', $bluehpaten)
            ->with('quantites', self::QUANTITIES);
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