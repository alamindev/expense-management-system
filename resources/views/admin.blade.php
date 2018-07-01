@extends('layouts.admin-layout')
@section('infobar')
<div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">User</span>
                <span class="info-box-number">01<small></small></span>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-cubes"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Total Income</span>
                <span class="info-box-number">{{$totalIncome}}</span>
            </div>
        </div>
    </div>
    <div class="clearfix visible-sm-block"></div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-cube"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Total Expense</span>
                <span class="info-box-number">{{$totalExpense}}</span>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="fa fa-database"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Saving</span>
                <span class="info-box-number">{{$totalIncome-$totalExpense}}</span>
            </div>
        </div>
    </div>
</div>

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
                {!! $chart->render() !!}
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <i class="ion ion-clipboard"></i>
                <h3 class="box-title">Last 7 Days Income</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add Income</button>
                </div>
            </div>
            <div class="box-body">
              <table id="lastincome" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Income Details</th>
                            <th>Time</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>  
                        @foreach($income7days as $data)
                        <tr>
                            <td>{{$data->income_details}}</td>
                            <td>{{$data->income_date}}</td>
                            <td>{{$data->income_amount}}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <th></th>
                            <th>Total</th>
                            <th>{{$allIncome}}</th>
                        </tr>
                    </tbody>                  
                </table>  
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <i class="ion ion-clipboard"></i>
                <h3 class="box-title">Last 7 Days Expense</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add Expense</button>
                </div>
            </div>
            <div class="box-body">
              <table id="lastexpense" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Income Details</th>
                            <th>Time</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>  
                        @foreach($expense7days as $data)
                        <tr>
                            <td>{{$data->expense_details}}</td>
                            <td>{{$data->expense_date}}</td>
                            <td>{{$data->expense_amount}}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <th></th>
                            <th>Total</th>
                            <th>{{$allExpense}}</th>
                        </tr>
                    </tbody>                   
                </table>  
            </div>
        </div>
    </div>
</div>
@endsection
