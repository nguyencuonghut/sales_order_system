@extends('layouts.master')
<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        font-size: 12px;
    }
    th, td {
        padding: 2px;
        padding-top: 2px;
        padding-bottom: 2px;
        text-align: left;
        font-weight: normal;
    }
</style>

@section('heading')

@stop

@section('content')
    @push('scripts')
        <script>
            $(document).ready(function () {
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
    @endpush

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary shadow">
                <div class="panel-heading"><h3><b><i class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i> Tổng số đơn hàng</b></h3></div>
                <div class="panel-body">

                    <!-- Tab for each ticket -->
                    <table class="table table-hover" id="orders-table">
                        <thead  style="background-color: purple; color: black">
                        <tr>
                            <th>
                                <select name="month" id="month">
                                    <option value="" disabled selected>{{ __('Tháng') }}</option>
                                    <option value="1">Tháng 1</option>
                                    <option value="2">Tháng 2</option>
                                    <option value="2">Tháng 3</option>
                                    <option value="2">Tháng 4</option>
                                    <option value="2">Tháng 5</option>
                                    <option value="2">Tháng 6</option>
                                    <option value="2">Tháng 7</option>
                                    <option value="2">Tháng 8</option>
                                    <option value="2">Tháng 9</option>
                                    <option value="2">Tháng 10</option>
                                    <option value="2">Tháng 11</option>
                                    <option value="2">Tháng 12</option>
                                    <option value="all">All</option>
                                </select>
                            </th>
                            <th>{{ __('Kỳ') }}</th>
                            <th>{{ __('Nhân viên KD') }}</th>
                            <th>{{ __('Đại lý') }}</th>
                            <th>{{ __('Tổng khối lượng (kg)') }}</th>
                            <th>{{ __('Tổng tiền (VNĐ)') }}</th>

                        </tr>
                        </thead>
                    </table>
            </div>
            </div>


            <div class="panel panel-primary shadow">
                <div class="panel-heading"><h3><b><i class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i> Tổng lượng đặt hàng</b></h3></div>
                <div class="panel-body">

                    <!-- Tab for each ticket -->
                    <table class="table table-hover" id="products-table">
                        <thead  style="background-color: purple; color: white">
                        <tr>

                            <th>{{ __('Nhân viên KD') }}</th>
                            <th>{{ __('Sản phẩm') }}</th>
                            <th>{{ __('Tổng khối lượng (kg)') }}</th>
                            <th>{{ __('Tổng tiền (VNĐ)') }}</th>

                        </tr>
                        </thead>
                    </table>
                </div>
            </div>

        </div>
    </div>
@stop

@push('scripts')
    <script type="text/javascript">
        $("#product_id").select2({
            placeholder: "Chọn",
            allowClear: true
        });

        $(function () {
            var table = $('#orders-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('orders.orderdata') !!}',
                columns: [
                    {data: 'month', name: 'month'},
                    {data: 'period', name: 'period.name'},
                    {data: 'user', name: 'user.name'},
                    {data: 'client', name: 'client.name'},
                    {data: 'total_weight', name: 'total_weight', searchable:false},
                    {data: 'total_price', name: 'total_price', searchable:false},
                ]
            });
            $('#orders-table').change(function() {
                selected = $("#orders-table option:selected").val();
                if(selected == '1') {
                    table.columns(1).search(1).draw();
                } else if(selected == '2') {
                    table.columns(1).search(2).draw();
                } else if(selected == '3') {
                    table.columns(1).search(3).draw();
                } else if(selected == '4') {
                    table.columns(1).search(4).draw();
                } else if(selected == '5') {
                    table.columns(1).search(5).draw();
                } else if(selected == '6') {
                    table.columns(1).search(6).draw();
                } else if(selected == '7') {
                    table.columns(1).search(7).draw();
                } else if(selected == '8') {
                    table.columns(1).search(8).draw();
                } else if(selected == '9') {
                    table.columns(1).search(9).draw();
                } else if(selected == '10') {
                    table.columns(1).search(10).draw();
                } else if(selected == '11') {
                    table.columns(1).search(11).draw();
                } else if(selected == '12') {
                    table.columns(1).search(12).draw();
                }
                else {
                    table.columns(1).search( '' ).draw();
                }
            });
        });

        $(function () {
            $('#products-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('orders.productdata') !!}',
                columns: [
                    {data: 'user_id', name: 'user_id', searchable:false},
                    {data: 'product', name: 'product.code'},
                    {data: 'weight', name: 'weight', searchable:false},
                    {data: 'total_price', name: 'total_price', searchable:false},
                ]
            });
        });
    </script>
@endpush