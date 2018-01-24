<?php

namespace App\Http\Controllers\Api\V1;

use App\Equipment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreEquipmentsRequest;
use App\Http\Requests\Admin\UpdateEquipmentsRequest;

class EquipmentsController extends Controller
{
    public function index()
    {
        return Equipment::all();
    }

    public function show($id)
    {
        return Equipment::findOrFail($id);
    }

    public function update(UpdateEquipmentsRequest $request, $id)
    {
        $equipment = Equipment::findOrFail($id);
        $equipment->update($request->all());
        

        return $equipment;
    }

    public function store(StoreEquipmentsRequest $request)
    {
        $equipment = Equipment::create($request->all());
        

        return $equipment;
    }

    public function destroy($id)
    {
        $equipment = Equipment::findOrFail($id);
        $equipment->delete();
        return '';
    }
}
