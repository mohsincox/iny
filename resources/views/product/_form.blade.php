@if(isset($product))
  {!! Form::model($product, ['url' => "product/$product->id", 'method' => 'put', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
@else
  {!! Form::open(['url' => 'product/store', 'method' => 'post', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
@endif

<div class="card-body">

  <div class="form-group row">
    {!! Form::label('category_id', 'Category', ['class' => 'required col-12 col-sm-2 col-form-label']) !!}
    <div class="col-12 col-sm-10">
      {!! Form::select('category_id', $categoryList, null, ['class' => 'form-control' . ($errors->has('category_id') ? ' is-invalid' : null), 'placeholder' => 'Select Category', 'id' => 'category_id', 'required' => 'required']) !!}
      @error('category_id')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('sub_category_id', 'Sub Category', ['class' => 'required col-12 col-sm-2 col-form-label']) !!}
    <div class="col-12 col-sm-10">
      {!! Form::select('sub_category_id', [], null, ['class' => 'form-control' . ($errors->has('sub_category_id') ? ' is-invalid' : null), 'placeholder' => 'Select Sub Category', 'id' => 'sub_category_id', 'required' => 'required']) !!}
      @error('sub_category_id')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('product_type_id', 'Product Type', ['class' => 'col-12 col-sm-2 col-form-label']) !!}
    <div class="col-12 col-sm-10">
      {!! Form::select('product_type_id', $productTypeList, null, ['class' => 'form-control' . ($errors->has('product_type_id') ? ' is-invalid' : null), 'placeholder' => 'Select Product Type']) !!}
      @error('product_type_id')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('brand_id', 'Brand', ['class' => 'col-12 col-sm-2 col-form-label']) !!}
    <div class="col-12 col-sm-10">
      {!! Form::select('brand_id', $brandList, null, ['class' => 'form-control' . ($errors->has('brand_id') ? ' is-invalid' : null), 'placeholder' => 'Select Brand']) !!}
      @error('brand_id')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('name', 'Product Name', ['class' => 'required col-12 col-sm-2 col-form-label']) !!}
    <div class="col-12 col-sm-10">
      {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : null), 'placeholder' => 'Enter Product Name', 'autocomplete' => 'off', 'required' => 'required']) !!}
      @error('name')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('product_code', 'Product Code', ['class' => 'required col-12 col-sm-2 col-form-label']) !!}
    <div class="col-12 col-sm-10">
      {!! Form::text('product_code', null, ['class' => 'form-control' . ($errors->has('product_code') ? ' is-invalid' : null), 'placeholder' => 'Enter Product Code', 'autocomplete' => 'off', 'required' => 'required']) !!}
      @error('product_code')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('vendor_price', 'Vendor Price', ['class' => 'col-12 col-sm-2 col-form-label']) !!}
    <div class="col-12 col-sm-10">
      {!! Form::text('vendor_price', null, ['class' => 'form-control' . ($errors->has('vendor_price') ? ' is-invalid' : null), 'placeholder' => 'Enter Vendor Price', 'autocomplete' => 'off']) !!}
      @error('vendor_price')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('selling_price', 'Selling Price', ['class' => 'col-12 col-sm-2 col-form-label']) !!}
    <div class="col-12 col-sm-10">
      {!! Form::text('selling_price', null, ['class' => 'form-control' . ($errors->has('selling_price') ? ' is-invalid' : null), 'placeholder' => 'Enter Selling Price', 'autocomplete' => 'off']) !!}
      @error('selling_price')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('pre_order', 'Pre Order', ['class' => 'col-12 col-sm-2 col-form-label']) !!}
    <div class="col-12 col-sm-10">
      {!! Form::select('pre_order', ['Yes' => 'Yes', 'No' => 'No'], null, ['class' => 'form-control' . ($errors->has('pre_order') ? ' is-invalid' : null), 'placeholder' => 'Select Pre Order']) !!}
      @error('pre_order')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('small_description', 'Small Description', ['class' => 'col-12 col-sm-2 col-form-label']) !!}
    <div class="col-12 col-sm-10">
      {!! Form::textarea('small_description', null, ['class' => 'form-control', 'placeholder' => '', 'autocomplete' => 'off', 'rows' => 3]) !!}
      @error('small_description')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('detail_description', 'Detail Description', ['class' => 'col-12 col-sm-2 col-form-label']) !!}
    <div class="col-12 col-sm-10">
      {!! Form::textarea('detail_description', null, ['class' => 'form-control myeditablediv', 'placeholder' => 'Enter Detail Description', 'autocomplete' => 'off']) !!}
      @error('detail_description')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
  </div>

  <div class="form-group row">
      {!! Form::label('vehicle_maker_id', 'Vehicle Maker', ['class' => 'col-12 col-sm-2 col-form-label']) !!}
      <div class="col-12 col-sm-10">
          {!! Form::select('vehicle_maker_id', $vehicleMakerList, null, ['class' => 'form-control' . ($errors->has('vehicle_maker_id') ? ' is-invalid' : null), 'placeholder' => 'Select Vehicle Maker', 'id' => 'vehicle_maker_id']) !!}
          @error('vehicle_maker_id')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
  </div>

  <div class="form-group row">
      {!! Form::label('applicable_vehicle_models', 'Applicable for or Compatible with', ['class' => 'col-12 col-sm-2 col-form-label']) !!}
      <div class="col-12 col-sm-10">
          {!! Form::select('applicable_vehicle_models[]', [], null, ['class' => 'form-control select2' . ($errors->has('applicable_vehicle_models') ? ' is-invalid' : null), 'multiple' => 'multiple', 'id' => 'vehicle_model_id']) !!}
          @error('applicable_vehicle_models')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
  </div>

  <div class="form-group row">
    {!! Form::label('start_year', 'Start Year', ['class' => 'col-12 col-sm-2 col-form-label']) !!}
    <div class="col-12 col-sm-10">
      <!-- {!! Form::select('start_year', ['1990' => '1990', '1991' => '1991', '1992' => '1992', '1993' => '1993', '1994' => '1994', '1995' => '1995', '1996' => '1996', '1997' => '1997', '1998' => '1998', '1999' => '1999', '2000' => '2000', '2001' => '2001', '2002' => '2002', '2003' => '2003', '2004' => '2004', '2005' => '2005', '2006' => '2006', '2007' => '2007', '2008' => '2008', '2009' => '2009', '2010' => '2010', '2011' => '2011', '2012' => '2012', '2013' => '2013', '2014' => '2014', '2015' => '2015', '2016' => '2016', '2017' => '2017', '2018' => '2018', '2019' => '2019', '2020' => '2020', '2021' => '2021', '2022' => '2022', '2023' => '2023', '2024' => '2024', '2025' => '2025', '2026' => '2026', '2027' => '2027', '2028' => '2028', '2029' => '2029', '2030' => '2030'], null, ['class' => 'form-control' . ($errors->has('start_year') ? ' is-invalid' : null), 'placeholder' => 'Select Start Year']) !!} -->
      {!! Form::select('start_year', ['1990' => '1990', '1991' => '1991', '1992' => '1992', '1993' => '1993', '1994' => '1994', '1995' => '1995', '1996' => '1996', '1997' => '1997', '1998' => '1998', '1999' => '1999', '2000' => '2000', '2001' => '2001', '2002' => '2002', '2003' => '2003', '2004' => '2004', '2005' => '2005', '2006' => '2006', '2007' => '2007', '2008' => '2008', '2009' => '2009', '2010' => '2010', '2011' => '2011', '2012' => '2012', '2013' => '2013', '2014' => '2014', '2015' => '2015', '2016' => '2016', '2017' => '2017', '2018' => '2018', '2019' => '2019', '2020' => '2020', '2021' => '2021'], null, ['class' => 'form-control select3' . ($errors->has('start_year') ? ' is-invalid' : null), 'placeholder' => 'Select Start Year']) !!}
      @error('start_year') 
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('end_year', 'End Year', ['class' => 'col-12 col-sm-2 col-form-label']) !!}
    <div class="col-12 col-sm-10">
      {!! Form::select('end_year', ['1990' => '1990', '1991' => '1991', '1992' => '1992', '1993' => '1993', '1994' => '1994', '1995' => '1995', '1996' => '1996', '1997' => '1997', '1998' => '1998', '1999' => '1999', '2000' => '2000', '2001' => '2001', '2002' => '2002', '2003' => '2003', '2004' => '2004', '2005' => '2005', '2006' => '2006', '2007' => '2007', '2008' => '2008', '2009' => '2009', '2010' => '2010', '2011' => '2011', '2012' => '2012', '2013' => '2013', '2014' => '2014', '2015' => '2015', '2016' => '2016', '2017' => '2017', '2018' => '2018', '2019' => '2019', '2020' => '2020', '2021' => '2021'], null, ['class' => 'form-control select3' . ($errors->has('end_year') ? ' is-invalid' : null), 'placeholder' => 'Select End Year']) !!}
      @error('end_year') 
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('product_group_id', 'Product Group', ['class' => 'col-12 col-sm-2 col-form-label']) !!}
    <div class="col-12 col-sm-10">
      {!! Form::select('product_group_id', $productGroupList, null, ['class' => 'form-control' . ($errors->has('product_group_id') ? ' is-invalid' : null), 'placeholder' => 'Select Product Group']) !!}
      @error('product_group_id')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('vendor_id', 'Vendor', ['class' => 'required col-12 col-sm-2 col-form-label']) !!}
    <div class="col-12 col-sm-10">
      {!! Form::select('vendor_id', $vendorList, null, ['class' => 'form-control' . ($errors->has('vendor_id') ? ' is-invalid' : null), 'placeholder' => 'Select Vendor', 'required' => 'required']) !!}
      @error('vendor_id')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
  </div>

  @if(isset($product))
    <div class="form-group row">
        {!! Form::label('status', 'Status', ['class' => 'required col-12 col-sm-2 col-form-label']) !!}
        <div class="col-12 col-sm-10">
            {!! Form::select('status', ['Active' => 'Active', 'Inactive' => 'Inactive'], null, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : null), 'placeholder' => 'Select Status', 'required' => 'required']) !!}
            @error('status')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
    </div>
  @endif

  <div class="form-group row">
    {!! Form::label('chassis_code', 'Chassis Code', ['class' => 'col-12 col-sm-2 col-form-label']) !!}
    <div class="col-12 col-sm-10">
      {!! Form::select('chassis_code', $vehicleModelList, null, ['class' => 'form-control select2-2' . ($errors->has('chassis_code') ? ' is-invalid' : null), 'placeholder' => 'Select Chassis Code']) !!}
      @error('chassis_code')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
  </div>

  <div class="form-group row">
    {!! Form::label('chassis_type', 'Chassis Type', ['class' => 'col-12 col-sm-2 col-form-label']) !!}
    <div class="col-12 col-sm-10">
      {!! Form::text('chassis_type', null, ['class' => 'form-control' . ($errors->has('chassis_type') ? ' is-invalid' : null), 'placeholder' => 'Enter Chassis Type', 'autocomplete' => 'off']) !!}
      @error('chassis_type')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
  </div>

  @if(isset($product))
    <div class="form-group row">
      {!! Form::label('cover_img', 'Thumbnail Image', ['class' => 'col-12 col-sm-2 col-form-label']) !!}
      <div class="col-12 col-sm-10">
        {!! Form::file('cover_img', ['class' => 'form-control', 'placeholder' => 'Enter cover_img', 'autocomplete' => 'off']) !!}
        @error('cover_img')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>

      <div class="col-12 col-sm-10 offset-sm-2">
        {{ Html::image('/public/uploads/' . $product->cover_img, 'No Picture', ['width' => 50, 'height' => 50]) }}
      </div>
    </div>
  @else
    <div class="form-group row">
      {!! Form::label('cover_img', 'Thumbnail Image', ['class' => 'required col-12 col-sm-2 col-form-label']) !!}
      <div class="col-12 col-sm-10">
        {!! Form::file('cover_img', ['class' => 'form-control', 'placeholder' => 'Enter cover_img', 'autocomplete' => 'off', 'required' => 'required']) !!}
        @error('cover_img')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
    </div>
  @endif

  <div class="form-group row">
    {!! Form::label('images[]', 'Detail Image', ['class' => 'col-12 col-sm-2 col-form-label']) !!}
    <div class="col-12 col-sm-10">
      {!! Form::file('images[]', ['class' => 'form-control', 'placeholder' => 'Enter images', 'autocomplete' => 'off']) !!}
      {!! Form::file('images[]', ['class' => 'form-control', 'placeholder' => 'Enter images', 'autocomplete' => 'off']) !!}
      {!! Form::file('images[]', ['class' => 'form-control', 'placeholder' => 'Enter images', 'autocomplete' => 'off']) !!}
      {!! Form::file('images[]', ['class' => 'form-control', 'placeholder' => 'Enter images', 'autocomplete' => 'off']) !!}
      @error('images[]')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>

    @if(isset($product))
      <div class="col-12 col-sm-10 offset-sm-2">
        @foreach(json_decode($product->images) as $imgd)
          {{ Html::image('/public/uploads/' . $imgd, 'No Picture', ['width' => 50, 'height' => 50]) }}
          <span style="margin-right: 20px;"></span>
        @endforeach
      </div>
    @endif
  </div>
