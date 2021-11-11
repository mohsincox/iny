@extends('layouts.app')

@section('content')

<!-- <section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Dashboard</h1>
      </div>
    </div>
  </div>
</section> -->

@php
  if(strpos($_SERVER['HTTP_USER_AGENT'], 'wv') !== FALSE) {
@endphp

<section class="content">
  <div class="row">
    <div class="col-12 col-sm-12 offset-sm-0">
      <!-- <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">Dashboard</h3>
        </div>
        <div class="card-body">
          

          
        </div>
      </div> -->



    </div>
  </div>
</section>

@php
  } else {
@endphp
<section class="content">
  <div class="row">
    <div class="col-12 col-sm-12 offset-sm-0">
      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">Dashboard</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
              <div class="info-box">
                <span class="info-box-icon bg-info"><img src="{{ asset('images/product.png') }}" alt="ms" width="50" height="50"></span>

                <div class="info-box-content">
                  <span class="info-box-text">Product</span>
                  <span class="info-box-number">{{ $productCount }}</span>
                </div>
              </div>
            </div>

            <div class="col-md-3 col-sm-6 col-12">
              <div class="info-box">
                <span class="info-box-icon bg-success"><img src="{{ asset('images/category.png') }}" alt="ms" width="50" height="50"></span>

                <div class="info-box-content">
                  <span class="info-box-text">Category</span>
                  <span class="info-box-number">{{ $categoryCount }}</span>
                </div>
              </div>
            </div>

            <div class="col-md-3 col-sm-6 col-12">
              <div class="info-box">
                <span class="info-box-icon bg-warning"><img src="{{ asset('images/sub category.png') }}" alt="ms" width="50" height="50"></span>

                <div class="info-box-content">
                  <span class="info-box-text">Sub Category</span>
                  <span class="info-box-number">{{ $subCategoryCount }}</span>
                </div>
              </div>
            </div>

            <div class="col-md-3 col-sm-6 col-12">
              <div class="info-box">
                <span class="info-box-icon bg-danger"><img src="{{ asset('images/brand.png') }}" alt="ms" width="50" height="50"></span>

                <div class="info-box-content">
                  <span class="info-box-text">Brand</span>
                  <span class="info-box-number">{{ $brandCount }}</span>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
              <div class="info-box bg-info">
                <span class="info-box-icon"><img src="{{ asset('images/vendor.png') }}" alt="ms"></span>

                <div class="info-box-content">
                  <span class="info-box-text">Vendor</span>
                  <span class="info-box-number" style="font-size: 25px;">{{ $vendorCount }}</span>
                </div>
              </div>
            </div>
          
            <div class="col-md-3 col-sm-6 col-12">
              <div class="info-box bg-success">
                <span class="info-box-icon"><img src="{{ asset('images/vendor user.png') }}" alt="ms"></span>

                <div class="info-box-content">
                  <span class="info-box-text">Vendor User</span>
                  <span class="info-box-number" style="font-size: 25px;">{{ $vendorUserCount }}</span>
                </div>
              </div>
            </div>
          
            <div class="col-md-3 col-sm-6 col-12">
              <div class="info-box bg-warning">
                <span class="info-box-icon"><img src="{{ asset('images/Vehicle Maker.png') }}" alt="ms"></span>

                <div class="info-box-content">
                  <span class="info-box-text">Vehicle Maker</span>
                  <span class="info-box-number" style="font-size: 25px;">{{ $vehicleMakerCount }}</span>
                </div>
              </div>
            </div>
          
            <div class="col-md-3 col-sm-6 col-12">
              <div class="info-box bg-danger">
                <span class="info-box-icon"><img src="{{ asset('images/Vehicle Model.png') }}" alt="ms"></span>

                <div class="info-box-content">
                  <span class="info-box-text">Vehicle Model</span>
                  <span class="info-box-number" style="font-size: 25px;">{{ $vehicleModelCount }}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@php
  }
@endphp

@endsection