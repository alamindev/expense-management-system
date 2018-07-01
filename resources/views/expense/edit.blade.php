@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card bootstrap-iso">
                    <form class="form-horizontal" method="post" action="{{url('/admin/expense/update')}}">
                        {{csrf_field()}}
                        <div class="panel panel-default">
                            <div class="panel-heading panel_heading_customize">
                                <div class="col-md-6 text_panel_head padnone padleft">
                                    Update Expense Information
                                </div>
                                <div class="col-md-6 text-right padnone padright">
                                    <a href="{{url('/admin/expense')}}" class="btn btn-info btn-fill btn-sm btnu"><i class="fa fa-th"></i> All Expense</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-body">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    @if(Session::has('success'))
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <strong>Success!</strong> Successfully update your expense. 
                                    </div>
                                    @endif
                                    @if(Session::has('error'))
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <strong>Error!</strong> An error occurred;
                                    </div>
                                    @endif
                                </div>
                                <div class="add_admin_info">
                                    <div class="form-group{{ $errors->has('details') ? ' has-error' : '' }}">
                                        <label for="" class="col-sm-3 control-label">Income Details <span class="req_star">*</span></label>
                                        <div class="col-sm-8">
                                            <input type="hidden" name="id" class="form-control input_field" id="" value="{{$expense->expense_id}}">
                                            <input type="text" name="details" class="form-control input_field" id="" value="{{$expense->expense_details}}">
                                            <span class="help-block">
                                                <strong>{{ $errors->first('details') }}</strong>
                                            </span>
                                        </div>
                                    </div>                                     
                                    <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                                        <label for="" class="col-sm-3 control-label">Amount <span class="req_star">*</span></label>
                                        <div class="col-sm-8">
                                            <input type="number" name="amount" class="form-control input_field" id="" value="{{$expense->expense_amount}}">
                                            <span class="help-block">
                                                <strong>{{ $errors->first('amount') }}</strong>
                                            </span>
                                        </div>
                                    </div>                                    
                                    <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                                        <label for="" class="col-sm-3 control-label">Income Date <span class="req_star">*</span></label>
                                        <div class="col-sm-4">
                                            <input type="text" name="date" class="form-control input_field" id="income_date" value="{{$expense->expense_date}}">
                                            <span class="help-block">
                                                <strong>{{ $errors->first('date') }}</strong>
                                            </span>
                                        </div>
                                    </div>                                   
                                    <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                                        <label class="col-sm-3 control-label">Income Category <span class="req_star">*</span></label>
                                        <div class="col-sm-4">
                                            <select class="form-control selbox" name="category">
                                                <option value="">Select Category</option>
                                                @foreach($expcatelist as $cate)
                                                <option value="{{$cate->expcate_id}}" @if($cate->expcate_id==$expense->expcate_id) selected="selected" @endif >{{$cate->expcate_name}}</option>
                                                @endforeach
                                            </select>
                                            <span class="help-block">
                                                <strong>{{ $errors->first('category') }}</strong>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer text-center">
                                <button type="submit" class="btn btn-fill  btn-success btnu">UPDATE</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection