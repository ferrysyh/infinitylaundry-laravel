<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Balance;

class BalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showForm()
    {
        return view('pages.customers.topup');
    }

    public function showFormCustomers()
    {
        return view('pages.customers.tariksaldo.tariksaldo');
    }

    public function processNominal(Request $request)
    {
        $selectedNominal = $request->input('options-base');
        $nominals = [
            10000 => 'Rp10.000',
            20000 => 'Rp20.000',
            50000 => 'Rp50.000',
            100000 => 'Rp100.000',
            150000 => 'Rp150.000',
            200000 => 'Rp200.000',
            500000 => 'Rp500.000',
            1000000 => 'Rp1.000.000',
        ];
        
        
        $selectedBank = $request->input('btnradio');

        // Logika untuk menentukan nama bank berdasarkan nilai yang dipilih
        $bankName = ($selectedBank == 'bri') ? 'Bank BRI' : (($selectedBank == 'mandiri') ? 'Bank Mandiri' : 'Nama Bank Lainnya');
        ['bankName' => $bankName];
        
        if (array_key_exists($selectedNominal, $nominals)) {
            $selectedValue = $nominals[$selectedNominal];
            return view('pages.customers.pembayaran', ['selectedValue' => $selectedValue]);
        } else {
            return "Nominal tidak valid. Silakan pilih nominal yang valid.";
        }
        
        if (array_key_exists($selectedBank, $bankname)) {
            $selectedValue = $banks[$selectedBank];
            return view('pages.customers.berhasil', ['selectedBank' => $selectedValue]);
        } else {
            return "Silakan pilih metode pembayaran yang valid.";
        }
    }

    public function processNominalCustomers(Request $request)
    {
        $selectedNominalCustomers = $request->input('options-base');
        $nominals = [
            10000 => 'Rp10.000',
            20000 => 'Rp20.000',
            50000 => 'Rp50.000',
            100000 => 'Rp100.000',
            150000 => 'Rp150.000',
            200000 => 'Rp200.000',
            500000 => 'Rp500.000',
            1000000 => 'Rp1.000.000',
        ];

        if (array_key_exists($selectedNominalCustomers, $nominals)) {
            $selectedValueCustomers = $nominals[$selectedNominalCustomers];
            return view('pages.customers.tariksaldo.metodetariksaldo', ['selectedValueCustomers' => $selectedValueCustomers]);
        } else {
            return "Nominal tidak valid. Silakan pilih nominal yang valid.";
        }
    }

    
    //public function processNominalInput(Request $request)
    //{
    //    $nominal = $request->input('nominalInput');
    //
    //    return view('pages.customers.pembayaran', ['nominal' => $nominal]);
    //}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $balance = new Balance;
        $balance->name = $request->name;
        $balance->price = $request->price;
        $balance->save();
        return redirect('/product');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Balance::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $balance = Balance::find($id);
        $balance->balance = $request->balance;
        $balance->save();
        return redirect('/berhasil');
    }

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
