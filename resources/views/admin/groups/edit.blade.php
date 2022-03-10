@extends('admin/layouts/default')

{{-- Web site Title --}}
@section('title')
@lang('groups/title.edit')
@parent
@stop

{{-- Content --}}
@section('content')
<section class="content-header">
    <h1>
        @lang('groups/title.edit')
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}">
                <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>Groups</li>
        <li class="active">@lang('groups/title.edit')</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary ">
                <div class="panel-heading">
                    <h4 class="panel-title"> <i class="livicon" data-name="wrench" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        @lang('groups/title.edit')
                    </h4>
                </div>
                <div class="panel-body">
                    @if($role)
                        <form class="form-horizontal" role="form" method="post" action="">
                            <!-- CSRF Token -->
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                            <div class="form-group {{ $errors->
                                first('name', 'has-error') }}">
                                <label for="title" class="col-sm-2 control-label">
                                    @lang('groups/form.name')
                                </label>
                                <div class="col-sm-5">
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Group Name" value="{!! Input::old('name', $role->
                                    name) !!}">
                                </div>
                                <div class="col-sm-4">
                                    {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="slug" class="col-sm-2 control-label">@lang('groups/form.slug')</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" value="{!! $role->slug !!}" readonly />
                                </div>
                            </div>

                            <h4>Permissions</h4>
                        <div class="form-group ">
                            <label for="title" class="col-sm-2 control-label">
                                Users
                            </label>
                            <div class="col-sm-5">                            
                                <input id="lu" name="perms[1]" type="checkbox" class="pos-rel p-l-30" value="users" {!! array_key_exists('users', $rol) ? 'checked="checked"' : '' !!} >
                                List Users
                                <br>
                                <input id="lu" name="perms[2]" type="checkbox" class="pos-rel p-l-30" value="create_user" {!! array_key_exists('create_user', $rol) ? 'checked="checked"' : '' !!}  >
                                Create Users
                                <br>
                                <input id="lu" name="perms[3]" type="checkbox" class="pos-rel p-l-30" value="users_update" {!! array_key_exists('users_update', $rol) ? 'checked="checked"' : '' !!}  >
                                Update Users
                                <br>
                                <input id="lu" name="perms[4]" type="checkbox" class="pos-rel p-l-30" value="delete_user" {!! array_key_exists('delete_user', $rol) ? 'checked="checked"' : '' !!}  >
                                Delete Users
                                <br>
                                <input id="lu" name="perms[5]" type="checkbox" class="pos-rel p-l-30" value="disable_user" {!! array_key_exists('disable_user', $rol) ? 'checked="checked"' : '' !!}  >
                                Disable Users
                                <br>
                                <input id="lu" name="perms[6]" type="checkbox" class="pos-rel p-l-30" value="users_show" {!! array_key_exists('users_show', $rol) ? 'checked="checked"' : '' !!}  >
                                View Users
                            </div>                           
                        </div>
                        <div class="form-group ">
                            <label for="title" class="col-sm-2 control-label">
                                Groups
                            </label>
                            <div class="col-sm-5">                            
                                <input id="lu" name="perms[7]" type="checkbox" class="pos-rel p-l-30" value="groups" {!! array_key_exists('groups', $rol) ? 'checked="checked"' : '' !!} >
                                List Groups
                                <br>
                                <input id="lu" name="perms[8]" type="checkbox" class="pos-rel p-l-30" value="create_group" {!! array_key_exists('create_group', $rol) ? 'checked="checked"' : '' !!}  >
                                Create Groups
                                <br>
                                <input id="lu" name="perms[9]" type="checkbox" class="pos-rel p-l-30" value="update_group" {!! array_key_exists('update_group', $rol) ? 'checked="checked"' : '' !!}  >
                                Update Groups
                                <br>
                                <input id="lu" name="perms[10]" type="checkbox" class="pos-rel p-l-30" value="delete_group" {!! array_key_exists('delete_group', $rol) ? 'checked="checked"' : '' !!}  >
                                Delete Groups                                                         
                            </div>                           
                        </div>
                        <div class="form-group ">
                            <label for="title" class="col-sm-2 control-label">
                                News Category
                            </label>
                            <div class="col-sm-5">                            
                                <input id="lu" name="perms[11]" type="checkbox" class="pos-rel p-l-30" value="newscategories" {!! array_key_exists('newscategories', $rol) ? 'checked="checked"' : '' !!} >
                                List News Categories
                                <br>
                                <input id="lu" name="perms[12]" type="checkbox" class="pos-rel p-l-30" value="data_newscategory" {!! array_key_exists('data_newscategory', $rol) ? 'checked="checked"' : '' !!}  >
                                Data News Categories   
                                <br>
                                <input id="lu" name="perms[13]" type="checkbox" class="pos-rel p-l-30" value="create_newscategory" {!! array_key_exists('create_newscategory', $rol) ? 'checked="checked"' : '' !!}  >
                                Create News Categories
                                <br>
                                <input id="lu" name="perms[14]" type="checkbox" class="pos-rel p-l-30" value="update_newscategory" {!! array_key_exists('update_newscategory', $rol) ? 'checked="checked"' : '' !!}  >
                                Update News Categories
                                <br>
                                <input id="lu" name="perms[15]" type="checkbox" class="pos-rel p-l-30" value="delete_newscategory" {!! array_key_exists('delete_newscategory', $rol) ? 'checked="checked"' : '' !!}  >
                                Delete News Categories                                                         
                            </div>                           
                        </div>
                        <div class="form-group ">
                            <label for="title" class="col-sm-2 control-label">
                                News
                            </label>
                            <div class="col-sm-5">                            
                                <input id="lu" name="perms[16]" type="checkbox" class="pos-rel p-l-30" value="news" {!! array_key_exists('news', $rol) ? 'checked="checked"' : '' !!} >
                                List News
                                <br>
                                <input id="lu" name="perms[17]" type="checkbox" class="pos-rel p-l-30" value="data_news" {!! array_key_exists('data_news', $rol) ? 'checked="checked"' : '' !!}  >
                                Data News   
                                <br>
                                <input id="lu" name="perms[18]" type="checkbox" class="pos-rel p-l-30" value="create_news" {!! array_key_exists('create_news', $rol) ? 'checked="checked"' : '' !!}  >
                                Create News
                                <br>
                                <input id="lu" name="perms[19]" type="checkbox" class="pos-rel p-l-30" value="update_news" {!! array_key_exists('update_news', $rol) ? 'checked="checked"' : '' !!}  >
                                Update News
                                <br>
                                <input id="lu" name="perms[20]" type="checkbox" class="pos-rel p-l-30" value="delete_news" {!! array_key_exists('delete_news', $rol) ? 'checked="checked"' : '' !!}  >
                                Delete News   
                                <br>
                                <input id="lu" name="perms[21]" type="checkbox" class="pos-rel p-l-30" value="news_show" {!! array_key_exists('news_show', $rol) ? 'checked="checked"' : '' !!}  >
                                View News                                                         
                            </div>                           
                        </div>
                        <div class="form-group ">
                            <label for="title" class="col-sm-2 control-label">
                                Pages
                            </label>
                            <div class="col-sm-5">                            
                                <input id="lu" name="perms[22]" type="checkbox" class="pos-rel p-l-30" value="pages" {!! array_key_exists('pages', $rol) ? 'checked="checked"' : '' !!} >
                                List Pages
                                <br>
                                <input id="lu" name="perms[23]" type="checkbox" class="pos-rel p-l-30" value="data_page" {!! array_key_exists('data_page', $rol) ? 'checked="checked"' : '' !!}  >
                                Data Pages   
                                <br>
                                <input id="lu" name="perms[24]" type="checkbox" class="pos-rel p-l-30" value="create_page" {!! array_key_exists('create_page', $rol) ? 'checked="checked"' : '' !!}  >
                                Create Pages
                                <br>
                                <input id="lu" name="perms[25]" type="checkbox" class="pos-rel p-l-30" value="update_page" {!! array_key_exists('update_page', $rol) ? 'checked="checked"' : '' !!}  >
                                Update Pages
                                <br>
                                <input id="lu" name="perms[26]" type="checkbox" class="pos-rel p-l-30" value="delete_page" {!! array_key_exists('delete_page', $rol) ? 'checked="checked"' : '' !!}  >
                                Delete Pages                                                                                         
                            </div>                           
                        </div>
                        <div class="form-group ">
                            <label for="title" class="col-sm-2 control-label">
                                Sliders
                            </label>
                            <div class="col-sm-5">                            
                                <input id="lu" name="perms[27]" type="checkbox" class="pos-rel p-l-30" value="sliders" {!! array_key_exists('sliders', $rol) ? 'checked="checked"' : '' !!} >
                                List Sliders
                                <br>
                                <input id="lu" name="perms[28]" type="checkbox" class="pos-rel p-l-30" value="data_slider" {!! array_key_exists('data_slider', $rol) ? 'checked="checked"' : '' !!}  >
                                Data Sliders   
                                <br>
                                <input id="lu" name="perms[29]" type="checkbox" class="pos-rel p-l-30" value="create_slider" {!! array_key_exists('create_slider', $rol) ? 'checked="checked"' : '' !!}  >
                                Create Sliders
                                <br>
                                <input id="lu" name="perms[30]" type="checkbox" class="pos-rel p-l-30" value="update_slider" {!! array_key_exists('update_slider', $rol) ? 'checked="checked"' : '' !!}  >
                                Update Sliders
                                <br>
                                <input id="lu" name="perms[31]" type="checkbox" class="pos-rel p-l-30" value="delete_slider" {!! array_key_exists('delete_slider', $rol) ? 'checked="checked"' : '' !!}  >
                                Delete Sliders                                                                                         
                            </div>                           
                        </div>
                        <div class="form-group ">
                            <label for="title" class="col-sm-2 control-label">
                                Testimonials
                            </label>
                            <div class="col-sm-5">                            
                                <input id="lu" name="perms[32]" type="checkbox" class="pos-rel p-l-30" value="testimonials" {!! array_key_exists('testimonials', $rol) ? 'checked="checked"' : '' !!} >
                                List Testimonials
                                <br>
                                <input id="lu" name="perms[33]" type="checkbox" class="pos-rel p-l-30" value="data_testimonial" {!! array_key_exists('data_testimonial', $rol) ? 'checked="checked"' : '' !!}  >
                                Data Testimonials   
                                <br>
                                <input id="lu" name="perms[34]" type="checkbox" class="pos-rel p-l-30" value="create_testimonial" {!! array_key_exists('create_testimonial', $rol) ? 'checked="checked"' : '' !!}  >
                                Create Testimonials
                                <br>
                                <input id="lu" name="perms[35]" type="checkbox" class="pos-rel p-l-30" value="update_testimonial" {!! array_key_exists('update_testimonial', $rol) ? 'checked="checked"' : '' !!}  >
                                Update Testimonials
                                <br>
                                <input id="lu" name="perms[36]" type="checkbox" class="pos-rel p-l-30" value="delete_testimonial" {!! array_key_exists('delete_testimonial', $rol) ? 'checked="checked"' : '' !!}  >
                                Delete Testimonials                                                                                         
                            </div>                           
                        </div>
                        <div class="form-group ">
                            <label for="title" class="col-sm-2 control-label">
                                FAQs
                            </label>
                            <div class="col-sm-5">                            
                                <input id="lu" name="perms[37]" type="checkbox" class="pos-rel p-l-30" value="faqs" {!! array_key_exists('faqs', $rol) ? 'checked="checked"' : '' !!} >
                                List FAQs
                                <br>
                                <input id="lu" name="perms[38]" type="checkbox" class="pos-rel p-l-30" value="data_faq" {!! array_key_exists('data_faq', $rol) ? 'checked="checked"' : '' !!}  >
                                Data FAQs   
                                <br>
                                <input id="lu" name="perms[39]" type="checkbox" class="pos-rel p-l-30" value="create_faq" {!! array_key_exists('create_faq', $rol) ? 'checked="checked"' : '' !!}  >
                                Create FAQs
                                <br>
                                <input id="lu" name="perms[40]" type="checkbox" class="pos-rel p-l-30" value="update_faq" {!! array_key_exists('update_faq', $rol) ? 'checked="checked"' : '' !!}  >
                                Update FAQs
                                <br>
                                <input id="lu" name="perms[41]" type="checkbox" class="pos-rel p-l-30" value="delete_faq" {!! array_key_exists('delete_faq', $rol) ? 'checked="checked"' : '' !!}  >
                                Delete FAQs                                                                                         
                            </div>                           
                        </div>
                        <div class="form-group ">
                            <label for="title" class="col-sm-2 control-label">
                                Golf Courses
                            </label>
                            <div class="col-sm-5">                            
                                <input id="lu" name="perms[42]" type="checkbox" class="pos-rel p-l-30" value="golf_courses" {!! array_key_exists('golf_courses', $rol) ? 'checked="checked"' : '' !!} >
                                List Golf Courses
                                <br>
                                <input id="lu" name="perms[43]" type="checkbox" class="pos-rel p-l-30" value="data_golf_course" {!! array_key_exists('data_golf_course', $rol) ? 'checked="checked"' : '' !!}  >
                                Data Golf Courses   
                                <br>
                                <input id="lu" name="perms[44]" type="checkbox" class="pos-rel p-l-30" value="create_golf_course" {!! array_key_exists('create_golf_course', $rol) ? 'checked="checked"' : '' !!}  >
                                Create Golf Courses
                                <br>
                                <input id="lu" name="perms[45]" type="checkbox" class="pos-rel p-l-30" value="update_golf_course" {!! array_key_exists('update_golf_course', $rol) ? 'checked="checked"' : '' !!}  >
                                Update Golf Courses
                                <br>
                                <input id="lu" name="perms[46]" type="checkbox" class="pos-rel p-l-30" value="delete_golf_course" {!! array_key_exists('delete_golf_course', $rol) ? 'checked="checked"' : '' !!}  >
                                Delete Golf Courses                                                                                         
                            </div>                           
                        </div>
                        <div class="form-group ">
                            <label for="title" class="col-sm-2 control-label">
                                Menu Links
                            </label>
                            <div class="col-sm-5">                            
                                <input id="lu" name="perms[47]" type="checkbox" class="pos-rel p-l-30" value="menu_links" {!! array_key_exists('menu_links', $rol) ? 'checked="checked"' : '' !!} >
                                List Menu Links
                                <br>                                
                                <input id="lu" name="perms[48]" type="checkbox" class="pos-rel p-l-30" value="create_menu_link" {!! array_key_exists('create_menu_link', $rol) ? 'checked="checked"' : '' !!}  >
                                Create Menu Links
                                <br>
                                <input id="lu" name="perms[49]" type="checkbox" class="pos-rel p-l-30" value="update_menu_link" {!! array_key_exists('update_menu_link', $rol) ? 'checked="checked"' : '' !!}  >
                                Update Menu Links
                                <br>
                                <input id="lu" name="perms[50]" type="checkbox" class="pos-rel p-l-30" value="delete_menu_link" {!! array_key_exists('delete_menu_link', $rol) ? 'checked="checked"' : '' !!}  >
                                Delete Menu Links                                                                                         
                            </div>                           
                        </div>

                        <div class="form-group ">
                            <label for="title" class="col-sm-2 control-label">
                                Contact Us
                            </label>
                            <div class="col-sm-5">                            
                                <input id="lu" name="perms[51]" type="checkbox" class="pos-rel p-l-30" value="contact-assignment" {!! array_key_exists('contact-assignment', $rol) ? 'checked="checked"' : '' !!} >
                                List Contact Us
                                <br>                                
                                <input id="lu" name="perms[52]" type="checkbox" class="pos-rel p-l-30" value="data_contact_list" {!! array_key_exists('data_contact_list', $rol) ? 'checked="checked"' : '' !!}  >
                                Data Contact Us
                                <br>
                                <input id="lu" name="perms[53]" type="checkbox" class="pos-rel p-l-30" value="view_contact_request" {!! array_key_exists('view_contact_request', $rol) ? 'checked="checked"' : '' !!}  >
                                View Contact Us
                                <br>
                                <input id="lu" name="perms[54]" type="checkbox" class="pos-rel p-l-30" value="delete_contact_request" {!! array_key_exists('delete_contact_request', $rol) ? 'checked="checked"' : '' !!}  >
                                Delete Contact Us                                                                                         
                            </div>                           
                        </div>
                        
                        <div class="form-group ">
                            <label for="title" class="col-sm-2 control-label">
                                Site Settings
                            </label>
                            <div class="col-sm-5">                            
                                <input id="lu" name="perms[55]" type="checkbox" class="pos-rel p-l-30" value="site_setting" {!! array_key_exists('site_setting', $rol) ? 'checked="checked"' : '' !!} >
                                Site Settings                                                                                                                 
                            </div>                           
                        </div>

                            
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-4">
                                <a class="btn btn-danger" href="{{ route('groups') }}">
                                    @lang('button.cancel')
                                </a>
                                <button type="submit" class="btn btn-success">
                                    @lang('button.save')
                                </button>
                            </div>
                        </div>
                    </form>
                    @else
                        <h1>No Role exists with that id</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- row-->
</section>

@stop