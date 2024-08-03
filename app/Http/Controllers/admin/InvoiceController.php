<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    //
    public function index()
    {
        // Ambil semua data invoice dari database
        $invoices = Invoice::all();

        // Kembalikan tampilan index dengan data invoice
        return view('admin.invoice.index', compact('invoices'));
    }

    public function create()
    {
        return view('admin.invoice.create');
    }
    // InvoiceController.php
public function store(Request $request)
{
    $subtotal = 0;

    // Hitung subtotal
    foreach ($request->quantities as $index => $quantity) {
        $subtotal += $quantity * $request->prices[$index];
    }

    $discount = $subtotal * 0.10; // Diskon 10%
    $tax = ($subtotal - $discount) * 0.01; // Pajak 1%
    $total = $subtotal - $discount + $tax;

    $invoice = Invoice::create([
        'invoice_number' => $request->invoice_number,
        'date' => $request->date,
        'subtotal' => $subtotal,
        'discount' => $discount,
        'tax' => $tax,
        'total' => $total,
    ]);

    foreach ($request->products as $index => $product) {
        InvoiceItem::create([
            'invoice_id' => $invoice->id,
            'product' => $product,
            'description' => $request->descriptions[$index],
            'quantity' => $request->quantities[$index],
            'price' => $request->prices[$index],
            'total' => $request->quantities[$index] * $request->prices[$index],
        ]);
    }
// return view('admin.invoice.index');
    return redirect()->route('invoices.index')->withSuccess('Invoice created successfully');
}
// InvoiceController.php


public function generatePDF($id)
{
    $invoice = Invoice::with('items')->findOrFail($id);
    $pdf = Pdf::loadView('admin.invoice.invoice_pdf', compact('invoice'));
    return $pdf->download('invoice_' . $invoice->invoice_number . '.pdf');
}


}
