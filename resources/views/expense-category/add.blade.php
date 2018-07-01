@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card bootstrap-iso">
                    <form class="form-horizontal" method="post" action="{{url('/admin/expense/category/insert')}}">
                        {{csrf_field()}}
                        <div class="panel panel-default">
                            <div class="panel-heading panel_heading_customize">
                                <div class="col-md-6 text_panel_head padnone padleft">
                                    Add Expense Category
                                </div>
                                <div class="col-md-6 text-right padnone padright">
                                    <a href="{{url('/admin/expense/category')}}" class="btn btn-info btn-fill btn-sm btnu"><i class="fa fa-th"></i> All Category</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-body">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">                                    
                                    @if(Session::has('error'))
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <strong>Error!</strong> An error occurred;
                                    </div>
                                    @endif
                                </div>
                                <div class="add_admin_info">
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="" class="col-sm-3 control-label">Expense Category Name <span class="req_star">*</span></label>
                                        <div class="col-sm-8">
                                            <input type="text" name="name" class="form-control input_field" id="" value="{{old('name')}}">
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Remarks</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="remarks" class="form-control input_field" id="" value="{{old('remarks')}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer text-center">
                                <button type="submit" class="btn btn-fill  btn-success btnu">SAVE</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
