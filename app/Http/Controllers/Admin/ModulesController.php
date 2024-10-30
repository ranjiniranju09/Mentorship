<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyModuleRequest;
use App\Http\Requests\StoreModuleRequest;
use App\Http\Requests\UpdateModuleRequest;
use App\Module;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ModulesController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('module_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Module::query()->select(sprintf('%s.*', (new Module)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'module_show';
                $editGate      = 'module_edit';
                $deleteGate    = 'module_delete';
                $crudRoutePart = 'modules';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.modules.index');
    }

    public function create()
    {
        abort_if(Gate::denies('module_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.modules.create');
    }

    public function store(StoreModuleRequest $request)
    {
        $module = Module::create($request->all());

        return redirect()->route('admin.modules.index');
    }

    public function edit(Module $module)
    {
        abort_if(Gate::denies('module_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.modules.edit', compact('module'));
    }

    public function update(UpdateModuleRequest $request, Module $module)
    {
        $module->update($request->all());

        return redirect()->route('admin.modules.index');
    }

    public function show(Module $module)
    {
        abort_if(Gate::denies('module_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //$module->load('modulenameSessions');
        //$module->load('modulenameSessions', 'moduleChapters', 'moduleidChapterTests');
        $module->load('modulenameSessions', 'moduleChapters', 'moduleidChapterTests', 'moduleModuleresourcebanks');
        return view('admin.modules.show', compact('module'));
    }

    public function destroy(Module $module)
    {
        abort_if(Gate::denies('module_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $module->delete();

        return back();
    }

    public function massDestroy(MassDestroyModuleRequest $request)
    {
        $modules = Module::find(request('ids'));

        foreach ($modules as $module) {
            $module->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
