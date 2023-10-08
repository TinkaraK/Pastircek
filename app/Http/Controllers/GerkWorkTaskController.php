<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Gerk;
use App\Models\WorkTask;
use Illuminate\Http\Request;

class GerkWorkTaskController extends Controller
{
    public function index(Gerk $gerk)
    {
        $workTasks = $gerk->workTasks;

        return view('gerks.work-tasks.index', [
            "gerk" => $gerk,
            "workTasks" => $workTasks,
        ]);
    }

    public function create(Gerk $gerk)
    {
        return view('gerks.work-tasks.create', [
            "gerk" => $gerk,
        ]);
    }

    public function store(Request $request, Gerk $gerk)
    {
        $data = $request->validate([
            "type" => "required|string",
            "date_from" => "required|date",
            "date_to" => "nullable|date",
            "area" => "nullable|numeric",
            "remarks" => "nullable|string",
            "number_of_sheep" => "required_if:type,=,grazing|numeric",
            "number_of_hay_bales" => "required_if:type,=,gathering|numeric",
        ]);

        WorkTask::query()->create([
            "gerk_id" => $gerk->id,
            "date_from" => $data["date_from"],
            "date_to" => $data["date_to"],
            "type" => $data["type"],
            "area" => $data["area"],
            "remarks" => $data["remarks"],
            "number_of_sheep" => $data["number_of_sheep"],
            "number_of_hay_bales" => $data["number_of_hay_bales"],
        ]);

        return redirect()->route('gerks.work-tasks.index', ["gerk" => $gerk])->with('message', __('messages.work_task_created_successfully'));
    }

    public function show(Gerk $gerk, WorkTask $workTask)
    {
        return view("gerks.work-tasks.show", ["gerk" => $gerk, "workTask" => $workTask]);
    }

    public function edit(Gerk $gerk, WorkTask $workTask)
    {

        return view('gerks.work-tasks.edit', [
            'gerk' => $gerk,
            'workTask' => $workTask,
        ]);
    }

    public function update(Request $request, Gerk $gerk, WorkTask $workTask)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'area' => 'required|numeric',
            'scheme_type' => 'required|string',
            "is_pasture" => "sometimes",
            "number_of_mowings" => "nullable|numeric",
            "average_altitude" => "nullable|numeric",
            "average_slope_percentage" => "nullable|numeric",
            "average_exposition" => "nullable|numeric",
        ]);

        $workTask->update($data);

        return redirect()->route('gerks.work-tasks.index', ["gerk" => $gerk])->with('message', __('messages.work_task_updated_successfully'));
    }

    public function destroy(Gerk $gerk, WorkTask $workTask)
    {
        $workTask->delete();

        return redirect()->route('gerks.work-tasks.index', ["gerk" => $gerk])->with('message', __('messages.work_task_deleted_successfully'));
    }
}
