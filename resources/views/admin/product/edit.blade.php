@extends('admin/layouts/default')

{{-- Product title --}}
@section('title')
    Edit Product
    @parent
@stop

{{-- Product level styles --}}
@section('header_styles')

    <link href="{{ asset('assets/vendors/select2/select2.min.css') }}" type="text/css" />
    <link href="{{ asset('assets/vendors/tags/dist/bootstrap-tagsinput.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/pages/blog.css') }}" rel="stylesheet" type="text/css">

    <!--end of Product level css-->
@stop


{{-- Product content --}}
@section('content')
<section class="content-header">
    <!--section starts-->
    <h1>Edit Product</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}"> <i class="livicon" data-name="home" data-size="14" data-c="#000" data-loop="true"></i>
                Dashboard
            </a>
        </li>
        <li><a href="{{ route('product') }}">Products</a></li>
        <li class="active">Edit </li>
    </ol>
</section>
<!--section ends-->
<section class="content paddingleft_right15">
    <!--main content-->
    <div class="row">
        <div class="the-box no-border">
            <div class="has-error">
                            {!! $errors->first('ProductName', '<span class="help-block">:message</span>') !!}
                            {!! $errors->first('ProductShortDesc', '<span class="help-block">:message</span>') !!}
                            {!! $errors->first('ProductLongDesc', '<span class="help-block">:message</span>') !!}
                            {!! $errors->first('ProductPrice', '<span class="help-block">:message</span>') !!}
                            {!! $errors->first('ProductStock', '<span class="help-block">:message</span>') !!}
                            {!! $errors->first('ProductSKU', '<span class="help-block">:message</span>') !!}
                        </div>
            {!! Form::model($Product, array('url' => URL::to('admin/product') . '/' . $Product->ProductID.'/edit', 'method' => 'post', 'class' => 'form-horizontal11', 'files'=> true)) !!}
                 <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group {{ $errors->first('title', 'has-error') }}">
                            {!! Form::label('ProductName', 'Product Name') !!}
                            {!! Form::text('ProductName', null, array('class' => 'form-control input-lg', 'required' => 'required', 'placeholder'=>'Product Name here...'))!!}
                            {!! $errors->first('ProductName', '<span class="help-block">:message</span> ') !!}
                        </div>
                        <div class="form-group {{ $errors->first('ProductSKU', 'has-error') }}">
                            {!! Form::label('ProductSKU', 'Product SKU') !!}
                            {!! Form::text('ProductSKU', null, array('class' => 'form-control input-lg', 'required' => 'required', 'placeholder'=>'Product SKU here...'))!!}
                            {!! $errors->first('ProductSKU', '<span class="help-block">:message</span> ') !!}
                        </div>
                        
                        <div class="form-group">
                            <div class='box-body pad'>
                                {!! Form::label('ProductShortDesc', 'Product Short Desc') !!}
                                {!! Form::textarea('ProductShortDesc', null, array('class' => 'textarea form-control', 'rows'=>'5', 'placeholder'=>'Place some text here', 'style'=>'style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class='box-body pad'>
                                {!! Form::label('ProductLongDesc', 'Product Long Desc') !!}
                                {!! Form::textarea('ProductLongDesc', null, array('class' => 'textarea form-control', 'rows'=>'5', 'placeholder'=>'Place some text here', 'style'=>'style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"')) !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->first('ProductPrice', 'has-error') }}">
                            {!! Form::label('ProductPrice', 'Product Price') !!}
                            {!! Form::text('ProductPrice', null, array('class' => 'form-control input-lg', 'required' => 'required', 'placeholder'=>'Product Price here...'))!!}
                            {!! $errors->first('ProductPrice', '<span class="help-block">:message</span> ') !!}
                        </div>
                        <div class="form-group {{ $errors->first('ProductWeight', 'has-error') }}">
                            {!! Form::label('ProductWeight', 'Product Weight') !!}
                            {!! Form::text('ProductWeight', null, array('class' => 'form-control input-lg', 'required' => 'required', 'placeholder'=>'Product Weight here...'))!!}
                            {!! $errors->first('ProductWeight', '<span class="help-block">:message</span> ') !!}
                        </div>
                        <div class="form-group {{ $errors->first('ProductStock', 'has-error') }}">
                            {!! Form::label('ProductStock', 'Product Stock') !!}
                            {!! Form::number('ProductStock', null, array('max'=>'200', 'min'=>'1', 'class' => 'form-control input-lg', 'required' => 'required', 'placeholder'=>'Product Stock here...'))!!}
                            {!! $errors->first('ProductStock', '<span class="help-block">:message</span> ') !!}
                        </div>
                        
                        

                        <!--only teeshare membership program-->
                        <!-- <div class="onlyteesharemembershipprogram">
                        <div class="panel-body member_program_section">
                                <a href="javascript:void(0);" class="add_member_programs btn btn-info">Add New Section</a>
                                <br>
                                <br>
                                
                            </div>
                        </div> -->
                        <!--only teeshare membership program-->

                        <!--only teeshare membership program-->
                        <div class="onlyteesharemembershipprogram">
                        <div class="panel-body member_program_section2">
                                <a href="javascript:void(0);" class="add_member_programs2 btn btn-info">Add New Product Images</a>
                                <br>
                                <br>
                                
                            </div>
                        </div>
                        <!--only teeshare membership program-->

                        <!--only teeshare membership program-->
                        <div class="onlyteesharemembershipprogram">
                        <div class="panel-body member_program_section2">
                                <!-- <a href="javascript:void(0);" class="add_member_programs2 btn btn-info">Add New Hotel Image</a> -->
                                <!-- <br>
                                <br> -->
                                @if (!empty($Product->productimages))
                                {{--*/ $s = 0; $m = 80; /*--}}
                                    @foreach ($Product->productimages as $hotel_imageDatasingle) 
                                    @if($hotel_imageDatasingle->image !='')                                   
                                <div class="partition-blue" style="padding:10px;padding-top:15px;padding-bottom:5px;margin-bottom: 10px;">
                                    <a href="javascript:void(0);" class="delete_member_program2" style="color: red;font-size: 18px;position: absolute;top: -12px;right: -12px;"><i class="fa fa-times-circle"></i></a>
                                    <div class="panel-body">
                                <div class="form-group">
                                    {!! Form::label('product_image', 'Product Image') !!}
                                    <div class="input-group">
                                        {!! Form::text('product_image[]', $hotel_imageDatasingle->image, array('class' => 'form-control myinput', 'placeholder'=>'Product Image', 'id' => 'product_image'.$m)) !!}
                                        <span class="input-group-btn">
                                            <button data-select2-open="single-append-text" type="button" class="btn btn-default" data-target="#fileManager{{--*/echo $m/*--}}" href="javascript:;" data-toggle="modal">
                                                <span class="glyphicon glyphicon-picture"></span>
                                            </button>
                                        </span>
                                    </div>
                                    (Image Size 328x130 in Dimensions)
                                </div>
                                @if ($hotel_imageDatasingle->image)
                                    <div class="form-group">
                                        {!! HTML::image('/uploads/source/'.$hotel_imageDatasingle->image, '', array('style' => 'max-width:300px')) !!}
                                    </div>
                                @endif
                                
                            </div>
                            <!-- <div class="form-group">
                                {!! Form::label('placeholder_text', 'Placeholder Text') !!}
                                {!! Form::text('placeholder_text[]', isset($placeholder_textData[$s]->placeholder_text)?$placeholder_textData[$s]->placeholder_text:'', array('class' => 'form-control', 'placeholder'=>'Placeholder Text')) !!}
                            </div> -->
                            <div class="modal fade mymodal" id="fileManager{{--*/echo $m/*--}}">  
                                    <div class="modal-dialog" style="width:65%;">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                          <h4 class="modal-title">File Manager</h4>
                                        </div>
                                        <div class="modal-body" style="padding:0px; margin:0px;">
                                          <iframe width="100%" height="500" src="{{ URL::to('assets/vendors/responsive-filemanager/filemanager/dialog.php?type=2&amp;field_id=hotel_image'.$m.'&amp;relative_url=1&amp;fldr=') }}" frameborder="0" style="overflow: scroll; overflow-x: hidden; overflow-y: scroll; "></iframe>
                                        </div>
                                      </div>
                                  </div>
                              </div>                          

                            
                                </div>
                                {{--*/ $s++; $m++; /*--}}
                                @endif
                                @endforeach
                                @endif
                            </div>
                        </div>
                        <!--only teeshare membership program-->

                       
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Publish</button>
                            <a href="{!! URL::to('admin/hotels') !!}" class="btn btn-danger">Discard</a>
                        </div>
                    </div>
                    <!-- /.col-sm-8 -->
                    <div class="col-sm-4">
                    <div class="panel ">
                            <!-- <a disabled="disabled" id="page_preview" class="btn btn-block btn-md btn-primary"><span class="glyphicon glyphicon-eye-open"></span> Preview</a> -->
                        </div>
                        <!-- <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">Hotel Images</h4>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="input-group">
                                        {!! Form::text('image', null, array('class' => 'form-control', 'placeholder'=>'Select image', 'id' => 'image')) !!}
                                        <span class="input-group-btn">
                                            <button data-select2-open="single-append-text" type="button" class="btn btn-default" data-target="#fileManager0" href="javascript:;" data-toggle="modal">
                                                <span class="glyphicon glyphicon-picture"></span>
                                            </button>
                                        </span>
                                    </div>
                                    (Image Size 109X109 in Dimensions)
                                </div>
                                
                            </div>
                        </div> -->
                        
                        
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">Attributes</h4>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <div class="form-group fixheight">
                                    {!! Form::label('cats', 'Select Category') !!}
                                    <table class="table table-bordered table-order" id="table1">                       
                                        <tbody>                                            
                                            {{--*/ $s = 0; $m = 50; /*--}}
                                            @foreach($product_categories as $cats)
                                            @if($s %1==0)
                                            <tr role="row" class="odd">
                                            @endif    
                                                <td class="sorting_1">
                                                    <div class="checkbox">
                                                      <label><input @if(in_array($cats->id, $selcats)) checked @endif name="productcats[]" type="checkbox" value="{{$cats->id}}">{{$cats->title}}</label>
                                                    </div>
                                                </td>
                                                @if($s > 1 && $s %1==0)
                                            <!-- </tr> -->
                                            @endif 
                                            {{--*/ $s++; $m++; /*--}}   
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                            <div class="panel-body">
                                <div class="form-group fixheight">
                                    {!! Form::label('brands', 'Select Brand') !!}
                                    <table class="table table-bordered table-order" id="table1">                       
                                        <tbody>                                            
                                            {{--*/ $s = 0; $m = 50; /*--}}
                                            @foreach($product_brands as $br)
                                            @if($s %1==0)
                                            <tr role="row" class="odd">
                                            @endif    
                                                <td class="sorting_1">
                                                    <div class="checkbox">
                                                      <label><input @if(in_array($br->id, $selbrands)) checked @endif name="productbrands[]" type="checkbox" value="{{$br->id}}">{{$br->title}}</label>
                                                    </div>
                                                </td>
                                                @if($s > 1 && $s %1==0)
                                            <!-- </tr> -->
                                            @endif 
                                            {{--*/ $s++; $m++; /*--}}   
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    {!! Form::label('status', 'Status') !!}
                                    {!! Form::select('status',['0' => 'Inactive', '1' => 'Active'] ,1, array('class' => 'form-control select2', 'placeholder'=>'Select Status'))!!}
                                </div>
                                
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
   
    <!--main content ends-->
<div id="member_programs" class="member_programs" style="display: none;">
        <a href="javascript:void(0);" class="delete_member_program" style="color: red;font-size: 18px;position: absolute;top: -12px;right: -12px;"><i class="fa fa-times-circle"></i></a>
        <div class="panel-body">
    <div class="form-group">
        {!! Form::label('nearby_address', 'Near By Address') !!}
        {!! Form::text('nearby_address[]', null, array('class' => 'form-control', 'placeholder'=>'Near By Address')) !!}
    </div>
    
</div>
<div class='box-body pad'>
{!! Form::label('nearby_ml', 'Near By Miles') !!}
{!! Form::text('nearby_ml[]', null, array('class' => 'ttt form-control', 'placeholder'=>'Near By Miles')) !!}
</div>
    </div>   

     <div id="member_programs2" class="member_programs2" style="display: none;">
         <div class="modal fade mymodal" id="fileManager50">  
        <div class="modal-dialog" style="width:65%;">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">File Manager</h4>
            </div>
            <div class="modal-body" style="padding:0px; margin:0px;">
              <iframe width="100%" height="500" src="{{ URL::to('../../../../embroidery/assets/vendors/responsive-filemanager/filemanager/dialog.php?type=2&amp;field_id=program_image&amp;relative_url=1&amp;fldr=') }}" frameborder="0" style="overflow: scroll; overflow-x: hidden; overflow-y: scroll; "></iframe>
            </div>
          </div>
      </div>
  </div>

<!--t2-->  
<div id="member_programs3" class="member_programs3" style="display: none;">
        <a href="javascript:void(0);" class="delete_member_program2" style="color: red;font-size: 18px;position: absolute;top: -12px;right: -12px;"><i class="fa fa-times-circle"></i></a>
        <div class="panel-body">
    <div class="form-group">
        {!! Form::label('product_image', 'Product Image') !!}
        <div class="input-group">
            {!! Form::text('product_image[]', null, array('class' => 'form-control myinput', 'placeholder'=>'Product Image', 'id' => 'hotel_image')) !!}
            <span class="input-group-btn">
                <button data-select2-open="single-append-text" type="button" class="btn btn-default" data-target="#fileManager80" href="javascript:;" data-toggle="modal">
                    <span class="glyphicon glyphicon-picture"></span>
                </button>
            </span>
        </div>
        (Image Size 328x130 in Dimensions)
    </div>
        <!-- <div class="form-group">
        {!! Form::label('placeholder_text', 'Placeholder Text') !!}
        {!! Form::text('placeholder_text[]', null, array('class' => 'form-control', 'placeholder'=>'Placeholder Text')) !!}
    </div> -->
</div>

    </div>   

     <div id="member_programs33" class="member_programs33" style="display: none;">
         <div class="modal fade mymodal" id="fileManager80">  
        <div class="modal-dialog" style="width:65%;">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">File Manager</h4>
            </div>
            <div class="modal-body" style="padding:0px; margin:0px;">
              <iframe width="100%" height="500" src="{{ URL::to('../../../embroidery/assets/vendors/responsive-filemanager/filemanager/dialog.php?type=2&amp;field_id=hotel_image&amp;relative_url=1&amp;fldr=') }}" frameborder="0" style="overflow: scroll; overflow-x: hidden; overflow-y: scroll; "></iframe>
            </div>
          </div>
      </div>
  </div>

<!--t2-->  


     </div>    
</section>
<style type="text/css">.select2-container {display: none;} .fixheight { max-height:200px; overflow-y:scroll;}</style>
@include('admin.layouts.modal_filemanager', $image_fields)
@stop

{{-- Capability level scripts --}}
@section('footer_scripts')
    <script  src="{{ asset('assets/vendors/tinymce/js/tinymce/tinymce.min.js') }}"  type="text/javascript" ></script>
    <script src="{{ asset('assets/vendors/select2/select2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/tags/dist/bootstrap-tagsinput.js') }}" ></script>
    <script type="text/javascript">
    $(document).ready(function() {
    if($('#title').val().length > 2){
                $('#page_preview').removeAttr('disabled');
            }
            if($('#title').val().length < 3){
                $('#page_preview').attr('disabled','disabled');
            }
            });
        $("#page_preview").on("click", function(e){
            e.preventDefault();
            $from = $('#page_form')
            $from.attr('action','{!! URL::to("admin/golf_benefits/preview") !!}');
            $from.attr('target','_blank');
            $from.submit();
            $from.attr('action','{!! URL::to("admin/golf_benefits/create") !!}');
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
    /////////////////////////////////////
        var k=500;
        $('.add_member_programs').click(function(){
            //var pgroup = $('.member_programs').html();
            //mymodal
            //$(pgroup).find('.mymodal').attr('id','aaaa');
            //var $div = $('div[id="member_programs"]');  
            var $klon = $('.member_programs').clone();//.find('div.mymodal').prop('id', 'fileManager'+k );
            //$($klon).find('iframe').attr('src','/assets/vendors/responsive-filemanager/filemanager/dialog.php?type=2&field_id=program_image'+k+'&relative_url=1&fldr=');
            $($klon).find('div.mymodal').attr('id','fileManager'+k);
            $($klon).find('button.btn').attr('data-target','#fileManager'+k);
            $($klon).find('input.myinput').attr('id','program_image'+k);
            $($klon).find('textarea.ttt').attr('class','textarea22');
            
            ////
            var $klon2 = $('.member_programs2').clone();//.find('div.mymodal').prop('id', 'fileManager'+k );
            $($klon2).find('div.mymodal').attr('id','fileManager'+k);
            //$($klon2).find('iframe').attr('src','../../../assets/vendors/responsive-filemanager/filemanager/dialog.php?type=2&field_id=program_image'+k+'&relative_url=1&fldr=');
            
            //console.log($klon);
            //var $klon1 = $klon.find('input').prop('value', '' );
            //$klon.find('#del').html('<a href="javascript:;"  class="btn btn-success mt-repeater-add" onclick="del(this);">X</a>');
            //jQuery('#addhere').append( $klon );
            k++;

            $('.member_program_section').append($klon2.html());

            $('.member_program_section').append('<div class="partition-blue" style="padding:10px;padding-top:15px;padding-bottom:5px;margin-bottom: 10px;">'+$klon.html()+'<div>');
            //$('.partition-blue').find('iframe').attr('src','/assets/vendors/responsive-filemanager/filemanager/dialog.php?type=2&field_id=program_image'+k+'&relative_url=1&fldr=');
            initMCEall('textarea22');
            //initMCEall();
        //     tinymce.init({
        //     //theme: 'modern',
        //     selector: '.textarea22'
        // });
            $('.delete_member_program').click(function(){
                $(this).parent().remove();
            });
        });
        $('.delete_member_program').click(function(){
            $(this).parent().remove();
        });
        ///////////////////////////22222222222/////////////////////////
        var k2=600;
        $('.add_member_programs2').click(function(){
        
            var $klon = $('.member_programs3').clone();
        
            $($klon).find('div.mymodal').attr('id','fileManager'+k2);
            $($klon).find('button.btn').attr('data-target','#fileManager'+k2);
            $($klon).find('input.myinput').attr('id','hotel_image'+k2);
            $($klon).find('textarea.ttt').attr('class','textarea22');
            
            ////
            var $klon2 = $('.member_programs33').clone();
            $($klon2).find('div.mymodal').attr('id','fileManager'+k2);
            $($klon2).find('iframe').attr('src','../../../embroidery/assets/vendors/responsive-filemanager/filemanager/dialog.php?type=2&field_id=hotel_image'+k2+'&relative_url=1&fldr=');        
            k2++;

            $('.member_program_section2').append($klon2.html());
            $('.member_program_section2').append('<div class="partition-blue" style="padding:10px;padding-top:15px;padding-bottom:5px;margin-bottom: 10px;">'+$klon.html()+'<div>');
        
            initMCEall('textarea22');
        
            $('.delete_member_program2').click(function(){
                $(this).parent().remove();
            });
        });
        $('.delete_member_program2').click(function(){
            $(this).parent().remove();
        });
    </script>
    <script type="text/javascript">
        // TinyMCE Full
            tinymce.init({
                selector: ".textarea",
                height : 150,
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

                external_filemanager_path:"../../../embroidery/assets/vendors/responsive-filemanager/filemanager/",
                filemanager_title:"Responsive Filemanager" ,
                external_plugins: { "filemanager" : "../../../../vendors/responsive-filemanager/filemanager/plugin.min.js"},
                convert_urls: false
            });

        $('.select2').select2({
            //placeholder: placeholder
        }); 

        function initMCEall(str){
            tinymce.init({
                selector: "."+str,
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
        }
    </script>
@stop