@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="col-md-6 text_panel_head padnone ">
                                Loaner Information
                            </div>
                            <div class="col-md-6 text-right padnone">
                                <a href="{{url('/admin/loaner')}}" class="btn btn-info btn-fill btn-sm btnu"><i class="fa fa-th"></i> All Loaner</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-1"></div>
                            <div class="col-md-2 details_pic_part">
                                <img class="img-responsive img-thumbnail" src="{{asset('/contents')}}/img/avatar.png" alt=""/>
                            </div>
                            <div class="col-md-7 details_part">
                                <table class="table table-striped table-bordered view_table details_table">
                                    <tr>
                                        <th colspan="3"><i class="fa fa-user-circle"></i> Personal Information</th>
                                    </tr>
                                    <tr>
                                        <td>Name</td>
                                        <td>:</td>
                                        <td>
                                            {{$data->loaner_name}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Phone</td>
                                        <td>:</td>
                                        <td>
                                            {{$data->loaner_phone}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>:</td>
                                        <td>
                                            {{$data->loaner_email}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Registration Time</td>
                                        <td>:</td>
                                        <td>
                                            {{$data->created_at}}
                                        </td>
                                    </tr>
                                </table>
                                <table class="table table-striped table-bordered view_table details_table">
                                    <tr>
                                        <th colspan="3"><i class="fa fa-gg-circle"></i> Payment Information</th>
                                    </tr>
                                    <tr>
                                        <td>Total Payment Amount</td>
                                        <td>:</td>
                                        <td>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Total Received Amount</td>
                                        <td>:</td>
                                        <td>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Total Payable/ Total Due</td>
                                        <td>:</td>
                                        <td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Last Payment Date</td>
                                        <td>:</td>
                                        <td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Last Received Date</td>
                                        <td>:</td>
                                        <td>
                                        </td>
                                    </tr>
                                </table>
                                <table id="" class="table table-striped table-bordered details_table">
                                    <tr>
                                        <th colspan="7"><i class="fa fa-gg-circle"></i> Payment Status</th>
                                    </tr>
                                </table>
                                <table id="loanerstatus" class="table table-striped table-responsive table-bordered details_table details_status">
                                  <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th class="xs-hidden">Next Transaction Date</th>
                                        <th>Category</th>
                                        <th>Credit</th>
                                        <th>Debit</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($loanrec as $rec)
                                    <tr>
                                        <td>{{$rec->loan_rec_date}}</td>
                                        <td class="xs-hidden">{{$rec->loan_replay_date}}</td>
                                        <td>Received</td>
                                        <td>{{$rec->loan_rec_amount}}</td>
                                        <td>---</td>
                                    </tr>
                                    @endforeach
                                    @foreach($loanpaid as $paid)
                                    <tr>
                                        <td>{{$paid->loan_paid_date}}</td>
                                        <td class="xs-hidden">{{$paid->loan_paid_replay_date}}</td>
                                        <td>Paid</td>
                                        <td>---</td>
                                        <td>{{$paid->loan_paid_amount}}</td>
                                    </tr>
                                    @endforeach
                                    @foreach($loangiven as $given)
                                    <tr>
                                        <td>{{$given->loan_given_date}}</td>
                                        <td class="xs-hidden">{{$given->loan_given_replay_date}}</td>
                                        <td>Given</td>
                                        <td>---</td>
                                        <td>{{$given->loan_given_amount}}</td>
                                    </tr>
                                    @endforeach
                                    @foreach($loanpayment as $payment)
                                    <tr>
                                        <td>{{$payment->loan_payment_date}}</td>
                                        <td class="xs-hidden">{{$payment->loan_payment_replay_date}}</td>
                                        <td>Payment</td>
                                        <td>{{$payment->loan_payment_amount}}</td>
                                        <td>---</td>
                                    </tr>
                                    @endforeach
                                  </tbody>
                                  <tfoot>
                                    <tr></tr>
                                  </tfoot>
                                </table>
                                <a href="#" class="btn btn-sm btn-fill btnu btn-primary" data-toggle="modal" data-target=".loan_received_part">Loan Received</a>
                                <a href="#" class="btn btn-sm btn-fill btnu btn-info" data-toggle="modal" data-target=".loan_paid_part">Loan Paid</a>
                                <a href="#" class="btn btn-sm btn-fill btnu btn-success" data-toggle="modal" data-target=".loan_given_part">Loan Given</a>
                                <a href="#" class="btn btn-sm btn-fill btnu btn-default" data-toggle="modal" data-target=".loan_payment_part">Loan Payment</a>
                            </div>
                            <div class="col-md-2"></div>
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
<!--Loan Received modal code start-->
<div class="modal fade loan_received_part" tabindex="-1" role="dialog" aria-labelledby="loanRecModalLabel" id="loan_received_part">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title modal_popup" id="loanRecModalLabel">Loan Received</h4>
      </div>
      <form class="form-horizontal" method="post" action="{{url('/admin/loan/received/insert')}}">
        {{csrf_field()}}
      <div class="modal-body">
            <div class="popup_box_input">
            <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                <label for="" class="col-sm-3 control-label">Received Amount <span class="req_star">*</span></label>
                <div class="col-sm-8">
                    <input type="hidden" name="loaner" class="form-control pop_input_field" id="" value="{{$data->loaner_id}}">
                    <input type="text" name="amount" class="form-control pop_input_field" id="" value="{{old('amount')}}">
                    <span class="help-block">
                        <strong>{{ $errors->first('amount') }}</strong>
                    </span>
                </div>
            </div>
            <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                <label for="" class="col-sm-3 control-label">Received Date<span class="req_star">*</span></label>
                <div class="col-sm-8">
                    <input type="text" name="date" class="form-control pop_input_field datepicker_date" id="" value="{{old('date')}}">
                    <span class="help-block">
                        <strong>{{ $errors->first('date') }}</strong>
                    </span>
                </div>
            </div>
            <div class="form-group{{ $errors->has('rep_date') ? ' has-error' : '' }}">
                <label for="" class="col-sm-3 control-label">Loan Paid Date<span class="req_star">*</span></label>
                <div class="col-sm-8">
                    <input type="text" name="rep_date" class="form-control pop_input_field datepicker_redate" id="" value="{{old('rep_date')}}">
                    <span class="help-block">
                        <strong>{{ $errors->first('rep_date') }}</strong>
                    </span>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-3 control-label">Remarks</label>
                <div class="col-sm-8">
                    <input type="text" name="remarks" class="form-control pop_input_field" id="" value="{{old('remarks')}}">
                </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-sm btn-primary btn-fill btnu">Save</button>
        <button type="button" class="btn btn-sm btn-default btn-fill btnu" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--Loan Paid modal code start-->
<div class="modal fade loan_paid_part" tabindex="-1" role="dialog" aria-labelledby="loanPaidModalLabel" id="loan_paid_part">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title modal_popup" id="loanPaidModalLabel">Loan Paid</h4>
      </div>
      <form class="form-horizontal" method="post" action="{{url('/admin/loan/paid/insert')}}">
        {{csrf_field()}}
      <div class="modal-body">
            <div class="popup_box_input">
            <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                <label for="" class="col-sm-3 control-label">Paid Amount <span class="req_star">*</span></label>
                <div class="col-sm-8">
                    <input type="hidden" name="loaner" class="form-control pop_input_field" id="" value="{{$data->loaner_id}}">
                    <input type="text" name="amount" class="form-control pop_input_field" id="" value="{{old('amount')}}">
                    <span class="help-block">
                        <strong>{{ $errors->first('amount') }}</strong>
                    </span>
                </div>
            </div>
            <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                <label for="" class="col-sm-3 control-label">Paid Date<span class="req_star">*</span></label>
                <div class="col-sm-8">
                    <input type="text" name="date" class="form-control pop_input_field datepicker_date" id="" value="{{old('date')}}">
                    <span class="help-block">
                        <strong>{{ $errors->first('date') }}</strong>
                    </span>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-3 control-label">Next Paid Date</label>
                <div class="col-sm-8">
                    <input type="text" name="rep_date" class="form-control pop_input_field datepicker_redate" id="" value="{{old('rep_date')}}">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-3 control-label">Remarks</label>
                <div class="col-sm-8">
                    <input type="text" name="remarks" class="form-control pop_input_field" id="" value="{{old('remarks')}}">
                </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-sm btn-primary btn-fill btnu">Save</button>
        <button type="button" class="btn btn-sm btn-default btn-fill btnu" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--Loan Given modal code start-->
<div class="modal fade loan_given_part" tabindex="-1" role="dialog" aria-labelledby="loanGivenModalLabel" id="loan_given_part">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title modal_popup" id="loanGivenModalLabel">Loan Given Information</h4>
      </div>
      <form class="form-horizontal" method="post" action="{{url('/admin/loan/given/insert')}}">
        {{csrf_field()}}
      <div class="modal-body">
            <div class="popup_box_input">
            <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                <label for="" class="col-sm-3 control-label">Given Amount <span class="req_star">*</span></label>
                <div class="col-sm-8">
                    <input type="hidden" name="loaner" class="form-control pop_input_field" id="" value="{{$data->loaner_id}}">
                    <input type="text" name="amount" class="form-control pop_input_field" id="" value="{{old('amount')}}">
                    <span class="help-block">
                        <strong>{{ $errors->first('amount') }}</strong>
                    </span>
                </div>
            </div>
            <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                <label for="" class="col-sm-3 control-label">Given Date <span class="req_star">*</span></label>
                <div class="col-sm-8">
                    <input type="text" name="date" class="form-control pop_input_field datepicker_date" id="" value="{{old('date')}}">
                    <span class="help-block">
                        <strong>{{ $errors->first('date') }}</strong>
                    </span>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-3 control-label">Payment Date <span class="req_star">*</span></label>
                <div class="col-sm-8">
                    <input type="text" name="rep_date" class="form-control pop_input_field datepicker_redate" id="" value="{{old('rep_date')}}">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-3 control-label">Remarks</label>
                <div class="col-sm-8">
                    <input type="text" name="remarks" class="form-control pop_input_field" id="" value="{{old('remarks')}}">
                </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-sm btn-primary btn-fill btnu">Save</button>
        <button type="button" class="btn btn-sm btn-default btn-fill btnu" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--Loan Payment modal code start-->
<div class="modal fade loan_payment_part" tabindex="-1" role="dialog" aria-labelledby="loanPaymentModalLabel" id="loan_payment_part">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title modal_popup" id="loanPaymentModalLabel">Loan Payment Information</h4>
      </div>
      <form class="form-horizontal" method="post" action="{{url('/admin/loan/payment/insert')}}">
        {{csrf_field()}}
      <div class="modal-body">
            <div class="popup_box_input">
            <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                <label for="" class="col-sm-3 control-label">Payment Amount <span class="req_star">*</span></label>
                <div class="col-sm-8">
                    <input type="hidden" name="loaner" class="form-control pop_input_field" id="" value="{{$data->loaner_id}}">
                    <input type="text" name="amount" class="form-control pop_input_field" id="" value="{{old('amount')}}">
                    <span class="help-block">
                        <strong>{{ $errors->first('amount') }}</strong>
                    </span>
                </div>
            </div>
            <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                <label for="" class="col-sm-3 control-label">Payment Date <span class="req_star">*</span></label>
                <div class="col-sm-8">
                    <input type="text" name="date" class="form-control pop_input_field datepicker_date" id="" value="{{old('date')}}">
                    <span class="help-block">
                        <strong>{{ $errors->first('date') }}</strong>
                    </span>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-3 control-label">Next Payment Date </label>
                <div class="col-sm-8">
                    <input type="text" name="rep_date" class="form-control pop_input_field datepicker_redate" id="" value="{{old('rep_date')}}">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-3 control-label">Remarks</label>
                <div class="col-sm-8">
                    <input type="text" name="remarks" class="form-control pop_input_field" id="" value="{{old('remarks')}}">
                </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-sm btn-primary btn-fill btnu">Save</button>
        <button type="button" class="btn btn-sm btn-default btn-fill btnu" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection
