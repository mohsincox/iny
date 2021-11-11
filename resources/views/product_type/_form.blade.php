@if(isset($productType))
  {!! Form::model($productType, ['url' => "product-type/$productType->id", 'method' => 'put', 'class' => 'form-horizontal']) !!}
@else
  {!! Form::open(['url' => 'product-type/store', 'method' => 'post', 'class' => 'form-horizontal']) !!}
@endif

<div class="card-body">
  <div class="form-group row">
    {!! Form::label('name', 'Product Type', ['class' => 'required col-12 col-sm-2 col-form-label']) !!}
    <div class="col-12 col-sm-10">
      {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : null), 'placeholder' => 'Enter Product Type', 'autocomplete' => 'off']) !!}
      @error('name')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
  </div>

  @if(isset($productType))
    <div class="form-group row">
        {!! Form::label('status', 'Status', ['class' => 'required col-12 col-sm-2 col-form-label']) !!}
        <div class="col-12 col-sm-10">
            {!! Form::select('status', ['Active' => 'Active', 'Inactive' => 'Inactive'], null, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : null), 'placeholder' => 'Select Status']) !!}
            @error('status')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
    </div>
  @endif
</div>
              
<div class="card-footer">
  @if(isset($productType))
    {!! Form::button('Update', ['class' => 'btn btn-success pull-right', 'data-toggle' => 'modal', 'data-target' => '#product_type_update']) !!}
  @else
    {!! Form::button('Submit', ['class' => 'btn btn-primary pull-right', 'data-toggle' => 'modal', 'data-target' => '#product_type_create']) !!}
  @endif
	<a href="{{ url('/product-type') }}" class="btn btn-default float-right">Cancel</a>
</div>

<div class="modal fade" id="product_type_create">
  <div class="modal-dialog">
    <div class="modal-content bg-info">
      <div class="modal-header">
        <h4 class="modal-title">Confirmation Message</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>Want to create Product Type?</h3>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-outline-light">Add Product Type</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="product_type_update">
  <div class="modal-dialog">
    <div class="modal-content bg-secondary">
      <div class="modal-header">
        <h4 class="modal-title">Confirmation Message</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>Want to Update Product Type?</h3>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-outline-light">Update Product Type</button>
      </div>
    </div>
  </div>
</div>

{!! Form::close() !!}