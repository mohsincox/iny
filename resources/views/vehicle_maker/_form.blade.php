@if(isset($vehicleMaker))
  {!! Form::model($vehicleMaker, ['url' => "vehicle-maker/$vehicleMaker->id", 'method' => 'put', 'class' => 'form-horizontal']) !!}
@else
  {!! Form::open(['url' => 'vehicle-maker/store', 'method' => 'post', 'class' => 'form-horizontal']) !!}
@endif

<div class="card-body">
  <div class="form-group row">
    {!! Form::label('name', 'Vehicle Maker', ['class' => 'required col-12 col-sm-2 col-form-label']) !!}
    <div class="col-12 col-sm-10">
      {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : null), 'placeholder' => 'Enter Vehicle Maker', 'autocomplete' => 'off']) !!}
      @error('name')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
  </div>

  @if(isset($vehicleMaker))
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
  @if(isset($vehicleMaker))
    {!! Form::button('Update', ['class' => 'btn btn-success pull-right', 'data-toggle' => 'modal', 'data-target' => '#vehicle_maker_update']) !!}
  @else
    {!! Form::button('Submit', ['class' => 'btn btn-primary pull-right', 'data-toggle' => 'modal', 'data-target' => '#vehicle_maker_create']) !!}
  @endif
	<a href="{{ url('/vehicle-maker') }}" class="btn btn-default float-right">Cancel</a>
</div>

<div class="modal fade" id="vehicle_maker_create">
  <div class="modal-dialog">
    <div class="modal-content bg-info">
      <div class="modal-header">
        <h4 class="modal-title">Confirmation Message</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>Want to create Vehicle Maker?</h3>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-outline-light">Add Vehicle Maker</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="vehicle_maker_update">
  <div class="modal-dialog">
    <div class="modal-content bg-secondary">
      <div class="modal-header">
        <h4 class="modal-title">Confirmation Message</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>Want to Update Vehicle Maker?</h3>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-outline-light">Update Vehicle Maker</button>
      </div>
    </div>
  </div>
</div>

{!! Form::close() !!}