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
                    <table class="table">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">No</th>
                                <th scope="col">Order Code</th>
                                <th scope="col">User Order Name</th>
                                <th scope="col">Food Name</th>
                                <th scope="col">Count Order</th>
                                <th scope="col">Status Order</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $index => $order)
                                <tr class="text-center">
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $order->order_code }}</td>
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ $order->food->food_name }}</td>
                                    <td>{{ $order->count_order }} (Porsi)</td>
                                    <td>{{ $order->order_status }}</td>
                                    @if ($order->order_status === 'completed')
                                        <td>
                                            <p class="btn btn-secondary">Ready to Eat!</p>
                                        </td>
                                    @else
                                        <td><a href="{{ route('order-process-store', $order->id) }}"
                                                class="btn btn-success">I'ts ripe!</a></td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
