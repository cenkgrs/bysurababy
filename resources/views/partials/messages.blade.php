<!--
@if(session()->has('success_message'))
    <div class="alert alert-success">
        {{ session()->get('success_message') }}
    </div>
@endif

@if(session()->has('error_message'))
    <div class="alert alert-danger">
        {{ session()->get('error_message') }}
    </div>
@endif
-->

@if(session()->has('success_message'))
<div id="success-modal" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header success success justify-content-center">
				<div class="icon-box">
					<i class="fa fa-check"></i>
				</div>
                    <i class="fa fa-close close" data-dismiss="modal" aria-hidden="true"></i>
			</div>
			<div class="modal-body text-center">
				<p class="title-main">{{ session()->get('success_message') }}</p>
			</div>
		</div>
	</div>
</div>  
@endif

@if(session()->has('error_message'))
<div id="error-modal" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header error justify-content-center">
				<div class="icon-box">
					<i class="fa fa-exclamation"></i>
				</div>
                    <i class="fa fa-close close" data-dismiss="modal" aria-hidden="true"></i>
			</div>
			<div class="modal-body text-center">
				<p class="title-main">{{ session()->get('error_message') }}</p>
			</div>
		</div>
	</div>
</div>
@endif