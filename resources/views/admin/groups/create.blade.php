@extends('admin/layouts/default') {{-- Web site Title --}} @section('title') @lang('admin/groups/title.create') :: @parent @stop {{-- Content --}} @section('content')
<section class="content-header">
    <h1>
        @lang('groups/title.create')
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}">
                <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>Groups</li>
        <li class="active">
            @lang('groups/title.create')
        </li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary ">
                <div class="panel-heading">
                    <h4 class="panel-title"> <i class="livicon" data-name="users-add" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        @lang('groups/title.create')
                    </h4>
                </div>
                <div class="panel-body">
                    {!! $errors->first('slug', '<span class="help-block">Another role with same slug exists, please choose another name</span> ') !!}
                    <form class="form-horizontal" role="form" method="post" action="">
                        <!-- CSRF Token -->
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                        <div class="form-group {{ $errors->
                            first('name', 'has-error') }}">
                            <label for="title" class="col-sm-2 control-label">
                                @lang('groups/form.name')
                            </label>
                            <div class="col-sm-5">
                                <input type="text" id="name" name="name" class="form-control" placeholder="Group Name" value="{!! Input::old('name') !!}">
                            </div>
                            <div class="col-sm-4">
                                {!! $errors->first('name', '<span class="help-block">:message</span> ') !!}
                            </div>
                        </div>
                        <h4>Permissions</h4>
                        <div class="form-group ">
                            <label for="title" class="col-sm-2 control-label">
                                Users
                            </label>
                            <div class="col-sm-5">                            
                                <input id="lu" name="perms[1]" type="checkbox" class="pos-rel p-l-30" value="users" {!! isset(old("perms")[1]) ? 'checked="checked"' : '' !!} >
                                List Users
                                <br>
                                <input id="lu" name="perms[2]" type="checkbox" class="pos-rel p-l-30" value="create_user" {!! isset(old("perms")[2]) ? 'checked="checked"' : '' !!}  >
                                Create Users
                                <br>
                                <input id="lu" name="perms[3]" type="checkbox" class="pos-rel p-l-30" value="users_update" {!! isset(old("perms")[3]) ? 'checked="checked"' : '' !!}  >
                                Update Users
                                <br>
                                <input id="lu" name="perms[4]" type="checkbox" class="pos-rel p-l-30" value="delete_user" {!! isset(old("perms")[4]) ? 'checked="checked"' : '' !!}  >
                                Delete Users
                                <br>
                                <input id="lu" name="perms[5]" type="checkbox" class="pos-rel p-l-30" value="disable_user" {!! isset(old("perms")[5]) ? 'checked="checked"' : '' !!}  >
                                Disable Users
                                <br>
                                <input id="lu" name="perms[6]" type="checkbox" class="pos-rel p-l-30" value="users_show" {!! isset(old("perms")[6]) ? 'checked="checked"' : '' !!}  >
                                View Users
                            </div>                           
                        </div>
                        <div class="form-group ">
                            <label for="title" class="col-sm-2 control-label">
                                Groups
                            </label>
                            <div class="col-sm-5">                            
                                <input id="lu" name="perms[7]" type="checkbox" class="pos-rel p-l-30" value="groups" {!! isset(old("perms")[7]) ? 'checked="checked"' : '' !!} >
                                List Groups
                                <br>
                                <input id="lu" name="perms[8]" type="checkbox" class="pos-rel p-l-30" value="create_group" {!! isset(old("perms")[8]) ? 'checked="checked"' : '' !!}  >
                                Create Groups
                                <br>
                                <input id="lu" name="perms[9]" type="checkbox" class="pos-rel p-l-30" value="update_group" {!! isset(old("perms")[9]) ? 'checked="checked"' : '' !!}  >
                                Update Groups
                                <br>
                                <input id="lu" name="perms[10]" type="checkbox" class="pos-rel p-l-30" value="delete_group" {!! isset(old("perms")[10]) ? 'checked="checked"' : '' !!}  >
                                Delete Groups                                                         
                            </div>                           
                        </div>
                        <div class="form-group ">
                            <label for="title" class="col-sm-2 control-label">
                                News Category
                            </label>
                            <div class="col-sm-5">                            
                                <input id="lu" name="perms[11]" type="checkbox" class="pos-rel p-l-30" value="newscategories" {!! isset(old("perms")[11]) ? 'checked="checked"' : '' !!} >
                                List News Categories
                                <br>
                                <input id="lu" name="perms[12]" type="checkbox" class="pos-rel p-l-30" value="data_newscategory" {!! isset(old("perms")[12]) ? 'checked="checked"' : '' !!}  >
                                Data News Categories   
                                <br>
                                <input id="lu" name="perms[13]" type="checkbox" class="pos-rel p-l-30" value="create_newscategory" {!! isset(old("perms")[13]) ? 'checked="checked"' : '' !!}  >
                                Create News Categories
                                <br>
                                <input id="lu" name="perms[14]" type="checkbox" class="pos-rel p-l-30" value="update_newscategory" {!! isset(old("perms")[14]) ? 'checked="checked"' : '' !!}  >
                                Update News Categories
                                <br>
                                <input id="lu" name="perms[15]" type="checkbox" class="pos-rel p-l-30" value="delete_newscategory" {!! isset(old("perms")[15]) ? 'checked="checked"' : '' !!}  >
                                Delete News Categories                                                         
                            </div>                           
                        </div>
                        <div class="form-group ">
                            <label for="title" class="col-sm-2 control-label">
                                News
                            </label>
                            <div class="col-sm-5">                            
                                <input id="lu" name="perms[16]" type="checkbox" class="pos-rel p-l-30" value="news" {!! isset(old("perms")[16]) ? 'checked="checked"' : '' !!} >
                                List News
                                <br>
                                <input id="lu" name="perms[17]" type="checkbox" class="pos-rel p-l-30" value="data_news" {!! isset(old("perms")[17]) ? 'checked="checked"' : '' !!}  >
                                Data News   
                                <br>
                                <input id="lu" name="perms[18]" type="checkbox" class="pos-rel p-l-30" value="create_news" {!! isset(old("perms")[18]) ? 'checked="checked"' : '' !!}  >
                                Create News
                                <br>
                                <input id="lu" name="perms[19]" type="checkbox" class="pos-rel p-l-30" value="update_news" {!! isset(old("perms")[19]) ? 'checked="checked"' : '' !!}  >
                                Update News
                                <br>
                                <input id="lu" name="perms[20]" type="checkbox" class="pos-rel p-l-30" value="delete_news" {!! isset(old("perms")[20]) ? 'checked="checked"' : '' !!}  >
                                Delete News   
                                <br>
                                <input id="lu" name="perms[21]" type="checkbox" class="pos-rel p-l-30" value="news_show" {!! isset(old("perms")[21]) ? 'checked="checked"' : '' !!}  >
                                View News                                                         
                            </div>                           
                        </div>
                        <div class="form-group ">
                            <label for="title" class="col-sm-2 control-label">
                                Pages
                            </label>
                            <div class="col-sm-5">                            
                                <input id="lu" name="perms[22]" type="checkbox" class="pos-rel p-l-30" value="pages" {!! isset(old("perms")[22]) ? 'checked="checked"' : '' !!} >
                                List Pages
                                <br>
                                <input id="lu" name="perms[23]" type="checkbox" class="pos-rel p-l-30" value="data_page" {!! isset(old("perms")[23]) ? 'checked="checked"' : '' !!}  >
                                Data Pages   
                                <br>
                                <input id="lu" name="perms[24]" type="checkbox" class="pos-rel p-l-30" value="create_page" {!! isset(old("perms")[24]) ? 'checked="checked"' : '' !!}  >
                                Create Pages
                                <br>
                                <input id="lu" name="perms[25]" type="checkbox" class="pos-rel p-l-30" value="update_page" {!! isset(old("perms")[25]) ? 'checked="checked"' : '' !!}  >
                                Update Pages
                                <br>
                                <input id="lu" name="perms[26]" type="checkbox" class="pos-rel p-l-30" value="delete_page" {!! isset(old("perms")[26]) ? 'checked="checked"' : '' !!}  >
                                Delete Pages                                                                                         
                            </div>                           
                        </div>
                        <div class="form-group ">
                            <label for="title" class="col-sm-2 control-label">
                                Sliders
                            </label>
                            <div class="col-sm-5">                            
                                <input id="lu" name="perms[27]" type="checkbox" class="pos-rel p-l-30" value="sliders" {!! isset(old("perms")[27]) ? 'checked="checked"' : '' !!} >
                                List Sliders
                                <br>
                                <input id="lu" name="perms[28]" type="checkbox" class="pos-rel p-l-30" value="data_slider" {!! isset(old("perms")[28]) ? 'checked="checked"' : '' !!}  >
                                Data Sliders   
                                <br>
                                <input id="lu" name="perms[29]" type="checkbox" class="pos-rel p-l-30" value="create_slider" {!! isset(old("perms")[29]) ? 'checked="checked"' : '' !!}  >
                                Create Sliders
                                <br>
                                <input id="lu" name="perms[30]" type="checkbox" class="pos-rel p-l-30" value="update_slider" {!! isset(old("perms")[30]) ? 'checked="checked"' : '' !!}  >
                                Update Sliders
                                <br>
                                <input id="lu" name="perms[31]" type="checkbox" class="pos-rel p-l-30" value="delete_slider" {!! isset(old("perms")[31]) ? 'checked="checked"' : '' !!}  >
                                Delete Sliders                                                                                         
                            </div>                           
                        </div>
                        <div class="form-group ">
                            <label for="title" class="col-sm-2 control-label">
                                Testimonials
                            </label>
                            <div class="col-sm-5">                            
                                <input id="lu" name="perms[32]" type="checkbox" class="pos-rel p-l-30" value="testimonials" {!! isset(old("perms")[32]) ? 'checked="checked"' : '' !!} >
                                List Testimonials
                                <br>
                                <input id="lu" name="perms[33]" type="checkbox" class="pos-rel p-l-30" value="data_testimonial" {!! isset(old("perms")[33]) ? 'checked="checked"' : '' !!}  >
                                Data Testimonials   
                                <br>
                                <input id="lu" name="perms[34]" type="checkbox" class="pos-rel p-l-30" value="create_testimonial" {!! isset(old("perms")[34]) ? 'checked="checked"' : '' !!}  >
                                Create Testimonials
                                <br>
                                <input id="lu" name="perms[35]" type="checkbox" class="pos-rel p-l-30" value="update_testimonial" {!! isset(old("perms")[35]) ? 'checked="checked"' : '' !!}  >
                                Update Testimonials
                                <br>
                                <input id="lu" name="perms[36]" type="checkbox" class="pos-rel p-l-30" value="delete_testimonial" {!! isset(old("perms")[36]) ? 'checked="checked"' : '' !!}  >
                                Delete Testimonials                                                                                         
                            </div>                           
                        </div>
                        <div class="form-group ">
                            <label for="title" class="col-sm-2 control-label">
                                FAQs
                            </label>
                            <div class="col-sm-5">                            
                                <input id="lu" name="perms[37]" type="checkbox" class="pos-rel p-l-30" value="faqs" {!! isset(old("perms")[37]) ? 'checked="checked"' : '' !!} >
                                List FAQs
                                <br>
                                <input id="lu" name="perms[38]" type="checkbox" class="pos-rel p-l-30" value="data_faq" {!! isset(old("perms")[38]) ? 'checked="checked"' : '' !!}  >
                                Data FAQs   
                                <br>
                                <input id="lu" name="perms[39]" type="checkbox" class="pos-rel p-l-30" value="create_faq" {!! isset(old("perms")[39]) ? 'checked="checked"' : '' !!}  >
                                Create FAQs
                                <br>
                                <input id="lu" name="perms[40]" type="checkbox" class="pos-rel p-l-30" value="update_faq" {!! isset(old("perms")[40]) ? 'checked="checked"' : '' !!}  >
                                Update FAQs
                                <br>
                                <input id="lu" name="perms[41]" type="checkbox" class="pos-rel p-l-30" value="delete_faq" {!! isset(old("perms")[41]) ? 'checked="checked"' : '' !!}  >
                                Delete FAQs                                                                                         
                            </div>                           
                        </div>
                        <div class="form-group ">
                            <label for="title" class="col-sm-2 control-label">
                                Golf Courses
                            </label>
                            <div class="col-sm-5">                            
                                <input id="lu" name="perms[42]" type="checkbox" class="pos-rel p-l-30" value="golf_courses" {!! isset(old("perms")[42]) ? 'checked="checked"' : '' !!} >
                                List Golf Courses
                                <br>
                                <input id="lu" name="perms[43]" type="checkbox" class="pos-rel p-l-30" value="data_golf_course" {!! isset(old("perms")[43]) ? 'checked="checked"' : '' !!}  >
                                Data Golf Courses   
                                <br>
                                <input id="lu" name="perms[44]" type="checkbox" class="pos-rel p-l-30" value="create_golf_course" {!! isset(old("perms")[44]) ? 'checked="checked"' : '' !!}  >
                                Create Golf Courses
                                <br>
                                <input id="lu" name="perms[45]" type="checkbox" class="pos-rel p-l-30" value="update_golf_course" {!! isset(old("perms")[45]) ? 'checked="checked"' : '' !!}  >
                                Update Golf Courses
                                <br>
                                <input id="lu" name="perms[46]" type="checkbox" class="pos-rel p-l-30" value="delete_golf_course" {!! isset(old("perms")[46]) ? 'checked="checked"' : '' !!}  >
                                Delete Golf Courses                                                                                         
                            </div>                           
                        </div>
                        <div class="form-group ">
                            <label for="title" class="col-sm-2 control-label">
                                Menu Links
                            </label>
                            <div class="col-sm-5">                            
                                <input id="lu" name="perms[47]" type="checkbox" class="pos-rel p-l-30" value="menu_links" {!! isset(old("perms")[47]) ? 'checked="checked"' : '' !!} >
                                List Menu Links
                                <br>                                
                                <input id="lu" name="perms[48]" type="checkbox" class="pos-rel p-l-30" value="create_menu_link" {!! isset(old("perms")[48]) ? 'checked="checked"' : '' !!}  >
                                Create Menu Links
                                <br>
                                <input id="lu" name="perms[49]" type="checkbox" class="pos-rel p-l-30" value="update_menu_link" {!! isset(old("perms")[49]) ? 'checked="checked"' : '' !!}  >
                                Update Menu Links
                                <br>
                                <input id="lu" name="perms[50]" type="checkbox" class="pos-rel p-l-30" value="delete_menu_link" {!! isset(old("perms")[50]) ? 'checked="checked"' : '' !!}  >
                                Delete Menu Links                                                                                         
                            </div>                           
                        </div>

                        <div class="form-group ">
                            <label for="title" class="col-sm-2 control-label">
                                Contact Us
                            </label>
                            <div class="col-sm-5">                            
                                <input id="lu" name="perms[51]" type="checkbox" class="pos-rel p-l-30" value="contact-assignment" {!! isset(old("perms")[51]) ? 'checked="checked"' : '' !!} >
                                List Contact Us
                                <br>                                
                                <input id="lu" name="perms[52]" type="checkbox" class="pos-rel p-l-30" value="data_contact_list" {!! isset(old("perms")[52]) ? 'checked="checked"' : '' !!}  >
                                Data Contact Us
                                <br>
                                <input id="lu" name="perms[53]" type="checkbox" class="pos-rel p-l-30" value="view_contact_request" {!! isset(old("perms")[53]) ? 'checked="checked"' : '' !!}  >
                                View Contact Us
                                <br>
                                <input id="lu" name="perms[54]" type="checkbox" class="pos-rel p-l-30" value="delete_contact_request" {!! isset(old("perms")[54]) ? 'checked="checked"' : '' !!}  >
                                Delete Contact Us                                                                                         
                            </div>                           
                        </div>
                        
                        <div class="form-group ">
                            <label for="title" class="col-sm-2 control-label">
                                Site Settings
                            </label>
                            <div class="col-sm-5">                            
                                <input id="lu" name="perms[55]" type="checkbox" class="pos-rel p-l-30" value="site_setting" {!! isset(old("perms")[55]) ? 'checked="checked"' : '' !!} >
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
                </div>
            </div>
        </div>
    </div>
    <!-- row-->
</section>
@stop
