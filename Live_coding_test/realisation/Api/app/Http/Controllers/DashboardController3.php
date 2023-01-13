<?php

namespace App\Http\Controllers;

use App\Models\Tache;
use App\Models\Groupes;
use Illuminate\Http\Request;
use App\Models\AnneFormation;

class DashboardController extends Controller
{
    //
    public function years()
    {
        $years = AnneFormation::all();
        return $years;
    }

    public function formation(Request $request,$id){


    $year = AnneFormation::findOrFail($id);
    $group = Groupes::where('Annee_formation_id', $year->id)->first();

    $studentCount = $group->students->count();

    $total_done = Tache::where('Etat','=','terminer')->get()->count();
    $total_pause = Tache::where('Etat','=','en pause')->get()->count();
    $total_standby = Tache::where('Etat','=','en cours')->get()->count();
    $total_states = ($total_done + $total_pause + $total_standby);
    $group_progress =
    //  ($total_done * 100)/$total_states;
    (100/$total_states)*$total_done;
    return [
                'year' => $year,
                'group' => $group,
                'studentCount' => $studentCount,
                'group_av' => $group_progress,
            ];
        }
}
