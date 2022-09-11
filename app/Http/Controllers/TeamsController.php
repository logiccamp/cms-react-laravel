<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    public function index()
    {
        $g = new GeneralController();
        $info = $g->getcompany();
        $team = Team::all();
        $data = [
            "info" => $info,
            "team" => $team,
        ];
        return view("admin.team", $data);
    }
    public function create()
    {
        $g = new GeneralController();
        $info = $g->getcompany();
        $data = [
            "info" => $info,
        ];
        return view("admin.addTeam", $data);
    }

    public function store(Request $request)
    {
        $path = $request->file("image")->store("team", "public");
        Team::create([
            "name" => $request->name,
            "post" => $request->post ? $request->post : '',
            "image" => $path,
        ]);

        return redirect("/admin/team");
    }
    public function destroy($id)
    {
        $team = Team::where("id", $id)->first();
        $team->delete();
        return redirect("/admin/team");
    }
}
