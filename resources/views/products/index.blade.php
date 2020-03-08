@extends('layouts.app')
@section('content')
<!-- @can('product_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.products.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.product.title_singular') }}
            </a>
        </div>
    </div>
@endcan -->
<div class="card">
    <div class="card-header">
        {{ "Products List" }}
        <a class="btn btn-success" href="{{ route('products.create') }}">
                {{ ('Add Product') }}            </a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Product">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ "No" }}
                        </th>
                        <th>
                            {{ "Truck Model" }}
                        </th>
                        <th>
                            {{ "PartNo" }}
                        </th>
                        <th>
                            {{ "Description" }}
                        </th>
                        <th>
                            {{ "S/Price" }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $key => $product)
                        <tr data-entry-id="{{ $product->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $product->id ?? '' }}
                            </td>
                            <td>
                                {{ $product->truck_model ?? '' }}
                            </td>
                            <td>
                                {{ $product->part_no ?? '' }}
                            </td>
                            <td>
                                {{ $product->description ?? '' }}
                            </td>
                            <td>
                                {{ $product->price ?? '' }}
                            </td>
                            <td>
                                    <a class="btn btn-xs btn-primary" href="{{ route('products.show', $product->id) }}">
                                        {{ 'View' }}
                                    </a>

                                    <a class="btn btn-xs btn-info" href="{{ route('products.edit', $product->id) }}">
                                        {{ 'Edit' }}
                                    </a>

                                <!-- @can('product_delete') -->
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ 'Delete' }}">
                                    </form>
                                <!-- @endcan -->

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('product_delete')
  let deleteButtonTrans = '{{ 'Delete' }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('products.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });
      if (ids.length === 0) {
        alert('{{ 'Zero Selected' }}')
        return
      }
      if (confirm('{{ 'Are you sure you sure?' }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan
  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-Product:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})
</script>
@endsection