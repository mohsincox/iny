@if(isset($brand))
  {!! Form::model($brand, ['url' => "brand/$brand->id", 'method' => 'put', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
@else
  {!! Form::open(['url' => 'brand/store', 'method' => 'post', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
@endif

<div class="card-body">
  <div class="form-group row">
    {!! Form::label('name', 'Brand', ['class' => 'required col-12 col-sm-2 col-form-label']) !!}
    <div class="col-12 col-sm-10">
      {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : null), 'placeholder' => 'Enter Brand', 'autocomplete' => 'off']) !!}
      @error('name')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('image', 'Image', ['class' => 'col-12 col-sm-2 col-form-label']) !!}
    <div class="col-12 col-sm-10">
      {!! Form::file('image', ['class' => 'form-control',  'onchange' => 'readURL(this)', 'placeholder' => 'Enter video', 'autocomplete' => 'off']) !!}
      @error('image')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
    {{--<div class="col-12 col-sm-10 offset-sm-2 mt-2">
        @if(isset($brand->image))
            {{ Html::image('public/uploads/'.$brand->image, 'image', ['id' => 'preview', 'width' => 100, 'height' => 100]) }}
        @else
            {{ Html::image('#', 'image', ['id' => 'preview']) }}
        @endif
    </div>--}}
  </div>

  @if(isset($brand))
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
  @if(isset($brand))
    {!! Form::button('Update', ['class' => 'btn btn-success pull-right', 'data-toggle' => 'modal', 'data-target' => '#brand_update']) !!}
  @else
    {!! Form::button('Submit', ['class' => 'btn btn-primary pull-right', 'data-toggle' => 'modal', 'data-target' => '#brand_create']) !!}
  @endif
	<a href="{{ url('/brand') }}" class="btn btn-default float-right">Cancel</a>
</div>

<div class="modal fade" id="brand_create">
  <div class="modal-dialog">
    <div class="modal-content bg-info">
      <div class="modal-header">
        <h4 class="modal-title">Confirmation Message</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>Want to create Brand?</h3>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-outline-light">Add Brand</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="brand_update">
  <div class="modal-dialog">
    <div class="modal-content bg-secondary">
      <div class="modal-header">
        <h4 class="modal-title">Confirmation Message</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>Want to Update Brand?</h3>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-outline-light">Update Brand</button>
      </div>
    </div>
  </div>
</div>

{!! Form::close() !!}


@section('script')
  <script type="text/javascript">
      function readURL(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();
              reader.onload = function (e) {
                  $('#preview')
                          .attr('src', e.target.result)
                          .width(100)
                          .height(100);
              };
              reader.readAsDataURL(input.files[0]);
          }
      }
  </script>
@endsection