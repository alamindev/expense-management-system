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
                                Monthly Summary
                            </div>
                            <div class="col-md-6 text-right padnone">
                                <a href="{{url('/admin/income/add')}}" class="btn btn-info btn-fill btn-sm btnu"><i class="fa fa-plus-circle"></i> Income</a>
                                <a href="{{url('/admin/expense/add')}}" class="btn btn-info btn-fill btn-sm btnu"><i class="fa fa-plus-circle"></i> Expense</a>
                                <a href="{{url('/admin/summary/archive')}}" class="btn btn-info btn-fill btn-sm btnu"><i class="fa fa-th"></i> Archive</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-9">
                                <form action="" method="post">
                                    {{csrf_field()}}
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="input-group input_box">
                                                    <div class="input-group-addon">
                                                          <i class="fa fa-calendar"></i> From
                                                      </div>
                                                    <input type="text" name="from" class="form-control" id="datepickerForm">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="input-group input_box">
                                                    <div class="input-group-addon">
                                                          <i class="fa fa-calendar"></i> To
                                                      </div>
                                                    <input type="text" name="to" class="form-control" id="datepickerTo">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="input-group">
                                                <input type="button" class="btn btn-primary btn-md btn-fill btnu" id="search" value="SEARCH">
                                            </div>
                                        </div>
                                      </div>
                                </form>
                            </div>
                            <div class="col-md-3 month_infotext">
                                <p>Month : <span>{{$fullMonth}}</span></p>
                            </div>
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
                                        @foreach($incomes as $data)
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
                                        <tr>
                                            <th class="text-center" colspan="5">
                                                Total Saving:
                                                @if($incomeTotal > $expenseTotal)
                                                <span style="color: green;">{{$incomeTotal-$expenseTotal}}</span>
                                                @else
                                                <span style="color: red;">{{$incomeTotal-$expenseTotal}}</span>
                                                @endif
                                            </th>
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
