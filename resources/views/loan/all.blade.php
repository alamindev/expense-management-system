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
                                All Transaction Information
                            </div>
                            <div class="col-md-6 text-right padnone">
                                <a href="{{url('/admin/manage')}}" class="btn btn-info btn-fill btn-sm btnu"><i class="fa fa-th"></i> Manage</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                            <div class="content table-responsive table-full-width">
                                <table id="allTableDesc" class="table table-striped table-bordered table_customize">
                                    <thead>
                                        <tr>
                                            <th>Transaction Date</th>
                                            <th>Loaner</th>
                                            <th>Category</th>
                                            <th>Credit</th>
                                            <th>Debit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($loanrec as $rec)
                                        <tr>
                                            <td>{{$rec->loan_rec_date}}</td>
                                            <td>{{$rec->loanReceiverName->loaner_name}}</td>
                                            <td>Recived</td>
                                            <td>{{$rec->loan_rec_amount}}</td>
                                            <td>---</td>
                                        </tr>
                                        @endforeach
                                        @foreach($loanpaid as $paid)
                                        <tr>
                                            <td>{{$paid->loan_paid_date}}</td>
                                            <td>{{$paid->loanPaidName->loaner_name}}</td>
                                            <td>Paid</td>
                                            <td>---</td>
                                            <td>{{$paid->loan_paid_amount}}</td>
                                        </tr>
                                        @endforeach
                                        @foreach($loangiven as $given)
                                        <tr>
                                            <td>{{$given->loan_given_date}}</td>
                                            <td>{{$given->loanGivenName->loaner_name}}</td>
                                            <td>Given</td>
                                            <td>---</td>
                                            <td>{{$given->loan_given_amount}}</td>
                                        </tr>
                                        @endforeach
                                        @foreach($loanpayment as $payment)
                                        <tr>
                                            <td>{{$payment->loan_payment_date}}</td>
                                            <td>{{$payment->loanPaymentName->loaner_name}}</td>
                                            <td>Payment</td>
                                            <td>{{$payment->loan_payment_amount}}</td>
                                            <td>---</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th class="text-right">Total</th>
                                            <th>{{$totalCredit}}</th>
                                            <th>{{$totalDebit}}</th>
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
<!-- Modal -->
<div class="modal fade" id="mySoftDelete" tabindex="-1" role="dialog" aria-labelledby="mySoftDeleteLabel">
  <div class="modal-dialog" role="document">
    <form method="post" action="{{url('/admin/income/softdelete')}}">
        {{csrf_field()}}
      <div class="modal-content primary">
        <div class="modal-header">
          <h4 class="modal-title modal_popup" id="myModalLabel">Confirm Message</h4>
        </div>
        <div class="modal-body">
          Are you sure you want to delete?
          <input type="hidden" id="modal_id" name="modal_id">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btnm btn-fill btn-sm">Confirm</button>
          <button type="button" class="btn btn-default btnm btn-fill btn-sm" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
