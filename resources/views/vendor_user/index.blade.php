@extends('layouts.app')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-6 col-sm-6">
        <h1>Vendor User List</h1>
      </div>
      <div class="col-6 col-sm-6">
        <div class="float-right">
          <a href="{{ url('/vendor-user/create') }}" class="btn btn-primary"> <i class="fa fa-plus"></i> Create Vendor User</a>
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
          <h3 class="card-title">Vendor User List</h3>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="example" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>SL</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Vendor</th>
                  <th>Vendor Mobile</th>
                  <th>Vendor Address</th>
                  <!-- <th>Edit</th> -->
                </tr>
              </thead>
              <tbody>
                @php
                  $i = 0;
                @endphp
                @foreach($vendorUsers as $vendorUser)
                <tr>
                  <td>{{ ++$i }}</td>
                  <td>{{ $vendorUser->name }}</td>
                  <td>{{ $vendorUser->email }}</td>
                  <td>{{ $vendorUser->vendor->name }}</td>
                  <td>{{ $vendorUser->vendor->mobile_number }}</td>
                  <td>{{ $vendorUser->vendor->address }}</td>
                  <!-- <td>{!! Html::link("vendor-user/$vendorUser->id/edit",' Edit', ['class' => 'fa fa-edit btn btn-success btn-xs btn-flat']) !!}</td> -->
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