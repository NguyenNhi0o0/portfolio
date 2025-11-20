<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;

class ContentController extends Controller
{
    public function getContentByTitle($title)
    {
        $content = Content::where('title', $title)->first();
        return $content;
    }

    public function all(){
        $contents = Content::all();
        return view("admin.contents.list", ["contents" => $contents]);
    }

    public function edit(string $id){
        $content = Content::find($id);
        return view('admin.contents.edit', ['content' => $content]);
    }

    public function update(Request $request, string $id) {
        $request->validate([
            'description' => 'max:255',
        ]);

        $content = Content::find($id);
        $content->update([
            'description' => $request->input('description'),
        ]);
        return redirect("contents");
    }
}
