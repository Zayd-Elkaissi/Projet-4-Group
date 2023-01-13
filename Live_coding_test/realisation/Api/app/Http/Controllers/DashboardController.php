<?php

namespace App\Http\Controllers;

use App\Models\AnneFormation;
use App\Models\Groupes;
use App\Models\Tache;

class DashboardController extends Controller
{
  public function years(){
    $years = AnneFormation::all();
    return $years;

  }

  public function formation($id){
    $year = AnneFormation::find($id);
    $group = Groupes::where('Annee_formation_id', $year->id)->first();

    $studntCount = $group->students->count();

    $done = Tache::where('Etat', 'terminer')->get()->count();
    $encours = Tache::where('Etat', '<>' , 'terminer')->get()->count();
    $total = ($done + $encours);
    $group_progress = ((100/$total) * $done);

    return [
        'year'=> $year,
        'group'=> $group,
        'studntCount'=> $studntCount,
        'group_av'=> $group_progress

    ];


  }
}
