<div class="row">
    <div class="col-md-12">
        <br>
        <table class="table" style="font-size: 12px;">
            <thead style="background-color: purple; color: white">
            <th><b>Sản phẩm</b></th>
            <th><b>Đơn giá (VNĐ/kg)</b></th>
            <th><b>Khối lượng</b></th>
            <th><b>Thời gian lấy hàng (dự kiến)</b></th>
            <th><b>Thành tiền (VNĐ)</b></th>
            @if(\Auth::id() == $order->user_id)
            <th style="text-align: center"><b><button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#add_to_cart"><i class="fa fa-plus-circle"><b></b></i></button></b></th>

            @endif
            </thead>
            @foreach($carts as $cart)
                <tr>
                    <td>{{ $cart->product->code }}</td>
                    <td>{{ number_format($cart->product->price, 0) }}</td>
                    <td>{{ number_format($cart->weight, 0) }} kg</td>
                    <td>{{date('d, F Y', strTotime($cart->delivery_date))}}</td>
                    <td>{{ number_format($cart->total_price, 0) }} VNĐ</td>
                    @if(\Auth::id() == $cart->user_id)
                    <td style="text-align: center;">
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#CartEditModal-{{$cart->id}}"
                                data-id="{{ $cart->id }}"><i class="fa fa-edit"></i>
                        </button>

                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#CartDeleteModal-{{$cart->id}}"
                                data-id="{{ $cart->id }}"><i class="fa fa-trash"></i>
                        </button>
                        <div class="modal fade" id="CartEditModal-{{$cart->id}}" role="dialog" aria-labelledby="CartEditModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="CartEditModalLabel">Sửa đơn đặt hàng</h4>
                                    </div>
                                    <div class="modal-body" style="text-align: left">
                                        {!! Form::model($cart, [
                                            'method' => 'PATCH',
                                            'route' => ['carts.update', $cart->id],
                                            'files'=>true,
                                            'enctype' => 'multipart/form-data'
                                            ]) !!}

                                        {!! Form::label('product_id', __('Sản phẩm'), ['class' => 'control-label']) !!}
                                        {!! Form::select('product_id', $products, null, ['placeholder' => '', 'id'=>'product_id', 'name'=>'product_id','class'=>'form-control', 'style' => 'width:100%']) !!}

                                        {!! Form::label('weight', __('Khối lượng'), ['class' => 'control-label']) !!}
                                        {!! Form::date('weight', null, ['class' => 'form-control']) !!}

                                        {!! Form::label('delivery_date', __('Thời gian lấy hàng (dự kiến)'), ['class' => 'control-label']) !!}
                                        {!! Form::date('delivery_date', \Carbon\Carbon::now()->addDays(3), ['class' => 'form-control']) !!}

                                        {!! Form::submit('Cập nhật', ['class' => 'btn btn-primary', 'style' => 'width:100%']) !!}

                                        {!! Form::close() !!}
                                    </div>
                                    <div class="modal-footer">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="CartDeleteModal-{{$cart->id}}" role="dialog" aria-labelledby="CartDeleteModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="CartDeleteModalLabel">Bạn thật sự muốn xóa đơn đặt hàng ???</h4>
                                    </div>
                                    <div class="modal-body" style="text-align: left">
                                        {!! Form::model($cart, [
                                            'method' => 'DELETE',
                                            'route' => ['carts.destroy', $cart->id],
                                            'files'=>true,
                                            'enctype' => 'multipart/form-data'
                                            ]) !!}

                                        {!! Form::submit('Xóa', ['class' => 'btn btn-danger', 'style' => 'width:100%']) !!}

                                        {!! Form::close() !!}
                                    </div>
                                    <div class="modal-footer">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>

                    @endif
                </tr>
            @endforeach
        </table>
        <div class="contactleft">
            <h5><b>Tổng lượng đặt hàng: </b> <span class="badge" style="background: blue"><i>{{number_format($carts->sum('weight'), 0)}}</i></span> kg</h5>
            <h5><b>Tổng tiền: </b> <span class="badge" style="background: orangered"><i>{{number_format($carts->sum('total_price'), 0)}}</i></span> VNĐ</h5>
        </div>
        <div class="contactright pull-right">
        </div>
    </div>
</div>

@push('scripts')
    <script type="text/javascript">
        $("#product_id").select2({
            placeholder: "Chọn",
            allowClear: true
        });
    </script>
@endpush