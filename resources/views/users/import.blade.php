@extends('layouts.master')
@section('heading')
@stop
@section('content')
@push('scripts')
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip(); //Tooltip on icons top
            $('.popoverOption').each(function () {
                var $this = $(this);
                $this.popover({
                    trigger: 'hover',
                    placement: 'left',
                    container: $this,
                    html: true,
                    content: $this.find('#popover_content_wrapper').html()
                });
            });
        });
    </script>
@endpush
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title" style="padding:12px 0px;font-size:25px; "><strong>Import danh sách nhân viên từ file Excel</strong></h3>
            </div>
            <div class="panel-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif

                @if ($message = Session::get('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('error') }}
                    </div>
                @endif
                <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 20px;" method="POST" action="{{ route('users.doimport') }}" class="form-horizontal" enctype="multipart/form-data">

                    <input type="file" name="import_file" />
                    {{ csrf_field() }}
                    <br/>

                    <button class="btn btn-primary">Import CSV hoặc Excel File</button>

                </form>
            </div>
        </div>
    </div>
</div>
@stop
