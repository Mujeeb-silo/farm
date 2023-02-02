<?php

function userType()
{
	$prefix=(Auth::user()->usertype=='Admin')?'admin':'partner';
	return $prefix;
}
function UploadImages($request,$tagname,$targetDir)
{
    $fileName ='';
    $request->validate([
        $tagname.'.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ]);
    if($file = $request->hasFile((string)$tagname)) 
    {
             
        /*$file = $request->file((string)$tagname);
        $fileName = $file->getClientOriginalName();
        $destinationPath = public_path().(string)$targetDir;
        $file->move($destinationPath,$fileName);*/


        $file = $request->file((string)$tagname);
        $fileName =time().'_'.$file->getClientOriginalName();
        $filePath = $request->file((string)$tagname)->storeAs((string)$targetDir, $fileName,'public');
            
    }
    return $fileName;
}
?>