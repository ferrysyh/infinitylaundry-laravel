<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Balance;
use App\Models\User;

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
            10000 => 10000,
            20000 => 20000,
            50000 => 50000,
            100000 => 100000,
            150000 => 150000,
            200000 => 200000,
            500000 => 500000,
            1000000 => 1000000,
        ];

        $selectedBank = $request->input('btnradio');

        $bankName = ($selectedBank == 'bri') ? 'Bank BRI' : (($selectedBank == 'mandiri') ? 'Bank Mandiri' : 'Nama Bank Lainnya');
        ['bankName' => $bankName];

        if (array_key_exists($selectedNominal, $nominals)) {
            $selectedValue = $nominals[$selectedNominal];
            return view('pages.customers.pembayaran', ['selectedValue' => $selectedValue]);
        } else {
            return "Nominal tidak valid. Silakan pilih nominal yang valid.";
        }
    }

    public function processNominalCustomers(Request $request)
    {
        $selectedNominalCustomers = $request->input('options-base');
        $nominals = [
            10000 => 10000,
            20000 => 20000,
            50000 => 50000,
            100000 => 100000,
            150000 => 150000,
            200000 => 200000,
            500000 => 500000,
            1000000 => 1000000,
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
    public function update(Request $request)
    {
        $idUser = $request->id;
        $balance = $request->balance;
        $metode = $request->metode;

        if ($metode=='tambah'){
            $balanceAwal = User::find($idUser)->balance;
            $cari = User::find($idUser);

            $balance = $balanceAwal + $balance;
            $cari->balance = $balance;
            $cari->save();
        } else {
            $balanceAwal = User::find($idUser)->balance;
            $cari = User::find($idUser);

            if ($balanceAwal < $balance){
                return ('Saldo Tidak Mencukupi!');
            } else {
                $balance = $balanceAwal - $balance;
                $cari->balance = $balance;
                $cari->save();
            }
            return redirect('/berhasiltariksaldo_customers');
        }

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
