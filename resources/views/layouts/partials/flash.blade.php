<div class="flash_message_container">
    <div class="alert" id="ajax_flash_message">

    </div>

    @if(Session::has('flash_message'))
        <div class="flash_message alert {{ Session::has('flash_message_type') ? Session::get('flash_message_type') : 'alert-success' }} {{ Session::has('flash_message_important') ? 'alert-important' : '' }}">
            @if(Session::has('flash_message_important'))
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            @endif

            {{ Session::get('flash_message') }}
        </div>
    @endif
</div>
