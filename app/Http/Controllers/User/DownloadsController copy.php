<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Download;
use App\Models\DownloadCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Response;
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
        $photos = Download::orderBy('original_filename', 'DESC')->paginate(6);
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
        $photos = $request->file('file');

        if (!is_array($photos)) {
            $photos = [$photos];
        }

        if (!is_dir($this->photos_path)) {
            mkdir($this->photos_path, 0777);
        }

        for ($i = 0; $i < count($photos); $i++) {
            $photo = $photos[$i];
            // $name = sha1(date('YmdHis') . Str::random(30));
            $new_name = $photo->getClientOriginalName();
            // $save_name = $name . '.' . $photo->getClientOriginalExtension();
            $fileSizeInByte = File::size($photo);
            // $resize_name = $name . Str::random(2) . '.' . $photo->getClientOriginalExtension();

            if ($request->hasFile('file')) {
                // $save_name = $name . '.' . $photo->getClientOriginalExtension();
                $save_name = $new_name;
                $photo->storeAs('public/downloads', $save_name);
            }
            // $path = $photo->move($this->photos_path, $save_name);

            $upload = new Download();
            $upload->original_filename = basename($photo->getClientOriginalName());
            $upload->filename = $save_name;
            $upload->file_size = $fileSizeInByte;
            // $upload->file_path = $path;
            $upload->save();
        }

        if (session('locale') == 'en') {
            return Response::json(['success' => 'Image Uploaded Successfully.'], 200);
        }

        if (session('locale') == 'hi') {
            return Response::json(['success' => 'छवि सफलतापूर्वक अपलोड की गई।'], 200);
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
