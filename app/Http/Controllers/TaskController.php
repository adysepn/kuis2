<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class TaskController extends Controller
{
    public function index() : view
    {
        $data_task = Task::latest()->paginate(8);
        return view('task.index', compact('data_task'));
    }

    public function create() : View
    {
        return view('task.create');
    }

    public function store(Request $request) : RedirectResponse
    {
        $this->validate($request, [
            'judul'     => 'required',
            'deskripsi' => 'required',
            'status'    => 'required',
        ]);

        Task::create([
            'judul'     => $request->judul,
            'deskripsi'     => $request->deskripsi,
            'status'     => $request->status,
        ]);

        return redirect()->route('task.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    public function show(string $id) : View
    {
        $data_task = Task::findOrFail($id);

        return view('task.show', compact('data_task'));
    }

    public function edit(string $id) : View
    {
        $data_task = Task::findOrFail($id);
        return view('task.edit', compact('data_task'));
    }

    public function update(Request $request, $id) : RedirectResponse
    {
        $this->validate($request, [
            'judul'     => 'required',
            'deskripsi' => 'required',
            'status'    => 'required',
        ]);

        $data_task = Task::findOrFail($id);

        $data_task->update([
            'judul'     => $request->judul,
            'deskripsi'     => $request->deskripsi,
            'status'     => $request->status,
        ]);

        return redirect()->route('task.index')->with(['success' => 'Data Berhasil Diubah']);
    }

    public function destroy($id) : RedirectResponse
    {
        $data_task = Task::findOrFail($id);

        $data_task->delete();

        return redirect()->route('task.index')->with(['success' => 'Data Berhasil Dihapus']);
    }

    public function completed() : View
    {
        $data_task = Task::where('status', '=', 'Completed')->get();
        return view('task.index', compact('data_task'));
    }

    public function incompleted() : View
    {
        $data_task = Task::where('status', '=', 'InCompleted')->get();
        return view('task.index', compact('data_task'));
    }

    public function updateStatus(Request $request, $id) : RedirectResponse
    {
        $this->validate($request, [
            'status'    => 'required',
        ]);

        $data_task = Task::findOrFail($id);

        $data_task->update([
            'status'     => $request->status,
        ]);

        return redirect()->route('task.index')->with(['success' => 'Status Berhasil Diubah']);
    }
}
