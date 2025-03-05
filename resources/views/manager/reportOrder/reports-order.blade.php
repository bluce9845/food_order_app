<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('manager-report-order') }}" method="GET" class="d-flex">
                        <select name="month" id="month" class="form-select" style="max-width: 150px">
                            <option selected>Select Month</option>
                            @foreach (range(1, 12) as $m)
                                <option value="{{ $m }}" {{ request('month') == $m ? 'selected' : '' }}>
                                    {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                                </option>
                            @endforeach
                        </select>

                        <input type="number" class="form-control ms-5" name="year" id="year"
                            value="{{ request('year', date('Y')) }}" min="2000" max="{{ date('Y') }}"
                            placeholder="Year" style="max-width: 150px">

                        <button type="submit" class="btn btn-dark ms-4">Filter</button>
                    </form>

                    <table class="table mt-6">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">No</th>
                                <th scope="col">Order Code</th>
                                <th scope="col">Name Order</th>
                                <th scope="col">Food Name</th>
                                <th scope="col">Order Count</th>
                                <th scope="col">Payment</th>
                                <th scope="col">Order Status</th>
                                <th scope="col">Order Date</th>
                                <th scope="col">Amount Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $index => $order)
                                <tr class="text-center">
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $order->order_code }}</td>
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ $order->food->food_name }}</td>
                                    <td>{{ $order->count_order }}</td>
                                    <td>{{ $order->payment }}</td>
                                    <td>{{ $order->order_status }}</td>
                                    <td>{{ $order->order_date }}</td>
                                    <td>Rp {{ number_format($order->amount_price, 0, ',', '.') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">Tidak ada data</td>
                                </tr>
                            @endforelse
                            <tr>
                                <td colspan="8" class="text-end table-active">Total:</td>
                                <td class="text-center">Rp {{ number_format($total_amount, 0, ',', '.') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
