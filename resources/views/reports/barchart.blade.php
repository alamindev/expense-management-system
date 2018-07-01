@extends('layouts.admin-layout')
@section('barchart-report')
<div class="row">   
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Report</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                {!! $donut->render() !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Report</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                {!! $areaspline->render() !!}
            </div>
        </div>
    </div>
</div>
@endsection
