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
                <div class="panel-heading"><h3><b><i class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i> Đơn đặt hàng số #{{$order->id}}</b></h3></div>
                <div class="panel-body">

                    <!-- Tab for each ticket -->
                    <div class="col-md-12"></div>
                    <div class="contactleft">
                        <p><b>Kỳ: </b> {{$order->period->name}} - tháng {{$order->month}}</p>
                    </div>
                    <div class="contactright">
                        <p><b>Đại lý: </b> {{$order->client->code}} - {{$order->client->name}}</p>
                    </div>

                    <div class="modal fade" id="add_to_cart" role="dialog" aria-labelledby="AddToCartModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="AddToCartModalLabel"><b>Thêm sản phẩm</b></h4>
                                </div>
                                <div class="modal-body">
                                    {!! Form::open([
                                            'route' => ['carts.store', $order->id],
                                            ]) !!}

                                    {!! Form::label('product_id', __('Sản phẩm'), ['class' => 'control-label']) !!}
                                    {!! Form::select('product_id', $products, null, ['placeholder' => '', 'id'=>'product_id', 'name'=>'product_id','class'=>'form-control', 'style' => 'width:100%']) !!}

                                    {!! Form::label('weight', __('Khối lượng'), ['class' => 'control-label']) !!}
                                    {!! Form::number('weight', null, ['class' => 'form-control']) !!}

                                    {!! Form::label('delivery_date', __('Thời gian lấy hàng (dự kiến)'), ['class' => 'control-label']) !!}
                                    {!! Form::date('delivery_date', \Carbon\Carbon::now()->addDays(3), ['class' => 'form-control']) !!}

                                    <br>
                                    {!! Form::submit( __('Thêm') , ['class' => 'btn btn-primary', 'style' => 'width:100%']) !!}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ~ List all carts-->
                    @include('orders.carts.index', ['subject' => $order])

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
    </script>
@endpush