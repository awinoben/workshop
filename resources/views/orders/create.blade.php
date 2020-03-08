@extends('layouts.app')
@section('content')

<div class="col-md-12 justify">
<div class="card">
    <div class="card-header">
    New Order
    </div>

    <div class="card-body">
        <form action="{{ route('orders.store') }}" method="POST" enctype="multipart/form-data">
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
            <div class="form-group {{ $errors->has('customer_name') ? 'has-error' : '' }}">
                <label for="customer_name">Customer Name*</label>
                <input type="text" id="customer_name" name="customer_name" class="form-control" value="{{ old('customer_name', isset($order) ? $order->customer_name : '') }}" required>
                @if($errors->has('customer_name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('customer_name') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('customer_email') ? 'has-error' : '' }}">
                <label for="customer_email">Customer Email</label>
                <input type="email" id="customer_email" name="customer_email" class="form-control" value="{{ old('customer_email', isset($order) ? $order->customer_email : '') }}">
                @if($errors->has('customer_email'))
                    <em class="invalid-feedback">
                        {{ $errors->first('customer_email') }}
                    </em>
                @endif
            </div>

            <div class="card">
                <div class="card-header">
                    Products
                </div>

                <div class="card-body">
                    <table class="table" id="products_table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="product0">
                                <td>
                                    <select name="products[]" class="form-control">
                                        <option value="">-- choose product --</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->part_no }} {{ $product->description }} (KSH {{ number_format($product->price, 2) }})</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="number" name="quantities[]" class="form-control" value="1" />
                                </td>
                            </tr>
                            <tr id="product1"></tr>
                        </tbody>
                    </table>

                    <div class="row">
                        <div class="col-md-12">
                            <button id="add_row" class="btn btn-primary pull-left">+ Add Row</button>
                            <button id='delete_row' class="pull-right btn btn-danger">- Delete Row</button>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <input class="btn btn-success" type="submit" value="{{ 'Save'}}">
            </div>
        </form>


    </div>
</div>
</div>
@endsection

@section('scripts')
<script>
  $(document).ready(function(){
    let row_number = 1;
    $("#add_row").click(function(e){
      e.preventDefault();
      let new_row_number = row_number - 1;
      $('#product' + row_number).html($('#product' + new_row_number).html()).find('td:first-child');
      $('#products_table').append('<tr id="product' + (row_number + 1) + '"></tr>');
      row_number++;
    });
    $("#delete_row").click(function(e){
      e.preventDefault();
      if(row_number > 1){
        $("#product" + (row_number - 1)).html('');
        row_number--;
      }
    });
  });
</script>
@endsection