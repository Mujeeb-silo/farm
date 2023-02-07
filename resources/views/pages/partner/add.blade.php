<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
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
            <span>Partner Add</span>
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
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="company-detail-tab" data-bs-toggle="tab" data-bs-target="#company-detail" type="button" role="tab" aria-controls="home" aria-selected="true">Company Detail</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="partner-credentials-tab" data-bs-toggle="tab" data-bs-target="#partner-credentials" type="button" role="tab" aria-controls="profile" aria-selected="false">Partner Credentials</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-person-tab" data-bs-toggle="tab" data-bs-target="#contact-person" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact Person Info</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="finalcial-details-tab" data-bs-toggle="tab" data-bs-target="#finalcial-details" type="button" role="tab" aria-controls="contact" aria-selected="false">Finalcial Details</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="technical-detail-tab" data-bs-toggle="tab" data-bs-target="#technical-detail" type="button" role="tab" aria-controls="contact" aria-selected="false">Technical Detail</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="nda-tab" data-bs-toggle="tab" data-bs-target="#nda" type="button" role="tab" aria-controls="contact" aria-selected="false">NDA</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="evulation-tab" data-bs-toggle="tab" data-bs-target="#evulation" type="button" role="tab" aria-controls="contact" aria-selected="false">Evulation</button>
                      </li>
                    </ul>
                    <form id="req_form" class="form" autocomplete="off" enctype="multipart/form-data" method="post" action="{{url($prefix.'/partner/save')}}" novalidate> 
                      @csrf
                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="company-detail" role="tabpanel" aria-labelledby="home-tab">
                          <div class="row">
                            <div class="input-field col m3 s12">
                              <input id="company_name" name="company_name" class="required" required  type="text" @if(isset($req) && !empty($req)) value="{{$req->title}}"  @endif>
                              <small class="errorTxt0"></small>
                              <label for="company_name">Company Name *</label>
                            </div>
                            <div class="input-field col m3 s12">
                              <input id="bussness" name="bussness" class="required" required  type="text" @if(isset($req) && !empty($req)) value="{{$req->title}}"  @endif>
                              <small class="errorTxt0"></small>
                              <label for="bussness">Business *</label>
                            </div>
                            <div class="input-field col m3 s12">
                              <input id="website" name="website" class="required" required  type="url" @if(isset($req) && !empty($req)) value="{{$req->title}}"  @endif>
                              <small class="errorTxt0"></small>
                              <label for="website">Website *</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col m3 s12">
                              <input id="contact_name" name="contact_name" class="required" required  type="text" @if(isset($req) && !empty($req)) value="{{$req->title}}"  @endif>
                              <small class="errorTxt0"></small>
                              <label for="contact_name">Contact Name *</label>
                            </div>
                            <div class="input-field col m3 s12">
                              <input id="contact_number" name="contact_number" class="required" required  type="text" @if(isset($req) && !empty($req)) value="{{$req->title}}"  @endif>
                              <small class="errorTxt0"></small>
                              <label for="contact_number">Contact Number *</label>
                            </div>
                            <div class="input-field col m3 s12">
                              <input id="email_Id" name="email_Id" class="required" required  type="email" @if(isset($req) && !empty($req)) value="{{$req->title}}"  @endif>
                              <small class="errorTxt0"></small>
                              <label for="email_Id">Email ID *</label>
                            </div>
                          </div>
                          <div class="append-input">
                            <div class="row">
                              <div class="input-field col m3 s12">
                                <input id="address" name="address" class="required" required  type="text" @if(isset($req) && !empty($req)) value="{{$req->title}}"  @endif>
                                <small class="errorTxt0"></small>
                                <label for="address">Adderess </label>
                              </div>
                              <div class="input-field col m3 s12">
                                <input id="city" name="city" class="required" required  type="text" @if(isset($req) && !empty($req)) value="{{$req->title}}"  @endif>
                                <small class="errorTxt0"></small>
                                <label for="city">City </label>
                              </div>
                              <div class="input-field col m3 s12">
                                <input id="state" name="state" class="required" required  type="text" @if(isset($req) && !empty($req)) value="{{$req->title}}"  @endif>
                                <small class="errorTxt0"></small>
                                <label for="state">State </label>
                              </div>
                              <div class="input-field col m3 s12">
                                <input id="pin_code" name="pin_code" class="required" required  type="number" @if(isset($req) && !empty($req)) value="{{$req->title}}"  @endif>
                                <small class="errorTxt0"></small>
                                <label for="pin_code">Pin Code </label>
                              </div>
                              <div class="input-field col m3 s12">
                                <input id="country" name="country" class="required" required  type="text" @if(isset($req) && !empty($req)) value="{{$req->title}}"  @endif>
                                <small class="errorTxt0"></small>
                                <label for="country">Country </label>
                              </div>
                              <div class="input-field col-1 m3 s12">
                                <button class="btn btn-success " type="button" id="add-input">+</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane fade" id="partner-credentials" role="tabpanel" aria-labelledby="profile-tab">
                          <div class="row">
                            <div class="input-field col m3 s12">
                              <input id="name" name="name" class="required" required  type="text" @if(isset($req) && !empty($req)) value="{{$req->title}}"  @endif>
                              <small class="errorTxt0"></small>
                              <label for="name"> Name *</label>
                            </div>
                            <div class="input-field col m3 s12">
                              <input id="email" name="email" class="required" required  type="text" @if(isset($req) && !empty($req)) value="{{$req->title}}"  @endif>
                              <small class="errorTxt0"></small>
                              <label for="email">Email *</label>
                            </div>
                            <div class="input-field col m3 s12">
                              <input id="mobile" name="mobile" class="required" required  type="text" @if(isset($req) && !empty($req)) value="{{$req->title}}"  @endif>
                              <small class="errorTxt0"></small>
                              <label for="mobile">Mobile *</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col m3 s12">
                              <input id="designation" name="designation" class="required" required  type="text" @if(isset($req) && !empty($req)) value="{{$req->title}}"  @endif>
                              <small class="errorTxt0"></small>
                              <label for="designation"> Designation *</label>
                            </div>
                            <div class="input-field col m3 s12">
                              <input id="password" name="password" class="required" required  type="password" @if(isset($req) && !empty($req)) value="{{$req->title}}"  @endif>
                              <small class="errorTxt0"></small>
                              <label for="password">Password *</label>
                            </div>
                            <div class="input-field col m3 s12">
                              <input id="conf_password" name="conf_password" class="required" required  type="password" @if(isset($req) && !empty($req)) value="{{$req->title}}"  @endif>
                              <small class="errorTxt0"></small>
                              <label for="conf_password">Confirm Password *</label>
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane fade" id="contact-person" role="tabpanel" aria-labelledby="contact-tab">
                          <div id="contact-input-append">
                            <div class="row">
                              <div class="input-field col m3 s12">
                                <input id="contact_person" name="contact_person" class="required" required  type="text" @if(isset($req) && !empty($req)) value="{{$req->title}}"  @endif>
                                <small class="errorTxt0"></small>
                                <label for="contact_person">Contact Person </label>
                              </div>
                              <div class="input-field col m3 s12">
                                <input id="contact_designation" name="contact_designation" class="required" required  type="text" @if(isset($req) && !empty($req)) value="{{$req->title}}"  @endif>
                                <small class="errorTxt0"></small>
                                <label for="contact_designation">Contact Designation </label>
                              </div>
                              <div class="input-field col m3 s12">
                                <input id="contact_mobile" name="contact_mobile" class="required" required  type="text" @if(isset($req) && !empty($req)) value="{{$req->title}}"  @endif>
                                <small class="errorTxt0"></small>
                                <label for="contact_mobile">Mobile </label>
                              </div>
                              <div class="input-field col m3 s12">
                                <input id="contact_email_id" name="contact_email_id" class="required" required  type="email" @if(isset($req) && !empty($req)) value="{{$req->title}}"  @endif>
                                <small class="errorTxt0"></small>
                                <label for="contact_email_id">Email Id</label>
                              </div>
                              <div class="input-field col m3 s12">
                                <input id="contact_location" name="contact_location" class="required" required  type="text" @if(isset($req) && !empty($req)) value="{{$req->title}}"  @endif>
                                <small class="errorTxt0"></small>
                                <label for="contact_location">Location </label>
                              </div>
                              <div class="input-field col-1 m3 s12">
                                <button class="btn btn-success " type="button" id="contact-input-add">+</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane fade" id="finalcial-details" role="tabpanel" aria-labelledby="contact-tab">
                          <div class="row">
                            <div class="input-field col m3 s12">
                              <input id="pan_no" name="pan_no" class="required" required  type="text" @if(isset($req) && !empty($req)) value="{{$req->title}}"  @endif>
                              <small class="errorTxt0"></small>
                              <label for="pan_no">Pan No </label>
                            </div>
                            <div class="col m8 s12 file-field input-field">
                              <div class="btn float-right">
                                <span>Pan File (PDF/Photo)</span>
                                <input id="pan_file" name="pan_file" type="file">
                              </div>
                              <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                              </div>
                            </div>
                            <div class="input-field col m3 s12">
                              <input id="gst_no" name="gst_no" class="required" required  type="number" @if(isset($req) && !empty($req)) value="{{$req->title}}"  @endif>
                              <small class="errorTxt0"></small>
                              <label for="gst_no">GST NO </label>
                            </div>
                          </div>
                          <div class="row">
                              <div class="col m8 s12 file-field input-field">
                              <div class="btn float-right">
                                <span>GST File (PDF/Photo)</span>
                                <input id="gst_file" name="gst_file" type="file">
                              </div>
                              <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                              </div>
                            </div>
                            <div class="input-field col m3 s12">
                              <input id="bussness_account_no" name="bussness_account_no" class="required" required  type="text" @if(isset($req) && !empty($req)) value="{{$req->title}}"  @endif>
                              <small class="errorTxt0"></small>
                              <label for="bussness_account_no">Bussness Account No *</label>
                            </div>
                            <div class="input-field col m3 s12">
                              <input id="bank_name" name="bank_name" class="required" required  type="text" @if(isset($req) && !empty($req)) value="{{$req->title}}"  @endif>
                              <small class="errorTxt0"></small>
                              <label for="bank_name">Bank Name *</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col m3 s12">
                              <input id="ifsc_code" name="ifsc_code" class="required" required  type="text" @if(isset($req) && !empty($req)) value="{{$req->title}}"  @endif>
                              <small class="errorTxt0"></small>
                              <label for="ifsc_code">IFSC *</label>
                            </div>
                            <div class="input-field col m3 s12">
                              <input id="back_address" name="back_address" class="required" required  type="text" @if(isset($req) && !empty($req)) value="{{$req->title}}"  @endif>
                              <small class="errorTxt0"></small>
                              <label for="back_address">Bank Address *</label>
                            </div>
                            <div class="input-field col m3 s12">
                              <input id="swift_code" name="swift_code" class="required" required  type="number" @if(isset($req) && !empty($req)) value="{{$req->title}}"  @endif>
                              <small class="errorTxt0"></small>
                              <label for="swift_code">Swift Code *</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col m3 s12">
                              <input id="iban_number" name="iban_number" class="required" required  type="text" @if(isset($req) && !empty($req)) value="{{$req->title}}"  @endif>
                              <small class="errorTxt0"></small>
                              <label for="iban_number">IBAN Number *</label>
                            </div>
                            <div class="col m8 s12 file-field input-field">
                              <div class="btn float-right">
                                <span>Check File</span>
                                <input id="check_file" name="check_file" type="file">
                              </div>
                              <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane fade" id="technical-detail" role="tabpanel" aria-labelledby="contact-tab">
                          <div id="technical-input-append">
                            <div class="row">
                              <div class="input-field col m3 s12">
                                <input id="core_technology" name="core_technology" class="required" required  type="text" @if(isset($req) && !empty($req)) value="{{$req->title}}"  @endif>
                                <small class="errorTxt0"></small>
                                <label for="core_technology">Core Technology </label>
                              </div>
                              <div class="input-field col m3 s12">
                                <input id="other_expertise" name="other_expertise" class="required" required  type="text" @if(isset($req) && !empty($req)) value="{{$req->title}}"  @endif>
                                <small class="errorTxt0"></small>
                                <label for="other_expertise">Other Expertise </label>
                              </div>
                              <div class="input-field col m3 s12">
                                <input id="technology" name="technology" class="required" required  type="text" @if(isset($req) && !empty($req)) value="{{$req->title}}"  @endif>
                                <small class="errorTxt0"></small>
                                <label for="technology">Technology </label>
                              </div>
                              <div class="input-field col-1 m3 s12">
                                <button class="btn btn-success " type="button" id="technical-input-add">+</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane fade" id="nda" role="tabpanel" aria-labelledby="contact-tab">
                          <div class="row">
                            <div class="input-field col s12">
                              <select name="">
                                <option value="" >Choose your option</option>
                                <option value="1">Option 1</option>
                                <option value="2">Option 2</option>
                                <option value="3">Option 3</option>
                              </select>
                              <label>NDA Status</label>
                            </div>
                            <div class="input-field col m3 s12">
                              <input id="date_of_nda" name="date_of_nda" class="required datepicker" required  type="text" @if(isset($req) && !empty($req)) value="{{$req->title}}"  @endif>
                              <small class="errorTxt0"></small>
                              <label for="date_of_nda">Date of NDA </label>
                            </div>
                            <div class="input-field col m3 s12">
                              <input id="end_date" name="end_date" class="required datepicker" required  type="text" @if(isset($req) && !empty($req)) value="{{$req->title}}"  @endif>
                              <small class="errorTxt0"></small>
                              <label for="end_date">End Date </label>
                            </div>
                            <div class="col m8 s12 file-field input-field">
                              <div class="btn float-right">
                                <span>NDA File</span>
                                <input id="nda_file" name="nda_file" type="file">
                              </div>
                              <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane fade" id="evulation" role="tabpanel" aria-labelledby="contact-tab">
                          <div class="row">
                            <div class="input-field col s12">
                              <select name="">
                                <option value="" >Category</option>
                                <option value="1">Option 1</option>
                                <option value="2">Option 2</option>
                                <option value="3">Option 3</option>
                              </select>
                              <label>Category</label>
                            </div>
                            <div class="input-field col m3 s12">
                              <input id="strength" name="strength" class="required" required  type="text" @if(isset($req) && !empty($req)) value="{{$req->title}}"  @endif>
                              <small class="errorTxt0"></small>
                              <label for="strength">Strength </label>
                            </div>
                            <div class="input-field col m3 s12">
                              <input id="weakness" name="weakness" class="required" required  type="text" @if(isset($req) && !empty($req)) value="{{$req->title}}"  @endif>
                              <small class="errorTxt0"></small>
                              <label for="weakness">Weakness </label>
                            </div>
                            <div class="input-field col m3 s12">
                              <input id="no_of_employee" name="no_of_employee" class="required" required  type="number" @if(isset($req) && !empty($req)) value="{{$req->title}}"  @endif>
                              <small class="errorTxt0"></small>
                              <label for="no_of_employee">No. of Employee </label>
                            </div>
                            <div class="input-field col m3 s12">
                              <input id="turn_over" name="turn_over" class="required" required  type="text" @if(isset($req) && !empty($req)) value="{{$req->title}}"  @endif>
                              <small class="errorTxt0"></small>
                              <label for="turn_over">Turn Over </label>
                            </div>

                          </div>
                        </div>
                      </div>
                      <div class="row">
                      <div class="input-field col s12">
                        <button class="btn btn-primary waves-effect waves-light right save" data-btn="Save" type="button" name="action" data-action="save">Save
                          
                        </button>
                        <button class="btn btn-success waves-effect waves-light right save mr-2" data-btn="Submit" type="button" name="action" data-action="submited">Submit
                        </button>
                        <a href="#" class="btn btn-danger waves-effect waves-light right mr-2">Cancel
                        </a>
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
  
  <script src="https://cdn.tiny.cloud/1/o63xbmggjr6m9w70dwyg6oe5kkqcux4vvnvzaeid6hbazj3g/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
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
      selector: '#tiny',
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
      req_upload: {
        required: true,
      },
      req_comments: {
        required: true,
      },
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
  $(function(){
    let i=1;
    $("#add-input").on('click',function(){
      $('.append-input').append(`
        <div class="row" id="row-${i}">
          <div class="input-field col m3 s12">
            <input id="address${i}" name="address" class="required" required  type="text" @if(isset($req) && !empty($req)) value="{{$req->title}}"  @endif>
            <small class="errorTxt0"></small>
            <label for="address${i}">Adderess </label>
          </div>
          <div class="input-field col m3 s12">
            <input id="city${i}" name="city" class="required" required  type="text" @if(isset($req) && !empty($req)) value="{{$req->title}}"  @endif>
            <small class="errorTxt0"></small>
            <label for="city${i}">City </label>
          </div>
          <div class="input-field col m3 s12">
            <input id="state${i}" name="state" class="required" required  type="text" @if(isset($req) && !empty($req)) value="{{$req->title}}"  @endif>
            <small class="errorTxt0"></small>
            <label for="state${i}">State </label>
          </div>
          <div class="input-field col m3 s12">
            <input id="pin_code${i}" name="pin_code" class="required" required  type="number" @if(isset($req) && !empty($req)) value="{{$req->title}}"  @endif>
            <small class="errorTxt0"></small>
            <label for="pin_code${i}">Pin Code </label>
          </div>
          <div class="input-field col m3 s12">
            <input id="country${i}" name="country" class="required" required  type="text" @if(isset($req) && !empty($req)) value="{{$req->title}}"  @endif>
            <small class="errorTxt0"></small>
            <label for="country${i}">Country </label>
          </div>
          <div class="input-field col-1 m3 s12">
            <button class="btn btn-success " type="button" onclick="removeFields(${i})">x</button>
          </div>
        </div>
      `);
      i++;
    });
    $("#contact-input-add").on('click',function(){
      $('#contact-input-append').append(`
        <div class="row" id="row-${i}">
          <div class="input-field col m3 s12">
            <input id="contact_person${i}" name="contact_person" class="required" required  type="text" @if(isset($req) && !empty($req)) value="{{$req->title}}"  @endif>
            <small class="errorTxt0"></small>
            <label for="contact_person${i}">Contact Person </label>
          </div>
          <div class="input-field col m3 s12">
            <input id="contact_designation${i}" name="contact_designation" class="required" required  type="text" @if(isset($req) && !empty($req)) value="{{$req->title}}"  @endif>
            <small class="errorTxt0"></small>
            <label for="contact_designation${i}">Contact Designation </label>
          </div>
          <div class="input-field col m3 s12">
            <input id="contact_mobile${i}" name="contact_mobile" class="required" required  type="text" @if(isset($req) && !empty($req)) value="{{$req->title}}"  @endif>
            <small class="errorTxt0"></small>
            <label for="contact_mobile${i}">Mobile </label>
          </div>
          <div class="input-field col m3 s12">
            <input id="contact_email_id${i}" name="contact_email_id" class="required" required  type="email" @if(isset($req) && !empty($req)) value="{{$req->title}}"  @endif>
            <small class="errorTxt0"></small>
            <label for="contact_email_id${i}">Email Id</label>
          </div>
          <div class="input-field col m3 s12">
            <input id="contact_location${i}" name="contact_location" class="required" required  type="text" @if(isset($req) && !empty($req)) value="{{$req->title}}"  @endif>
            <small class="errorTxt0"></small>
            <label for="contact_location${i}">Location </label>
          </div>
          <div class="input-field col-1 m3 s12 remove-btn">
            <button class="btn btn-success " type="button" onclick="removeFields(${i})" >x</button>
          </div>
        </div>
      `);
      i++;
    });
    $("#technical-input-add").on('click',function(){
      $('#technical-input-append').append(`
        <div class="row" id="row-${i}">
          <div class="input-field col m3 s12">
            <input id="core_technology${i}" name="core_technology" class="required" required  type="text" @if(isset($req) && !empty($req)) value="{{$req->title}}"  @endif>
            <small class="errorTxt0"></small>
            <label for="core_technology${i}">Core Technology </label>
          </div>
          <div class="input-field col m3 s12">
            <input id="other_expertise${i}" name="other_expertise" class="required" required  type="text" @if(isset($req) && !empty($req)) value="{{$req->title}}"  @endif>
            <small class="errorTxt0"></small>
            <label for="other_expertise${i}">Other Expertise </label>
          </div>
          <div class="input-field col m3 s12">
            <input id="technology${i}" name="technology" class="required" required  type="text" @if(isset($req) && !empty($req)) value="{{$req->title}}"  @endif>
            <small class="errorTxt0"></small>
            <label for="technology${i}">Technology </label>
          </div>
          <div class="input-field col-1 m3 s12 remove-btn">
            <button class="btn btn-success " type="button" onclick="removeFields(${i})" >x</button>
          </div>
        </div>
      `);
      i++;
    });

  });
  function removeFields(idVal){
    $('#row-'+idVal).remove();
  }
   $('.datepicker').datepicker();
  </script>  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection  
@endsection