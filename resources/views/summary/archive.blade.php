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
                                Monthly Summary Archive Report
                            </div>
                            <div class="col-md-6 text-right padnone">
                                <a href="{{url('/admin/summary')}}" class="btn btn-info btn-fill btn-sm btnu"><i class="fa fa-th"></i> Summary</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                            <div class="content table-responsive table-full-width">
                                <table id="" class="table table-striped table-bordered table_customize">
                                    <thead>
                                        <tr>
                                            <th>Report Date</th>
                                            <th>Month</th>
                                            <th class="details">Income</th>
                                            <th>Expense</th>
                                            <th>Savings</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td class="details"></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
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
