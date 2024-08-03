<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice #{{ $invoice->invoice_number }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        .titlea{
            text-align: center;
            font-size: 200px;
        }
        .invoice-box {
            width: 100%;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            color: #555;
        }
        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }
        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }
        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }
        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }
        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }
        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }
        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }
        .invoice-box table tr.item td{
            border-bottom: 1px solid #eee;
        }
        .invoice-box table tr.item.last td {
            border-bottom: none;
        }
        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }
        .signature-box {
            margin-top: 30px;
            text-align: right;
            margin-right:100px ;
        }
        .signature-image {
            height: 50px;
        }
        .logo img {
            height: 50px;
        }
        .titl {
            text-align: right;
            margin-right: 100px;
            margin-top: 0px;
        }
    </style>
</head>
<body>
    <div class="invoice-box">
    <div class="invoice-header">
            <div class="logo">
                <img src="{{ public_path('ttd.png') }}" alt="Logo">
            </div>
            <div class="titl">
                <h2>Invoice</h2>
                <p>Reference #: {{ $invoice->invoice_number }}</p>
                <p>Date: {{ $invoice->date }}</p>
            </div>
        </div>
        <table cellpadding="0" cellspacing="0">
            <!-- <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <h2>Invoice</h2>
                            </td>
                            <td>
                                Invoice #: {{ $invoice->invoice_number }}<br>
                                Created: {{ $invoice->date }}<br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr> -->

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                <strong>Pt Anugerah Mitra Sentosa</strong><br>
                                Alamat Perusahaan<br>
                                Kontak Perusahaan
                            </td>

                            <td>
                                <strong>Bill To:</strong><br>
                                Nama Klien<br>
                                Alamat Klien
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>Payment Method</td>
                <td>Check #</td>
            </tr>

            <tr class="details">
                <td>Check</td>
                <td>1000</td>
            </tr>

            <tr class="heading">
                <td>Product</td>
                <td>Description</td>
                <td>Quantity</td>
                <td>Price</td>
                <td>Discount</td>
                <td>Tax</td>
                <td>Total</td>
            </tr>

            @foreach ($invoice->items as $item)
            <tr class="item {{ $loop->last ? 'last' : '' }}">
                <td>{{ $item->product }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->quantity }}</td>
                <td>Rp {{ number_format($item->price, 2) }}</td>
                <td>Rp {{ number_format($item->price * 0.10, 2) }}</td> <!-- Discount 10% of price -->
                <td>Rp {{ number_format(($item->price - $item->price * 0.10) * 0.01, 2) }}</td> <!-- Tax 1% after discount -->
                <td>Rp {{ number_format(($item->quantity * $item->price) - ($item->quantity * $item->price * 0.10) + (($item->quantity * $item->price - $item->quantity * $item->price * 0.10) * 0.01), 2) }}</td>
            </tr>
            @endforeach

            <tr class="total">
                <td colspan="6" style="text-align: right;">Subtotal:</td>
                <td>Rp{{ number_format($invoice->subtotal, 2) }}</td>
            </tr>
            <tr class="total">
                <td colspan="6" style="text-align: right;">Discount:</td>
                <td>Rp{{ number_format($invoice->discount, 2) }}</td>
            </tr>
            <tr class="total">
                <td colspan="6" style="text-align: right;">Tax:</td>
                <td>Rp{{ number_format($invoice->tax, 2) }}</td>
            </tr>
            <tr class="total">
                <td colspan="6" style="text-align: right;">Total:</td>
                <td>Rp{{ number_format($invoice->total, 2) }}</td>
            </tr>
        </table>
        <div class="signature-box">
            <p>Jakarta, {{ \Carbon\Carbon::now()->format('d M Y') }}</p>
            <br><br>
            
            <img src="{{ public_path('ttd.png') }}" alt="Signature" class="signature-image">
            <p> Pink Floyd is the best </p>
        </div>
    </div>
</body>
</html>
