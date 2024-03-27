<?php

namespace App\Http\Controllers;
use App\Models\Asset;
use App\Models\Type;
use App\Models\Location;
use Illuminate\Http\Request;

class AssetsController extends Controller
{
    public function index(Request $request){
        //$ativos = Ativo::all();
        $search = $request->query('search', null);
        if($search){
            $assets = Asset::join('types', 'assets.type_id', '=', 'types.id')
            ->orWhere('types.name', 'LIKE', "%".$search."%")
            ->orWhere('assets.name', 'LIKE', "%".$search."%")
            ->orWhere('assets.category', 'LIKE', "%".$search."%")
            ->select('assets.*')
            ->paginate(10)->withQueryString();
        }else{
            $assets = Asset::paginate(10);
        }
        
        return view('assets.index', ['assets' => $assets, 'search' => $search]);

    }  

    public function create(){
        $types = Type::all();
        $locations = Location::all();
        return view('assets.create', ['types' => $types, 'locations' => $locations]);
    }

    public function store(Request $request) {
        $locations = Location::create($request->all());
        $asset = $locations->assets()->create($request->all());
        return redirect(route('assets-index'));
    }

    public function edit($id){
        $asset = Asset::where('id', $id)->first();

        if(!empty($asset)){
            $types = Type::all();
            $locations = Location::where('id', $id)->first();
            return view('assets.edit', ['types' => $types, 'locations' => $locations, 'asset' => $asset]);

        }else{
            return redirect(route('assets-index'));
        }
    }

    public function update(Request $request, $id){
        $data = [
            'name' => $request->name,
            'type_id' => $request->type_id,
            'description' => $request->description,
            'acquisition_date' => $request->acquisition_date,
            'value' => $request->value,

        ];
        Asset::where('id',$id)->update($data);
        return redirect(route('assets-index'));
    }

    public function destroy($id){
        $assets = Asset::findOrFail($id);
        $assets->delete();
        $assets->location()->delete();
        return redirect('/assets');
 
    }
    
}