</div>
              
<div class="card-footer">
  @if(isset($product))
    {!! Form::button('Update', ['class' => 'btn btn-success pull-right', 'data-toggle' => 'modal', 'data-target' => '#product_update']) !!}
  @else
    {!! Form::button('Submit', ['class' => 'btn btn-primary pull-right', 'data-toggle' => 'modal', 'data-target' => '#product_create']) !!}
  @endif
  <a href="{{ url('/product') }}" class="btn btn-default float-right">Cancel</a>
</div>

<div class="modal fade" id="product_create">
  <div class="modal-dialog">
    <div class="modal-content bg-info">
      <div class="modal-header">
        <h4 class="modal-title">Confirmation Message</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>Want to create Product?</h3>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-outline-light">Add Product</button>
      </div>
    </div>
  </div>
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
        <h3>Want to Update Product?</h3>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-outline-light">Update Product</button>
      </div>
    </div>
  </div>
</div>

{!! Form::close() !!}

@section('style')
  <style type="text/css">
    .mce-notification { display: none !important }
  </style>

  <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
  <style type="text/css">
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #3c8dbc;
            border-color: #367fa9;
            padding: 1px 10px;
            color: #fff;
        }
    </style>
@endsection

@section('script')
  <script src="{{ asset('js/select2.full.min.js') }}"></script>
  <script type="text/javascript">

    @if(isset($product))
      var pCategoryId = '{{ $product->category_id }}';
      var pSubCategoryId = '{{ $product->sub_category_id }}';
      var pVehicleMakerId = '{{ $product->vehicle_maker_id }}';
      var pVehicleModelId = '{{ $product->applicable_vehicle_models }}';
      jQuery.ajaxSetup({async:false});
      getSubCategory(pCategoryId);
      $('#sub_category_id').val(pSubCategoryId);
      getVehicleModel(pVehicleMakerId);
      $('#vehicle_model_id').val(JSON.parse(pVehicleModelId));
      jQuery.ajaxSetup({async:true});
    @endif

    $(function() {
      $('#category_id').change(function() {
        var categoryId = $(this).val();
        getSubCategory(categoryId);
      });

      $('#vehicle_maker_id').change(function() {
        var vehicleMakerId = $(this).val();
        getVehicleModel(vehicleMakerId);
      });

      $('.select2').select2({
        placeholder: "Select Vehicle Model"
      });

      $('.select2-2').select2({
        placeholder: "Select Chassis Code"
      });

      $('.select3').select2();

    });

    function getSubCategory(categoryId) {
      resetField('sub_category_id', 'Select Sub Category');
      var url = '{{ url("product/get-sub-category")}}';
      $.get(url+'?category_id='+categoryId, function (response) {
        $.map( response, function( name, id ) {
          $('#sub_category_id').append('<option value="'+ id +'">' + name + '</option>');
        });
      });
    }



    function getVehicleModel(vehicleMakerId) {
      resetField('vehicle_model_id', 'Select Vehicle MODEL');
      var url = '{{ url("product/get-vehicle-model")}}';
      $.get(url+'?vehicle_maker_id='+vehicleMakerId, function (response) {
        $.map( response, function( name, id ) {
          $('#vehicle_model_id').append('<option value="'+ id +'">' + name + '</option>');
        });
      });
    }

    function resetField(id, placeholder) {
      $('#' + id).empty();
      $('#' + id).append('<option value="">'+ placeholder +'</option>');
    }
  </script>

  <!-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/4.9.11-104/tinymce.min.js"></script> -->
  <script src="{{ asset('js/tinymce.min.js') }}"></script>
  <script>
      tinymce.init({
          selector:'.myeditablediv',
          height: 100,
      });
  </script>

@endsection