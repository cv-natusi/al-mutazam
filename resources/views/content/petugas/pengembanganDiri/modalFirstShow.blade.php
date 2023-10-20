<div class="modal fade show" id="modalShowDialog" tabindex="-1" style="display: block;" aria-modal="true" role="dialog">
  <div class="modal-dialog modal-xl modalShowDialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Preview Data Pengembangan Diri</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @if (!empty($data->file))
          <iframe  width="100%" height="550px" src="{{asset('storage/uploads/pengembanganDiri/'.$data->file)}}"></iframe>
        @else
          <img style="display: block;margin-left: auto;margin-right: auto;width: 50%;" src="https://media.istockphoto.com/id/924949200/vector/404-error-page-or-file-not-found-icon.jpg?s=170667a&w=0&k=20&c=gsR5TEhp1tfg-qj1DAYdghj9NfM0ldfNEMJUfAzHGtU=" alt="">
        @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
var onLoad = (function() {
  $('#modalShowDialog').find('.modalShowDialog').css({
    // 'width': '100%'
  });
  $('#modalShowDialog').modal('show');
})();
$('#modalShowDialog').on('hidden.bs.modal', function() {
  $('.modalShowDialog').html('');
});
</script>
