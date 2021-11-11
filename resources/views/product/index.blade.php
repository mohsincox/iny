@extends('layouts.app')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-6 col-sm-6">
        <h1>Product List</h1>
      </div>
      <div class="col-6 col-sm-6">
        <div class="float-right">
          <a href="{{ url('/product/create') }}" class="btn btn-primary"> <i class="fa fa-plus"></i> Create Product</a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Product List</h3>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="example" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>SL</th>
                  <th>Product Name</th>
                  <th>Qty</th>
                  <th>Category</th>
                  <th>Sub Category</th>
                  <th>Brand</th>
                  <th>Vendor</th>
                  <th>Published</th>
                  <!-- <th>Status</th> -->
                  <th>Action</th>
                  <th>Stock in & out</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $i = 0;
                @endphp
                @foreach($products as $product)
                  <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->subCategory->name }}</td>
                    @if(isset($product->brand->name))
                      <td>{{ $product->brand->name }}</td>
                    @else
                      <td></td>
                    @endif
                    <td>{{ $product->vendor->name }}</td>
                    <td>{{ $product->published }}</td>
                    <!-- <td>{{ $product->status }}</td> -->
                    <td>
                      {!! Html::link("product/$product->id/edit",' Edit', ['class' => 'fa fa-edit btn btn-success btn-xs btn-flat']) !!}

                      {!! Html::link("product/published/$product->id/edit",' Published', ['class' => 'fas fa-newspaper btn btn-danger btn-xs btn-flat']) !!}

                      {!! Html::link("product-show/$product->id",' Details', ['class' => 'fa fa-eye btn btn-secondary btn-xs btn-flat']) !!}
                    </td>
                    <td>
                      {!! Html::link("product/stock-in/$product->id/create",' Stock in', ['class' => 'btn btn-success btn-xs btn-flat']) !!}

                      {!! Html::link("product/stock-out/$product->id/create",' Stock out', ['class' => 'btn btn-danger btn-xs btn-flat']) !!}
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
        </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection

@section('style')
  <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('script')
  <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#example').DataTable();
    } );
  </script>
@endsection