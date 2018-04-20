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
                <div class="panel-heading"><h3><b><i class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i> Tổng lượng đặt hàng</b></h3></div>
                <div class="panel-body">

                    <!-- Tab for each ticket -->
                    <table class="table table-hover" id="products-table">
                        <thead  style="background-color: purple; color: white">
                        <tr>
                            <th>{{ __('Tháng') }}</th>
                            <th>{{ __('Kỳ') }}</th>
                            <th>{{ __('Khách hàng') }}</th>
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

        $(function() {
            $("#orders-table").DataTable({
                autoWidth: false,
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{!! route('orders.orderdata') !!}',
                    data: function (d) {
                        //
                    }
                },
                columns: [
                    {data: 'month', name: 'month'},
                    {data: 'period', name: 'period.name'},
                    {data: 'user', name: 'user.name'},
                    {data: 'client', name: 'client.name'},
                    {data: 'total_weight', name: 'total_weight', searchable:false},
                    {data: 'total_price', name: 'total_price', searchable:false},
                ],

                initComplete: function () {
                    this.api().columns().every(function () {


                        var column = this;
                        var input = document.createElement("input");
                        input.className = "form-control form-filter input-sm";
                        $(input).appendTo($(column.header()))
                            .on('keyup', function () {
                                column.search($(this).val(), false, false, true).draw();
                            });
                    });
                }
            });
        });

        $(function () {
            $('#products-table').DataTable({
                autoWidth: false,
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{!! route('orders.productdata') !!}',
                    data: function (d) {
                        //
                    }
                },
                columns: [
                    {data: 'month', name: 'month'},
                    {data: 'period', name: 'period.name'},
                    {data: 'client', name: 'client.name'},
                    {data: 'user', name: 'user.name'},
                    {data: 'product', name: 'product.code'},
                    {data: 'weight', name: 'weight', searchable:true},
                    {data: 'total_price', name: 'total_price', searchable:true},
                ],
                initComplete: function () {
                    this.api().columns().every(function () {


                        var column = this;
                        var input = document.createElement("input");
                        input.className = "form-control form-filter input-sm";
                        $(input).appendTo($(column.header()))
                            .on('keyup', function () {
                                column.search($(this).val(), false, false, true).draw();
                            });
                    });
                }
            });
        });
    </script>
@endpush