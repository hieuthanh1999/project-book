@extends('BE.layout_theme')
@section('content')
<div class="right_col" role="main">


    <div class="row">
        <div class="col-md-6 col-sm-6 dates">
            <form role="form" action="{{ route('admin.searchDoanhThu') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class='col-sm-6'>
                    <div class="form-group">
                        <input type="date" name="bday" class="form-control"  value="{{$bday}}">
                    </div>
                </div>
                <div class='col-sm-4'>
                    <div class="form-group">
                        <input type="date" name="kday" class="form-control" value="{{$kday}}">
                    </div>

                </div>
                <div class='col-sm-2'>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Lọc</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel tile fixed_height_520">
                <div class="x_title">
                    <h2>Thống kê đơn hàng</h2>
                    <div class="clearfix"></div>
                    <div style="margin: 20px; 0">
                        {!! $cateChart->container() !!}
                        {!! $cateChart->script() !!}
                    </div>

                </div>

            </div>
        </div>

    </div>


</div>
<style type="text/css">
.text_center {
    text-align: center;
}
</style>
<script type="text/javascript">
$(function() {
    $('#datetimepicker').datetimepicker();
});
</script>
@endsection