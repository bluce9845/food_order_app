<x-app-layout>
    <x-slot name="header">
        <ul>
            <li><a href="{{ route('food-form') }}">+Add New Food</a></li>
        </ul>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">No</th>
                                <th scope="col">Food</th>
                                <th scope="col">Supply</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($foodDatas as $index => $foodData)
                                <tr class="text-center">
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $foodData->food_name }}</td>
                                    <td>{{ $foodData->supply }} (Porsi)</td>
                                    <td>{{ $foodData->price }}/porsi</td>
                                    <td><a href="{{ route('edit-form', $foodData->id) }}" class="btn btn-info">Edit</a>
                                        <a href="{{ route('food-delete', $foodData->id) }}"
                                            class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
