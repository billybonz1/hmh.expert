@extends('admin.admin')

@section('content')

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">
                <span><i class="fa fa-align-center"></i></span>
                <span>Порядок полей</span>
            </h3>


            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>

        <div class="card-body">
            <div class="mb-3" id="nestable-menu">
                <a href="javascript:window.history.back();" class="btn btn-secondary">
                    <span class="label"><i class="fa fa-fw fa-chevron-left"></i></span>Назад
                </a>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="dd" id="dd-navigation" style="max-width: 100%">
                        <div class="dd-list list-group" id="fieldOrderSortable">
                            @foreach($items as $item)
                                <div class=" d-block dd-item card list-group-item" data-id="{{ $item->id }}">
                                    <div class="d-flex align-items-center">
                                        <button type="button" class="dd-handle btn btn-sm btn-outline-secondary mr-3" href="#"> <i class="fa fa-list"></i> </button>

                                        <span class="flex-fill">
                                            {{ $item->name }}
                                        </span>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.partials.sortable')
@endsection

@section('scripts')
    @parent
    <script type="text/javascript" charset="utf-8">
        $(function () {
            initSortableMenu("{{ request()->url() }}", "fieldOrderSortable");
        })
    </script>
@endsection
