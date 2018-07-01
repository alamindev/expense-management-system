@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="col-md-6 text_panel_head padnone">
                                Searching: <span class="fromdate">{{$from}}</span> <span class="tospan">to</span> <span class="todate">{{$to}}
                            </div>
                            <div class="col-md-6 text-right padnone">
                                <a href="{{url('/admin/summary')}}" class="btn btn-info btn-fill btn-sm btnu"><i class="fa fa-th"></i> Summary</a>
                                <a href="{{url('/admin/summary/archive')}}" class="btn btn-info btn-fill btn-sm btnu"><i class="fa fa-th"></i> Archive</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                            <div class="content table-responsive table-full-width">
                                <table id="inexsummary" class="table table-striped table-bordered table_customize table_summary">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Category</th>
                                            <th class="details">Details</th>
                                            <th>Credit</th>
                                            <th>Debit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($income as $data)
                                        <tr>
                                            <td>{{$data->income_date}}</td>
                                            <td>{{$data->giveme->incate_name}}</td>
                                            <td class="details">{{$data->income_details}}</td>
                                            <td>{{$data->income_amount}}</td>
                                            <td>---</td>
                                        </tr>
                                        @endforeach
                                        @foreach($expense as $data)
                                        <tr>
                                            <td>{{$data->expense_date}}</td>
                                            <td>{{$data->giveme->expcate_name}}</td>
                                            <td class="details">{{$data->expense_details}}</td>
                                            <td>---</td>
                                            <td>{{$data->expense_amount}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th class="details" style="text-align: right;">Total</th>
                                            <th>{{$incomeTotal}}</th>
                                            <th>{{$expenseTotal}}</th>
                                        </tr>                                        
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <a href="#" class="btn btn-sm btn-fill btnu btn-primary">Excel</a>
                            <a href="#" class="btn btn-sm btn-fill btnu btn-warning">PDF</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
