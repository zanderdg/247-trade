@foreach($image_fields as $key => $image_field)
  @if($image_field=='full_gallery')
  <div class="modal fade" id="fileManager_full_gallery">
  @else
  <div class="modal fade" id="fileManager{{ $key }}">  
  @endif
      <div class="modal-dialog" style="width:65%;">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">File Manager</h4>
            </div>
            <div class="modal-body" style="padding:0px; margin:0px;">
              <iframe width="100%" height="500" src="{{ URL::to('assets/vendors/responsive-filemanager/filemanager/dialog.php?type=2&amp;field_id='.$image_field.'&amp;relative_url=1&amp;fldr=') }}" frameborder="0" style="overflow: scroll; overflow-x: hidden; overflow-y: scroll; "></iframe>
            </div>
          </div>
      </div>
  </div>
@endforeach