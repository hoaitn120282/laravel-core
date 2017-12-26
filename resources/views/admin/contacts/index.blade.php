@extends('layouts.admin')

@section('content')
<div class="row">
	<div class="x_panel">
    <div class="x_title">
      <h2>Contacts</h2>
      <div class="clearfix"></div>
      @include('flash::message')
    </div>
    <div class="x_content">
      @include('admin.contacts.table')
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $("a[data-role='delete-contact']").on( "click", function() {
            var contactid = $(this).data('contactid');
            swal({
                title: "",
                text: "Are you sure to delete this contact?",
                type: "warning",
                showCancelButton: true,
                closeOnConfirm: true,
                showLoaderOnConfirm: true,
                confirmButtonText: "Yes",
                confirmButtonClass: "btn-danger",
                cancelButtonText: "No",
                closeOnConfirm: true
            }, function () {
                $.ajax({
                    type: 'DELETE',
                    url: "{{ Admin::route('contacts.destroy',['contactid'=>'']) }}/"+contactid,
                    data: {"_token": "{{ csrf_token() }}"}
                })
                    .done(function() {
                        {{--window.location.href = "{{ Admin::route('siteManager.index') }}";--}}
                        $("#tr-"+contactid).remove();
                    });
            });
            return false;
        });
    });
</script>
@endpush