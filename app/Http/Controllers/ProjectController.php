<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function all()
    {
        $projects = Project::getAll();

        // dd($projects->toArray());
        return view("admin.projects.list", ["projects" => $projects]);
    }

    // public function store()
    // {
    //     return view("admin.project.create");
    // }

    public function create()
    {
        return view('admin.projects.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            // * est chaque elt dans arr
            'skills.*' => 'max:50',
            'skills' => 'distinct', // nếu trùng skill sẽ tự động bỏ qua elt trùng
            'image' => 'image|max:2048', // <= 2MB
        ]);

        // Kiểm tra skills không trùng lặp
        $skillsInput = $request->input('skills', []);
        // loại bỏ các giá trị trùng lặp trong mảng
        $uniqueSkills = array_unique($skillsInput);

        $project = Project::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'linkgitHub' => $request->input('linkgitHub'),
        ]);

        if ($request->hasFile('image')) {
            //save img to public/storage
            $path = $request->file('image')->store('public');
            $publicPath = str_replace('', '', $path);
            // create db for img 
            $image = Image::create([
                'category' => 'Project',
                'src' => $publicPath,
            ]);
            // 1-1 image_project
            $image->project()->save($project);
        }



        foreach ($uniqueSkills as $skillName) {
            if (!empty($skillName)) {
                // if skill is new, create it
                $skill = Skill::firstOrCreate(['name' => $skillName]);
                // n-n projects_skills
                $project->skills()->attach($skill);
            }
        }

        return redirect("projects");
    }

    public function edit(string $id)
    {
        $project = Project::find($id);
        return view('admin.projects.edit', ['project' => $project]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'max:255',
            // * est chaque elt dans arr
            'skills.*' => 'max:50',
            'skills' => 'distinct', // nếu trùng skill sẽ tự động bỏ qua elt trùng
            'image' => 'image|max:2048', // ảnh <= 2MB
        ]);

        $project = Project::find($id);
        // Vérifier si le projet existe
        if (!$project) {
            // Gérer le cas où le projet n'existe pas
            return redirect()->back()->withErrors('Project not found.');
        }

        $currentImg = $project->image;
        //si une nouvelle photo a été remplacée
        if ($request->hasFile('image')) {
            // //prend img actuel
            if ($currentImg) {
                Storage::delete('public/' . $currentImg->src); //sup photo dans dossier storage
                $imgDelete = $currentImg;
                $imgDelete->delete();
            }
            $path = $request->file('image')->store('public');
            $publicPath = str_replace('', '', $path);;
            $currentImg = Image::updateOrCreate([
                'src' => $publicPath, 
                'category' => 'Project',
                
            ]);
            
        }

        // Mettre à jour le projet
        $project->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image_id' => $currentImg->id,
            'linkgitHub' => $request->input('linkgitHub'),
        ]);

        // Lấy hoặc tạo mới các skill dựa trên tên được cung cấp
        $newSkillIds = [];
        foreach ($request->input('skills', []) as $skillName) {
            if (!empty($skillName)) {
                $skill = Skill::firstOrCreate(['name' => $skillName]);
                array_push($newSkillIds, $skill->id);
            }
        }
        // Cập nhật mối quan hệ skills của project, loại bỏ các kỹ năng không được nêu
        $project->skills()->sync($newSkillIds);


        return redirect("projects");
    }

    public function delete(string $id)
    {

        $project = Project::with(['skills', 'image'])->find($id);

        $project->skills()->detach();

        if ($project->image) {
            Storage::delete($project->image->src);
            $project->image->delete();
        }

        $project->delete();
        return redirect("projects");
    }
}
