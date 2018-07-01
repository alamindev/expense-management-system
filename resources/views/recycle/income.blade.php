@extends('layouts.admin-layout')
@section('recycle-loan')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title box_title_info">Income Recycle List</h3>
                <a href="{{url('/admin/recycle/income')}}" class="top_button"><i class="fa fa-plus-square"></i> Recycle Expense</a>
            </div>
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Income Category</th>
                            <th>Income Details</th>
                            <th>Amount</th>
                            <th>Time</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tbody>  
                        @foreach($all as $data)
                        <tr>
                            <td>{{$data->incate_name}}</td>
                            <td>{{$data->income_details}}</td>
                            <td>{{$data->income_amount}}</td>  
                            <td>{{$data->income_date}}</td> 
                            <td>
                                <a href="{{url('/admin/income/edit')}}/{{$data->income_id}}"><i class="fa fa-edit man_edit"></i></a>
                                <a href=""><i class="fa fa-trash man_delete"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>                  
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
