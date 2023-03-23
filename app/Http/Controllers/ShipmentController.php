<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Shipment;
use App\Models\ShipmentStatus;
use App\Models\ShipmentType;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shipments = Shipment::with('customer')->get();

        return view('Dashboard.shipment.index', compact('shipments'));
    }

    /**
     * Show the form for creating a new resource.
     */    public function create()
    {
        $customers = Customer::all();
        $statuses = ShipmentStatus::all();
        $types = ShipmentType::all();

        return view('Dashboard.shipment.create', compact('customers','statuses','types'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'customer_id' => 'required',
            'type' => 'required',
            'status' => 'required',
            'arrival_place' => 'required',
            'delivery_place' => 'required',
            'delivery_date' => 'required',
        ]);

        Shipment::create($validatedData);

        return redirect()->route('shipments.index')->with('success', 'تم إنشاء الشحنة بنجاح.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Shipment $shipment)
    {
        return view('Dashboard.shipment.show', compact('shipment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shipment $shipment)
    {
        $customers = Customer::all();

        return view('Dashboard.shipment.edit', compact('shipment', 'customers'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shipment $shipment)
    {
        $validatedData = $request->validate([
            'customer_id' => 'required',
            'type' => 'required',
            'status' => 'required',
            'arrival_place' => 'required',
            'delivery_place' => 'required',
            'delivery_date' => 'required',
        ]);

        $shipment->update($validatedData);

        return redirect()->route('shipments.index')->with('success', 'تم تحديث الشحنة بنجاح.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shipment $shipment)
    {
        $shipment->delete();

        return redirect()->route('shipments.index')->with('success', 'تم حذف الصنف بنجاح.');
    }
}
