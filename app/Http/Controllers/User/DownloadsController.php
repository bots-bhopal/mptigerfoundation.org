<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Download;
use App\Models\DownloadCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class DownloadsController extends Controller
{
    // Dropzone
    private $photos_path;

    public function __construct()
    {
        $this->photos_path = storage_path('app/public/downloads');
    }

    public function index()
    {
        $photos = Download::orderBy('id', 'DESC')->paginate(6);
        return view('user.downloads.view-poster', compact('photos'));
    }

    public function create()
    {
        // Create Post
        $categories = DownloadCategory::all();
        return view('user.downloads.downloads', compact('categories'));
    }

    public function store(Request $request)
    {
        // Store Post
        $validator = Validator::make($request->all(), [
            'files.*' => 'required|mimes:jpeg,bmp,png,jpg,pdf',
            'categories' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('user.posters')->withErrors($validator)->withInput();
        } else {
            $files =  $request->file('files');

            if (!is_array($files)) {
                $files = [$files];
            }

            if (!is_dir($this->photos_path)) {
                mkdir($this->photos_path, 0777);
            }

            for ($i = 0; $i < count($files); $i++) {
                $file = $files[$i];
                $new_name = $file->getClientOriginalName();
                $fileSizeInByte = File::size($file);
                if ($request->hasFile('files')) {
                    $save_name = $new_name;
                    $file->storeAs('public/downloads', $save_name);
                }

                // dd($file);

                $upload = new Download();
                $upload->user_id = Auth::id();
                $upload->original_filename = basename($file->getClientOriginalName());
                $upload->filename = $save_name;
                $upload->file_size = $fileSizeInByte;
                $upload->save();

                $upload->downloadCategories()->attach($request->categories);
            }

            // if (is_array($files)) {
            //     foreach ($files as $file) {
            //         $fileSizeInByte = File::size($file);
            //         $newFiles = $file->getClientOriginalName();
            //         dd($newFiles);
            //         $file->storeAs('public/downloads/', $newFiles);
            //     }
            // }

            // $download = new Download();
            // $download->user_id = Auth::id();
            // $download->original_filename = basename($file->getClientOriginalName());
            // $download->filename = $newFiles;
            // $download->file_size = $fileSizeInByte;
            // $download->save();

            // $download = new Download();

            Toastr::success('Images Or Document Successfully Saved.', 'success');
            return redirect()->route('user.posters');
        }
    }

    public function destroy($id)
    {
        $data = Download::where('id', $id)->first();

        if (!$data) {
            if (session('locale') == 'en') {
                return redirect()->back()->with('error', 'Image not found !!');
            }

            if (session('locale') == 'hi') {
                return redirect()->back()->with('error', 'छवि नहीं मिली !!');
            }
        } else {
            $data->downloadCategories()->detach();
            Download::where('id', $id)->delete();
            $image = "/public/downloads/" . $data->filename;
            if (Storage::exists($image)) {
                Storage::delete($image);
            }
        }

        if (session('locale') == 'en') {
            return redirect()->route('user.posters-show')->with('error', 'Image Deleted Successfully.');
        }

        if (session('locale') == 'hi') {
            return redirect()->route('user.posters-show')->with('error', 'छवि सफलतापूर्वक हटा दी गई है।');
        }
    }

    public static function bytesToHuman($bytes)
    {
        $units = ['B', 'KB', 'MB', 'GB'];

        for ($i = 0; $bytes > 1024; $i++) {
            $bytes /= 1024;
        }

        return round($bytes, 2) . ' ' . $units[$i];
    }
}
