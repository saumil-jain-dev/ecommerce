@extends('admin.layout')
@section('title','Add New Blog')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
@component('admin.components.content-header',['breadcrumb'=>['Dashboard'=>'admin/dashboard','Banner Slider'=>'admin/banner']])
    @slot('title') Add Blog @endslot
    @slot('add_btn')  @endslot
    @slot('active') Add Blog @endslot
@endcomponent
<!-- Main content -->
<section class="content card">
    <div class="container-fluid card-body">
        <!-- form start -->
        <form class="form-horizontal" id="add_blog"  method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                   <input type="hidden" class="url" value="{{url('admin/blogs')}}" >
                    <!-- jquery validation -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Banner Blog Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <span>Title</span>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="title" placeholder="Title">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <span>Select Category</span>
                                </div>
                                <div class="col-md-10">
                                    <select class="form-control select2" id="exampleSelect" style="width: 100%;" name="category_id">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <span class="col-md-2">Image </span>
                                <div class="custom-file col-md-7">
                                    <input type="file" class="custom-file-input" name="image" onChange="readURL(this);">
                                    <label class="custom-file-label">Choose file</label>
                                </div>
                                <div class="col-md-3 text-right">
                                    <img id="image" src="{{asset('public/site/default.png')}}" alt=""  width="100px">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <span>Summary</span>
                                    </div>
                                    <div class="col-md-10">
                                    <textarea  id="summernote" class="summernote form-control" name="excerpt" placeholder="Place some text here"></textarea>
                                    </div>
                                </div>
                            </div>
							<div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <span>Content</span>
                                    </div>
                                    <div class="col-md-10">
                                    <textarea class="summernote form-control" name="content" placeholder="Place some text here"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <span>Blog Status</span>
                                </div>
                                <div class="col-md-10">
                                    <select class="form-control" name="blog_status"  style="width: 100%;">
                                        <option value="draft" selected>Draft</option>
                                        <option value="published">Published</option>
                                    </select>
                                </div>
                            </div>
                             <div class="form-group row">
                                <div class="col-md-2">
                                    <span>Blog Status</span>
                                </div>
                                <div class="col-md-10">
                                    <select class="form-control" name="status"  style="width: 100%;">
                                        <option value="1" selected>Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
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
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form> <!-- /.form start -->
    </div><!-- /.container-fluid -->
</section><!-- /.content -->
</div>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#image').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }
</script>
@stop