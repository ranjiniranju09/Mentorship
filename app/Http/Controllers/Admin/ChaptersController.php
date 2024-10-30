<?php

namespace App\Http\Controllers\Admin;

use App\Chapter;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyChapterRequest;
use App\Http\Requests\StoreChapterRequest;
use App\Http\Requests\UpdateChapterRequest;
use App\Module;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ChaptersController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('chapter_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Chapter::with(['module'])->select(sprintf('%s.*', (new Chapter)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'chapter_show';
                $editGate      = 'chapter_edit';
                $deleteGate    = 'chapter_delete';
                $crudRoutePart = 'chapters';

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
            $table->editColumn('chaptername', function ($row) {
                return $row->chaptername ? $row->chaptername : '';
            });
            $table->addColumn('module_name', function ($row) {
                return $row->module ? $row->module->name : '';
            });

            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : '';
            });
            $table->editColumn('published', function ($row) {
                return $row->published ? Chapter::PUBLISHED_SELECT[$row->published] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'module']);

            return $table->make(true);
        }

        $modules = Module::get();

        return view('admin.chapters.index', compact('modules'));
    }

    public function create()
    {
        abort_if(Gate::denies('chapter_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $modules = Module::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.chapters.create', compact('modules'));
    }

    public function store(StoreChapterRequest $request)
    {
        $chapter = Chapter::create($request->all());

        return redirect()->route('admin.chapters.index');
    }

    public function edit(Chapter $chapter)
    {
        abort_if(Gate::denies('chapter_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $modules = Module::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $chapter->load('module');

        return view('admin.chapters.edit', compact('chapter', 'modules'));
    }

    public function update(UpdateChapterRequest $request, Chapter $chapter)
    {
        $chapter->update($request->all());

        return redirect()->route('admin.chapters.index');
    }

    public function show(Chapter $chapter)
    {
        abort_if(Gate::denies('chapter_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $chapter->load('module', 'chapterChapterTests', 'chapterSubchapters', 'lessonCreateProgressTables', 'chapteridModuleresourcebanks');

        return view('admin.chapters.show', compact('chapter'));
    }

    public function destroy(Chapter $chapter)
    {
        abort_if(Gate::denies('chapter_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $chapter->delete();

        return back();
    }

    public function massDestroy(MassDestroyChapterRequest $request)
    {
        $chapters = Chapter::find(request('ids'));

        foreach ($chapters as $chapter) {
            $chapter->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
