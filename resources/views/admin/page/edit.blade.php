@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
@lang('page/title.edit')
@parent
@stop

{{-- page level styles --}}
@section('header_styles')

    <link href="{{ asset('assets/vendors/select2/select2.min.css') }}" type="text/css" />
    <link href="{{ asset('assets/vendors/tags/dist/bootstrap-tagsinput.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/pages/blog.css') }}" rel="stylesheet" type="text/css">

    <!--end of page level css-->
@stop


{{-- Page content --}}
@section('content')
<section class="content-header">
    <!--section starts-->
    <h1>@lang('page/title.edit')</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}"> <i class="livicon" data-name="home" data-size="14" data-c="#000" data-loop="true"></i>
                Dashboard
            </a>
        </li>
        <li><a href="{{ route('pages') }}">Pages</a></li>
        <li class="active">@lang('page/title.edit')</li>
    </ol>
</section>
<!--section ends-->
<section class="content paddingleft_right15">
    <!--main content-->
    <div class="row">
        <div class="the-box no-border">
            <div class="has-error">
                {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
                {!! $errors->first('short_title', '<span class="help-block">:message</span>') !!}
                {!! $errors->first('order', '<span class="help-block">:message</span>') !!}
                {!! $errors->first('status', '<span class="help-block">:message</span>') !!}
                {!! $errors->first('content', '<span class="help-block">:message</span>') !!}
            </div>

            {!! Form::model($page, array('url' => URL::to('admin/page') . '/' . $page->id.'/edit', 'method' => 'post', 'class' => 'bf', 'id'=>'page_form', 'files'=> true)) !!}
                 <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            {!! Form::label('title', 'Page Title') !!}
                            {!! Form::text('title', null, array('class' => 'form-control input-lg', 'required' => 'required', 'placeholder'=>'Page title here... (Eg: Home Page)'))!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('short_title', 'Sub Title') !!}
                            {!! Form::text('short_title', null, array('class' => 'form-control input-md', 'required' => 'required', 'placeholder'=>'Page short title here... (Eg: Home)'))!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'Page Slug') !!}
                            {!! Form::text('slug', null, array('class' => 'form-control', 'required' => 'required', 'placeholder'=> URL::to('/your-page-name')))!!}
                        </div>
                        <div class="form-group career_content career_content_required">
                            {!! Form::label('career_open_position_text', 'Open Position Text') !!}
                            {!! Form::text('career_open_position_text', null, array('class' => 'form-control input-md', 'required' => 'required', 'placeholder'=>''))!!}
                        </div>
                        <div class="form-group career_content career_content_required">
                            {!! Form::label('career_open_position_url', 'Open Position URL') !!}
                            {!! Form::text('career_open_position_url', null, array('class' => 'form-control input-md', 'required' => 'required', 'placeholder'=>''))!!}
                        </div>
                        <div class='box-body pad'>
                            {!! Form::label('content', 'Page Content') !!}
                            {!! Form::textarea('content', null, array('class' => 'textarea form-control', 'rows'=>'5', 'placeholder'=>'Place some text here', 'style'=>'style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"')) !!}
                        </div>
                        <!--only teeshare membership program-->
                        <div class="onlyteesharemembershipprogram">
                        <div class="panel-body member_program_section">
                                <a href="javascript:void(0);" class="add_member_programs btn btn-info">Add New Section</a>
                                <br>
                                <br>
                                @if (!empty($program_imageData))
                                {{--*/ $s = 0; $m = 50; /*--}}
                                    @foreach ($program_imageData as $program_imageDatasingle)                                    
                                <div class="partition-blue" style="padding:10px;padding-top:15px;padding-bottom:5px;margin-bottom: 10px;">
                                    <a href="javascript:void(0);" class="delete_member_program" style="color: red;font-size: 18px;position: absolute;top: -12px;right: -12px;"><i class="fa fa-times-circle"></i></a>
                                    <div class="panel-body">
                                <div class="form-group">
                                    {!! Form::label('owner_image1', 'Program Image') !!}
                                    <div class="input-group">
                                        {!! Form::text('program_image[]', $program_imageDatasingle->program_image, array('class' => 'form-control myinput', 'placeholder'=>'Program Image', 'id' => 'program_image'.$m)) !!}
                                        <span class="input-group-btn">
                                            <button data-select2-open="single-append-text" type="button" class="btn btn-default" data-target="#fileManager{{--*/echo $m/*--}}" href="javascript:;" data-toggle="modal">
                                                <span class="glyphicon glyphicon-picture"></span>
                                            </button>
                                        </span>
                                    </div>
                                    (Image Size 328x130 in Dimensions)
                                </div>
                                
                            </div>
                            <div class="modal fade mymodal" id="fileManager{{--*/echo $m/*--}}">  
                                <div class="modal-dialog" style="width:65%;">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">File Manager</h4>
                                    </div>
                                    <div class="modal-body" style="padding:0px; margin:0px;">
                                        <iframe width="100%" height="500" src="{{ URL::to('assets/vendors/responsive-filemanager/filemanager/dialog.php?type=2&amp;field_id=program_image'.$m.'&amp;relative_url=1&amp;fldr=') }}" frameborder="0" style="overflow: scroll; overflow-x: hidden; overflow-y: scroll; "></iframe>
                                    </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                            {!! Form::label('program_heading', 'Program Title') !!}
                            {!! Form::text('program_heading[]', $program_headingData[$s]->program_heading, array('class' => 'form-control',  'placeholder'=> ''))!!}
                            </div>
                            <div class="form-group">
                            {!! Form::label('program_link', 'Program Link') !!}
                            {!! Form::text('program_link[]', isset($program_linkData[$s]->program_link)?$program_linkData[$s]->program_link:'', array('class' => 'form-control',  'placeholder'=> ''))!!}
                            </div>

                            <div class='box-body pad'>
                            {!! Form::label('program_text', 'Program Text') !!}
                            {!! Form::textarea('program_text[]', $program_textData[$s]->program_text, array('class' => 'form-control', 'rows'=>'5', 'placeholder'=>'Place some text here', 'style'=>'style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"')) !!}
                            </div>
                            
                            <div class="form-group">
                            {!! Form::label('program_sorting', 'Program Sorting') !!}
                            {!! Form::text('program_sorting[]', isset($program_sortingData[$s]->program_sorting)?$program_sortingData[$s]->program_sorting:'', array('class' => 'form-control',  'placeholder'=> ''))!!}
                            </div>

                                </div>
                                {{--*/ $s++; $m++; /*--}}
                                @endforeach
                                @endif



                            </div>
                        </div>
                        <!--only teeshare membership program-->
                        <!--only owner opportunity-->
                        <div class="onlyowneropportunity">

                            <div class='box-body pad'>
                            {!! Form::label('owner_text1', 'Owner Opportunity Section 1 Text') !!}
                            {!! Form::textarea('owner_text1', null, array('class' => 'textarea form-control', 'rows'=>'5', 'placeholder'=>'Place some text here', 'style'=>'style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"')) !!}
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    {!! Form::label('owner_image1', 'Owner Opportunity Section 1 Image') !!}
                                    <div class="input-group">
                                        {!! Form::text('owner_image1', null, array('class' => 'form-control', 'placeholder'=>'Owner Opportunity Section 1 Image', 'id' => 'owner_image1')) !!}
                                        <span class="input-group-btn">
                                            <button data-select2-open="single-append-text" type="button" class="btn btn-default" data-target="#fileManager17" href="javascript:;" data-toggle="modal">
                                                <span class="glyphicon glyphicon-picture"></span>
                                            </button>
                                        </span>
                                    </div>
                                    (Image Size 328x130 in Dimensions)
                                </div>
                                @if ($page->owner_image1)
                                    <div class="form-group">
                                       {!! HTML::image('/uploads/source/'.$page->owner_image1, '', array('style' => 'max-width:300px')) !!}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                            {!! Form::label('slug', 'Owner Opportunity Section 1 Image Text') !!}
                            {!! Form::text('owner_image_heading1', null, array('class' => 'form-control',  'placeholder'=> ''))!!}
                            </div>

                            <div class='box-body pad'>
                            {!! Form::label('owner_text2', 'Owner Opportunity Section 2 Text') !!}
                            {!! Form::textarea('owner_text2', null, array('class' => 'textarea form-control', 'rows'=>'5', 'placeholder'=>'Place some text here', 'style'=>'style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"')) !!}
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    {!! Form::label('owner_image2', 'Owner Opportunity Section 2 Image') !!}
                                    <div class="input-group">
                                        {!! Form::text('owner_image2', null, array('class' => 'form-control', 'placeholder'=>'Owner Opportunity Section 2 Image', 'id' => 'owner_image2')) !!}
                                        <span class="input-group-btn">
                                            <button data-select2-open="single-append-text" type="button" class="btn btn-default" data-target="#fileManager18" href="javascript:;" data-toggle="modal">
                                                <span class="glyphicon glyphicon-picture"></span>
                                            </button>
                                        </span>
                                    </div>
                                    (Image Size 328x130 in Dimensions)
                                </div>
                                @if ($page->owner_image2)
                                    <div class="form-group">
                                       {!! HTML::image('/uploads/source/'.$page->owner_image2, '', array('style' => 'max-width:300px')) !!}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                            {!! Form::label('owner_image_heading2', 'Owner Opportunity Section 2 Image Text') !!}
                            {!! Form::text('owner_image_heading2', null, array('class' => 'form-control',  'placeholder'=> ''))!!}
                            </div>
                            <div class="form-group">
                            {!! Form::label('owner_image_text2', 'Owner Opportunity Section 2 Image Sub Text') !!}
                            {!! Form::text('owner_image_text2', null, array('class' => 'form-control',  'placeholder'=> ''))!!}
                            </div>

                            <div class='box-body pad'>
                            {!! Form::label('owner_text3', 'Owner Opportunity Section 3 Text') !!}
                            {!! Form::textarea('owner_text3', null, array('class' => 'textarea form-control', 'rows'=>'5', 'placeholder'=>'Place some text here', 'style'=>'style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"')) !!}
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    {!! Form::label('owner_image3', 'Owner Opportunity Section 3 Image') !!}
                                    <div class="input-group">
                                        {!! Form::text('owner_image3', null, array('class' => 'form-control', 'placeholder'=>'Owner Opportunity Section 3 Image', 'id' => 'owner_image3')) !!}
                                        <span class="input-group-btn">
                                            <button data-select2-open="single-append-text" type="button" class="btn btn-default" data-target="#fileManager19" href="javascript:;" data-toggle="modal">
                                                <span class="glyphicon glyphicon-picture"></span>
                                            </button>
                                        </span>
                                    </div>
                                    (Image Size 328x130 in Dimensions)
                                </div>
                                @if ($page->owner_image3)
                                    <div class="form-group">
                                       {!! HTML::image('/uploads/source/'.$page->owner_image3, '', array('style' => 'max-width:300px')) !!}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                            {!! Form::label('owner_image_heading3', 'Owner Opportunity Section 3 Image Text') !!}
                            {!! Form::text('owner_image_heading3', null, array('class' => 'form-control',  'placeholder'=> ''))!!}
                            </div>

                            <div class="form-group">
                            {!! Form::label('owner_video_text', 'Owner Opportunity Video Text') !!}
                            {!! Form::text('owner_video_text', null, array('class' => 'form-control',  'placeholder'=> ''))!!}
                            </div>

                            <div class="form-group">
                            {!! Form::label('owner_video_link', 'Owner Opportunity Video Link') !!}
                            {!! Form::text('owner_video_link', null, array('class' => 'form-control',  'placeholder'=> ''))!!}
                            </div>

                            <div class="form-group">
                            {!! Form::label('owner_video_email', 'Owner Opportunity Video Email') !!}
                            {!! Form::text('owner_video_email', null, array('class' => 'form-control',  'placeholder'=> ''))!!}
                            </div>

                            <div class="form-group">
                            {!! Form::label('owner_video_phone', 'Owner Opportunity Video Phone') !!}
                            {!! Form::text('owner_video_phone', null, array('class' => 'form-control',  'placeholder'=> ''))!!}
                            </div>

                        </div>
                        <!--only owner opportunity-->

                        <div class="onlyabout">
                         <div class="form-group">
                            {!! Form::label('slug', 'About Banner Text') !!}
                            {!! Form::text('about_banner_text', null, array('class' => 'form-control',  'placeholder'=> ''))!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'About Banner Text2') !!}
                            {!! Form::text('about_banner_text2', null, array('class' => 'form-control',  'placeholder'=> ''))!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'About Banner Video Button Text') !!}
                            {!! Form::text('about_banner_video_button_text', null, array('class' => 'form-control',  'placeholder'=> ''))!!}
                        </div>
                         <div class="form-group">
                            {!! Form::label('slug', 'About Banner Video Link') !!}
                            {!! Form::text('about_banner_video_link', null, array('class' => 'form-control',  'placeholder'=> ''))!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'About Section 1 Heading') !!}
                            {!! Form::text('about_text1', null, array('class' => 'form-control',  'placeholder'=> ''))!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'About Section 1 Heading2') !!}
                            {!! Form::text('about_text2', null, array('class' => 'form-control',  'placeholder'=> ''))!!}
                        </div>
                       
                        <div class="panel-body">
                            <div class="form-group">
                                {!! Form::label('about_placeholder1', 'About Section 1 Placeholder') !!}
                                <div class="input-group">
                                    {!! Form::text('about_placeholder1', null, array('class' => 'form-control', 'placeholder'=>'About Section 1 Placeholder', 'id' => 'about_placeholder1')) !!}
                                    <span class="input-group-btn">
                                        <button data-select2-open="single-append-text" type="button" class="btn btn-default" data-target="#fileManager6" href="javascript:;" data-toggle="modal">
                                            <span class="glyphicon glyphicon-picture"></span>
                                        </button>
                                    </span>
                                </div>
                                (Image Size 328x130 in Dimensions)
                            </div>
                            @if ($page->about_placeholder1)
                                <div class="form-group">
                                    {!! HTML::image('/uploads/source/'.$page->about_placeholder1, '', array('style' => 'max-width:300px')) !!}
                                </div>
                            @endif
                        </div>
                        <div class='box-body pad'>
                        {!! Form::label('about_text3', 'About Section 1 Text') !!}
                        {!! Form::textarea('about_text3', null, array('class' => 'textarea form-control', 'rows'=>'5', 'placeholder'=>'Place some text here', 'style'=>'style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"')) !!}
                        </div>

                        <div class="form-group">
                        {!! Form::label('slug', 'About Section 2 Heading') !!}
                        {!! Form::text('about_text4', null, array('class' => 'form-control',  'placeholder'=> ''))!!}
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                {!! Form::label('about_placeholder2', 'About Section 2 Placeholder') !!}
                                <div class="input-group">
                                    {!! Form::text('about_placeholder2', null, array('class' => 'form-control', 'placeholder'=>'About Section 2 Placeholder', 'id' => 'about_placeholder2')) !!}
                                    <span class="input-group-btn">
                                        <button data-select2-open="single-append-text" type="button" class="btn btn-default" data-target="#fileManager7" href="javascript:;" data-toggle="modal">
                                            <span class="glyphicon glyphicon-picture"></span>
                                        </button>
                                    </span>
                                </div>
                                (Image Size 328x130 in Dimensions)
                            </div>
                            @if ($page->about_placeholder2)
                                <div class="form-group">
                                    {!! HTML::image('/uploads/source/'.$page->about_placeholder2, '', array('style' => 'max-width:300px')) !!}
                                </div>
                            @endif
                        </div>
                        <div class='box-body pad'>
                        {!! Form::label('about_text5', 'About Section 2 Text') !!}
                        {!! Form::textarea('about_text5', null, array('class' => 'textarea form-control', 'rows'=>'5', 'placeholder'=>'Place some text here', 'style'=>'style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"')) !!}
                        </div>

                        <!---section3-->
                        <div class="form-group">
                        {!! Form::label('slug', 'About Section 3 Heading') !!}
                        {!! Form::text('about_text6', null, array('class' => 'form-control',  'placeholder'=> ''))!!}
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                {!! Form::label('about_image1', 'About Section 3 Image1') !!}
                                <div class="input-group">
                                    {!! Form::text('about_image1', null, array('class' => 'form-control', 'placeholder'=>'About Section 3 Image1', 'id' => 'about_image1')) !!}
                                    <span class="input-group-btn">
                                        <button data-select2-open="single-append-text" type="button" class="btn btn-default" data-target="#fileManager8" href="javascript:;" data-toggle="modal">
                                            <span class="glyphicon glyphicon-picture"></span>
                                        </button>
                                    </span>
                                </div>
                                (Image Size 263x175 in Dimensions)
                            </div>
                            @if ($page->about_image1)
                                <div class="form-group">
                                    {!! HTML::image('/uploads/source/'.$page->about_image1, '', array('style' => 'max-width:300px')) !!}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'About Section 3 Heading1') !!}
                            {!! Form::text('about_head1', null, array('class' => 'form-control',  'placeholder'=> ''))!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'About Section 3 Text1') !!}
                            {!! Form::text('about_text11', null, array('class' => 'form-control',  'placeholder'=> ''))!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'About Section 3 Link1') !!}
                            {!! Form::text('about_link1', null, array('class' => 'form-control',  'placeholder'=> ''))!!}
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                {!! Form::label('about_image2', 'About Section 3 Image2') !!}
                                <div class="input-group">
                                    {!! Form::text('about_image2', null, array('class' => 'form-control', 'placeholder'=>'About Section 3 Image2', 'id' => 'about_image2')) !!}
                                    <span class="input-group-btn">
                                        <button data-select2-open="single-append-text" type="button" class="btn btn-default" data-target="#fileManager9" href="javascript:;" data-toggle="modal">
                                            <span class="glyphicon glyphicon-picture"></span>
                                        </button>
                                    </span>
                                </div>
                                (Image Size 263x175 in Dimensions)
                            </div>
                            @if ($page->about_image2)
                                <div class="form-group">
                                    {!! HTML::image('/uploads/source/'.$page->about_image2, '', array('style' => 'max-width:300px')) !!}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'About Section 3 Heading2') !!}
                            {!! Form::text('about_head2', null, array('class' => 'form-control',  'placeholder'=> ''))!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'About Section 3 Text2') !!}
                            {!! Form::text('about_text22', null, array('class' => 'form-control',  'placeholder'=> ''))!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'About Section 3 Link2') !!}
                            {!! Form::text('about_link2', null, array('class' => 'form-control',  'placeholder'=> ''))!!}
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                {!! Form::label('about_image3', 'About Section 3 Image3') !!}
                                <div class="input-group">
                                    {!! Form::text('about_image3', null, array('class' => 'form-control', 'placeholder'=>'About Section 3 Image3', 'id' => 'about_image3')) !!}
                                    <span class="input-group-btn">
                                        <button data-select2-open="single-append-text" type="button" class="btn btn-default" data-target="#fileManager10" href="javascript:;" data-toggle="modal">
                                            <span class="glyphicon glyphicon-picture"></span>
                                        </button>
                                    </span>
                                </div>
                                (Image Size 263x175 in Dimensions)
                            </div>
                            @if ($page->about_image3)
                                <div class="form-group">
                                    {!! HTML::image('/uploads/source/'.$page->about_image3, '', array('style' => 'max-width:300px')) !!}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'About Section 3 Heading3') !!}
                            {!! Form::text('about_head3', null, array('class' => 'form-control',  'placeholder'=> ''))!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'About Section 3 Text1') !!}
                            {!! Form::text('about_text33', null, array('class' => 'form-control',  'placeholder'=> ''))!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'About Section 3 Link3') !!}
                            {!! Form::text('about_link3', null, array('class' => 'form-control',  'placeholder'=> ''))!!}
                        </div>


                        <!---section3-->
                        <!---section4-->
                        <div class="form-group">
                            {!! Form::label('slug', 'About Section 4 Heading') !!}
                            {!! Form::text('about_text7', null, array('class' => 'form-control',  'placeholder'=> ''))!!}
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                {!! Form::label('about_image4', 'About Section 4 Image1') !!}
                                <div class="input-group">
                                    {!! Form::text('about_image4', null, array('class' => 'form-control', 'placeholder'=>'About Section 4 Image1', 'id' => 'about_image4')) !!}
                                    <span class="input-group-btn">
                                        <button data-select2-open="single-append-text" type="button" class="btn btn-default" data-target="#fileManager11" href="javascript:;" data-toggle="modal">
                                            <span class="glyphicon glyphicon-picture"></span>
                                        </button>
                                    </span>
                                </div>
                                (Image Size 263x175 in Dimensions)
                            </div>
                            @if ($page->about_image4)
                                <div class="form-group">
                                    {!! HTML::image('/uploads/source/'.$page->about_image4, '', array('style' => 'max-width:300px')) !!}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'About Section 4 Heading1') !!}
                            {!! Form::text('about_text44', null, array('class' => 'form-control',  'placeholder'=> ''))!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'About Section 4 Link1') !!}
                            {!! Form::text('about_link4', null, array('class' => 'form-control',  'placeholder'=> ''))!!}
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                {!! Form::label('about_image5', 'About Section 4 Image2') !!}
                                <div class="input-group">
                                    {!! Form::text('about_image5', null, array('class' => 'form-control', 'placeholder'=>'About Section 4 Image1', 'id' => 'about_image5')) !!}
                                    <span class="input-group-btn">
                                        <button data-select2-open="single-append-text" type="button" class="btn btn-default" data-target="#fileManager12" href="javascript:;" data-toggle="modal">
                                            <span class="glyphicon glyphicon-picture"></span>
                                        </button>
                                    </span>
                                </div>
                                (Image Size 263x175 in Dimensions)
                            </div>
                            @if ($page->about_image5)
                                <div class="form-group">
                                    {!! HTML::image('/uploads/source/'.$page->about_image5, '', array('style' => 'max-width:300px')) !!}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'About Section 4 Heading2') !!}
                            {!! Form::text('about_text55', null, array('class' => 'form-control',  'placeholder'=> ''))!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'About Section 4 Link2') !!}
                            {!! Form::text('about_link5', null, array('class' => 'form-control',  'placeholder'=> ''))!!}
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                {!! Form::label('about_image6', 'About Section 4 Image3') !!}
                                <div class="input-group">
                                    {!! Form::text('about_image6', null, array('class' => 'form-control', 'placeholder'=>'About Section 4 Image3', 'id' => 'about_image6')) !!}
                                    <span class="input-group-btn">
                                        <button data-select2-open="single-append-text" type="button" class="btn btn-default" data-target="#fileManager13" href="javascript:;" data-toggle="modal">
                                            <span class="glyphicon glyphicon-picture"></span>
                                        </button>
                                    </span>
                                </div>
                                (Image Size 263x175 in Dimensions)
                            </div>
                            @if ($page->about_image6)
                                <div class="form-group">
                                    {!! HTML::image('/uploads/source/'.$page->about_image6, '', array('style' => 'max-width:300px')) !!}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'About Section 4 Heading3') !!}
                            {!! Form::text('about_text66', null, array('class' => 'form-control',  'placeholder'=> ''))!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'About Section 4 Link3') !!}
                            {!! Form::text('about_link6', null, array('class' => 'form-control',  'placeholder'=> ''))!!}
                        </div>


                        <!---section4-->
                        <!---section5-->
                        <div class="form-group">
                            {!! Form::label('slug', 'About Section 5 Heading') !!}
                            {!! Form::text('about_text8', null, array('class' => 'form-control',  'placeholder'=> ''))!!}
                        </div>
                        <div class='box-body pad'>
                            {!! Form::label('about_text9', 'About Section 5 Text') !!}
                            {!! Form::textarea('about_text9', null, array('class' => 'textarea form-control', 'rows'=>'5', 'placeholder'=>'Place some text here', 'style'=>'style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"')) !!}
                        </div>
                        <!---section5-->
                        <!---section6-->
                        
                        <div class='box-body pad'>
                            {!! Form::label('about_text10', 'About Section 6 Text') !!}
                            {!! Form::textarea('about_text10', null, array('class' => 'textarea form-control', 'rows'=>'5', 'placeholder'=>'Place some text here', 'style'=>'style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"')) !!}
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                {!! Form::label('about_image7', 'About Section 6 Image1') !!}
                                <div class="input-group">
                                    {!! Form::text('about_image7', null, array('class' => 'form-control', 'placeholder'=>'About Section 6 Image1', 'id' => 'about_image7')) !!}
                                    <span class="input-group-btn">
                                        <button data-select2-open="single-append-text" type="button" class="btn btn-default" data-target="#fileManager14" href="javascript:;" data-toggle="modal">
                                            <span class="glyphicon glyphicon-picture"></span>
                                        </button>
                                    </span>
                                </div>
                                (Image Size 263x175 in Dimensions)
                            </div>
                            @if ($page->about_image7)
                                <div class="form-group">
                                    {!! HTML::image('/uploads/source/'.$page->about_image7, '', array('style' => 'max-width:300px')) !!}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'About Section 6 Heading1') !!}
                            {!! Form::text('about_text77', null, array('class' => 'form-control',  'placeholder'=> ''))!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'About Section 6 Link1') !!}
                            {!! Form::text('about_link7', null, array('class' => 'form-control',  'placeholder'=> ''))!!}
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                {!! Form::label('about_image8', 'About Section 6 Image2') !!}
                                <div class="input-group">
                                    {!! Form::text('about_image8', null, array('class' => 'form-control', 'placeholder'=>'About Section 6 Image2', 'id' => 'about_image8')) !!}
                                    <span class="input-group-btn">
                                        <button data-select2-open="single-append-text" type="button" class="btn btn-default" data-target="#fileManager15" href="javascript:;" data-toggle="modal">
                                            <span class="glyphicon glyphicon-picture"></span>
                                        </button>
                                    </span>
                                </div>
                                (Image Size 263x175 in Dimensions)
                            </div>
                            @if ($page->about_image8)
                                <div class="form-group">
                                    {!! HTML::image('/uploads/source/'.$page->about_image8, '', array('style' => 'max-width:300px')) !!}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'About Section 6 Heading2') !!}
                            {!! Form::text('about_text88', null, array('class' => 'form-control',  'placeholder'=> ''))!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'About Section 6 Link2') !!}
                            {!! Form::text('about_link8', null, array('class' => 'form-control',  'placeholder'=> ''))!!}
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                {!! Form::label('about_image9', 'About Section 6 Image3') !!}
                                <div class="input-group">
                                    {!! Form::text('about_image9', null, array('class' => 'form-control', 'placeholder'=>'About Section 4 Image3', 'id' => 'about_image9')) !!}
                                    <span class="input-group-btn">
                                        <button data-select2-open="single-append-text" type="button" class="btn btn-default" data-target="#fileManager16" href="javascript:;" data-toggle="modal">
                                            <span class="glyphicon glyphicon-picture"></span>
                                        </button>
                                    </span>
                                </div>
                                (Image Size 263x175 in Dimensions)
                            </div>
                            @if ($page->about_image9)
                                <div class="form-group">
                                    {!! HTML::image('/uploads/source/'.$page->about_image9, '', array('style' => 'max-width:300px')) !!}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'About Section 6 Heading3') !!}
                            {!! Form::text('about_text99', null, array('class' => 'form-control',  'placeholder'=> ''))!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'About Section 6 Link3') !!}
                            {!! Form::text('about_link9', null, array('class' => 'form-control',  'placeholder'=> ''))!!}
                        </div>
                        <!---section6-->

                        </div>



                        <div class="onlyhome">
                        <div class="form-group">
                            {!! Form::label('home_button_text', 'Home Button Text (Yellow Area)') !!}
                            {!! Form::text('home_button_text', null, array('class' => 'form-control', 'placeholder'=> ''))!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('home_button_link', 'Home Button Link (Yellow Area)') !!}
                            {!! Form::text('home_button_link', null, array('class' => 'form-control', 'placeholder'=> ''))!!}
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                {!! Form::label('image1', 'Home Image1') !!}
                                <div class="input-group">
                                    {!! Form::text('imageh1', null, array('class' => 'form-control', 'placeholder'=>'Select home image1', 'id' => 'imageh1')) !!}
                                    <span class="input-group-btn">
                                        <button data-select2-open="single-append-text" type="button" class="btn btn-default" data-target="#fileManager2" href="javascript:;" data-toggle="modal">
                                            <span class="glyphicon glyphicon-picture"></span>
                                        </button>
                                    </span>
                                </div>
                                (Image Size 263x175 in Dimensions)
                            </div>
                            @if ($page->imageh1)
                                <div class="form-group">
                                    {!! HTML::image('/uploads/source/'.$page->imageh1, '', array('style' => 'max-width:300px')) !!}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'Home Heading1') !!}
                            {!! Form::text('homehead1', null, array('class' => 'form-control', 'placeholder'=> ''))!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'Home Text1') !!}
                            {!! Form::text('hometext1', null, array('class' => 'form-control', 'placeholder'=> ''))!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('homelink1', 'Home Link1') !!}
                            {!! Form::text('homelink1', null, array('class' => 'form-control', 'placeholder'=> ''))!!}
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                {!! Form::label('image2', 'Home Image2') !!}
                                <div class="input-group">
                                    {!! Form::text('imageh2', null, array('class' => 'form-control', 'placeholder'=>'Select home image2', 'id' => 'imageh2')) !!}
                                    <span class="input-group-btn">
                                        <button data-select2-open="single-append-text" type="button" class="btn btn-default" data-target="#fileManager3" href="javascript:;" data-toggle="modal">
                                            <span class="glyphicon glyphicon-picture"></span>
                                        </button>
                                    </span>
                                </div>
                                (Image Size 263x175 in Dimensions)
                            </div>
                            @if ($page->imageh2)
                                <div class="form-group">
                                    {!! HTML::image('/uploads/source/'.$page->imageh2, '', array('style' => 'max-width:300px')) !!}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'Home Heading2') !!}
                            {!! Form::text('homehead2', null, array('class' => 'form-control', 'placeholder'=> ''))!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'Home Text2') !!}
                            {!! Form::text('hometext2', null, array('class' => 'form-control', 'placeholder'=> ''))!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('homelink2', 'Home Link2') !!}
                            {!! Form::text('homelink2', null, array('class' => 'form-control', 'placeholder'=> ''))!!}
                        </div>
                        <div class="panel-body">
                                <div class="form-group">
                                    {!! Form::label('image3', 'Home Image3') !!}
                                    <div class="input-group">
                                        {!! Form::text('imageh3', null, array('class' => 'form-control', 'placeholder'=>'Select home image3', 'id' => 'imageh3')) !!}
                                        <span class="input-group-btn">
                                            <button data-select2-open="single-append-text" type="button" class="btn btn-default" data-target="#fileManager4" href="javascript:;" data-toggle="modal">
                                                <span class="glyphicon glyphicon-picture"></span>
                                            </button>
                                        </span>
                                    </div>
                                    (Image Size 263x175 in Dimensions)
                                </div>
                                @if ($page->imageh3)
                                    <div class="form-group">
                                       {!! HTML::image('/uploads/source/'.$page->imageh3, '', array('style' => 'max-width:300px')) !!}
                                    </div>
                                @endif
                            </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'Home Heading3') !!}
                            {!! Form::text('homehead3', null, array('class' => 'form-control', 'placeholder'=> ''))!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'Home Text3') !!}
                            {!! Form::text('hometext3', null, array('class' => 'form-control',  'placeholder'=> ''))!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('homelink3', 'Home Link3') !!}
                            {!! Form::text('homelink3', null, array('class' => 'form-control', 'placeholder'=> ''))!!}
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                {!! Form::label('image4', 'Home Image4') !!}
                                <div class="input-group">
                                    {!! Form::text('imageh4', null, array('class' => 'form-control', 'placeholder'=>'Select home image4', 'id' => 'imageh4')) !!}
                                    <span class="input-group-btn">
                                        <button data-select2-open="single-append-text" type="button" class="btn btn-default" data-target="#fileManager5" href="javascript:;" data-toggle="modal">
                                            <span class="glyphicon glyphicon-picture"></span>
                                        </button>
                                    </span>
                                </div>
                                (Image Size 263x175 in Dimensions)
                            </div>
                            @if ($page->imageh4)
                                <div class="form-group">
                                    {!! HTML::image('/uploads/source/'.$page->imageh4, '', array('style' => 'max-width:300px')) !!}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'Home Heading4') !!}
                            {!! Form::text('homehead4', null, array('class' => 'form-control', 'placeholder'=> ''))!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'Home Text4') !!}
                            {!! Form::text('hometext4', null, array('class' => 'form-control',  'placeholder'=> ''))!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('homelink4', 'Home Link4') !!}
                            {!! Form::text('homelink4', null, array('class' => 'form-control', 'placeholder'=> ''))!!}
                        </div>

                        </div> <!--onlyhome-->

                        <div class='box-body pad home2'>
                            {!! Form::label('home_content2', 'Page Content 2') !!}
                            {!! Form::textarea('home_content2', null, array('class' => 'textarea form-control', 'rows'=>'5', 'placeholder'=>'Place some text here', 'style'=>'style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"')) !!}
                        </div>
                        <div class='form-group golf'>
                        <br>
                            {!! Form::label('overview', 'Page Overview') !!}
                            {!! Form::textarea('overview', null, array('class' => 'textarea form-control', 'rows'=>'5', 'placeholder'=>'Place some text here', 'style'=>'style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"')) !!}
                        </div>
                        <br>
                        <div class='box-body pad career_content'>
                            {!! Form::label('career_content', 'Career Content') !!}
                            {!! Form::textarea('career_content', null, array('class' => 'textarea form-control', 'rows'=>'5', 'placeholder'=>'Place some text here', 'style'=>'style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"')) !!}
                        </div>
                        <br>
                        <div class='box-body pad career_content2'>
                            {!! Form::label('career_content2', 'Career Bottom Content') !!}
                            {!! Form::textarea('career_content2', null, array('class' => 'textarea form-control', 'rows'=>'5', 'placeholder'=>'Place some text here', 'style'=>'style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"')) !!}
                        </div>
                        <br>
                        <div class="career_content">
                            <div class="form-group">
                                {!! Form::label('career_content_image', 'Career Content Image') !!}
                                <div class="input-group">
                                    {!! Form::text('career_content_image', null, array('class' => 'form-control', 'placeholder'=>'Career Content Image')) !!}
                                    <span class="input-group-btn">
                                        <button data-select2-open="single-append-text" type="button" class="btn btn-default" data-target="#fileManager2" href="javascript:;" data-toggle="modal">
                                            <span class="glyphicon glyphicon-picture"></span>
                                        </button>
                                    </span>
                                </div>
                                (Image Size 360x265 in Dimensions)
                            </div>
                            @if ($page->career_content_image)
                                <div class="form-group">
                                    <img style="max-width:100%;" src="{{ Thumb::url('/uploads/source/'.$page->career_content_image,360,0) }}" />
                                </div>
                            @endif
                        </div>
                        <br>
                        <div class="career_content">
                            <div class="form-group">
                                {!! Form::label('equal_opportunity_background', 'Equal Opportunity Background Image') !!}
                                <div class="input-group">
                                    {!! Form::text('equal_opportunity_background', null, array('class' => 'form-control', 'placeholder'=>'Equal Opportunity Background Image')) !!}
                                    <span class="input-group-btn">
                                        <button data-select2-open="single-append-text" type="button" class="btn btn-default" data-target="#fileManager1" href="javascript:;" data-toggle="modal">
                                            <span class="glyphicon glyphicon-picture"></span>
                                        </button>
                                    </span>
                                </div>
                                (Image Size 1600x475 in Dimensions)
                            </div>
                            @if ($page->equal_opportunity_background)
                                <div class="form-group">
                                    <img style="max-width:100%;" src="{{ Thumb::url('/uploads/source/'.$page->equal_opportunity_background,360,0) }}" />
                                </div>
                            @endif
                        </div>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Publish</button>
                            <a href="{!! URL::to('admin/page') !!}" class="btn btn-danger">Discard</a>
                        </div>
                    </div>
                    <!-- /.col-sm-8 -->
                    <div class="col-sm-4">
                        <!-- <div class="panel ">
                            <a disabled="disabled" id="page_preview" class="btn btn-block btn-md btn-primary"><span class="glyphicon glyphicon-eye-open"></span> Preview</a>
                        </div> -->
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">Banner Image</h4>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    {!! Form::label('image', 'Page Image') !!}
                                    <div class="input-group">
                                        {!! Form::text('image', null, array('class' => 'form-control', 'placeholder'=>'Select page image')) !!}
                                        <span class="input-group-btn">
                                            <button data-select2-open="single-append-text" type="button" class="btn btn-default" data-target="#fileManager0" href="javascript:;" data-toggle="modal">
                                                <span class="glyphicon glyphicon-picture"></span>
                                            </button>
                                        </span>
                                    </div>
                                    (Image Size 1120x209 in Dimensions)
                                </div>
                                @if ($page->image)
                                    <div class="form-group">
                                       {!! HTML::image('/uploads/source/'.$page->image, '', array('style' => 'max-width:300px')) !!}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">Page Attributes</h4>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    {!! Form::label('template', 'Template') !!}
                                    {!! Form::select('template', $templates, null, array('class' => 'form-control select2', 'placeholder'=>'Select Template'))!!}
                                </div>
                                <div class="form-group" style="margin-top:15px;">
                                    {!! Form::label('status', 'Status') !!}
                                    {!! Form::select('status',['0' => 'Inactive', '1' => 'Active'] ,null, array('class' => 'form-control select2', 'placeholder'=>'Select Status'))!!}
                                </div>
                                <div class="form-group" style="display: none;">
                                    {!! Form::label('order', 'Order') !!}
                                    {!! Form::text('order', $page->order, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-primary golf">
                            <div class="panel-heading">
                                <h4 class="panel-title">Second Banner Image</h4>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    {!! Form::label('banner_image', 'Second Banner Image') !!}
                                    <div class="input-group">
                                        {!! Form::text('banner_image', null, array('class' => 'form-control', 'placeholder'=>'Select Banner image', 'id' => 'banner_image')) !!}
                                        <span class="input-group-btn">
                                            <button data-select2-open="single-append-text" type="button" class="btn btn-default" data-target="#fileManager1" href="javascript:;" data-toggle="modal">
                                                <span class="glyphicon glyphicon-picture"></span>
                                            </button>
                                        </span>
                                    </div>
                                    (Image Size 1120x209 in Dimensions)
                                </div>
                                @if ($page->banner_image)
                                    <div class="form-group">
                                        {!! HTML::image('/uploads/source/'.$page->banner_image, '', array('style' => 'max-width:300px')) !!}
                                    </div>
                                @endif
                                <div class="form-group">
                                    {!! Form::label('banner_button_text', 'Banner Button Text') !!}
                                    {!! Form::text('banner_button_text', null, array('class' => 'form-control', 'placeholder'=>'Banner Button Text')) !!}
                                </div>                                
                                <div class="form-group">
                                    {!! Form::label('banner_button_url', 'Banner Button Link') !!}
                                    {!! Form::text('banner_button_url', null, array('class' => 'form-control', 'placeholder'=>'Banner Button Link')) !!}
                                </div>                                
                            </div>
                        </div>
                        <div class="panel panel-primary golf">
                            <div class="panel-heading">
                                <h4 class="panel-title">Side Widget</h4>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="checkbox" value="1" @if($page->is_show==1) checked="checked" @endif name="is_show"/>&nbsp;Show Widget?
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('widget_title', 'Title') !!}
                                    {!! Form::text('widget_title', null, array('class' => 'form-control', 'placeholder'=>'Title')) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('widget_content', 'Content') !!}
                                    {!! Form::textarea('widget_content', null, array('class' => 'form-control', 'rows'=>'3', 'placeholder'=>'Place Content here.')) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('widget_button_text', 'Button Text') !!}
                                    {!! Form::text('widget_button_text', null, array('class' => 'form-control', 'placeholder'=>'Button Text')) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('widget_button_url', 'Button Link') !!}
                                    {!! Form::text('widget_button_url', null, array('class' => 'form-control', 'placeholder'=>'Button Link')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-primary golf">
                            <div class="panel-heading">
                                <h4 class="panel-title">Highlighted Points</h4>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body key_points_section">
                                <a href="javascript:void(0);" class="add_key_points btn btn-info">Add New Points</a>
                                <br>
                                <br>
                                @if (!empty($keyPointsData))
                                    @foreach ($keyPointsData as $keyPointsSingle)
                                    <div class="partition-blue" style="padding:10px;padding-top:15px;padding-bottom:5px;margin-bottom: 10px;">
                                        <a href="javascript:void(0);" class="delete_key_points" style="color: red;font-size: 18px;position: absolute;top: -12px;right: -12px;"><i class="fa fa-times-circle"></i></a>
                                        <div class="form-group">
                                            {!! Form::label('key_points[]', 'Highlighted Points') !!}
                                            {!! Form::text('key_points[]', $keyPointsSingle->key_points, array('class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">SEO (Optional)</h4>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    {!! Form::label('meta_title', 'Meta Title') !!}
                                    {!! Form::text('meta_title', null, array('class' => 'form-control', 'placeholder'=>'Meta Title')) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('meta_keywords', 'Meta Keywords') !!}
                                    {!! Form::textarea('meta_keywords', null, array('class' => 'form-control', 'rows'=>'3', 'placeholder'=>'Place meta keywords here.')) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('meta_description', 'Meta Description') !!}
                                    {!! Form::textarea('meta_description', null, array('class' => 'form-control', 'rows'=>'3', 'placeholder'=>'Place meta description here.')) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-sm-4 --> </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div id="key_points" class="key_points" style="display: none;">
            <a href="javascript:void(0);" class="delete_key_points" style="color: red;font-size: 18px;position: absolute;top: -12px;right: -12px;"><i class="fa fa-times-circle"></i></a>
            <div class="form-group">
                {!! Form::label('key_points[]', 'Highlighted points') !!}
                {!! Form::text('key_points[]', null, array('class' => 'form-control')) !!}
            </div>
        </div>


        <div id="member_programs" class="member_programs" style="display: none;">
            <a href="javascript:void(0);" class="delete_member_program" style="color: red;font-size: 18px;position: absolute;top: -12px;right: -12px;"><i class="fa fa-times-circle"></i></a>
            <div class="panel-body">
        <div class="form-group">
            {!! Form::label('owner_image1', 'Program Image') !!}
            <div class="input-group">
                {!! Form::text('program_image[]', null, array('class' => 'form-control myinput', 'placeholder'=>'Program Image', 'id' => 'program_image')) !!}
                <span class="input-group-btn">
                    <button data-select2-open="single-append-text" type="button" class="btn btn-default" data-target="#fileManager50" href="javascript:;" data-toggle="modal">
                        <span class="glyphicon glyphicon-picture"></span>
                    </button>
                </span>
            </div>
            (Image Size 328x130 in Dimensions)
        </div>
    </div>
    <div class="modal fade mymodal" id="fileManager50">  
        <div class="modal-dialog" style="width:65%;">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">File Manager</h4>
            </div>
            <div class="modal-body" style="padding:0px; margin:0px;">
              <iframe width="100%" height="500" src="{{ URL::to('assets/vendors/responsive-filemanager/filemanager/dialog.php?type=2&amp;field_id=program_image&amp;relative_url=1&amp;fldr=') }}" frameborder="0" style="overflow: scroll; overflow-x: hidden; overflow-y: scroll; "></iframe>
            </div>
          </div>
      </div>
    </div>
    <div class="form-group">
    {!! Form::label('program_link', 'Program Link') !!}
    {!! Form::text('program_link[]', null, array('class' => 'form-control',  'placeholder'=> ''))!!}
    </div>

    <div class="form-group">
    {!! Form::label('program_heading', 'Program Title') !!}
    {!! Form::text('program_heading[]', null, array('class' => 'form-control',  'placeholder'=> ''))!!}
    </div>

    <div class='box-body pad'>
    {!! Form::label('program_text', 'Program Text') !!}
    {!! Form::textarea('program_text[]', null, array('class' => 'form-control', 'rows'=>'5', 'placeholder'=>'Place some text here', 'style'=>'style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"')) !!}
    </div>

    <div class="form-group">
    {!! Form::label('program_sorting', 'Program Sorting') !!}
    {!! Form::text('program_sorting[]', null, array('class' => 'form-control',  'placeholder'=> ''))!!}
    </div>

    </div>


    <!--main content ends-->
</section>
@include('admin.layouts.modal_filemanager', $image_fields)
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script  src="{{ asset('assets/vendors/tinymce/js/tinymce/tinymce.min.js') }}"  type="text/javascript" ></script>
    <script src="{{ asset('assets/vendors/select2/select2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/tags/dist/bootstrap-tagsinput.js') }}" ></script>
    <script type="text/javascript">
        $('.add_key_points').click(function(){
            var pgroup = $('.key_points').html();
            $('.key_points_section').append('<div class="partition-blue" style="padding:10px;padding-top:15px;padding-bottom:5px;margin-bottom: 10px;">'+pgroup+'<div>');
            $('.delete_key_points').click(function(){
                $(this).parent().remove();
            });
        });
        $('.delete_key_points').click(function(){
            $(this).parent().remove();
        });
        var k=500;
        $('.add_member_programs').click(function(){
            //var pgroup = $('.member_programs').html();
            //mymodal
            //$(pgroup).find('.mymodal').attr('id','aaaa');
            //var $div = $('div[id="member_programs"]');  
            var $klon = $('.member_programs').clone();//.find('div.mymodal').prop('id', 'fileManager'+k );
            $($klon).find('div.mymodal').attr('id','fileManager'+k);
            $($klon).find('button.btn').attr('data-target','#fileManager'+k);
            $($klon).find('input.myinput').attr('id','program_image'+k);
            
            $($klon).find('iframe').attr('src','/assets/vendors/responsive-filemanager/filemanager/dialog.php?type=2&field_id=program_image'+k+'&relative_url=1&fldr=');
            
            console.log($klon);
            //var $klon1 = $klon.find('input').prop('value', '' );
            //$klon.find('#del').html('<a href="javascript:;"  class="btn btn-success mt-repeater-add" onclick="del(this);">X</a>');
            //jQuery('#addhere').append( $klon );
            k++;
            
            $('.member_program_section').append('<div class="partition-blue" style="padding:10px;padding-top:15px;padding-bottom:5px;margin-bottom: 10px;">'+$klon.html()+'<div>');
            $('.delete_member_program').click(function(){
                $(this).parent().remove();
            });
        });
        $('.delete_member_program').click(function(){
            $(this).parent().remove();
        });
        
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            if($('#title').val().length > 2){
                $('#page_preview').removeAttr('disabled');
            }
            if($('#title').val().length < 3){
                $('#page_preview').attr('disabled','disabled');
            }
            $('#template').change(function(){
                var getTempalte = $(this).val();
                if (getTempalte == 'golf') {
                    $('.golf').show();
                    $('.home2').hide();
                    $('.onlyhome').hide();
                    $('.onlyabout').hide();
                    $('.onlyowneropportunity').hide();
                    $('.onlyteesharemembershipprogram').hide();
                    
                } else {
                    $('.golf').hide();
                }
            });
            $('.golf').hide();
            if ($('select[name="template"]').val() == 'golf') {
               $('.golf').show();
               $('.home2').hide();
               $('.onlyhome').hide();
               $('.onlyabout').hide();
                    $('.onlyowneropportunity').hide();
                    $('.onlyteesharemembershipprogram').hide();
            }
            $('.career_content, .career_content2').hide();
            $('.career_content_required').find('input').removeAttr('required');

            if($('select[name="template"]').val() == 'home') {$('.home2').show();$('.onlyhome').show();}else {$('.onlyhome').hide();$('.home2').hide();}
            if($('select[name="template"]').val() == 'about') {$('.onlyabout').show();}else {$('.onlyabout').hide();}
            if($('select[name="template"]').val() == 'owner_opportunity') {$('.onlyowneropportunity').show();}else {$('.onlyowneropportunity').hide();}
            if($('select[name="template"]').val() == 'teeshare_member_program') {$('.onlyteesharemembershipprogram').show();}else {$('.onlyteesharemembershipprogram').hide();}
            

            if ($('select[name="template"]').val() == 'careers') {
                $('.career_content, .career_content2').show();
                $('.career_content_required').find('input').attr('required','required');
                $('.home2').hide();
                $('.onlyhome').hide();
            }
  
            $('select[name="template"]').on('change', function(){
                if ($(this).val() == 'careers') {
                    $('.career_content, .career_content2').show();
                    $('.career_content_required').find('input').attr('required','required');
                    $('.home2').hide();
                    $('.onlyhome').hide();
                } else if($(this).val() == 'home') {$('.home2').show();$('.onlyhome').show();}
                else if($(this).val() == 'about') {$('.onlyabout').show();}
                else if($(this).val() == 'owner_opportunity') {$('.onlyowneropportunity').show();}
                else if($(this).val() == 'teeshare_member_program') {$('.onlyteesharemembershipprogram').show();$('.onlyhome').hide();$('.home2').hide();
                    $('.onlyabout').hide();
                    $('.onlyowneropportunity').hide();}
                else {
                    $('.career_content, .career_content2').hide();
                    $('.career_content_required').find('input').removeAttr('required');
                    $('.onlyhome').hide();$('.home2').hide();
                    $('.onlyabout').hide();
                    $('.onlyowneropportunity').hide();
                    $('.onlyteesharemembershipprogram').hide();
                }
            });

            // TinyMCE Full
            tinymce.init({
                selector: ".textarea",
                height : 300,
                plugins: [
                    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code fullscreen",
                    "insertdatetime media nonbreaking save table contextmenu directionality",
                    "emoticons template paste textcolor"
                ],
                toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
                toolbar2: "print preview media | forecolor backcolor emoticons",
                image_advtab: true,
                templates: [{
                    title: 'Test template 1',
                    content: 'Test 1'
                }, {
                    title: 'Test template 2',
                    content: 'Test 2'
                }],

                external_filemanager_path:"../../../assets/vendors/responsive-filemanager/filemanager/",
                filemanager_title:"Responsive Filemanager" ,
                external_plugins: { "filemanager" : "../../../../vendors/responsive-filemanager/filemanager/plugin.min.js"},
                convert_urls: false
            });
        });
        $("#page_preview").on("click", function(e){
            e.preventDefault();
            $from = $('#page_form')
            $from.attr('action','{!! URL::to("admin/page/preview") !!}');
            $from.attr('target','_blank');
            $from.submit();
            $from.attr('action','{!!  URL::to('admin/page') . '/' . $page->id.'/edit' !!}');
            $from.removeAttr('target','_blank');
        });
        $("#title").on("change", function(e){
            if($(this).val().length > 2){
                $('#page_preview').removeAttr('disabled');
            }
            if($(this).val().length < 3){
                $('#page_preview').attr('disabled','disabled');
            }
        });
    </script>
@stop