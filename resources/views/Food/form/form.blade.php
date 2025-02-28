<x-app-layout>
    <form action="{{ route('food-store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input class="form-control" type="text" name="food_name" id="food_name" placeholder="food name">
        <input class="form-control" type="number" name="supply" id="supply" placeholder="Supply">
        <input class="form-control" type="number" name="price" id="price" placeholder="Food Price">
        <input class="form-control" type="file" name="image_food" id="image_food" placeholder="Image Food">

        <button type="submit" class="btn btn-secondary">Submit</button>
    </form>
</x-app-layout>
