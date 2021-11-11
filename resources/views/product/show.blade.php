@extends('layouts.app')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Product Detail</h1>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="row">
    <div class="col-12 col-sm-12">
      <div class="card card-secondary">
        <div class="card-header">
          <h3 class="card-title">Product Detail</h3>
        </div>
        <div class="card-body">   
          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <td><b>Product Name:</b> {{ $product->name }}</td>
                  <td><b>Product Code:</b> {{ $product->product_code }}</td>
                </tr>

                <tr>
                  <td><b>Category:</b> {{ $product->category->name }}</td>
                  <td><b>Sub Category:</b> {{ $product->subCategory->name }}</td>
                </tr>

                <tr>
                  <td><b>Vendor Price:</b> {{ $product->vendor_price }}</td>
                  <td><b>Selling Price:</b> {{ $product->selling_price }}</td>
                </tr>
                
                <tr>
                  <td><b>Product Type:</b> @if(isset($product->productType->name)) {{ $product->productType->name }} @endif </td>
                  <td><b>Brand:</b> @if(isset($product->brand->name)) {{ $product->brand->name }} @endif </td>
                </tr>

                <tr>
                  <td><b>Vendor:</b> {{ $product->vendor->name }}</td>
                  <td><b>Pre Order:</b> {{ $product->pre_order }}</td>
                </tr>

                <tr>
                  <td><b>Small Description</b></td>
                  <td colspan="3">{{ $product->small_description }}</td>
                </tr>

                <tr>
                  <td><b>Detail Description</b></td>
                  <td colspan="3">{!! $product->detail_description !!}</td>
                </tr>

                <tr>
                  <td><b>Start Year:</b> {{ $product->start_year }}</td>
                  <td><b>End Year:</b> {{ $product->end_year }}</td>
                </tr>

                <tr>
                  <td><b>Product Group:</b> @if(isset($product->productGroup->name)) {{ $product->productGroup->name }} @endif </td>
                  <td><b>Applicable for or Compatible with:</b> @if(isset($product->vehicleMaker->name)) {{ $product->vehicleMaker->name . ' :: '. $applicableModelList}} @endif </td>
                </tr>
                
              </tbody>
            </table>
          </div>

          <div class="row">
            <div class="col-sm-3">
              <p><b>Thumbnail Image</b></p>
              {{ Html::image('/public/uploads/' . $product->cover_img, 'No Picture', ['width' => 50, 'height' => 50]) }}
            </div>

            <div class="col-sm-3">
              <p><b>Detail Image</b></p>
              @foreach(json_decode($product->images) as $imgd)
              {{ Html::image('/public/uploads/' . $imgd, 'No Picture', ['width' => 50, 'height' => 50]) }}
              <span style="margin-right: 20px;"></span>
              @endforeach
            </div>
          </div>

          <h4>Stock In Detail:</h4>

          <div class="table-responsive">
            <table id="example" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>SL</th>
                  <th>Quantity</th>
                  <th>Remarks</th>
                  <th>Created At</th>
                  <th>Created By</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $i = 0;
                @endphp
                @foreach($product->stockInProducts as $stockInProduct)
                <tr>
                  <td>{{ ++$i }}</td>
                  <td>{{ $stockInProduct->quantity }}</td>
                  <td>{{ $stockInProduct->remarks }}</td>
                  <td>{{ $stockInProduct->created_at }}</td>
                    <td>{{ $stockInProduct->createdBy->name }}</td>
                 
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

          <h4>Stock Out Detail:</h4>

          <div class="table-responsive">
            <table id="example" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>SL</th>
                  <th>Quantity</th>
                  <th>Remarks</th>
                  <th>Created At</th>
                  <th>Created By</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $i = 0;
                @endphp
                @foreach($product->stockOutProducts as $stockOutProduct)
                <tr>
                  <td>{{ ++$i }}</td>
                  <td>{{ $stockOutProduct->quantity }}</td>
                  <td>{{ $stockOutProduct->remarks }}</td>
                  <td>{{ $stockOutProduct->created_at }}</td>
                    <td>{{ $stockOutProduct->createdBy->name }}</td>
                 
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