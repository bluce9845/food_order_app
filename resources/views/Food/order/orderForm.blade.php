<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <form action="{{ route('order-store') }}" method="POST">
        @csrf

        <input type="hidden" name="food_id" value="{{ $food->id }}">
        <input type="hidden" id="food_price" value="{{ $food->price }}">

        <label for="food_name">Makanan:</label>
        <input type="text" class="form-control" value="{{ $food->food_name }}" readonly>

        <label for="count_order">Jumlah Pesanan:</label>
        <input class="form-control" type="number" name="count_order" id="count_order" min="1" value="1">

        <label for="amount_price">Total Harga:</label>
        <input class="form-control" type="text" name="amount_price" id="amount_price" readonly>

        <button type="submit" class="btn btn-secondary">Submit</button>
    </form>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let countInput = document.getElementById("count_order");
            let amountInput = document.getElementById("amount_price");
            let foodPrice = parseFloat(document.getElementById("food_price").value);

            countInput.addEventListener("input", function() {
                let count = parseInt(countInput.value) || 1;
                let total = foodPrice * count;
                amountInput.value = total.toFixed(2);
            });
        });
    </script>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>
