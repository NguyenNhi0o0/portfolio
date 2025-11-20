<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EduSkill;
use App\Models\Skill;
use App\Models\Education;
use Illuminate\Support\Facades\Storage;

class EducationController extends Controller
{
    public function all()
    {
        $educations = Education::all();
        return view("admin.educations.list", ["educations" => $educations]);
    }

    public function create()
    {
        return view("admin.educations.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_edu' => 'required|max:255',
            // 'start_date' => [
            //     'required',
            //     //0?[1-9] số đầu có thể là 0, tiếp sau là các số  từ 1-9 có thể xuất hiện
            //     // |1[012] hoặc số đầu là số 1, và sau đấy phải là 0 hoặc 1 hoặc 2
            //     // tương ứng tháng 10, 11, 12
            //     'regex:/^(0?[1-9]|1[012])-[0-9]{4}$/',
            //     function ($attribute, $value, $fail) {
            //         list($month, $year) = explode('-', $value);
            //         if ($month >= 1 && $month <= 12) {
            //             $fail($attribute . ' is not a valid month.');
            //         }
            //     },
            // ],
            // 'end_date' => [
            //     'required',
            //     'regex:/^(0?[1-9]|1[012])-[0-9]{4}$/',
            //     function ($attribute, $value, $fail) {
            //         list($month, $year) = explode('-', $value);
            //         if ($month >= 1 && $month <= 12) {
            //             $fail($attribute . ' is not a valid month.');
            //         }
            //     },
            // ],
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

        $education = Education::create([
            'name_edu' => $request->input('name_edu'),
            'sta_month' => $sta_month,
            'sta_year' => $sta_year,
            'end_month'=> $end_month,
            'end_year' => $end_year,
            'description' => $request->input('description'),
        ]);

        foreach ($uniqueSkills as $skillName) {
            if (!empty($skillName)) {
                // if skill is new, create it
                $skill = Skill::firstOrCreate(['name' => $skillName]);
                // n-n projects_skills
                $education->skills()->attach($skill);
            }
        }
        return redirect("educations");
    }

    public function edit(string $id) {
        $education = Education::find($id);
        return view('admin.educations.edit', ['education' => $education]);
    }

    public function update(Request $request, string $id) {
        $request->validate([
            'name_edu' => 'max:255',
            // * est chaque elt dans arr
            'skills.*' => 'max:50',
            'skills' => 'distinct',
        ]);

        if ($request->input('start_date')) {
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
        }

        $education = Education::find($id);
        if (!$education) {
            return redirect()->back()->withErrors('Education not found.');
        }
        
        $education->update([
            'name_edu' => $request->input('name_edu'),
            'sta_month' => $sta_month,
            'sta_year' => $sta_year,
            'end_month'=> $end_month,
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
        $education->skills()->sync($newSkillIds);

        return redirect("educations");
    }

    public function delete(string $id){
        $education = Education::with('skills')->find($id);
        $education->skills()->detach();
        $education->delete();
        return redirect("educations");
    }
}
