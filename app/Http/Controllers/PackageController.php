<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $package = Package::get();
        return view('pages.customers.order.package', ['packages' => $package]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.formpackage', [
            'title' => 'Tambah',
            'method' => 'POST',
            'action' => 'package'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $package = new Package;
        $package->name = $request->name;
        $package->duration = $request->duration;
        $package->price = $request->price;
        $package->laundry_id = $request->laundry_id;
        $package->save();
        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Package::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('layouts.formpackage', [
            'title' => 'Edit',
            'method' => 'PUT',
            'action' => "package/$id",
            'package' => Package::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $package = Package::find($id);
        $package->name = $request->name;
        $package->duration = $request->duration;
        $package->price = $request->price;
        $package->laundry_id = $request->laundry_id;
        $package->save();
        return redirect('/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Package::destroy($id);
        return redirect('/dashboard');
    }
}
