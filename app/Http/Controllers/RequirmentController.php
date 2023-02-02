<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Requirment;
use App\Models\Skills;

use DB;
use Log;
use Auth;
use Redirect;
use DataTables;
class RequirmentController extends Controller
{
    
    public function index()
    {
       $skills=Skills::all(); 
       return view('pages.requirement.list',get_defined_vars());
    }
    public function addRequirement()
    {
       return view('pages.requirement.add'); 
    }
    public function editRequirement($serial_id)
    {
      $prefix=userType();
      $req=Requirment::where('serial_no',$serial_id)->first();  
      if(empty($req))
      {
        return Redirect::to($prefix.'/requirement')->withErrors(['msg' => 'Requirment Not Found']);
      }
      return view('pages.requirement.add',get_defined_vars());    
    }
    public function saveRequirement(Request $request)
    {
        
        $validated = $request->validate([
            'req_title' => 'required',
            'req_type' => 'required',
            'req_pskill' => 'required',
            'req_sskill' => 'required',
            'req_qty' => 'required',
            'req_industry' => 'required',
            'req_project_type' => 'required',
            'req_worklocation' => 'required',
            'req_cityname' => 'required',
            'req_projectname' => 'required',
            'req_minexp' => 'required',
            'req_maxexp' => 'required',
            'req_startdate' => 'required',
            'req_upload' => 'required',
            'req_comments' => 'required',
        ]);

        DB::beginTransaction();

        try 
        {
          
          $requirment=(isset($request->vid))? Requirment::find($request->vid): new Requirment();

          //$requirment->
          $requirment->serial_no=111222;
          $requirment->title=$request->req_title;
          $requirment->description=$request->req_description;
          $requirment->request_type_id=$request->req_type;
          $requirment->primary_skills= json_encode($request->req_pskill);
          $requirment->secondary_skills= json_encode($request->req_sskill);
          $requirment->min_experience=$request->req_minexp;
          $requirment->req_qty=$request->req_qty;
          $requirment->max_experience=$request->req_maxexp;
          $requirment->work_location=$request->req_worklocation;
          /*$requirment->place=$request->
          $requirment->country=$request->
          $requirment->state=$request->
          $requirment->city=$request->*/
          $requirment->project_type_id=$request->req_project_type;
          
          $requirment->industry=$request->req_industry;
          $requirment->duration=$request->req_projectname;
          $requirment->start_date=date('Y-m-d',strtotime($request->req_startdate));

          if(Auth::user()->usertype=='Admin')
          {
            $requirment->admin_status=$request->formtype;  
            $requirment->partner_status='pending';  
          }
          
          if(Auth::user()->usertype=='Partner')
          {
            $requirment->partner_status=$request->formtype;
            $requirment->admin_status='pending';   
          }  
          //$requirment->partner_status=$request->

          $requirment->cuser_id=Auth::user()->id;
          $requirment->created_by=strtolower(Auth::user()->usertype);
          if(isset($request->req_source))
          {
             //$requirment->source=$request->req_source;  
             $requirment->source_partner=$request->req_source;
          }

          if($request->hasFile('req_upload')){

             $res=UploadImages($request,'req_upload',config('global.req_upload_dir'));
             if($res!='')
             {
               //$requirment->document_path=config('global.req_upload_dir').'/'.$res;   
               $requirment->document_path=$res;
             }
           }
          
          $requirment->comment=$request->req_comments;
          $requirment->save();

          DB::commit(); 
          return response()->json(['status'=>true,'msg'=>(isset($request->vid))?'Requirment updated':'Requirment added']);
        } 
        catch (\Exception $e) 
        {
          DB::rollback();  
          return response()->json(['status'=>false,'msg'=>(isset($request->vid))?'Requirment updat failed :'.$e->getMessage():'Requirment add failed :'.$e->getMessage()]);
        }

    }
    public function listRequirement(Request $request)
    {
        $prefix=userType();
        if ($request->ajax()) 
        {
            
            $data = Requirment::when(isset($request->mdata['req_id']),function($query) use($request)
            {
                if($request->mdata['req_id']!=null)
                {
                    return $query->where('serial_no',$request->mdata['req_id']);
                }
            })->when(isset($request->mdata['skill']),function($query) use($request)
            {
                if($request->mdata['skill']!=null)
                {
                    $keyword=$request->mdata['skill'];
                    return $query->whereJsonContains('primary_skills',[$keyword]);
                }
            })->when(isset($request->mdata['title']),function($query) use($request)
            {
                if($request->mdata['title']!=null)
                {
                    
                    return $query->where('title', 'like', '%'.$request->mdata['title'].'%');
                }
            })->when(isset($request->mdata['location']),function($query) use($request)
            {
                if($request->mdata['location']!=null)
                {
                    return $query->orWhere('city', 'like', '%' .$request->mdata['location']. '%')
                    ->orWhere('state', 'like', '%' .$request->mdata['location']. '%')
                    ->orWhere('country', 'like', '%' .$request->mdata['location']. '%');
                }
            })->when(isset($request->mdata['created_by']),function($query) use($request)
            {
                if($request->mdata['created_by']!=null)
                {
                    return $query->orWhere('created_by',$request->mdata['created_by']);
                }
            })->when(isset(Auth::user()->usertype),function($query) use($request)
            {
                if(Auth::user()->usertype=='Partner')
                {
                    return $query->orWhere('company_id',Auth::user()->company_id);
                }
            })
            ->get();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function($row)use($prefix)
                {
                    $btn ='<div class="invoice-action">
                              <a href="app-invoice-view.html" class="invoice-action-view mr-4">
                                <i class="material-icons">remove_red_eye</i>
                              </a>
                              <a href="'.url($prefix."/requirement/edit/".$row->serial_no).'" class="invoice-action-edit">
                                <i class="material-icons">edit</i>
                              </a>
                              <a href="app-invoice-edit.html" class="invoice-action-trash">
                                <i class="material-icons dp48">delete</i>
                              </a>
                            </div>';
                    return $btn;
                })->addColumn('created_at',function($row){
                    return date('Y-m-d',strtotime($row->created_at));
                })->rawColumns(['created_at'])->rawColumns(['action'])->make(true);
        }
    }
}
