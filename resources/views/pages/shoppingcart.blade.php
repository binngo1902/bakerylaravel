@extends('layout.index')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Shopping Cart</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="index.html">Home</a> / <span>Shopping Cart</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content1">

        @include('pages.cart')

    </div> <!-- #content -->
</div>
@endsection
@section('script')
<script>
    function deleteItem($id){
        $.ajax({
            type: "get",
            url: "delete-cart/"+$id,

            success: function (response) {
                $('#content1').html(response)
                // alertify.success('Đã xóa item thành công');
            }
        });
    }

    function editItem(id){
        $.ajax({
            type: "get",
            url: "edit-cart/"+id+"/"+$('#quantity-item-'+id).val(),

            success: function (response) {
                // console.log(response);
                $('#content1').html(response);
                // alertify.success('Đã sửa item thành công');

            }
        });
    }

</script>
@endsection
