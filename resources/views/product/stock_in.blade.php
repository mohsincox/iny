@extends('layouts.app')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Stock In</h1>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="row">
    <div class="col-12 col-sm-8 offset-sm-2">
      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title"><b><span class="badge badge-danger">{{ $product->name }}</span></b> Stock In Form </h3><span class="float-right">Current Quantity: <b><span class="badge badge-danger">{{ $product->quantity }}</span></b></span>
        </div>
        <div class="card-body">
          {!! Form::model($product, ['url' => "product/stock-in/$product->id", 'method' => 'put', 'class' => 'form-horizontal']) !!}

          <div class="form-group row">
            {!! Form::label('qty', 'Product Quantity', ['class' => 'required col-12 col-sm-2 col-form-label']) !!}
            <div class="col-12 col-sm-10">
              {!! Form::text('qty', null, ['class' => 'form-control' . ($errors->has('qty') ? ' is-invalid' : null), 'placeholder' => 'Enter Product Quantity', 'autocomplete' => 'off']) !!}
              @error('qty')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            {!! Form::label('remarks', 'Remarks', ['class' => 'required col-12 col-sm-2 col-form-label']) !!}
            <div class="col-12 col-sm-10">
              {!! Form::textarea('remarks', null, ['class' => 'form-control' . ($errors->has('remarks') ? ' is-invalid' : null), 'placeholder' => 'Enter Remarks', 'autocomplete' => 'off', 'rows' => '3']) !!}
              @error('remarks')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          
        </div>

        <div class="card-footer">
          {!! Form::button('Stock In', ['class' => 'btn btn-success pull-right', 'data-toggle' => 'modal', 'data-target' => '#stock_in']) !!}
          <a href="{{ url('/product') }}" class="btn btn-default float-right">Cancel</a>
        </div>


        <div class="modal fade" id="stock_in">
          <div class="modal-dialog">
            <div class="modal-content bg-success">
              <div class="modal-header">
                <h4 class="modal-title">Confirmation Message</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <h3>Want to Stock In this Product?</h3>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-light">Stock In</button>
              </div>
            </div>
          </div>
        </div>

        {!! Form::close() !!}


      </div>
    </div>
  </div>
</section>

@endsection