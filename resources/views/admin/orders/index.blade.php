@extends('admin.layout')
@section('title','Orders')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @component('admin.components.content-header',['breadcrumb'=>['Dashboard'=>'admin/dashboard']])
        @slot('title') All Orders @endslot
        @slot('add_btn')  @endslot
        @slot('active') All Orders @endslot
    @endcomponent
    <!-- /.content-header -->

    <!-- show data table -->
    @component('admin.components.data-table',['thead'=>
        ['ORDER No.','Product Details','Total Amount','Customer Details','Order Date','Action']
    ])
        @slot('table_id') order_list @endslot
    @endcomponent

</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Order Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post"  action="{{ route('order.changeStatus') }}">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <label for="status">Select Order Status</label>
                    <select class="form-control" name="order_status" id="order_status">
                        <option value="pending">Pending</option>
                        <option value="confirm">Confirm</option>
                        <option value="dispatch">Dispatch</option>
                        <option value="complete">Complete</option>
                        <option value="cancel">Cancel</option>
                    </select>
                </div>
                <input type="hidden" name="custom_order_id" id="custom_order_id">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Change Status">
      </div>
      </form>
    </div>
  </div>
</div>
@stop

@section('pageJsScripts')
<!-- DataTables -->
<script src="{{asset('public/assets/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/assets/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('public/assets/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('public/assets/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('public/assets/js/action.js')}}"></script>
<script type="text/javascript">
    var table = $("#order_list").DataTable({
        processing: true,
        serverSide: true,
        ajax: "orders",
        order: [0], //Initial no order.
        columns: [
            {data: 'order_id', name: 'order_id'},
            {data: 'p_id', name: 'product_id'},
            {data: 'amount', name: 'total_amount'},
            {data: 'user_details', name: 'user_details'},
            {data: 'created_at', name: 'order_date'},
            {
                data: 'action',
                name: 'action',
                orderable: true,
                searchable: true
            }
        ]
    });
</script>
@stop