<?php

namespace App\Http\Controllers;

use App\Enum\GerkType;
use App\Enum\SchemeType;
use App\Models\Gerk;
use App\Utilities\DataForm;
use App\Utilities\DataFormInput;
use Illuminate\Http\Request;

class GerkController extends Controller
{
    public function index()
    {
        $gerks = Gerk::query()->get();

        return view('gerks.index', [
            "gerks" => $gerks,
        ]);
    }

    public function create()
    {
        $this->addBreadcrumbItem("Ustvari", route('gerks.create'));

        $dataForm = DataForm::make("Ustvari GERK", 'POST', route('gerks.store'), route('gerks.index'));

        $dataForm->addInput(DataFormInput::text("Domače ime", 'name', true, 1, 255)->setDivSize("col-span-12"));
        $dataForm->addInput(DataFormInput::text("PID", 'pid', true, 1, 255)->setDivSize("col-span-12"));
        $dataForm->addInput(DataFormInput::number("Površina (m2)", 'area', true, 1, 255)->setDivSize("col-span-12"));

        $gerkTypes = [];
        foreach (GerkType::getAll() as $gerkType) {
            $gerkTypes[] = [
                'title' => GerkType::translate($gerkType),
                'value' => $gerkType,
            ];
        }
        $dataForm->addInput(DataFormInput::select("Tip gerka", 'type', true, $gerkTypes, null, false)->setDivSize("col-span-12"));

        $schemeOptions = [];
        foreach (SchemeType::getAll() as $schemeType) {
            $schemeOptions[] = [
                'title' => SchemeType::translate($schemeType),
                'value' => $schemeType,
            ];
        }
        $dataForm->addInput(DataFormInput::select("Tip sheme", 'scheme_type', true, $schemeOptions, null, false)->setDivSize("col-span-12"));
        $dataForm->addInput(DataFormInput::checkbox("Je pašnik", 'is_pasture', true)->setDivSize("col-span-12"));
        $dataForm->addInput(DataFormInput::number("Število košenj", 'number_of_mowings', false, 0, 10)->setDivSize("col-span-12"));
        $dataForm->addInput(DataFormInput::number("Povprečna nadmorska višina", 'average_altitude', false, 0, 3000)->setDivSize("col-span-12"));
        $dataForm->addInput(DataFormInput::number("Povprečen naklon", 'average_slope_percentage', false, -100, 100)->setDivSize("col-span-12"));
        $dataForm->addInput(DataFormInput::number("Povprečna ekspozicija", 'average_exposition', false, -360, 360)->setDivSize("col-span-12"));


        return $dataForm->response();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'pid' => 'required|string|unique:gerks,pid',
            'area' => 'required|numeric',
            'type' => 'required|numeric',
            'scheme_type' => 'required|string',
            "is_pasture" => "sometimes",
            "number_of_mowings" => "nullable|numeric",
            "average_altitude" => "nullable|numeric",
            "average_slope_percentage" => "nullable|numeric",
            "average_exposition" => "nullable|numeric",
            "block_id" => "nullable|exists:blocks,id",
        ]);

        $farm = auth()->user()->farm;

        $gerk = Gerk::query()->create([
            "name" => $data["name"],
            "pid" => $data["pid"],
            "area" => $data["area"],
            "type" => $data["type"],
            "scheme_type" => $data["scheme_type"],
            "is_pasture" => $data["is_pasture"] ?? false,
            "number_of_mowings" => $data["number_of_mowings"],
            "average_altitude" => $data["average_altitude"],
            "average_slope_percentage" => $data["average_slope_percentage"],
            "average_exposition" => $data["average_exposition"],
            "block_id" => $data["block_id"],
            "farm_id" => $farm->id
        ]);

        return redirect()->route('gerks.index')->with('message', __('messages.gerk_created_successfully'));
    }

    public function show(Gerk $gerk)
    {
        return view("gerks.show", $gerk);
    }

    public function edit(Gerk $gerk)
    {
        return view('gerks.edit', [
            'gerk' => $gerk,
        ]);
    }

    public function update(Request $request, Gerk $gerk)
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

        $gerk->update($data);

        return redirect()->route('gerks.index')->with('message', __('messages.gerk_updated_successfully'));
    }

    public function destroy(Gerk $gerk)
    {
        $gerk->delete();

        return redirect()->route('gerks.index')->with('message', __('messages.gerk_deleted_successfully'));
    }
}
