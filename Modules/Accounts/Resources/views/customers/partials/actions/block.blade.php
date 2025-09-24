@if(auth()->user()->hasPermission('block_customers'))
    @if (!$customer->blocked_at)
        <a href="#customer-{{ $customer->id }}-block-model"
           class="btn btn-light"
           data-toggle="modal">
            <i class="fa fa-ban"></i>
            @lang('accounts::customers.actions.block')
        </a>


        <!-- Modal -->
        <div class="modal fade" id="customer-{{ $customer->id }}-block-model" tabindex="-1" role="dialog"
             aria-labelledby="modal-title-{{ $customer->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"
                            id="modal-title-{{ $customer->id }}">@lang('accounts::customers.dialogs.block.title')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @lang('accounts::customers.dialogs.block.info')
                    </div>
                    <div class="modal-footer">
                        {{ BsForm::patch(route('dashboard.customers.block', $customer)) }}
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            @lang('accounts::customers.dialogs.block.cancel')
                        </button>
                        <button type="submit" class="btn btn-danger">
                            @lang('accounts::customers.dialogs.block.confirm')
                        </button>
                        {{ BsForm::close() }}
                    </div>
                </div>
            </div>
        </div>
    @else
        <a href="#customer-{{ $customer->id }}-unblock-model"
           class="btn btn-light"
           data-toggle="modal">
            <i class="fa fa-check"></i>
            @lang('accounts::customers.actions.unblock')
        </a>


        <!-- Modal -->
        <div class="modal fade" id="customer-{{ $customer->id }}-unblock-model" tabindex="-1" role="dialog"
             aria-labelledby="modal-title-{{ $customer->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"
                            id="modal-title-{{ $customer->id }}">@lang('accounts::customers.dialogs.unblock.title')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @lang('accounts::customers.dialogs.unblock.info')
                    </div>
                    <div class="modal-footer">
                        {{ BsForm::patch(route('dashboard.customers.unblock', $customer)) }}
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            @lang('accounts::customers.dialogs.unblock.cancel')
                        </button>
                        <button type="submit" class="btn btn-danger">
                            @lang('accounts::customers.dialogs.unblock.confirm')
                        </button>
                        {{ BsForm::close() }}
                    </div>
                </div>
            </div>
        </div>
    @endif
@endif
