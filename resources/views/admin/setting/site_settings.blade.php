@extends('admin/layouts/default')

{{-- Web site Title --}}
@section('title')
Site Settings
@parent
@stop

{{-- page level styles --}}
@section('header_styles')

    <link href="{{ asset('assets/vendors/select2/select2.min.css') }}" type="text/css" />
    <link href="{{ asset('assets/css/pages/blog.css') }}" rel="stylesheet" type="text/css">
<style>
	.form-group2 { margin:10px!important; }
</style>
    <!--end of page level css-->
@stop
{{-- Content --}}
@section('content')
<section class="content-header">
    <h1>
        Site Settings
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li class="active">Site Settings</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary ">
                <div class="panel-heading">
                    <h4 class="panel-title"> <i class="livicon" data-name="list" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        Edit Site Settings
                    </h4>
                </div>
                <div class="panel-body">
                    {!! Form::open(array('url' => URL::to('admin/site_setting'), 'method' => 'post', 'class' => 'form-horizontal', 'files'=> true)) !!}

                        <div class="form-group {{ $errors->first('site_title', 'has-error') }}">
                            <label for="site_title" class="col-sm-3 control-label">
                                Site Title
                            </label>
                            <div class="col-sm-5">
                                {!! Form::text('site_title', $data->site_title, array('class' => 'form-control', 'placeholder'=>'Sender Email')) !!}
                            </div>
                            <div class="col-sm-4">
                                {!! $errors->first('site_title', '<span class="help-block">:message</span> ') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->first('site_email', 'has-error') }}">
                            <label for="site_email" class="col-sm-3 control-label">
                                Site Email
                            </label>
                            <div class="col-sm-5">
                                {!! Form::text('site_email', $data->site_email, array('class' => 'form-control', 'placeholder'=>'Contact Email')) !!}
                            </div>
                            <div class="col-sm-4">
                                {!! $errors->first('site_email', '<span class="help-block">:message</span> ') !!}
                            </div>
                        </div>
                        <div class="form-group {{ $errors->first('site_phone', 'has-error') }}">
                            <label for="site_phone" class="col-sm-3 control-label">
                                Site Phone
                            </label>
                            <div class="col-sm-5">
                                {!! Form::text('site_phone', $data->site_phone, array('class' => 'form-control', 'placeholder'=>'Contact Phone')) !!}
                            </div>
                            <div class="col-sm-4">
                                {!! $errors->first('site_phone', '<span class="help-block">:message</span> ') !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="logo_image" class="col-sm-3 control-label">
                                Logo image
                            </label>
                            <div class="col-sm-5">
                            <div class="input-group">
                                {!! Form::text('logo_image', $data->logo_image, array('class' => 'form-control', 'placeholder'=>'Select Logo image', 'id' => 'image')) !!}
                                <span class="input-group-btn">
                                    <button data-select2-open="single-append-text" type="button" class="btn btn-default" data-target="#fileManager0" href="javascript:;" data-toggle="modal">
                                        <span class="glyphicon glyphicon-picture"></span>
                                    </button>
                                </span>
                            </div>
                            (Image Size 292x57 in Dimensions)
                            </div>
                            @if ($data->logo_image)
                                <div class="form-group">
                                    {!! HTML::image('/uploads/source/'.$data->logo_image, '', array('style' => 'max-width:292px')) !!}
                                </div>
                            @endif
                        </div>
<!--                         <div class="form-group {{ $errors->first('corporate_office', 'has-error') }}">
                            <label for="corporate_office" class="col-sm-3 control-label">
                                Corporate Office
                            </label>
                            <div class="col-sm-5">
                                {!! Form::select('corporate_office', $locationDD, $data->corporate_office, array('class' => 'form-control select2', 'id' => 'e1', 'placeholder'=>'Select Location'))!!}
                            </div>
                            <div class="col-sm-4">
                                {!! $errors->first('corporate_office', '<span class="help-block">:message</span> ') !!}
                            </div>
                        </div> -->

                        <div class="form-group {{ $errors->first('facebook', 'has-error') }}">
                            <label for="facebook" class="col-sm-3 control-label">
                                Facebook Link
                            </label>
                            <div class="col-sm-5">
                                {!! Form::text('facebook', $data->facebook, array('class' => 'form-control', 'placeholder'=>'Facebook Link')) !!}
                            </div>
                            <div class="col-sm-4">
                                {!! $errors->first('facebook', '<span class="help-block">:message</span> ') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->first('twitter', 'has-error') }}">
                            <label for="twitter" class="col-sm-3 control-label">
                                Twitter Link
                            </label>
                            <div class="col-sm-5">
                                {!! Form::text('twitter', $data->twitter, array('class' => 'form-control', 'placeholder'=>'Twitter Link')) !!}
                            </div>
                            <div class="col-sm-4">
                                {!! $errors->first('twitter', '<span class="help-block">:message</span> ') !!}
                            </div>
                        </div>
                        <div class="form-group {{ $errors->first('youtube', 'has-error') }}">
                            <label for="youtube" class="col-sm-3 control-label">
                                Youtube Link
                            </label>
                            <div class="col-sm-5">
                                {!! Form::text('youtube', $data->youtube, array('class' => 'form-control', 'placeholder'=>'Youtube Link')) !!}
                            </div>
                            <div class="col-sm-4">
                                {!! $errors->first('youtube', '<span class="help-block">:message</span> ') !!}
                            </div>
                        </div>
                        <div class="form-group {{ $errors->first('googleplus', 'has-error') }}">
                            <label for="googleplus" class="col-sm-3 control-label">
                                Google Plus Link
                            </label>
                            <div class="col-sm-5">
                                {!! Form::text('googleplus', $data->googleplus, array('class' => 'form-control', 'placeholder'=>'Google Plus Link')) !!}
                            </div>
                            <div class="col-sm-4">
                                {!! $errors->first('googleplus', '<span class="help-block">:message</span> ') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->first('linkedin', 'has-error') }}">
                            <label for="linkedin" class="col-sm-3 control-label">
                                Linkedin Link
                            </label>
                            <div class="col-sm-5">
                                {!! Form::text('linkedin', $data->linkedin, array('class' => 'form-control', 'placeholder'=>'Linkedin Link')) !!}
                            </div>
                            <div class="col-sm-4">
                                {!! $errors->first('linkedin', '<span class="help-block">:message</span> ') !!}
                            </div>
                        </div>
                        <div class="form-group {{ $errors->first('instagram', 'has-error') }}">
                            <label for="instagram" class="col-sm-3 control-label">
                                Instagram Link
                            </label>
                            <div class="col-sm-5">
                                {!! Form::text('instagram', $data->instagram, array('class' => 'form-control', 'placeholder'=>'Instagram Link')) !!}
                            </div>
                            <div class="col-sm-4">
                                {!! $errors->first('instagram', '<span class="help-block">:message</span> ') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->first('linkedin', 'has-error') }}">
                            <label for="linkedin" class="col-sm-3 control-label">
                                Contact Us Map Address
                            </label>
                            <div class="col-sm-5">
                                {!! Form::text('contact_map_address', $data->contact_map_address, array('class' => 'form-control', 'placeholder'=>'Contact Us Map Address')) !!}
                            </div>
                            <div class="col-sm-4">
                                {!! $errors->first('contact_map_address', '<span class="help-block">:message</span> ') !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="google_analytics" class="col-sm-3 control-label">
                                Google Analytics Code
                            </label>
                            <div class="col-sm-5">
                                {!! Form::textarea('google_analytics', $data->google_analytics, array('class' => 'form-control', 'rows'=>'5', 'placeholder'=>'Place google analytics code here.')) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="copyright" class="col-sm-3 control-label">
                                Copyright Text
                            </label>
                            <div class="col-sm-5">
                                {!! Form::textarea('copyright', $data->copyright, array('class' => 'form-control', 'rows'=>'5', 'placeholder'=>'Place copyright text here.')) !!}
                            </div>
                        </div>
						
						 <!-- <div class="col-sm-10">
							<div class="panel panel-primary">
								<div class="panel-heading">
									<h4 class="panel-title">Home: PUBLIC OPINION</h4>
								</div>
								<div class="panel-body">
									<div class="form-group form-group2">
										<label for="google_analytics" class="col-sm-3 control-label">
												{!! Form::label('image', 'Image') !!}
											</label>
										<div class="input-group">
											
											{!! Form::text('public_opinion_image', null, array('class' => 'form-control', 'placeholder'=>'Select image', 'id' => 'public_opinion_image')) !!}
											<span class="input-group-btn">
												<button data-select2-open="single-append-text" type="button" class="btn btn-default" data-target="#fileManager1" href="javascript:;" data-toggle="modal">
													<span class="glyphicon glyphicon-picture"></span>
												</button>
											</span>
											<div class="modal fade" id="fileManager1">  
											  <div class="modal-dialog" style="width:65%;">
												  <div class="modal-content">
													<div class="modal-header">
													  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													  <h4 class="modal-title">File Manager</h4>
													</div>
													<div class="modal-body" style="padding:0px; margin:0px;">
													  <iframe width="100%" height="500" src="{{ URL::to('assets/vendors/responsive-filemanager/filemanager/dialog.php?type=2&amp;field_id=public_opinion_image&amp;relative_url=1&amp;fldr=') }}" frameborder="0" style="overflow: scroll; overflow-x: hidden; overflow-y: scroll; "></iframe>
													</div>
												  </div>
											  </div>
											</div>
										</div>
										
									</div>
									<div class="form-group form-group2">
										<label for="google_analytics" class="col-sm-3 control-label">
											{!! Form::label('heading', 'Heading') !!}
										</label>
										<div class="input-group">
											{!! Form::text('public_opinion_heading', $data->public_opinion_heading, array('class' => 'form-control', 'placeholder'=>'Heading')) !!}
										</div>
									</div>
									<div class="form-group form-group2">
										<label for="google_analytics" class="col-sm-3 control-label">
											{!! Form::label('heading', 'Sub-Heading') !!}
										</label>
										<div class="input-group">
											{!! Form::text('public_opinion_sub_heading', $data->public_opinion_sub_heading, array('class' => 'form-control', 'placeholder'=>'Sub Heading')) !!}
										</div>
									</div>
									<div class="form-group form-group2">
										<label for="google_analytics" class="col-sm-3 control-label">
											{!! Form::label('text', 'Text') !!}
										</label>
										<div class="input-group">
											{!! Form::textarea('public_opinion_text', $data->public_opinion_text, array('class' => 'form-control', 'placeholder'=>'Text Here')) !!}
										</div>
									</div>
									<div class="form-group form-group2">
										<label for="google_analytics" class="col-sm-3 control-label">
											{!! Form::label('link', 'Link') !!}
										</label>
										<div class="input-group">
											{!! Form::text('public_opinion_link', $data->public_opinion_link, array('class' => 'form-control', 'placeholder'=>'Link')) !!}
										</div>
									</div>
								</div>
							</div>
						</div> -->
						<!--<div class="col-sm-10">-->
						<!--	<div class="panel panel-primary">-->
						<!--		<div class="panel-heading">-->
						<!--			<h4 class="panel-title">API: Web Hotelier</h4>-->
						<!--		</div>-->
						<!--		<div class="panel-body">-->
						<!--			<div class="form-group form-group2">-->
						<!--				<label for="google_analytics" class="col-sm-3 control-label">-->
						<!--						{!! Form::label('webh_username', 'User Name') !!}-->
						<!--					</label>-->
						<!--				<div class="col-sm-5">											-->
						<!--					{!! Form::text('webh_username', $data->webh_username, array('class' => 'form-control', 'placeholder'=>'User name', 'id' => 'webh_username')) !!}-->
						<!--				</div>										-->
						<!--			</div>-->
						<!--			<div class="form-group form-group2">-->
						<!--				<label for="google_analytics" class="col-sm-3 control-label">-->
						<!--					{!! Form::label('webh_password', 'Password') !!}-->
						<!--				</label>-->
						<!--				<div class="col-sm-5">-->
						<!--					{!! Form::text('webh_password', $data->webh_password, array('class' => 'form-control', 'placeholder'=>'Password')) !!}-->
						<!--				</div>-->
						<!--			</div>-->
      <!--                              <div class="form-group form-group2">-->
      <!--                                  <label for="google_analytics" class="col-sm-3 control-label">-->
      <!--                                      {!! Form::label('webh_link', 'API Link') !!}-->
      <!--                                  </label>-->
      <!--                                  <div class="col-sm-5">-->
      <!--                                      {!! Form::text('webh_link', $data->webh_link, array('class' => 'form-control', 'placeholder'=>'API link')) !!}-->
      <!--                                  </div>-->
      <!--                              </div>-->
						<!--		</div>-->
						<!--	</div>-->
						<!--</div>-->
						<!--<div class="col-sm-10">-->
      <!--                      <div class="panel panel-primary">-->
      <!--                          <div class="panel-heading">-->
      <!--                              <h4 class="panel-title">API: TBOH</h4>-->
      <!--                          </div>-->
      <!--                          <div class="panel-body">-->
      <!--                              <div class="form-group form-group2">-->
      <!--                                  <label for="google_analytics" class="col-sm-3 control-label">-->
      <!--                                          {!! Form::label('tboh_username', 'User Name') !!}-->
      <!--                                      </label>-->
      <!--                                  <div class="col-sm-5">                                           -->
      <!--                                      {!! Form::text('tboh_username', $data->tboh_username, array('class' => 'form-control', 'placeholder'=>'User name', 'id' => 'tboh_username')) !!}-->
      <!--                                  </div>                                      -->
      <!--                              </div>-->
      <!--                              <div class="form-group form-group2">-->
      <!--                                  <label for="google_analytics" class="col-sm-3 control-label">-->
      <!--                                      {!! Form::label('tboh_password', 'Password') !!}-->
      <!--                                  </label>-->
      <!--                                  <div class="col-sm-5">-->
      <!--                                      {!! Form::text('tboh_password', $data->tboh_password, array('class' => 'form-control', 'placeholder'=>'Password')) !!}-->
      <!--                                  </div>-->
      <!--                              </div>-->
      <!--                              <div class="form-group form-group2">-->
      <!--                                  <label for="google_analytics" class="col-sm-3 control-label">-->
      <!--                                      {!! Form::label('tboh_link', 'API Link') !!}-->
      <!--                                  </label>-->
      <!--                                  <div class="col-sm-5">-->
      <!--                                      {!! Form::text('tboh_link', $data->tboh_link, array('class' => 'form-control', 'placeholder'=>'API link')) !!}-->
      <!--                                  </div>-->
      <!--                              </div>-->
      <!--                          </div>-->
      <!--                      </div>-->
      <!--                  </div>-->
      <!--                  <div class="col-sm-10">-->
      <!--                      <div class="panel panel-primary">-->
      <!--                          <div class="panel-heading">-->
      <!--                              <h4 class="panel-title">API: BookigEE</h4>-->
      <!--                          </div>-->
      <!--                          <div class="panel-body">-->
      <!--                              <div class="form-group form-group2">-->
      <!--                                  <label for="google_analytics" class="col-sm-3 control-label">-->
      <!--                                      {!! Form::label('bookingee_apikey', 'API key') !!}-->
      <!--                                  </label>-->
      <!--                                  <div class="col-sm-5">-->
      <!--                                      {!! Form::text('bookingee_apikey', $data->bookingee_apikey, array('class' => 'form-control', 'placeholder'=>'Password')) !!}-->
      <!--                                  </div>-->
      <!--                              </div>-->
      <!--                              <div class="form-group form-group2">-->
      <!--                                  <label for="google_analytics" class="col-sm-3 control-label">-->
      <!--                                          {!! Form::label('bookingee_username', 'User Name') !!}-->
      <!--                                      </label>-->
      <!--                                  <div class="col-sm-5">                                           -->
      <!--                                      {!! Form::text('bookingee_username', $data->bookingee_username, array('class' => 'form-control', 'placeholder'=>'User name', 'id' => 'bookingee_username')) !!}-->
      <!--                                  </div>                                      -->
      <!--                              </div>-->
      <!--                              <div class="form-group form-group2">-->
      <!--                                  <label for="google_analytics" class="col-sm-3 control-label">-->
      <!--                                      {!! Form::label('bookingee_password', 'Password') !!}-->
      <!--                                  </label>-->
      <!--                                  <div class="col-sm-5">-->
      <!--                                      {!! Form::text('bookingee_password', $data->bookingee_password, array('class' => 'form-control', 'placeholder'=>'Password')) !!}-->
      <!--                                  </div>-->
      <!--                              </div>-->
      <!--                              <div class="form-group form-group2">-->
      <!--                                  <label for="google_analytics" class="col-sm-3 control-label">-->
      <!--                                      {!! Form::label('bookingee_link', 'API Link') !!}-->
      <!--                                  </label>-->
      <!--                                  <div class="col-sm-5">-->
      <!--                                      {!! Form::text('bookingee_link', $data->bookingee_link, array('class' => 'form-control', 'placeholder'=>'API link')) !!}-->
      <!--                                  </div>-->
      <!--                              </div>-->
      <!--                          </div>-->
      <!--                      </div>-->
      <!--                  </div>-->
      <!--                  <div class="col-sm-10">-->
      <!--                      <div class="panel panel-primary">-->
      <!--                          <div class="panel-heading">-->
      <!--                              <h4 class="panel-title">API: MTS City</h4>-->
      <!--                          </div>-->
      <!--                          <div class="panel-body">-->
      <!--                              <div class="form-group form-group2">-->
      <!--                                  <label for="google_analytics" class="col-sm-3 control-label">-->
      <!--                                          {!! Form::label('mts_username', 'User Name') !!}-->
      <!--                                      </label>-->
      <!--                                  <div class="col-sm-5">                                           -->
      <!--                                      {!! Form::text('mts_username', $data->mts_username, array('class' => 'form-control', 'placeholder'=>'User name', 'id' => 'mts_username')) !!}-->
      <!--                                  </div>                                      -->
      <!--                              </div>-->
      <!--                              <div class="form-group form-group2">-->
      <!--                                  <label for="google_analytics" class="col-sm-3 control-label">-->
      <!--                                      {!! Form::label('mts_password', 'Password') !!}-->
      <!--                                  </label>-->
      <!--                                  <div class="col-sm-5">-->
      <!--                                      {!! Form::text('mts_password', $data->mts_password, array('class' => 'form-control', 'placeholder'=>'Password')) !!}-->
      <!--                                  </div>-->
      <!--                              </div>-->
      <!--                              <div class="form-group form-group2">-->
      <!--                                  <label for="google_analytics" class="col-sm-3 control-label">-->
      <!--                                      {!! Form::label('mts_link', 'API Link') !!}-->
      <!--                                  </label>-->
      <!--                                  <div class="col-sm-5">-->
      <!--                                      {!! Form::text('mts_link', $data->mts_link, array('class' => 'form-control', 'placeholder'=>'API link')) !!}-->
      <!--                                  </div>-->
      <!--                              </div>-->
      <!--                          </div>-->
      <!--                      </div>-->
      <!--                  </div>-->
      <!--                  <div class="col-sm-10">-->
      <!--                      <div class="panel panel-primary">-->
      <!--                          <div class="panel-heading">-->
      <!--                              <h4 class="panel-title">API: G Adventure</h4>-->
      <!--                          </div>-->
      <!--                          <div class="panel-body">-->
      <!--                              <div class="form-group form-group2">-->
      <!--                                  <label for="google_analytics" class="col-sm-3 control-label">-->
      <!--                                          {!! Form::label('gadventure_username', 'User Name') !!}-->
      <!--                                      </label>-->
      <!--                                  <div class="col-sm-5">                                           -->
      <!--                                      {!! Form::text('gadventure_username', $data->gadventure_username, array('class' => 'form-control', 'placeholder'=>'User name', 'id' => 'gadventure_username')) !!}-->
      <!--                                  </div>                                      -->
      <!--                              </div>-->
      <!--                              <div class="form-group form-group2">-->
      <!--                                  <label for="google_analytics" class="col-sm-3 control-label">-->
      <!--                                      {!! Form::label('gadventure_password', 'Password') !!}-->
      <!--                                  </label>-->
      <!--                                  <div class="col-sm-5">-->
      <!--                                      {!! Form::text('gadventure_password', $data->gadventure_password, array('class' => 'form-control', 'placeholder'=>'Password')) !!}-->
      <!--                                  </div>-->
      <!--                              </div>-->
      <!--                              <div class="form-group form-group2">-->
      <!--                                  <label for="google_analytics" class="col-sm-3 control-label">-->
      <!--                                      {!! Form::label('gadventure_link', 'API Link') !!}-->
      <!--                                  </label>-->
      <!--                                  <div class="col-sm-5">-->
      <!--                                      {!! Form::text('gadventure_link', $data->gadventure_link, array('class' => 'form-control', 'placeholder'=>'API link')) !!}-->
      <!--                                  </div>-->
      <!--                              </div>-->
      <!--                          </div>-->
      <!--                      </div>-->
      <!--                  </div>-->
      <!--                  <div class="col-sm-10">-->
      <!--                      <div class="panel panel-primary">-->
      <!--                          <div class="panel-heading">-->
      <!--                              <h4 class="panel-title">API: Multi Reisen</h4>-->
      <!--                          </div>-->
      <!--                          <div class="panel-body">-->
      <!--                              <div class="form-group form-group2">-->
      <!--                                  <label for="google_analytics" class="col-sm-3 control-label">-->
      <!--                                          {!! Form::label('multirisen_username', 'User Name') !!}-->
      <!--                                      </label>-->
      <!--                                  <div class="col-sm-5">                                           -->
      <!--                                      {!! Form::text('multirisen_username', $data->multirisen_username, array('class' => 'form-control', 'placeholder'=>'User name', 'id' => 'multirisen_username')) !!}-->
      <!--                                  </div>                                      -->
      <!--                              </div>-->
      <!--                              <div class="form-group form-group2">-->
      <!--                                  <label for="google_analytics" class="col-sm-3 control-label">-->
      <!--                                      {!! Form::label('multirisen_password', 'Password') !!}-->
      <!--                                  </label>-->
      <!--                                  <div class="col-sm-5">-->
      <!--                                      {!! Form::text('multirisen_password', $data->multirisen_password, array('class' => 'form-control', 'placeholder'=>'Password')) !!}-->
      <!--                                  </div>-->
      <!--                              </div>-->
      <!--                              <div class="form-group form-group2">-->
      <!--                                  <label for="google_analytics" class="col-sm-3 control-label">-->
      <!--                                      {!! Form::label('multirisen_link', 'API Link') !!}-->
      <!--                                  </label>-->
      <!--                                  <div class="col-sm-5">-->
      <!--                                      {!! Form::text('multirisen_link', $data->multirisen_link, array('class' => 'form-control', 'placeholder'=>'API link')) !!}-->
      <!--                                  </div>-->
      <!--                              </div>-->
      <!--                          </div>-->
      <!--                      </div>-->
      <!--                  </div>-->
      <!--                  <div class="col-sm-10">-->
      <!--                      <div class="panel panel-primary">-->
      <!--                          <div class="panel-heading">-->
      <!--                              <h4 class="panel-title">API: Surprice Car Rental</h4>-->
      <!--                          </div>-->
      <!--                          <div class="panel-body">-->
      <!--                              <div class="form-group form-group2">-->
      <!--                                  <label for="google_analytics" class="col-sm-3 control-label">-->
      <!--                                          {!! Form::label('sur_username', 'User Name') !!}-->
      <!--                                      </label>-->
      <!--                                  <div class="col-sm-5">                                           -->
      <!--                                      {!! Form::text('sur_username', $data->sur_username, array('class' => 'form-control', 'placeholder'=>'User name', 'id' => 'sur_username')) !!}-->
      <!--                                  </div>                                      -->
      <!--                              </div>-->
      <!--                              <div class="form-group form-group2">-->
      <!--                                  <label for="google_analytics" class="col-sm-3 control-label">-->
      <!--                                      {!! Form::label('sur_password', 'Password') !!}-->
      <!--                                  </label>-->
      <!--                                  <div class="col-sm-5">-->
      <!--                                      {!! Form::text('sur_password', $data->sur_password, array('class' => 'form-control', 'placeholder'=>'Password')) !!}-->
      <!--                                  </div>-->
      <!--                              </div>-->
      <!--                              <div class="form-group form-group2">-->
      <!--                                  <label for="google_analytics" class="col-sm-3 control-label">-->
      <!--                                      {!! Form::label('sur_link', 'API Link') !!}-->
      <!--                                  </label>-->
      <!--                                  <div class="col-sm-5">-->
      <!--                                      {!! Form::text('sur_link', $data->sur_link, array('class' => 'form-control', 'placeholder'=>'API link')) !!}-->
      <!--                                  </div>-->
      <!--                              </div>-->
      <!--                          </div>-->
      <!--                      </div>-->
      <!--                  </div>-->
						<!--<div class="col-sm-10">
							<div class="panel panel-primary">
								<div class="panel-heading">
									<h4 class="panel-title">Home: Four Blogs</h4>
								</div>
								<div class="panel-body">
									<div class="form-group form-group2">
										<label for="google_analytics" class="col-sm-3 control-label">
												{!! Form::label('image', 'Image') !!}
											</label>
										<div class="input-group">
											
											{!! Form::text('four_blogs_image', null, array('class' => 'form-control', 'placeholder'=>'Select image', 'id' => 'four_blogs_image')) !!}
											<span class="input-group-btn">
												<button data-select2-open="single-append-text" type="button" class="btn btn-default" data-target="#fileManager5" href="javascript:;" data-toggle="modal">
													<span class="glyphicon glyphicon-picture"></span>
												</button>
											</span>
											<div class="modal fade" id="fileManager5">  
											  <div class="modal-dialog" style="width:65%;">
												  <div class="modal-content">
													<div class="modal-header">
													  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													  <h4 class="modal-title">File Manager</h4>
													</div>
													<div class="modal-body" style="padding:0px; margin:0px;">
													  <iframe width="100%" height="500" src="{{ URL::to('assets/vendors/responsive-filemanager/filemanager/dialog.php?type=2&amp;field_id=four_blogs_image&amp;relative_url=1&amp;fldr=') }}" frameborder="0" style="overflow: scroll; overflow-x: hidden; overflow-y: scroll; "></iframe>
													</div>
												  </div>
											  </div>
											</div>
										</div>
										
									</div>
									<div class="form-group form-group2">
										<label for="google_analytics" class="col-sm-3 control-label">
											{!! Form::label('title-1', 'Title-1') !!}
										</label>
										<div class="input-group">
											{!! Form::text('four_blogs_title_1', $data->four_blogs_title_1, array('class' => 'form-control', 'placeholder'=>'Title-1')) !!}
										</div>
									</div>
									<div class="form-group form-group2">
										<label for="google_analytics" class="col-sm-3 control-label">
											{!! Form::label('link-1', 'Link-1') !!}
										</label>
										<div class="input-group">
											{!! Form::text('four_blogs_link_1', $data->four_blogs_link_1, array('class' => 'form-control', 'placeholder'=>'Link-1')) !!}
										</div>
									</div>
									<div class="form-group form-group2">
										<label for="google_analytics" class="col-sm-3 control-label">
											{!! Form::label('title-2', 'Title-2') !!}
										</label>
										<div class="input-group">
											{!! Form::text('four_blogs_title_2', $data->four_blogs_title_2, array('class' => 'form-control', 'placeholder'=>'Title-2')) !!}
										</div>
									</div>
									<div class="form-group form-group2">
										<label for="google_analytics" class="col-sm-3 control-label">
											{!! Form::label('link-2', 'Link-2') !!}
										</label>
										<div class="input-group">
											{!! Form::text('four_blogs_link_=2', $data->four_blogs_link_2, array('class' => 'form-control', 'placeholder'=>'Link-2')) !!}
										</div>
									</div>
									<div class="form-group form-group2">
										<label for="google_analytics" class="col-sm-3 control-label">
											{!! Form::label('title-3', 'Title-3') !!}
										</label>
										<div class="input-group">
											{!! Form::text('four_blogs_title_3', $data->four_blogs_title_3, array('class' => 'form-control', 'placeholder'=>'Title-3')) !!}
										</div>
									</div>
									<div class="form-group form-group2">
										<label for="google_analytics" class="col-sm-3 control-label">
											{!! Form::label('link-3', 'Link-3') !!}
										</label>
										<div class="input-group">
											{!! Form::text('four_blogs_link_3', $data->four_blogs_link_3, array('class' => 'form-control', 'placeholder'=>'Link-3')) !!}
										</div>
									</div>
									<div class="form-group form-group2">
										<label for="google_analytics" class="col-sm-3 control-label">
											{!! Form::label('title-4', 'Title-4') !!}
										</label>
										<div class="input-group">
											{!! Form::text('four_blogs_title_4', $data->four_blogs_title_4, array('class' => 'form-control', 'placeholder'=>'Title-4')) !!}
										</div>
									</div>
									<div class="form-group form-group2">
										<label for="google_analytics" class="col-sm-3 control-label">
											{!! Form::label('link-4', 'Link-4') !!}
										</label>
										<div class="input-group">
											{!! Form::text('four_blogs_link_4', $data->four_blogs_link_4, array('class' => 'form-control', 'placeholder'=>'Link-4')) !!}
										</div>
									</div>
									<div class="form-group form-group2">
										<label for="google_analytics" class="col-sm-3 control-label">
											{!! Form::label('text', 'Text') !!}
										</label>
										<div class="input-group">
											{!! Form::textarea('four_blogs_text', $data->four_blogs_text, array('class' => 'form-control', 'placeholder'=>'Text Here')) !!}
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="panel panel-primary">
								<div class="panel-heading">
									<h4 class="panel-title">Home: Three Blogs</h4>
								</div>
								<div class="panel-body">
									<div class="form-group form-group2">
										<label for="google_analytics" class="col-sm-3 control-label">
												{!! Form::label('image-1', 'Image-1') !!}
											</label>
										<div class="input-group">
											
											{!! Form::text('three_blogs_image_1', null, array('class' => 'form-control', 'placeholder'=>'Select image', 'id' => 'three_blogs_image_1')) !!}
											<span class="input-group-btn">
												<button data-select2-open="single-append-text" type="button" class="btn btn-default" data-target="#fileManager6" href="javascript:;" data-toggle="modal">
													<span class="glyphicon glyphicon-picture"></span>
												</button>
											</span>
											<div class="modal fade" id="fileManager6">  
											  <div class="modal-dialog" style="width:65%;">
												  <div class="modal-content">
													<div class="modal-header">
													  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													  <h4 class="modal-title">File Manager</h4>
													</div>
													<div class="modal-body" style="padding:0px; margin:0px;">
													  <iframe width="100%" height="500" src="{{ URL::to('assets/vendors/responsive-filemanager/filemanager/dialog.php?type=2&amp;field_id=three_blogs_image_1&amp;relative_url=1&amp;fldr=') }}" frameborder="0" style="overflow: scroll; overflow-x: hidden; overflow-y: scroll; "></iframe>
													</div>
												  </div>
											  </div>
											</div>
										</div>
										
									</div>
									<div class="form-group form-group2">
										<label for="google_analytics" class="col-sm-3 control-label">
											{!! Form::label('title-1', 'Title-1') !!}
										</label>
										<div class="input-group">
											{!! Form::text('three_blogs_title_1', $data->three_blogs_title_1, array('class' => 'form-control', 'placeholder'=>'Title-1')) !!}
										</div>
									</div>
									<div class="form-group form-group2">
										<label for="google_analytics" class="col-sm-3 control-label">
											{!! Form::label('link-1', 'Link-1') !!}
										</label>
										<div class="input-group">
											{!! Form::text('three_blogs_link_1', $data->three_blogs_link_1, array('class' => 'form-control', 'placeholder'=>'Link-1')) !!}
										</div>
									</div>
									<div class="form-group form-group2">
										<label for="google_analytics" class="col-sm-3 control-label">
												{!! Form::label('image-2', 'Image-2') !!}
											</label>
										<div class="input-group">
											
											{!! Form::text('three_blogs_image_2', null, array('class' => 'form-control', 'placeholder'=>'Select image', 'id' => 'three_blogs_image_2')) !!}
											<span class="input-group-btn">
												<button data-select2-open="single-append-text" type="button" class="btn btn-default" data-target="#fileManager7" href="javascript:;" data-toggle="modal">
													<span class="glyphicon glyphicon-picture"></span>
												</button>
											</span>
											<div class="modal fade" id="fileManager7">  
											  <div class="modal-dialog" style="width:65%;">
												  <div class="modal-content">
													<div class="modal-header">
													  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													  <h4 class="modal-title">File Manager</h4>
													</div>
													<div class="modal-body" style="padding:0px; margin:0px;">
													  <iframe width="100%" height="500" src="{{ URL::to('assets/vendors/responsive-filemanager/filemanager/dialog.php?type=2&amp;field_id=three_blogs_image_2&amp;relative_url=1&amp;fldr=') }}" frameborder="0" style="overflow: scroll; overflow-x: hidden; overflow-y: scroll; "></iframe>
													</div>
												  </div>
											  </div>
											</div>
										</div>
										
									</div>
									<div class="form-group form-group2">
										<label for="google_analytics" class="col-sm-3 control-label">
											{!! Form::label('title-2', 'Title-2') !!}
										</label>
										<div class="input-group">
											{!! Form::text('three_blogs_title_2', $data->three_blogs_title_2, array('class' => 'form-control', 'placeholder'=>'Title-2')) !!}
										</div>
									</div>
									<div class="form-group form-group2">
										<label for="google_analytics" class="col-sm-3 control-label">
											{!! Form::label('link-2', 'Link-2') !!}
										</label>
										<div class="input-group">
											{!! Form::text('three_blogs_link_=2', $data->three_blogs_link_2, array('class' => 'form-control', 'placeholder'=>'Link-2')) !!}
										</div>
									</div>
									<div class="form-group form-group2">
										<label for="google_analytics" class="col-sm-3 control-label">
												{!! Form::label('image-3', 'Image-3') !!}
											</label>
										<div class="input-group">
											
											{!! Form::text('three_blogs_image_3', null, array('class' => 'form-control', 'placeholder'=>'Select image', 'id' => 'three_blogs_image_3')) !!}
											<span class="input-group-btn">
												<button data-select2-open="single-append-text" type="button" class="btn btn-default" data-target="#fileManager8" href="javascript:;" data-toggle="modal">
													<span class="glyphicon glyphicon-picture"></span>
												</button>
											</span>
											<div class="modal fade" id="fileManager6">  
											  <div class="modal-dialog" style="width:65%;">
												  <div class="modal-content">
													<div class="modal-header">
													  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													  <h4 class="modal-title">File Manager</h4>
													</div>
													<div class="modal-body" style="padding:0px; margin:0px;">
													  <iframe width="100%" height="500" src="{{ URL::to('assets/vendors/responsive-filemanager/filemanager/dialog.php?type=2&amp;field_id=three_blogs_image_3&amp;relative_url=1&amp;fldr=') }}" frameborder="0" style="overflow: scroll; overflow-x: hidden; overflow-y: scroll; "></iframe>
													</div>
												  </div>
											  </div>
											</div>
										</div>
										
									</div>
									<div class="form-group form-group2">
										<label for="google_analytics" class="col-sm-3 control-label">
											{!! Form::label('title-3', 'Title-3') !!}
										</label>
										<div class="input-group">
											{!! Form::text('three_blogs_title_3', $data->three_blogs_title_3, array('class' => 'form-control', 'placeholder'=>'Title-3')) !!}
										</div>
									</div>
									<div class="form-group form-group2">
										<label for="google_analytics" class="col-sm-3 control-label">
											{!! Form::label('link-3', 'Link-3') !!}
										</label>
										<div class="input-group">
											{!! Form::text('three_blogs_link_3', $data->three_blogs_link_3, array('class' => 'form-control', 'placeholder'=>'Link-3')) !!}
										</div>
									</div>
									
								</div>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="panel panel-primary">
								<div class="panel-heading">
									<h4 class="panel-title">Home: SILENCE</h4>
								</div>
								<div class="panel-body">
									<div class="form-group form-group2">
										<label for="google_analytics" class="col-sm-3 control-label">
												{!! Form::label('image', 'Image') !!}
											</label>
										<div class="input-group">
											
											{!! Form::text('silence_image', null, array('class' => 'form-control', 'placeholder'=>'Select image', 'id' => 'silence_image')) !!}
											<span class="input-group-btn">
												<button data-select2-open="single-append-text" type="button" class="btn btn-default" data-target="#fileManager9" href="javascript:;" data-toggle="modal">
													<span class="glyphicon glyphicon-picture"></span>
												</button>
											</span>
											<div class="modal fade" id="fileManager9">  
											  <div class="modal-dialog" style="width:65%;">
												  <div class="modal-content">
													<div class="modal-header">
													  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													  <h4 class="modal-title">File Manager</h4>
													</div>
													<div class="modal-body" style="padding:0px; margin:0px;">
													  <iframe width="100%" height="500" src="{{ URL::to('assets/vendors/responsive-filemanager/filemanager/dialog.php?type=2&amp;field_id=silence_image&amp;relative_url=1&amp;fldr=') }}" frameborder="0" style="overflow: scroll; overflow-x: hidden; overflow-y: scroll; "></iframe>
													</div>
												  </div>
											  </div>
											</div>
										</div>
										
									</div>
									<div class="form-group form-group2">
										<label for="google_analytics" class="col-sm-3 control-label">
											{!! Form::label('heading', 'Heading') !!}
										</label>
										<div class="input-group">
											{!! Form::text('silence_heading', $data->silence_heading, array('class' => 'form-control', 'placeholder'=>'Heading')) !!}
										</div>
									</div>
									<div class="form-group form-group2">
										<label for="google_analytics" class="col-sm-3 control-label">
											{!! Form::label('text', 'Text') !!}
										</label>
										<div class="input-group">
											{!! Form::textarea('silence_text', $data->silence_text, array('class' => 'form-control', 'placeholder'=>'Text Here')) !!}
										</div>
									</div>
									<div class="form-group form-group2">
										<label for="google_analytics" class="col-sm-3 control-label">
											{!! Form::label('link', 'Link') !!}
										</label>
										<div class="input-group">
											{!! Form::text('silence_link', $data->silence_link, array('class' => 'form-control', 'placeholder'=>'Link')) !!}
										</div>
									</div>
								</div>
							</div>
						</div> -->
                        <!--
                        <div class="form-group {{ $errors->first('linkedin', 'has-error') }}">
                            <label for="linkedin" class="col-sm-3 control-label">
                                Authorize.net API Login ID
                            </label>
                            <div class="col-sm-5">
                                {!! Form::text('auth_api_login_id', $data->auth_api_login_id, array('class' => 'form-control', 'placeholder'=>'Authorize.net API Login ID')) !!}
                            </div>
                            <div class="col-sm-4">
                                {!! $errors->first('auth_api_login_id', '<span class="help-block">:message</span> ') !!}
                            </div>
                        </div>
                         <div class="form-group {{ $errors->first('linkedin', 'has-error') }}">
                            <label for="linkedin" class="col-sm-3 control-label">
                                Authorize.net Transaction Key
                            </label>
                            <div class="col-sm-5">
                                {!! Form::text('auth_trans_key', $data->auth_trans_key, array('class' => 'form-control', 'placeholder'=>'Authorize.net Transaction Key')) !!}
                            </div>
                            <div class="col-sm-4">
                                {!! $errors->first('auth_trans_key', '<span class="help-block">:message</span> ') !!}
                            </div>
                        </div>
                        <div class="form-group {{ $errors->first('linkedin', 'has-error') }}">
                            <label for="linkedin" class="col-sm-3 control-label">
                                Production/Sandbox
                            </label>
                           
                            <div class="col-sm-5">                                
                                {!! Form::select('auth_production',['0' => 'SANDBOX', '1' => 'PRODUCTION'] ,$data->auth_production, array('class' => 'form-control select2', 'placeholder'=>'Production/Sandbox'))!!}

                            </div>
                            <div class="col-sm-4">
                                {!! $errors->first('billing_unit', '<span class="help-block">:message</span> ') !!}
                            </div>
                        </div>
                        <div class="form-group {{ $errors->first('linkedin', 'has-error') }}">
                            <label for="linkedin" class="col-sm-3 control-label">
                                Membership/Management Fees
                            </label>
                            <div class="col-sm-5">
                                {!! Form::text('membership_fees', $data->membership_fees, array('class' => 'form-control', 'placeholder'=>'Membership/Management Fees')) !!}
                            </div>
                            <div class="col-sm-4">
                                {!! $errors->first('membership_fees', '<span class="help-block">:message</span> ') !!}
                            </div>
                        </div>
                        <div class="form-group {{ $errors->first('tax_rate', 'has-error') }}">
                            <label for="tax_rate" class="col-sm-3 control-label">
                                Tax Rate (%)
                            </label>
                            <div class="col-sm-5">
                                {!! Form::text('tax_rate', $data->tax_rate, array('class' => 'form-control', 'placeholder'=>'Tax Rate')) !!}
                            </div>
                            <div class="col-sm-4">
                            (charged on course membership purchase)
                                {!! $errors->first('tax_rate', '<span class="help-block">:message</span> ') !!}
                            </div>
                        </div>-->

                        <!--male size-->
                         

<!--                         <h4>SUBMIT AN ASSIGNMENT</h4>
                        <div class="form-group">
                            <label for="assignment_from_email" class="col-sm-3 control-label">
                                From
                            </label>
                            <div class="col-sm-5">
                                {!! Form::text('assignment_from_email', $data->assignment_from_email, array('class' => 'form-control', 'rows'=>'5', 'placeholder'=>'')) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="assignment_to_email" class="col-sm-3 control-label">
                                To
                            </label>
                            <div class="col-sm-5">
                                {!! Form::text('assignment_to_email', $data->assignment_to_email, array('class' => 'form-control', 'rows'=>'5', 'placeholder'=>'')) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="assignment_body" class="col-sm-3 control-label">
                                Body
                            </label>
                            <div class="col-sm-5">
                                {!! Form::textarea('assignment_body', $data->assignment_body, array('class' => 'form-control', 'rows'=>'5', 'placeholder'=>'')) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="assignment_automated" class="col-sm-3 control-label">
                                Automated Reply
                            </label>
                            <div class="col-sm-5">
                                {!! Form::textarea('assignment_automated', $data->assignment_automated, array('class' => 'form-control', 'rows'=>'5', 'placeholder'=>'')) !!}
                            </div>
                        </div>

                        <hr>

                        <h4>REQUEST A CV</h4>
                        <div class="form-group">
                            <label for="request_cv_from_email" class="col-sm-3 control-label">
                                From
                            </label>
                            <div class="col-sm-5">
                                {!! Form::text('request_cv_from_email', $data->request_cv_from_email, array('class' => 'form-control', 'rows'=>'5', 'placeholder'=>'')) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="request_cv_to_email" class="col-sm-3 control-label">
                                To
                            </label>
                            <div class="col-sm-5">
                                {!! Form::text('request_cv_to_email', $data->request_cv_to_email, array('class' => 'form-control', 'rows'=>'5', 'placeholder'=>'')) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="request_cv_body" class="col-sm-3 control-label">
                                Body
                            </label>
                            <div class="col-sm-5">
                                {!! Form::textarea('request_cv_body', $data->request_cv_body, array('class' => 'form-control', 'rows'=>'5', 'placeholder'=>'')) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="request_cv_automated" class="col-sm-3 control-label">
                                Automated Reply
                            </label>
                            <div class="col-sm-5">
                                {!! Form::textarea('request_cv_automated', $data->request_cv_automated, array('class' => 'form-control', 'rows'=>'5', 'placeholder'=>'')) !!}
                            </div>
                        </div> -->

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-4">
                                <a class="btn btn-danger" href="{{ route('theme_option') }}">
                                    @lang('button.cancel')
                                </a>
                                <button type="submit" class="btn btn-success">
                                    @lang('button.update')
                                </button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
				
            </div>
        </div>
    </div>
    <!-- row-->

<div id="member_programs3" class="member_programs3" style="display: none;">
        <a href="javascript:void(0);" class="delete_member_program3" style="color: red;font-size: 18px;position: absolute;top: -12px;right: -12px;"><i class="fa fa-times-circle"></i></a>
        <div class="panel-body">    
            <div class="form-group">
                {!! Form::label('male_shirt_sizes', 'Male Shirt Sizes') !!}
                {!! Form::text('male_shirt_sizes[]', null, array('class' => 'form-control', 'placeholder'=>'Male Shirt Sizes')) !!}
            </div>    
        </div>
</div> 
<div id="member_programs4" class="member_programs4" style="display: none;">
        <a href="javascript:void(0);" class="delete_member_program4" style="color: red;font-size: 18px;position: absolute;top: -12px;right: -12px;"><i class="fa fa-times-circle"></i></a>
        <div class="panel-body">    
            <div class="form-group">
                {!! Form::label('female_shirt_sizes', 'Female Shirt Sizes') !!}
                {!! Form::text('female_shirt_sizes[]', null, array('class' => 'form-control', 'placeholder'=>'Female Shirt Sizes')) !!}
            </div>    
        </div>
</div>     
</section>
@include('admin.layouts.modal_filemanager', $image_fields)
@stop

@section('footer_scripts')
    <script  src="{{ asset('assets/vendors/tinymce/js/tinymce/tinymce.min.js') }}"  type="text/javascript" ></script>
    <script src="{{ asset('assets/vendors/select2/select2.js') }}" type="text/javascript"></script>
     <script type="text/javascript">
    
        ///////////////////////////22222222222/////////////////////////
        var k2=600;
        $('.add_member_programs2').click(function(){
        
            var $klon = $('.member_programs3').clone();
        
            $($klon).find('div.mymodal').attr('id','fileManager'+k2);
            $($klon).find('button.btn').attr('data-target','#fileManager'+k2);
            $($klon).find('input.myinput').attr('id','placeholder_image'+k2);
            $($klon).find('textarea.ttt').attr('class','textarea22');          
            ////
            k2++;
            $('.member_program_section2').append('<div class="partition-blue" style="padding:10px;padding-top:15px;padding-bottom:5px;margin-bottom: 10px;">'+$klon.html()+'<div>');
                
            $('.delete_member_program3').click(function(){
                $(this).parent().remove();
            });
        });
        $('.delete_member_program3').click(function(){
            $(this).parent().remove();
        });

        //
        var k3=600;
        $('.add_member_programs3').click(function(){
        
            var $klon = $('.member_programs4').clone();
        
            $($klon).find('div.mymodal').attr('id','fileManager'+k3);
            $($klon).find('button.btn').attr('data-target','#fileManager'+k3);
            $($klon).find('input.myinput').attr('id','placeholder_image'+k3);
            $($klon).find('textarea.ttt').attr('class','textarea22');          
            ////
            k3++;
            $('.member_program_section3').append('<div class="partition-blue" style="padding:10px;padding-top:15px;padding-bottom:5px;margin-bottom: 10px;">'+$klon.html()+'<div>');
                
            $('.delete_member_program4').click(function(){
                $(this).parent().remove();
            });
        });
        $('.delete_member_program4').click(function(){
            $(this).parent().remove();
        });
    </script>
@stop