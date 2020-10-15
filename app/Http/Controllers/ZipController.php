<?php
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use File;
use ZipArchive;
  
class ZipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function downloadZip()
    {
        // to create the zip
        $zip = new ZipArchive;
        
        // to create the file name
        $fileName = 'selected_images';
        
        // to direct the path where to download
        if ($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE)
        {
            $files = File::files(public_path('/selected_image'));
   
            foreach ($files as $key => $value) {
                $relativeNameInZipFile = basename($value);
                $zip->addFile($value, $relativeNameInZipFile);
            }
             
            $zip->close();
        }
    
        return response()->download(public_path($fileName));
    }

    public function downloadZip1()
    {
        // to create the zip
        $zip = new ZipArchive;
   
        // to create the file name
        $fileName = 'selected_articles';

        // to direct the path where to download
        if ($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE)
        {
            $files = File::files(public_path('/selected_article'));
   
            foreach ($files as $key => $value) {
                $relativeNameInZipFile = basename($value);
                $zip->addFile($value, $relativeNameInZipFile);
            }
             
            $zip->close();
        }
    
        return response()->download(public_path($fileName));
    }
}