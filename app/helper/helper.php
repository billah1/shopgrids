<?php
function fileUpload($fileObject,$nameString = null,$existFilepath = null){
    if(isset($fileobject)){
        if(file_exists($existFilepath)){
            unlink($existFilepath);
        }
    $fileName = rand(10,1000).time().$fileObject->getClientOriginalName();
    $fileDirectory = 'backend/upload-files/'.$nameString.'/';
    $fileObject->move($fileDirectory,$fileName);
    $fileUrl = $fileDirectory.$fileName;
    }else{
        
    }
    return $fileUrl;
}
