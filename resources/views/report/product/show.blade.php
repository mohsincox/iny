@extends('layouts.app')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-6 col-sm-6">
        <h1>Report</h1>
      </div>
      <div class="col-6 col-sm-6">
        <div class="float-right">
          
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
          <h3 class="card-title">Product Report From <i>{{ $startDate }}</i> To <i>{{ $endDate }}</i></h3>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="exampleZ" class="table table-bordered">
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
                  <th>Status</th>
                  <th>Vendor Price</th>
                  <th>Selling Price</th>
                  <th>Small Description</th>
                  <th>Pre Order</th>
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
                    <td>{{ $product->status }}</td>
                    <td>{{ $product->vendor_price }}</td>
                    <td>{{ $product->selling_price }}</td>
                    <td>{{ $product->small_description }}</td>
                    <td>{{ $product->pre_order }}</td>
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