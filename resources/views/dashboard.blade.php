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
                    <div class="row">
                        @foreach ($foods as $food)
                            <div class="col-md-4 mb-4">
                                <div class="card shadow-sm">
                                    <img src="{{ url('storage/' . $food->image_food) }}" class="card-img-top"
                                        alt="Food Image">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $food->food_name }}</h5>
                                        <p class="card-text">Rp {{ number_format($food->price, 0, ',', '.') }}</p>
                                        <a href="{{ route('order-food', $food->id) }}" class="btn btn-primary">Eat
                                            me!</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
