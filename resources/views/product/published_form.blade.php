@extends('layouts.app')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Update Published & Featured Product</h1>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="row">
    <div class="col-12 col-sm-8 offset-sm-2">
      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">Update Published & Featured Product</h3>
        </div>
        <div class="card-body">
          {!! Form::model($product, ['url' => "product/published/$product->id", 'method' => 'put', 'class' => 'form-horizontal']) !!}

          <div class="form-group row">
            {!! Form::label('published', 'Published', ['class' => 'required col-12 col-sm-2 col-form-label']) !!}
            <div class="col-12 col-sm-10">
              {!! Form::select('published', ['Yes' => 'Yes', 'No' => 'No'], null, ['class' => 'form-control' . ($errors->has('published') ? ' is-invalid' : null), 'placeholder' => 'Select Published']) !!}
              @error('published')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            {!! Form::label('is_featured', 'Featured', ['class' => 'required col-12 col-sm-2 col-form-label']) !!}
            <div class="col-12 col-sm-10">
              {!! Form::select('is_featured', ['1' => 'Yes', '0' => 'No'], null, ['class' => 'form-control' . ($errors->has('is_featured') ? ' is-invalid' : null), 'placeholder' => 'Select Featured']) !!}
              @error('is_featured')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          
        </div>

        <div class="card-footer">
          {!! Form::button('Update', ['class' => 'btn btn-success pull-right', 'data-toggle' => 'modal', 'data-target' => '#product_update']) !!}
          <a href="{{ url('/product') }}" class="btn btn-default float-right">Cancel</a>
        </div>


        <div class="modal fade" id="product_update">
          <div class="modal-dialog">
            <div class="modal-content bg-secondary">
              <div class="modal-header">
                <h4 class="modal-title">Confirmation Message</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <h3>Want to Update Product Status?</h3>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-light">Update Product Status</button>
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