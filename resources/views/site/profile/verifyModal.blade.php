<div class="modal fade" id="verifyModal" tabindex="-1" data-keyboard="false" data-backdrop="static" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title verify-modal" id="exampleModalLongTitle">24Seven Verification Code</h2>
      </div>
      <div class="modal-body">
        <div id="modelstatus"></div>
        <label for="code">Your Code</label>
        <input type="text" class="form-control" id="code" name="code" placeholder="Verificaition Code">
        <input type="hidden" id="full_number" name="full_number" value="{{ $user->userDetails->country_code }}{{ $user->userDetails->phone }}">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="verifyNumber" data-dismiss="modal">Verify</button>
      </div>
    </div>
  </div>
</div>