<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'users' => User::get(),
        ];

        return view('admin.doctor.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
          'rules'   => Role::where('name', '!=', 'patient')->get(),
          'genders' => Gender::get(),
        ];

        return view('admin.doctor.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validateStorage($request);

        $image_name         = '';

        if(!empty($_FILES['image']['name']))
        {
            $image_name     = (new User())->userAvatar($request);
        }

        $user               = new User();
        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->password     = bcrypt($request->password);
        $user->image        = $image_name;
        $user->role_id      = $request->role_id;
        $user->address      = $request->address;
        $user->phone_number = $request->phone_number;
        $user->department   = $request->department;
        $user->education    = $request->education;
        $user->description  = $request->description;
        $user->gender_id    = $request->gender_id;

        $user->save();

        return redirect('doctor');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $data = [
            'user' => User::where('id', $id)->first(),
        ];

        return response()->json([
            'result' => 1,
            'view'   => view('admin.doctor.widgets.show', $data)->render(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'user'    => User::where('id', $id)->first(),
            'rules'   => Role::where('name', '!=', 'patient')->get(),
            'genders' => Gender::get(),
        ];

        return view('admin.doctor.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validateUpdate($request, $id);

        $image_name         = '';

        if(!empty($_FILES['image']['name']))
        {
            $image_name     = (new User())->userAvatar($request);
        }

        $user               = User::find($id);
        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->role_id      = $request->role_id;
        $user->address      = $request->address;
        $user->phone_number = $request->phone_number;
        $user->department   = $request->department;
        $user->education    = $request->education;
        $user->description  = $request->description;

        if(!empty($request->password))
        {
            $user->password = bcrypt($request->password);
        }

        if($image_name != '')
        {
            $user->image    = $image_name;
        }


        $user->update();

        return redirect('doctor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function validateStorage(Request $request)
    {
        return $this->validate($request, [
            'name'          => 'required',
            'email'         => 'required|unique:users',
            'password'      => 'required|min:6|max:25',
            'gender_id'     => 'required|not_in:0',
            'education'     => 'required',
            'address'       => 'required',
            'department'    => 'required',
            'phone_number'  => 'required|numeric',
            'image'         => 'required|mimes:jpge,jpg,png',
            'role_id'       => 'required|not_in:0',
            'description'   => 'required',
        ]);
    }

    private function validateUpdate(Request $request, $id)
    {
        return $this->validate($request, [
            'name'          => 'required',
            'email'         => 'required|unique:users,email,'.$id,
            'gender_id'     => 'required|not_in:0',
            'education'     => 'required',
            'address'       => 'required',
            'department'    => 'required',
            'phone_number'  => 'required|numeric',
            'image'         => 'mimes:jpge,jpg,png',
            'role_id'       => 'required|not_in:0',
            'description'   => 'required',
        ]);
    }
}
