@extends('layouts.app') 
 @section('content') 
 @php
   $prefix=userType();
 @endphp


<div id="main"> <div class="row">
  <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
  <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
    <div class="container">
      <div class="row">
        <div class="col s10 m6 l6">
          <h5 class="breadcrumbs-title mt-0 mb-0">
            <span>Requirment List</span>
          </h5>
          <!-- <ol class="breadcrumbs mb-0">
            <li class="breadcrumb-item">
              <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item">
              <a href="#">User</a>
            </li>
            <li class="breadcrumb-item active">Users List </li>
          </ol> -->
        </div>
        
      </div>
    </div>
  </div>
  <div class="col s12">
    <div class="container">
      <section class="users-list-wrapper section">
        <div class="row">
           <div class="col s12 m12 l12">
            <div id="Form-advance" class="card card card-default scrollspy">
              <div class="card-content">
                <h4 class="card-title">Form Advance</h4>
                <form id="req_form" class="form" autocomplete="off" enctype="multipart/form-data" method="post" action="{{url($prefix.'/requirement/save')}}"> 
                        @csrf
                  <input type="hidden" id="formtype" name="formtype">
                  <input type="hidden" @if(isset($req) && !empty($req)) value="{{$req->id}}" @endif id="vid" name="vid">
                  <div class="row">
                    <div class="input-field col m3 s12">
                      <input id="req_title" name="req_title" class="required" required  type="text" @if(isset($req) && !empty($req)) value="{{$req->title}}"  @endif>
                      <small class="errorTxt0"></small>
                      <label for="req_title">Title *</label>
                    </div>
                    <div class="input-field col m3 s12">
                      <select id="req_type" name="req_type" class="required error" data-error=".errorTxt1" required>
                        <option value="">Select</option>
                        <option value="Functional">Functional</option>
                        <option value="Technical">Technical</option>
                        <option value="Techno Functional">Techno Functional</option>
                      </select>
                      
                      <label for="req_type">Type *</label>
                      <small class="errorTxt1"></small>
                    </div>
                    <div class="input-field col m3 s12">
                      <select class="form-control required error" data-error=".errorTxt2" id="req_pskill"  name="req_pskill[]" multiple="multiple">
                        <optgroup label="Programming Languages">
                            <option value="C">C</option>
                            <option value="C++">C++</option>
                            <option value="Java">Java
                        </optgroup>
                        <optgroup label="Scripting Language">
                            <option value="JavaScript">JavaScript</option>
                            <option value="PHP">PHP</option>
                            <option value="Shell">Shell</option>
                        </optgroup>
                      </select>
                      <label for="req_primaryskill">Primary Skills *</label>
                      <small class="errorTxt2"></small>
                    </div>
                    <div class="input-field col m3 s12">
                      <select class="form-control required error" data-error=".errorTxt3" id="req_sskill" name="req_sskill[]" multiple="multiple">
                        <optgroup label="Programming Languages">
                            <option value="C">C</option>
                            <option value="C++">C++</option>
                            <option value="Java">Java
                        </optgroup>
                        <optgroup label="Scripting Language">
                            <option value="JavaScript">JavaScript</option>
                            <option value="PHP">PHP</option>
                            <option value="Shell">Shell</option>
                        </optgroup>
                      </select>
                      <label for="req_secskill">Secondary Skills</label>
                      <small class="errorTxt3"></small>
                    </div>
                  </div>
                  <div class="row">
                    <label for="req_description">Requirement Description *</label>
                    <div id="full-container">
                      <textarea id="req_description" name="req_description">@if(isset($req) && !empty($req)) {!! $req->description !!}  @endif</textarea>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class="input-field col m3 s12">
                      <input id="req_qty" name="req_qty" type="text" class="required" @if(isset($req) && !empty($req)) value="{{$req->req_qty}}" @endif required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                      <label for="req_qty">Requirement Quantity *</label>
                    </div>
                    <div class="input-field col m3 s12">
                      <select id="req_industry" name="req_industry" data-error=".errorTxt4" class="error" required>
                        <option value="">Select</option>
                        <option value="IT Service">IT Service</option>
                        <option value="Telecome">Telecome</option>
                        <option value="IT Product Development">IT Product Development</option>
                        <option value="IT Engineering Service">IT Engineering Service</option>
                        <option value="IT Embedded Service">IT Embedded Service</option>
                      </select>
                      <label for="req_industry">Industry *</label>
                      <small class="errorTxt4"></small>
                    </div>
                    <div class="input-field col m3 s12">
                      <select id="req_project_type" name="req_project_type" data-error=".errorTxt5" class="error">
                        <option value="" >Select</option>
                         <option value="Requirement Gathering">Requirement Gathering</option>
                        <option value="1">Design</option>
                        <option value="2">Development</option>
                        <option value="3">Testing</option>
                        <option value="4">Support</option>
                        <option value="5">Project Management</option>
                        <option value="6">Architect</option>
                      </select>
                      <label for="req_project_type">Project Type</label>
                      <small class="errorTxt5"></small>
                    </div>
                    <div class="input-field col m3 s12">
                      <select id="req_worklocation" name="req_worklocation" data-error=".errorTxt6" class="error">>
                        <option value="">Choose your profile</option>
                        <option value="INDIA">INDIA</option>
                        <option value="BOTH">BOTH</option>
                        <option value="OVERSEAS">OVERSEAS</option>
                      </select>
                      <label for="req_worklocation">Work Location *</label>
                      <small class="errorTxt6"></small>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class="input-field col m3 s12">
                      <input id="req_cityname" name="req_cityname" type="text" @if(isset($req) && !empty($req)) value="{{$req->city}}" @endif>
                      <label for="req_cityname">City Name *</label>
                    </div>
                    <div class="input-field col m3 s12">
                      <input id="req_projectname" name="req_projectname" type="text" @if(isset($req) && !empty($req)) value="{{$req->duration}}" @endif oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                      <label for="req_projectname">Project Duration (months) *</label>
                    </div>
                    <div class="input-field col m3 s12">
                      <input id="req_minexp" name="req_minexp" type="text" @if(isset($req) && !empty($req)) value="{{$req->min_experience}}" @endif oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                      <label for="req_minexp">Min Exp. *</label>
                    </div>
                    <div class="input-field col m3 s12">
                      <input id="req_maxexp" name="req_maxexp" type="text" @if(isset($req) && !empty($req)) value="{{$req->max_experience}}" @endif oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                      <label for="req_maxexp">Max Exp. *</label>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class="input-field col m4 s12">
                      <input type="text" name="req_startdate" class="datepicker" id="dob" @if(isset($req) && !empty($req)) value="{{$req->start_date}}" @endif>
                      <label for="req_startdate">Start Date *</label>
                    </div>
                    <div class="col m8 s12 file-field input-field">
                      <div class="btn float-right">
                        <span>Upload Job Description</span>
                        <input id="req_upload" name="req_upload" type="file">
                      </div>
                      <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <textarea id="req_comments" name="req_comments" class="materialize-textarea">@if(isset($req) && !empty($req)) {!! $req->comment !!} @endif</textarea required>
                      <label for="req_comments">Comments</label>
                    </div>
                    <div class="input-field col m3 s12">
                      <select id="req_source" name="req_source" data-error=".errorTxt05" class="error">
                        <option value="" >Select Partner</option>
                        <option value="1" >Tesst</option>
                      </select>
                      <label for="req_source">Source</label>
                      <small class="errorTxt05"></small>
                    </div>
                    <div class="row">
                      <div class="input-field col s12">
                        <button class="btn btn-primary waves-effect waves-light right save" data-btn="Save" type="button" name="action" data-action='save'>Save
                          
                        </button>
                        <button class="btn btn-success waves-effect waves-light right save mr-2" data-btn="Submit" type="button" name="action" data-action='submited'>Submit
                        </button>
                        <a href="{{url($prefix.'/requirement/list')}}" class="btn btn-danger waves-effect waves-light right mr-2">Cancel
                        </a>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <div class="content-overlay"></div>
  </div>
