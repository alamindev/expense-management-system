@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form class="form-horizontal" method="post" action="{{url('/admin/loaner/insert')}}">
                        {{csrf_field()}}
                        <div class="panel panel-default">
                            <div class="panel-heading panel_heading_customize">
                                <div class="col-md-6 text_panel_head padnone padleft">
                                    Loaner Information Registration
                                </div>
                                <div class="col-md-6 text-right padnone padright">
                                    <a href="{{url('/admin/loaner')}}" class="btn btn-info btn-fill btn-sm btnu"><i class="fa fa-th"></i> All Loaner</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-body">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    @if(Session::has('success'))
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <strong>Success!</strong> Loaner information registration complete. 
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
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="" class="col-sm-3 control-label">Loaner Name <span class="req_star">*</span></label>
                                        <div class="col-sm-8">
                                            <input type="text" name="name" class="form-control input_field" id="" value="{{old('name')}}">
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                        <label for="" class="col-sm-3 control-label">Phone <span class="req_star">*</span></label>
                                        <div class="col-sm-8">
                                            <input type="text" name="phone" class="form-control input_field" id="" value="{{old('phone')}}">
                                            <span class="help-block">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                        </div>
                                    </div> 
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="" class="col-sm-3 control-label">Email </label>
                                        <div class="col-sm-8">
                                            <input type="email" name="email" class="form-control input_field" id="" value="{{old('email')}}">
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('remarks') ? ' has-error' : '' }}">
                                        <label for="" class="col-sm-3 control-label">Remarks </label>
                                        <div class="col-sm-8">
                                            <input type="text" name="remarks" class="form-control input_field" id="" value="{{old('remarks')}}">
                                            <span class="help-block">
                                                <strong>{{ $errors->first('remarks') }}</strong>
                                            </span>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="panel-footer text-center">
                                <button type="submit" class="btn btn-fill  btn-success btnu">Registration</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection