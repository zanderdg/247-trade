<!-- Modal -->
<div class="modal fade" id="discardModel" tabindex="-1" role="dialog" aria-labelledby="discardModelLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header model-sm-header">
                <h3 class="modal-title p-0" id="discardModelLabel"></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                {{-- {{ route('job-delete', $job->id) }} --}}
                <form method="POST" action="{{ route('job-delete') }}"> 
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="job_id" id="job_id">

                    <p class="mt-0">Are you sure, you want to delete this post?</p>

                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sm btn-danger">Discard</button>
                </form>
            </div>
        </div>
    </div>
</div>