<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plant;
use Carbon\Carbon;

class TestController extends Controller
{
	public function faseCalc($plant_id)
	{
		$plant = Plant::withTrashed()->findOrFail($plant_id);

		//dd($plant->phases->where('phase_id',3));

		foreach ($plant->phases as $phase) {

			echo($phase->value." id ".$phase->phase_id." --"."\n");
			# code...
		}

		if(count($plant->phases->where('phase_id',3))!=0){

			$secondPhase = $plant->phases->where('phase_id',3)->first();

			if(count($plant->phases->where('phase_id',1))!=0)
			{
				$firstPhase = $plant->phases->where('phase_id',1)->first();
				echo("enraizamiento:");

			}
			elseif(count($plant->phases->where('phase_id',2))!=0)
			{
				$firstPhase = $plant->phases->where('phase_id',2)->first();
				echo("germinacion:");
			}
			else
			{
				$firstPhase = $plant->phases->where('phase_id',3)->first();

			}


			

			$a_vegetativo = $secondPhase->created_at->diffInDays($firstPhase->created_at)+1;
			$firstPhase->value = $a_vegetativo;
			$firstPhase->save();
			echo($a_vegetativo);

		}

		if(count($plant->phases->where('phase_id',4))!=0){

			$thirdPhase = $plant->phases->where('phase_id',4)->first();
			if(count($plant->phases->where('phase_id',3))!=0){
				$a_floracion = $thirdPhase->created_at->diffInDays($secondPhase->created_at)+1;
				$secondPhase->value = $a_floracion;
				$secondPhase->save();

				echo("vegetativo: ".$a_floracion);
			}

		}

		if(count($plant->phases->where('phase_id',5))!=0){

			$lastPhase = $plant->phases->where('phase_id',5)->first();

			if(count($plant->phases->where('phase_id',4))!=0){
				$a_cosecha = $lastPhase->created_at->diffInDays($thirdPhase->created_at)+1;
				
				$thirdPhase->value = $a_cosecha;
				$thirdPhase->save();
				echo("floracion: ".$a_cosecha);

			}



		}



	}

	public function allPhaseCalc()
	{
		$plants = Plant::withTrashed()->get();

		foreach ($plants as $plant) {
			$this->faseCalc($plant->id);
			echo("\n PLANT ID:".$plant->id."\n");
		}


	}




}
