@extends('layouts.app')

@section('content')
<div class="container">
    <section class="content">
        <div class="row">
        	<div class="col-md-8 col-sm-offset-2">
            	<div class="box box-success">
                	<div class="box-header with-border" style="margin-top: 50px;">
                    	<h3 class="box-title">Brand wise Report Form</h3> 
                	</div>
                	<div class="box-body">

                		<div class="col-sm-12">
    						
    						<div class="card">
    							<div class="card-header">
    								<h3 class="text-center"><i class="fa fa-chart-bar"></i> <code><b>Brand wise</b></code> Report Form</h3>
    							</div>
    							<div class="card-body">
    						  		
    								
                                    {!! Form::open(['url' => 'report/brand-show', 'method' => 'get', 'class' => 'form-horizontal']) !!}

                                    <div class="form-group {{ $errors->has('start_date') ? 'has-error' : ''}}">
                                        {!! Form::label('start_date', 'Start Date', ['class' => 'required col-3 col-sm-3 control-label']) !!}
                                        <div class="col-xs-9 col-sm-9">
                                            {!! Form::text('start_date', null, ['class' => 'form-control', 'placeholder' => 'Select Start Date', 'autocomplete' => 'off', 'id' => 'start_date', 'readonly' => 'readonly', 'required' => 'required']) !!}
                                            <span class="text-danger">
                                                {{ $errors->first('start_date') }}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->has('end_date') ? 'has-error' : ''}}">
                                        {!! Form::label('end_date', 'End Date', ['class' => 'required col-3 col-sm-3 control-label']) !!}
                                        <div class="col-xs-9 col-sm-9">
                                            {!! Form::text('end_date', null, ['class' => 'form-control', 'placeholder' => 'Select Start Date', 'autocomplete' => 'off', 'id' => 'end_date', 'readonly' => 'readonly', 'required' => 'required']) !!}
                                            <span class="text-danger">
                                                {{ $errors->first('end_date') }}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->has('brand_id') ? 'has-error' : ''}}">
                                        {!! Form::label('brand_id', 'Brand', ['class' => 'col-3 col-sm-3 control-label required']) !!}
                                        <div class="col-xs-9 col-sm-9">
                                           {!! Form::select('brand_id', $brandList, null, ['class' => 'form-control select2', 'placeholder' => 'Select Brand', 'required' => 'required']) !!}
                                            <span class="text-danger">
                                                {{ $errors->first('brand_id') }}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="box-footer">
                                        
                                        
                                        {!! Form::submit('Submit', ['class' => 'btn btn-success pull-right']) !!}
                              
                                    </div>
                                    {!! Form::close() !!}

    							</div>
    						</div>
    					</div>

                	</div>
          		</div>
        	</div>
      	</div>
    </section>
</div>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.min.css') }}">
@endsection

@section('script')
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>

    <script type="text/javascript">
        $('#start_date').datepicker({
            format:'yyyy-mm-dd',
            "autoclose": true
        }).datepicker("setDate",'now');

        $('#end_date').datepicker({
            format:'yyyy-mm-dd',
            "autoclose": true
        }).datepicker("setDate",'now');
    </script>
@endsection