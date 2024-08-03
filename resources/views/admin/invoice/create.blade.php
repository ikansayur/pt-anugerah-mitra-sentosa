<!-- create_invoice.blade.php -->
 @extends('layouts.app')
 @section('content')
 <form action="{{ route('invoices.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="invoice_number">Invoice Number:</label>
                <input type="text" class="form-control" name="invoice_number" id="invoice_number" required>
            </div>

            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" class="form-control" name="date" id="date" required>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody id="invoice-items">
                    <tr>
                        <td><input type="text" class="form-control" name="products[]" required></td>
                        <td><input type="text" class="form-control" name="descriptions[]"></td>
                        <td><input type="number" class="form-control" name="quantities[]" required></td>
                        <td><input type="number" class="form-control" step="0.01" name="prices[]" required></td>
                        <td><input type="number" class="form-control" step="0.01" name="totals[]" readonly></td>
                    </tr>
                </tbody>
            </table>

            <button type="button" class="btn btn-primary mb-3" onclick="addItem()">Add Item</button>

            <div class="form-group">
                <label for="subtotal">Subtotal:</label>
                <input type="number" class="form-control" step="0.01" name="subtotal" id="subtotal" readonly>
            </div>

            <div class="form-group">
                <label for="discount">Discount (10%):</label>
                <input type="number" class="form-control" step="0.01" name="discount" id="discount" readonly>
            </div>

            <div class="form-group">
                <label for="tax">Tax (1%):</label>
                <input type="number" class="form-control" step="0.01" name="tax" id="tax" readonly>
            </div>

            <div class="form-group">
                <label for="total">Total:</label>
                <input type="number" class="form-control" step="0.01" name="total" id="total" readonly>
            </div>

            <button type="submit" class="btn btn-success">Create Invoice</button>
        </form>
    </div>

    <script>
        function addItem() {
            var row = `<tr>
                <td><input type="text" class="form-control" name="products[]" required></td>
                <td><input type="text" class="form-control" name="descriptions[]"></td>
                <td><input type="number" class="form-control" name="quantities[]" required></td>
                <td><input type="number" class="form-control" step="0.01" name="prices[]" required></td>
                <td><input type="number" class="form-control" step="0.01" name="totals[]" readonly></td>
            </tr>`;
            document.getElementById('invoice-items').insertAdjacentHTML('beforeend', row);
        }
    </script>
@endsection