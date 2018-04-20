@extends('layouts.master')

@section('content')
    {!! Form::open([
            'route' => 'orders.store',
            ]) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
        {!! Form::label( __('period_id'), 'Kỳ:', ['class' => 'control-label']) !!}
        {!! Form::select('period_id', $periods, null, ['placeholder' => '', 'id'=>'period_id', 'name'=>'period_id','class'=>'form-control', 'style' => 'width:100%']) !!}
    </div>

    <div class="form-group">
        {!! Form::label( __('client_id'), 'Đại lý:', ['class' => 'control-label']) !!}
        {!! Form::select('client_id', $clients, null, ['placeholder' => '', 'id'=>'client_id', 'name'=>'client_id','class'=>'form-control', 'style' => 'width:100%']) !!}
    </div>

    <div class="form-group">
        {!! Form::label( __('region_id'), 'Vùng:', ['class' => 'control-label']) !!}
        {!! Form::select('region_id', $regions, null, ['placeholder' => '', 'id'=>'region_id', 'name'=>'region_id','class'=>'form-control', 'style' => 'width:100%']) !!}
    </div>
    {!! Form::submit("Tạo mới", ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

@endsection

@push('scripts')
    <script type="text/javascript">
        $("#period_id").select2({
            placeholder: "Chọn",
            allowClear: true
        });
    </script>
    <script type="text/javascript">
        $("#client_id").select2({
            placeholder: "Chọn",
            allowClear: true
        });
    </script>
    <script type="text/javascript">
        $("#region_id").select2({
            placeholder: "Chọn",
            allowClear: true
        });
    </script>
@endpush