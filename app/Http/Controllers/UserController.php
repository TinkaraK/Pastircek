<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Utilities\DataForm;
use App\Utilities\DataFormInput;
use App\Utilities\DataView;
use App\Utilities\DataViewItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;


class UserController extends Controller
{
    public function __construct()
    {
        $this->addBreadcrumbItem('Uporabniki', route('users.index'));
    }


    public function index()
    {

        $users = User::query()->get();
        return view("users.index", [
            "users" => $users,
        ]);
    }

    public function show(User $user)
    {
        $this->addBreadcrumbItem("Prikaži", route('users.create'));

        $this->authorize('view', $user);

        $dataView = DataView::make(route('users.edit', $user));
        $dataView->setTitle("Uporabnik");

        $dataView->addItem(DataViewItem::category("Podatki o uporabniku", 'col-span-12'));
        $dataView->addItem(DataViewItem::text("Ime", $user->name, 'col-span-12'));
        $dataView->addItem(DataViewItem::text("Email", $user->email, 'col-span-12'));

        $dataView->addItem(DataViewItem::category("Geslo", 'col-span-12'));
        $dataView->addItem(DataViewItem::button("Ponastavi geslo", route('users.reset-password', $user), 'col-span-12', "btn btn-sm btn-secondary" ));
        return $dataView->response();
    }

    public function create()
    {
        $this->addBreadcrumbItem("Ustvari", route('users.create'));

        $dataForm = DataForm::make("Ustvari uporabnika", 'POST', route('users.store'), route('users.index'));

        $dataForm->addInput(DataFormInput::text("Ime", 'name', true, 1, 255)->setDivSize("col-span-12"));
        $dataForm->addInput(DataFormInput::email("Email", 'email', true, 1, 255)->setDivSize("col-span-12"));

        return $dataForm->response();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
        ]);

        $user = User::create([
            'name' => $data["name"],
            'email' => $data["email"],
            'password' => Hash::make(Str::random(15))
        ]);

        Password::sendResetLink(
            [
                'email' => $user->email,
            ]
        );

        return redirect()->route('users.show', $user)->with("status_message", "Uporabnik je bil ustvarjen. Na vpisan e-naslov bo prejel poziv za nastavitev gesla.");
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);

        $dataForm = DataForm::make("Uredi uporabnika", 'PUT', route('users.update', $user), route('users.show', $user));

        $dataForm->addInput(DataFormInput::text("Ime", 'name', true, 1, 255, $user->name)->setDivSize("col-span-12"));
        $dataForm->addInput(DataFormInput::email("Email", 'email', true, 1, 255, $user->email)->setDivSize("col-span-12"));

        return $dataForm->response();
    }

    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);

        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
        ]);

        $user->update($data);

        return redirect()
            ->route('users.show', $user)
            ->with('status_message', "Uporabnik je bil uspešno posodobljen.");
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }

    public function sendPasswordResetMail(User $user) {
        Password::sendResetLink(
            [
                'email' => $user->email,
            ]
        );
        return redirect()->route('users.show', $user)->with("status_message", "Na uporabnikov e-naslov je bil poslan poziv za nastavitev gesla.");
    }
}
