@extends('layouts.app')
@section('content')
<!-- index.blade.php -->
<table class="table">
    <thead>
        <tr>
            <th scope="col">Invoice Number</th>
            <th scope="col">Date</th>
            <th scope="col">Subtotal</th>
            <th scope="col">Discount</th>
            <th scope="col">Tax</th>
            <th scope="col">Total</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($invoices as $invoice)
        <tr>
            <th scope="row">{{ $invoice->invoice_number }}</th>
            <th>{{ $invoice->date }}</th>
            <th>{{ $invoice->subtotal }}</th>
            <th>{{ $invoice->discount }}</th>
            <th>{{ $invoice->tax }}</th>
            <th>{{ $invoice->total }}</th>
            <th>
                <a href="{{ route('invoices.generate-pdf', $invoice->id) }}">Generate PDF</a>
            </th>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection