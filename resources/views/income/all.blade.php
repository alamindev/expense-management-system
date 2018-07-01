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
                                All Income Information
                            </div>
                            <div class="col-md-6 text-right padnone">
                                <a href="{{url('/admin/income/add')}}" class="btn btn-info btn-fill btn-sm btnu"><i class="fa fa-plus-circle"></i> Add Income</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped table-bordered table_customize">
                                    <thead>
                                        <tr>
                                            <th>Income Details</th>
                                            <th>Income Category</th>
                                            <th>Income Date</th>
                                            <th>Amount</th>
                                            <th>Manage</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($all as $data)
                                        <tr>
                                            <td>{{$data->income_details}}</td>
                                            <td>{{$data->incate_name}}</td>
                                            <td>{{$data->income_date}}</td>
                                            <td>{{$data->income_amount}}</td>
                                            <td>
                                                <a href="{{url('admin/income/view/'.$data->income_id)}}"><i class="fa fa-plus-square fa-lg man_view"></i></a>
                                                <a href="{{url('admin/income/edit/'.$data->income_id)}}"><i class="fa fa-edit fa-lg man_edit"></i></a>
                                                <a id="softDelete" data-toggle="modal" data-target="#mySoftDelete" data-id="{{$data->income_id}}" href="#"><i class="fa fa-trash fa-lg man_delete"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
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
