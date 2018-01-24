<?php

namespace App\Http\Controllers\Admin;

use App\Equipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreEquipmentsRequest;
use App\Http\Requests\Admin\UpdateEquipmentsRequest;
use Yajra\DataTables\DataTables;

class EquipmentsController extends Controller
{
    /**
     * Display a listing of Equipment.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('equipment_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = Equipment::query();
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('equipment_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'equipments.id',
                'equipments.name',
                'equipments.is_available',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'equipment_';
                $routeKey = 'admin.equipments';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('is_available', function ($row) {
                return \Form::checkbox("is_available", 1, $row->is_available == 1, ["disabled"]);
            });

            $table->rawColumns(['actions','is_available']);

            return $table->make(true);
        }

        return view('admin.equipments.index');
    }

    /**
     * Show the form for creating new Equipment.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('equipment_create')) {
            return abort(401);
        }
        return view('admin.equipments.create');
    }

    /**
     * Store a newly created Equipment in storage.
     *
     * @param  \App\Http\Requests\StoreEquipmentsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEquipmentsRequest $request)
    {
        if (! Gate::allows('equipment_create')) {
            return abort(401);
        }
        $equipment = Equipment::create($request->all());



        return redirect()->route('admin.equipments.index');
    }


    /**
     * Show the form for editing Equipment.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('equipment_edit')) {
            return abort(401);
        }
        $equipment = Equipment::findOrFail($id);

        return view('admin.equipments.edit', compact('equipment'));
    }

    /**
     * Update Equipment in storage.
     *
     * @param  \App\Http\Requests\UpdateEquipmentsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEquipmentsRequest $request, $id)
    {
        if (! Gate::allows('equipment_edit')) {
            return abort(401);
        }
        $equipment = Equipment::findOrFail($id);
        $equipment->update($request->all());



        return redirect()->route('admin.equipments.index');
    }


    /**
     * Display Equipment.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('equipment_view')) {
            return abort(401);
        }
        $tasks = \App\Task::where('equipment_id', $id)->get();

        $equipment = Equipment::findOrFail($id);

        return view('admin.equipments.show', compact('equipment', 'tasks'));
    }


    /**
     * Remove Equipment from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('equipment_delete')) {
            return abort(401);
        }
        $equipment = Equipment::findOrFail($id);
        $equipment->delete();

        return redirect()->route('admin.equipments.index');
    }

    /**
     * Delete all selected Equipment at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('equipment_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Equipment::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Equipment from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('equipment_delete')) {
            return abort(401);
        }
        $equipment = Equipment::onlyTrashed()->findOrFail($id);
        $equipment->restore();

        return redirect()->route('admin.equipments.index');
    }

    /**
     * Permanently delete Equipment from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('equipment_delete')) {
            return abort(401);
        }
        $equipment = Equipment::onlyTrashed()->findOrFail($id);
        $equipment->forceDelete();

        return redirect()->route('admin.equipments.index');
    }
}
