@extends('layouts.master')

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
                            <th>{{ __('STT') }}</th>
                            <th>{{ __('Tháng') }}</th>
                            <th>{{ __('Kỳ') }}</th>
                            <th>{{ __('Khách hàng') }}</th>
                            <th>{{ __('Nhân viên KD') }}</th>
                            <th>{{ __('Sản phẩm') }}</th>
                            <th>{{ __('Tổng khối lượng (kg)') }}</th>
                            <th>{{ __('Tổng tiền (VNĐ)') }}</th>

                        </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
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
                serverSide: false,
                ajax: {
                    url: '{!! route('orders.productdata') !!}',
                    data: function (d) {
                        //
                    }
                },
                columns: [
                    {data: 'DT_Row_Index', name: 'DT_Row_Index'},
                    {data: 'month', name: 'month'},
                    {data: 'period', name: 'period.name'},
                    {data: 'client', name: 'client.name' + 'client.name'},
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
                },
                fnFooterCallback: function () {
                    var api = this.api(), data;

                    // Remove the formatting to get integer data for summation
                    var intVal = function ( i ) {
                        return typeof i === 'string' ?
                            i.replace(/[\$,]/g, '')*1 :
                            typeof i === 'number' ?
                                i : 0;
                    };

                    // Total over all pages
                    total = api
                        .column( 7 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // Total over this page
                    pageTotal = api
                        .column( 7, { page: 'current'} )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    //summary for total weigth
                    // Total over all pages
                    totalWeigth = api
                        .column( 6 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // Total over this page
                    pageTotalWeight = api
                        .column( 6, { page: 'current'} )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );
                    //~summary for total weigth

                    // Update footer
                    var nf = new Intl.NumberFormat();
                    $( api.column( 6 ).footer() ).html(
                        nf.format(pageTotalWeight) +'/'+ nf.format(totalWeigth)
                    );
                    $( api.column( 7 ).footer() ).html(
                        nf.format(pageTotal) +'/'+ nf.format(total)
                    );
                },
                createdRow: function ( row, data, index ) {
                    //window.alert(index);
                    if ( (index)%2 == 1)  {
                        $('td', row).addClass('danger');
                    } else {
                        $('td', row).addClass('primary');
                    }
                },
            });
        });
    </script>
@endpush