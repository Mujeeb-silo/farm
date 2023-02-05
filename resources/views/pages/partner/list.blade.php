@extends('layouts.app') 
 @section('content') 
 @php
   $prefix=userType();
 @endphp
 <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/data-tables/css/jquery.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')}}">
<div id="main"> <div class="row">
  <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
  <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
    <div class="container">
      <div class="row">
        <div class="col s10 m6 l6">
          <h5 class="breadcrumbs-title mt-0 mb-0">
            <span>Project List</span>
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
        <div class="col s2 m6 l6">
          <a class="btn dropdown-settings waves-effect waves-light breadcrumbs-btn right" href="#!" data-target="dropdown1">
            <i class="material-icons hide-on-med-and-up">settings</i>
            <span class="hide-on-small-onl">Action</span>
            <i class="material-icons right">arrow_drop_down</i>
          </a>
          <ul class="dropdown-content" id="dropdown1" tabindex="0">
           
            <li tabindex="0">
              <a class="grey-text text-darken-2" href="{{url($prefix.'/partner/add')}}">New Project</a>
            </li>
            
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="col s12">
    <div class="container">
      <section class="users-list-wrapper section">
        <div class="users-list-filter">
          <div class="card-panel">
            <div class="row">
              <div class="col s12 m0 l10">
                <h5 class="card-title">Select Option</h5>
              </div>
            </div>
             <div class="row ">

                <div class="input-field col m2 s2">
                  <label>
                   <input name="group1" type="radio" >
                   <span>Saved</span>
                  </label> 
                </div>
                <div class="input-field col m2 s2">
                  <label>
                   <input name="group1" type="radio" >
                   <span>Submited</span>
                  </label> 
                </div>
                <div class="input-field col m2 s2">
                  <label>
                   <input name="group1" type="radio" >
                   <span>Short List</span>
                  </label> 
                </div>
                <div class="input-field col m2 s2">
                  <label>
                   <input name="group1" type="radio" >
                   <span>Deactive</span>
                  </label> 
                </div>
                <div class="input-field col m2 s2">
                  <label>
                   <input name="group1" type="radio" >
                   <span>Checkout</span>
                  </label> 
                </div>
              </div>
             @if(Auth::user()->usertype=='Admin') 
              <div class="row mb-2">
                <div class="input-field col m2 s2">
                  <h5 class="new badge left ml-0 mr-2"><b>Partner :</b></h5>  
                </div>
                <div class="input-field col m2 s2">
                  <label>
                   <input name="group1" type="radio" >
                   <span>Published</span>
                  </label> 
                </div>
                <div class="input-field col m2 s2">
                  <label>
                   <input name="group1" type="radio" >
                   <span>Checkout</span>
                  </label> 
                </div>
              </div>
            @endif  
          </div>
        </div>
        <div class="users-list-table">
          <div class="card">
            <div class="card-content">
              <div class="responsive-table">
                <div class="row">
                  <form id="filter_form">
                    <div class="col s12 m6 l3">
                      <label for="users-list-verified">Req. ID</label>
                      <div class="input-fields">
                        <input type="text" id="req_id" name="req_id" class="form-control">
                      </div>
                    </div>
                    <div class="col s12 m6 l3">
                      <label for="users-list-role">Title</label>
                      <div class="input-fields">
                        <input type="text" id="title" name="title" class="form-control">
                      </div>
                    </div>
                    <div class="col s12 m6 l3">
                      <label for="users-list-status">Skill</label>
                      <div class="input-fields">
                        <select class="form-control" id="skill" name="skill">
                          <option value="">Any</option>
                          @if(isset($skills) && !empty($skills))
                            @foreach($skills as $row)
                             <option value="{{$row->name}}">{{$row->name}}</option>
                            @endforeach
                          @endif
                        </select>
                      </div>
                    </div>
                    <div class="col s12 m6 l3">
                      <label for="users-list-status">Location</label>
                      <div class="input-fields">
                        <input type="text" id="location" name="location" class="form-control">
                      </div>
                    </div>
                    <div class="col s12 m6 l3 display-flex align-items-center text-center show-btn">
                      <button type="button" class="btn btn-block indigo waves-effect waves-light search_filter">Search</button>
                    </div>
                  </form>
            </div>
                <table id="users-list-datatable" class="table mt-5">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Title</th>
                      <th>Type</th>
                      <th>Skill</th>
                      <th>Experience</th>
                      <th>Publish Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                  </tbody>
                </table>
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
  <script src="{{asset('app-assets/vendors/data-tables/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('app-assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')}}"></script>


  <script type="text/javascript">
    $(document).ready(function()
    {
      
      $('.scrollspy').scrollSpy();
      $('tabs').tabs();

      

      var obj={};
        obj.table_name='users-list-datatable';
        obj.url="{{url($prefix.'/requirement/get/list')}}";
        obj.isSearch=false;
        obj.column=[
            { data: 'id' },
            { data: 'title' },
            { data: 'request_type_id' },
            { data: 'primary_skills' },
            { data: 'max_experience' },
            { data: 'created_at' },
            { data: 'action' },
            /*{render:function(data,type,row){
                return (row.hasOwnProperty('regions'))?row.ame:'';
            }},*/
            
        ];

        obj.method="POST";
        
        window.obj=obj;
        dTable(obj)
       
        
    });
    $(document).on('click','.search_filter',function(){
      var obj=window.obj;
      obj.dfunction=function(d) 
      {
        d.mdata={"req_id":$('#req_id').val(),"title":$('#title').val(),"skill":$('#skill').val(),"location":$('#location').val(),}
      }
      dTable(obj)
    })

    @if($errors->any())
     notifications("{{$errors->first()}}",'error');
    @endif
  </script>
@endsection  
@endsection