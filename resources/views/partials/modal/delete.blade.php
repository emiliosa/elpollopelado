@push('javascript')
    <script type="text/javascript" src="{{ URL::asset('js/app/modal.js') }}"></script>
@endpush

{!! Form::open(['method'=> 'DELETE', 'style' => 'display:inline', 'name' => 'delete_modal_form']) !!}

    <div class="modal fade modal-delete-confirm" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modal_label"> {{ $modal_label }}</h4>
                </div>

                <div class="modal-body">
                    <p>
                        <span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>
                        {{ $modal_body_p }}
                    </p>
                </div>

                <div class="modal-footer">
                    <div class="pull-left">
                        <input type="button" class="btn btn-danger" data-dismiss="modal" value="Cancelar">
                    </div>
                    <div class="pull-right">
                        <input type="submit" class="btn btn-primary btn-modal-borrar" value="Borrar">
                    </div>
                </div>

            </div>
        </div>
    </div>

{!! Form::close() !!}
