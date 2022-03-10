
<form action="{{ url('account/setting/service/'.Sentinel::getUser()->id.'/edit') }}" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="row my-2">
        <div class="col-4">
            <label>Add Service </label>
        </div>
        <div class="col-4 offset-4 text-right">
            <a href="javascript:;" onclick="RemoveAddService(event)" class="btn btn-sm btn-outline-danger">Go back</a>
        </div>
    </div>
    <select class="js-example-basic-multiple form-control" name="services[]" multiple="multiple">
        <option disabled value="">Select Services</option>
        @foreach ($services as $firstkey => $service)
            @if(!is_null($attaSerives) && in_array($service->name, $attaSerives))
                <option selected value="{{ $service->name }}">{{ ucfirst($service->name) }}</option>
            @else
                <option value="{{ $service->name }}">{{ ucfirst($service->name) }}</option>
            @endif
        @endforeach
    </select>
    <div class="row">
        <div class="col-12 my-2 text-right">
            <button type="submit" class="btn btn-sm btn-outline-success">Update Services</button>
        </div>
    </div>
</form>