@extends('admin.layout')
@section('title','Edit Discount')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
@component('admin.components.content-header',['breadcrumb'=>['Dashboard'=>'admin/dashboard','All Discount'=>'admin/discount']])
    @slot('title') Edit Discount @endslot
    @slot('add_btn')  @endslot
    @slot('active') Edit Discount @endslot
@endcomponent
<!-- Main content -->
<section class="content card">
    <div class="container-fluid card-body">
        <!-- form start -->
        <form class="form-horizontal" id="update_discount"  method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}
            @if($discount)
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                   <input type="hidden" class="url" value="{{url('admin/discount/'.$discount->id)}}" >
                   <input type="hidden" name="discount_id" id="discount_id" value="{{ $discount->id }}">
                   <input type="hidden" class="rdt-url" value="{{url('admin/discount')}}" >
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Discount Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <span>Name</span>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $discount->name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <span>Code</span>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="code" placeholder="Discount Code" id="code" value="{{ $discount->code }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <span>Type</span>
                                    </div>
                                    <div class="col-md-10">
                                        <select class="form-control" name="discount_type"  style="width: 100%;" id="discount_type">
                                            <option value="" >Select Type</option>
                                            <option value="x_at_percentage_off" {{ ($discount->discount_type == "x_at_percentage_off" ? "selected":"") }}>X Percentage Off</option>
                                            <option value="amount_off" {{ ($discount->discount_type == "amount_off" ? "selected":"") }}>Amount Off</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <span class="discount">Discount</span>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="number" class="form-control" name="discount" placeholder="Discount" id="discount" value="{{ $discount->discount }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <span>Start Date</span>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="date" class="form-control" name="discount_start_date" placeholder="Start Date" value="{{ date('Y-m-d',strtotime($discount->discount_start_date)) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <span>End Date</span>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="date" class="form-control" name="discount_end_date" placeholder="End Date" value="{{ date('Y-m-d',strtotime($discount->discount_end_date)) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <span>Status</span>
                                    </div>
                                    <div class="col-md-10">
                                        <select class="form-control" name="status"  style="width: 100%;">
                                            <option value="1" {{ ($discount->status == "1" ? "selected":"") }}>Active</option>
                                            <option value="2" {{ ($discount->status == "2" ? "selected":"") }}>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            @endif
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form> <!-- /.form start -->
    </div><!-- /.container-fluid -->
</section><!-- /.content -->
</div>

@stop