@extends('layouts.admin')

@section('stock')
<div class="container">
    <div class="text-center mb-10">
        <p class="text-sm text-gray-400">Panel admin</p>
        <h2 class="text-4xl font-bold text-indigo-700">Gestión stock</h2>
      </div>

    <table class="table table-bordered border-dark mx-auto w-75" style="min-width: 600px;">
        <thead>
            <tr>
                <th>Producte</th>
                <th>Estoc</th>
                <th>Vendes</th>
                <th>Accions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr class="{{ $product->stock == 0 ? 'table-danger' : '' }}">
                <td>{{ $product->title }}</td>
                <td>{{ $product->stock }}</td>
                <td>{{ $product->sales }}</td>
                <td>
                    <form action="{{ route('products.applyDiscountToProduct', $product->id) }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="discount" class="form-label">Descompte (%)</label>
                                <input type="number" class="form-control" id="discount" name="discount" min="1" max="100" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel·lar</button>
                            <button type="submit" class="btn btn-primary">Aplicar</button>
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-10">
        <canvas id="stockChart" width="800" height="400" class="mx-auto"></canvas>
    </div>
</div>

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    const canvas = document.getElementById('stockChart');
    const ctx = canvas.getContext('2d');
    const products = @json($products);

    const margin = 50;
    const width = canvas.width - 2 * margin;
    const height = canvas.height - 2 * margin;

    
     const maxStock = Math.max(...products.map(p => p.stock));

    
    ctx.beginPath();
    ctx.moveTo(margin, margin);
    ctx.lineTo(margin, canvas.height - margin);
    ctx.lineTo(canvas.width - margin, canvas.height - margin);
    ctx.stroke();

    
    const barWidth = width / products.length;
    products.forEach((product, index) => {
        const barHeight = (product.stock / maxStock) * height;
        const x = margin + index * barWidth;
        const y = canvas.height - margin - barHeight;

        ctx.fillStyle = `hsl(${Math.random() * 360}, 70%, 50%)`;
        ctx.fillRect(x, y, barWidth * 0.8, barHeight);

        ctx.save();
        ctx.translate(x + barWidth/2, canvas.height - margin + 10);
        ctx.rotate(-Math.PI/4);
        ctx.fillStyle = '#000';
        ctx.textAlign = 'right';
        ctx.fillText(product.title, 0, 0);
        ctx.restore();

        ctx.fillStyle = '#000';
        ctx.textAlign = 'center';
        ctx.fillText(product.stock, x + barWidth/2, y - 5);
    });

    ctx.fillStyle = '#000';
    ctx.textAlign = 'center';
    ctx.font = 'bold 16px Arial';
    ctx.fillText('Gràfic canvas de gestió de estoc', canvas.width/2, margin/2);
});
</script>
@endpush

@endsection