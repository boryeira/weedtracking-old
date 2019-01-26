<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Strain;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Bank;
use App\Plant;
use Redirect;
use Session;

class StrainController extends Controller
{
	public function index()
	{
		$strains = Strain::all();

		return view('strain.index')->with('strains', $strains);
	}

	public function show($strain_id)
	{
		$strain = Strain::find($strain_id);
		$feeds = $strain->feeds()->simplePaginate(16);
		return view('strain.show')->with('strain', $strain)->with('feeds', $feeds);
	}

	public function plants($strain_id)
	{
		$strain = Strain::find($strain_id);
		return view('strain.plants')->with('strain', $strain);
	}
	public function getCR(Request $request)
	{
		$client = new Client();
		$ucpc = $request->ucpc;


		$res =  $client->request('GET', 'https://www.cannabisreports.com/api/v1.0/strains/'.$ucpc, ['exceptions' => false]);  
		if($res->getStatusCode()!=200)
		{
			Session::flash('warning', 'No se encuentra el codigo UCPC!'); 
			return Redirect::back();
		}

		$plant = Plant::withTrashed()->findOrFail($request->plant_id);
		
		$body = json_decode($res->getBody(), true);
		$strain_CR = $body['data'];
		$bank = $strain_CR['seedCompany'];

		//verificamos los bancos
		$bank_exist = Bank::where('ucpc',$bank['ucpc'])->first();
		if($bank_exist==null)
		{
			//no existe el banko
			$strain_bank = new Bank;
			$strain_bank->name = $bank['name'];
			$strain_bank->ucpc = $bank['ucpc'];
			$strain_bank->save();

		}
		else
		{
			$strain_bank = $bank_exist;
			
		}

		//verificamos las variedades
		$strain_exist = Strain::where('ucpc',$strain_CR['ucpc'])->first();
		if($strain_exist==null)
		{
			//no existe el banko
			$strain = new Strain;
			$strain->name = $strain_CR['name'];
			$strain->ucpc = $strain_CR['ucpc'];
			$strain->bank_id = $strain_bank->id;
			$strain->type = "nn";
			$strain->save();

		}
		else
		{
			$strain = $strain_exist;
			echo('existe variedad');
		}

		return view('plant.strain-select')->with('strain', $strain)->with('plant',$plant);


		
	}
	public function getDB(Request $request)
	{
		$plant = Plant::withTrashed()->findOrFail($request->plant_id);


		if($request->strain!=0 )
		{
			$strain = Strain::find($request->strain);
			return view('plant.strain-select')->with('strain', $strain)->with('plant',$plant);
		}
		else
		{
			return Redirect::back();
		}

	}

	public function assignPlant(Request $request)
	{
		$plant = Plant::withTrashed()->findOrFail($request->plant_id);
		$strain = Strain::find($request->strain_id);
		$plant->strain_id = $request->strain_id;
		if($plant->save())
		{

                Session::flash('success', 'Variedad '.$strain->name.' asignada a planta '.$plant->name.' '); 
                return redirect('/plant/'.$plant->id); 
		}

	}

}
