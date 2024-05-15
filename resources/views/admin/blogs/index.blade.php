@extends('admin.layout')
@section('title','Blogs')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @component('admin.components.content-header',['breadcrumb'=>['Dashboard'=>'admin/dashboard']])
        @slot('title') All Blogs @endslot
        @slot('add_btn') <a href="{{url('admin/blogs/create')}}" class="align-top btn btn-sm btn-primary">Add New</a> @endslot
        @slot('active') All Blogs @endslot
    @endcomponent
    <!-- /.content-header -->

    <!-- show data table -->
    @component('admin.components.data-table',['thead'=>
        ['S No.','Image','Title','Slug','Blog Status','Status','Action']
    ])
        @slot('table_id') blogs_list @endslot
    @endcomponent

</div>
@stop

@section('pageJsScripts')
<!-- DataTables -->
<script src="{{asset('public/assets/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/assets/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('public/assets/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('public/assets/js/responsive.bootstrap4.min.js')}}"></script>
<script type="text/javascript">
    var table = $("#blogs_list").DataTable({
        processing: true,
        serverSide: true,
        ajax: "blogs",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
			{data: 'image', name: 'image'},
            {data: 'title', name: 'title'},
            {data: 'slug', name: 'slug'},
            {data: 'blog_status', name: 'blog_status'},
            {data: 'status', name: 'status'},
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