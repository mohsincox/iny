@extends('layouts.app')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
    	<div class="col-6 col-sm-6">
      	<h1>Vendor List</h1>
    	</div>
      <div class="col-6 col-sm-6">
        <div class="float-right">
          <a href="{{ url('/vendor/create') }}" class="btn btn-primary"> <i class="fa fa-plus"></i> Add Vendor</a>
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
          <h3 class="card-title">Vendor List</h3>
        </div>
      	<div class="card-body">
          <div class="table-responsive">
            <table id="example" class="table table-bordered table-hover">
          		<thead>
          			<tr>
                  <th>SL</th>
                  <th>Name</th>
                  <th>Mobile Number</th>
                  <th>Address</th>
                  <th>Status</th>
                  <th>Edit</th>
                </tr>
          		</thead>
          		<tbody>
                @php
                  $i = 0;
                @endphp
          			@foreach($vendors as $vendor)
                <tr>
                  <td>{{ ++$i }}</td>
                  <td>{{ $vendor->name }}</td>
                  <td>{{ $vendor->mobile_number }}</td>
                  <td>{{ $vendor->address }}</td>
                  <td>{{ $vendor->status }}</td>
                  <td>{!! Html::link("vendor/$vendor->id/edit",' Edit', ['class' => 'fa fa-edit btn btn-success btn-xs btn-flat']) !!}</td>
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