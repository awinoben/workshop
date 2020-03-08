@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
    New Product
    </div>

    <div class="card-body">
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('truck_model') ? 'has-error' : '' }}">
                <label for="truck_model">{{ 'Truck Model' }}</label>
                <select type="text" id="truck_model" name="truck_model" class="form-control" required>
                <option>Select Model..</option>
                <option value="Model 2518">Model 2518</option>
                <option value="Model 9016">Model 9016</option>
                <option value="Model Tipper">Model Tipper</option>
                <option value="Model Dost">Model Dost</option>
                <option value="Model Partner">Model Partner</option>
                </select>
                @if($errors->has('truck_model'))
                    <em class="invalid-feedback">
                        {{ $errors->first('truck_model') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('part_no') ? 'has-error' : '' }}">
                <label for="part_no">{{ 'PartNo' }}</label>
                <input type="text" id="part_no" name="part_no" class="form-control" value="{{ old('part_no', isset($product) ? $product->part_no : '') }}" required>
                @if($errors->has('part_no'))
                    <em class="invalid-feedback">
                        {{ $errors->first('part_no') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">{{ 'Product Description' }}</label>
                <input type="text" id="description" name="description" class="form-control" value="{{ old('description', isset($product) ? $product->description : '') }}" required>
                @if($errors->has('description'))
                    <em class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                <label for="price">{{ 'Price' }}</label>
                <input type="number" id="price" name="price" class="form-control" value="{{ old('price', isset($product) ? $product->price : '') }}" step="0.01">
                @if($errors->has('price'))
                    <em class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </em>
                @endif
            </div>
            <div>
                <input class="btn btn-success" type="submit" value="{{ 'Save' }}">
            </div>
        </form>


    </div>
</div>
@endsection