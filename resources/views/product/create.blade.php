@extends('layouts.app')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Create Product</h1>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="row">
    <div class="col-12 col-sm-12 offset-sm-0">
      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">Create Product</h3>
        </div>
        <div class="card-body">   
          @include('product._form')
        </div>
      </div>
    </div>
  </div>
</section>

@endsection