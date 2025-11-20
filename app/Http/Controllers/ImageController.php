<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function all()
    {
        $images = Image::all();
        return view('admin.images.list', ['images' => $images]);
    }

    public function getImgByCate($category)
    {
        $img = Image::where('category', $category)->first();
        return $img;
    }

    public function update(Request $request, string $category)
    {
        // $request->validate([
        //     'image' => 'required',
        // ]);
        // $image = Image::where('category', $category)->get();
        // if ($image) {
        //     Storage::delete($image->src); //sup photo dans dossier storage
        // }
        // // dd($image);

        // if ($request->hasFile('image')) {
        //     //save img to public/storage
        //     $path = $request->file('image')->store('public');
        //     $publicPath = str_replace('', '', $path);

        //     // Storage::delete(storage_path('app/public/' . $image->src));

        //     $imageNew = Image::where('category', $category)->get();
        //     $imageNew = Image::updateOrCreate([
        //         'src' => $publicPath,
        //         'category' => $category,
        //     ]);
        //     return redirect()->back()->with('success', $publicPath);
        // }

        // return back()->withError('No file uploaded.');

        $request->validate([
            'image' => 'required|image',
        ]);

        // Lấy tất cả các hình ảnh trong category cụ thể
        $images = Image::where('category', $category)->get();

        // Kiểm tra nếu có hình ảnh
        if ($images->isNotEmpty()) {
            foreach ($images as $image) {
                // Xóa hình ảnh cũ từ storage
                Storage::delete('public/' . $image->src);
            }
        }
        
        //delete db
        $imageDelete = $image;
        $imageDelete->delete();

        if ($request->hasFile('image')) {
            // Lưu hình ảnh mới vào public/storage
            $path = $request->file('image')->store('public');
            $publicPath = str_replace('', '', $path); 

            // Cập nhật hình ảnh đầu tiên tìm được trong danh sách hoặc tạo hình ảnh mới nếu không tìm thấy
            $imageToUpdate = $images->first() ?? new Image();
            $imageToUpdate->src = $publicPath;
            $imageToUpdate->category = $category; // Giữ nguyên category cũ
            $imageToUpdate->save();

            return redirect()->back()->with('success', 'Image updated successfully.');
        }

        return back()->with('error', 'No file uploaded.');
    }

    public function storeIcon(Request $request)
    {
        if ($request->hasFile('icon')) {
            //save img to public/storage
            $path = $request->file('icon')->store('public');
            $publicPath = str_replace('', '', $path);
            // create db for img 
            $image = Image::create([
                // test banner
                'category' => 'Icon',
                'src' => $publicPath,
            ]);
            // Chuyển hướng người dùng trở lại trang với hình ảnh mới
            return redirect()->back()->with('icon_url', $publicPath);
        }

        return back()->withError('No file uploaded.');
    }
}
