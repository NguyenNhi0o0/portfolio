<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Experience;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function all()
    {
        $experiences = Experience::all();
        return view('admin.experiences.list', ['experiences' => $experiences]);
    }

    public function create()
    {
        return view("admin.experiences.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_exp' => 'required|max:255',
        ]);

        $start_date = $request->input('start_date');
        // explore phân tách chuỗi khi gặp ký tự '-'
        list($sta_month, $sta_year) = explode('-', $start_date);
        // Convert sang số nguyên
        $sta_month = intval($sta_month);
        $sta_year = intval($sta_year);

        $end_date = $request->input('end_date');
        list($end_month, $end_year) = explode('-', $end_date);
        $sta_month = intval($sta_month);
        $sta_year = intval($sta_year);

        $skillsInput = $request->input('skills', []);
        $uniqueSkills = array_unique($skillsInput);

        $experience = Experience::create([
            'name_exp' => $request->input('name_exp'),
            'sta_month' => $sta_month,
            'sta_year' => $sta_year,
            'end_month' => $end_month,
            'end_year' => $end_year,
            'description' => $request->input('description'),
        ]);

        foreach ($uniqueSkills as $skillName) {
            if (!empty($skillName)) {
                // if skill is new, create it
                $skill = Skill::firstOrCreate(['name' => $skillName]);
                // n-n projects_skills
                $experience->skills()->attach($skill);
            }
        }
        return redirect("experiences");
    }

    public function edit(string $id)
    {
        $experience = Experience::find($id);
        return view('admin.experiences.edit', ['experience' => $experience]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name_edu' => 'max:255',
            // * est chaque elt dans arr
            'skills.*' => 'max:50',
            'skills' => 'distinct',
        ]);

        $start_date = $request->input('start_date');
        // explore phân tách chuỗi khi gặp ký tự '-'
        list($sta_month, $sta_year) = explode('-', $start_date);
        // Convert sang số nguyên
        $sta_month = intval($sta_month);
        $sta_year = intval($sta_year);

        $end_date = $request->input('end_date');
        list($end_month, $end_year) = explode('-', $end_date);
        $sta_month = intval($sta_month);
        $sta_year = intval($sta_year);

        $experience = Experience::find($id);
        if (!$experience) {
            return redirect()->back()->withErrors('Experience not found.');
        }

        $experience->update([
            'name_edu' => $request->input('name_edu'),
            'sta_month' => $sta_month,
            'sta_year' => $sta_year,
            'end_month' => $end_month,
            'end_year' => $end_year,
            'description' => $request->input('description'),
        ]);

        // Lấy hoặc tạo mới các skill dựa trên tên được cung cấp
        $newSkillIds = [];
        foreach ($request->input('skills', []) as $skillName) {
            if (!empty($skillName)) {
                $skill = Skill::firstOrCreate(['name' => $skillName]);
                array_push($newSkillIds, $skill->id);
            }
        }
        // Cập nhật mối quan hệ skills của edu, loại bỏ các kỹ năng không được nêu
        $experience->skills()->sync($newSkillIds);

        return redirect("experiences");
    }

    public function delete(string $id){
        $experience = Experience::with('skills')->find($id);
        $experience->skills()->detach();
        $experience->delete();
        return redirect("experiences");
    }
}
