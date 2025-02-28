<x-app-layout>
    <form action="{{ route('food-edit-store', $food->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <input class="form-control" type="text" name="food_name" id="food_name" placeholder="food name"
            value="{{ old('food_name', $food->food_name) }}">
        <input class="form-control" type="number" name="supply" id="supply" placeholder="Supply"
            value="{{ old('supply', $food->supply) }}">
        <input class="form-control" type="number" name="price" id="price" placeholder="Food Price"
            value="{{ old('price', $food->price) }}">
        <input class="form-control" type="file" name="image_food" id="image_food" placeholder="Image Food"
            value="{{ old('image_food', $food->image_food) }}">

        <button type="submit" class="btn btn-secondary">Submit</button>
    </form>
</x-app-layout>