</div>
</div>
@section('custome-js')
  
<script src="https://cdn.tiny.cloud/1/y5hy0yfk95gliwyz6v584b2xknx7ixy4alx1yws2hv90hswi/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <script src="https://cdn.jsdelivr.net/npm/@tinymce/tinymce-jquery@1/dist/tinymce-jquery.min.js"></script>
  <script src="{{asset('app-assets/vendors/jquery-validation/jquery.validate.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>


  <script type="text/javascript">
    @if(isset($req) && !empty($req))

      
     $('#req_type').val("{{$req->request_type_id}}").trigger('change');
     var pskill_id=[];
     @if(json_decode($req->primary_skills)>0)
       @foreach(json_decode($req->primary_skills) as $key=>$val)
        pskill_id.push("{{$val}}")
       @endforeach
     @endif

     var sskill_id=[];
     @if(json_decode($req->primary_skills)>0)
       @foreach(json_decode($req->secondary_skills) as $key=>$val)
        sskill_id.push("{{$val}}")
       @endforeach
     @endif
     $('#req_pskill').val(pskill_id).trigger('change');
     $('#req_sskill').val(sskill_id).trigger('change');
     
     $('#req_industry').val("{{$req->industry}}").trigger('change');
     $('#req_project_type').val("{{$req->project_type_id}}").trigger('change');
     $('#req_worklocation').val("{{$req->work_location}}").trigger('change');
     $('#req_source').val("{{$req->source_partner}}").trigger('change');
    @endif
    tinymce.init({
      selector: '#req_description',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      mergetags_list: [
        { value: 'First.Name', title: 'First Name' },
        { value: 'Email', title: 'Email' },
      ]
    });
  
   $('select[required]').css({
      position: 'absolute',
      display: 'inline',
      height: 0,
      padding: 0,
      border: '1px solid rgba(255,255,255,0)',
      width: 0
    });
 
    $("body").on("click",".save",function()
    {
      var _this = $(this);
      var ftype=_this.data('action')
      var btn_name=_this.data('btn')
      $('#formtype').val(ftype)
      checkValid()
      if($("#req_form").valid())
      {
        let innerText = tinyMCE.activeEditor.getContent({format : 'raw'});
        $("#req_description").val(innerText);
        _this.prop('disabled',true).text('Loading....');
      
        $("#req_form").ajaxForm({
          dataType:'json',
          success:function(response){

            if(response.status)
            {
                notifications(response.msg,'success');
                setTimeout(function()
                {
                  _this.prop('disabled',false).text(btn_name);   
                  window.location.href="{{url($prefix.'/requirement')}}";
                },2000);
            }
            else
            {
              if(!$.isEmptyObject(response.errors)){
                $('.err').remove();
                $.each(response.errors,function(index,item){
                  console.log('index',index);
                  console.log('item',item);
                  $('#'+index).after(`<p class="materialize-red-text err">${item}</p>`)
                });

              }
              notifications(response.msg,'error');
            }
            _this.prop('disabled',false).text(btn_name);
          }
        }).submit();
          
      }
    }); 
function checkValid()
{ 
  $("#req_form").validate({
    ignore: 'input[type=hidden], .select2-input, .select2-focusser',
    rules: {
      
      req_title: {
        required: true,
      },
      req_type: {
        required: true,
      },
      req_pskill: {
        required: true,
      },
      req_sskill: {
        required: true,
      },
      req_qty: {
        required: true,
      },
      req_industry: {
        required: true,
      },
      req_project_type: {
        required: true,
      },
      req_worklocation: {
        required: true,
      },
      req_cityname: {
        required: true,
      },
      req_projectname: {
        required: true,
      },
      req_minexp: {
        required: true,
      },
      req_maxexp: {
        required: true,
      },
      req_startdate: {
        required: true,
      },
      @if(!isset($req) && empty($req))
      req_upload:{
        required : true,
      },
      @endif
      req_source:{
        required:true
      }
    },
    //For custom messages
    messages: {
     
    },
    errorElement: 'div',
    errorPlacement: function (error, element) {
      var placement = $(element).data('error');
      if (placement) {
        $(placement).append(error)
      } else {
        error.insertAfter(element);
      }
    }
  });
}    
  </script>
@endsection  
@endsection