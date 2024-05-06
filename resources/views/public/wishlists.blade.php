@extends('public.layout')
@section('title','My Wishlist')
@section('content')

@stop

@section('pageJsScripts')
<script src="{{asset('public/assets/js/action.js')}}"></script>
<script type="text/javascript">
    // $(window).on('load', function(){
    //     var items = localStorage.getItem('product_ids');
    //     var url = $('.demo').val();
    //     $.ajax({
    //         url: url + '/show_wishlists',
    //         type: 'POST',
    //         data : {"_token": "{{ csrf_token() }}",wishlist_id:items},
    //         success: function(dataResult){
    //             if(dataResult['data'] != ''){
    //                 $('.wishlist-data').html(dataResult['data']);
    //             }else{
    //                 $('.wishlist-data').html("<div class='col-md-12'><div class='content-box text-center'><p class='m-0'>No wishlist found.</p></div></div>");
    //             }

    //         }
    //     });
    // });

</script>
@stop
