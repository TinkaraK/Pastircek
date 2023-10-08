<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\WorkTask;
use Illuminate\Http\Request;

class WorkTaskController extends Controller
{
    public function index()
    {
        $workTasks = WorkTask::query()->get();

        return view('work-tasks.index', [
            "workTasks" => $workTasks,
        ]);
    }

    public function create()
    {

        return view('work-tasks.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            "gerks" => "required|array",
            "gerks.*" => "required|exists:gerks,id",
            "date_from" => "required|date",
            "date_to" => "nullable|date",
            "type" => "required|string",
            "area" => "required|numeric",
            "remarks" => "nullable|string",
            "number_of_sheep" => "required_if:type,=,grazing|numeric",
            "number_of_hay_bales" => "required_if:type,=,gathering|numeric",
        ]);

        foreach ($data["gerks"] as $gerkId) {
            WorkTask::query()->create([
                "gerk_id" => $gerkId,
                "date_from" => $data["date_from"],
                "date_to" => $data["date_to"],
                "type" => $data["type"],
                "area" => $data["area"],
                "remarks" => $data["remarks"],
                "number_of_sheep" => $data["number_of_sheep"],
                "number_of_hay_bales" => $data["number_of_hay_bales"],
            ]);
        }

        return redirect()->route('work-tasks.index')->with('message', __('messages.work_task_created_successfully'));
    }

    public function show(WorkTask $workTask)
    {
        return view("work-tasks.show", $workTask);
    }

    public function edit(WorkTask $workTask)
    {

        return view('work-tasks.edit', [
            'workTask' => $workTask,
        ]);
    }

    public function update(Request $request, WorkTask $workTask)
    {
        $data = $request->validate([
            "date_from" => "required|date",
            "date_to" => "nullable|date",
            "type" => "required|string",
            "area" => "required|numeric",
            "remarks" => "nullable|string",
            "number_of_sheep" => "required_if:type,=,grazing|numeric",
            "number_of_hay_bales" => "required_if:type,=,gathering|numeric",
        ]);

        $workTask->update($data);

        return redirect()->route('work-tasks.index')->with('message', __('messages.work_task_updated_successfully'));
    }

    public function destroy(WorkTask $workTask)
    {
        $workTask->delete();

        return redirect()->route('work-tasks.index')->with('message', __('messages.work_task_deleted_successfully'));
    }
}
