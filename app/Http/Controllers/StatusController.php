<?php

namespace App\Http\Controllers;

use App\Models\ShipmentStatus;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statutes = ShipmentStatus::all();
        return view('Dashboard.shipment.status.index', compact('statutes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Dashboard.shipment.status.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        ShipmentStatus::create($request->all());

        return redirect()->route('statutes.index')
            ->with('success','تم إنشاء الحالة بنجاح.');
    }
    /**
     * Display the specified resource.
     */
    public function show(ShipmentStatus $status)
    {
        return view('Dashboard.shipment.status.show',compact('status'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShipmentStatus $status)
    {
        return view('Dashboard.shipment.status.edit',compact('status'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ShipmentStatus $status)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $status->update($request->all());

        return redirect()->route('statutes.index')
            ->with('success','تم تعديل الحالة بنجاح');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShipmentStatus $status)
    {
        $status->delete();

        return redirect()->route('statutes.index')
            ->with('success','تم الحذف بنجاح');
    }
}
