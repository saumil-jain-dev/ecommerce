@extends('admin.layout')
@section('title','Add New Discount')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
@component('admin.components.content-header',['breadcrumb'=>['Dashboard'=>'admin/dashboard','All Discount'=>'admin/discount']])
    @slot('title') Add Discount @endslot
    @slot('add_btn')  @endslot
    @slot('active') Add Discount @endslot
@endcomponent
<!-- Main content -->
<section class="content card">
    <div class="container-fluid card-body">
        <!-- form start -->
        <form class="form-horizontal" id="add_discount"  method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                   <input type="hidden" class="url" value="{{url('admin/discount')}}" >
                    <!-- jquery validation -->
                    <div class="card">
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
                                        <input type="text" class="form-control" name="name" placeholder="Name">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <span>Code</span>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="code" placeholder="Discount Code" id="code">
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
                                            <option value="x_at_percentage_off">X Percentage Off</option>
                                            <option value="amount_off">Amount Off</option>
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
                                        <input type="number" class="form-control" name="discount" placeholder="Discount" id="discount">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <span>Start Date</span>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="date" class="form-control" name="discount_start_date" placeholder="Start Date">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <span>End Date</span>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="date" class="form-control" name="discount_end_date" placeholder="End Date">
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
                                            <option value="1" selected>Active</option>
                                            <option value="2">Inactive</option>
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
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                <input type="submit" class="btn btn-primary" value="Submit">
                </div>
            </div>
        </form> <!-- /.form start -->
    </div><!-- /.container-fluid -->
</section><!-- /.content -->
</div>
@stop