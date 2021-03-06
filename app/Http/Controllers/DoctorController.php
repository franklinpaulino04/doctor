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
          'rules'   => Role::where('name', '!=', 'patient')->get()->pluck('name', 'id')->prepend('select role', 0),
          'genders' => Gender::get()->pluck('name', 'id')->prepend('select gender', 0),
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
        $this->validate($request, [
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

        $imageName          = '';

        if(!empty($_FILES['image']['name']))
        {
            $imageName      = (new User())->userAvatar($request);
        }

        $user               = new User();
        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->password     = bcrypt($request->password);
        $user->image        = $imageName;
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
            'rules'   => Role::where('name', '!=', 'patient')->get()->pluck('name', 'id')->prepend('select role', 0),
            'genders' => Gender::get()->pluck('name', 'id')->prepend('select gender', 0),
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
        $this->validate($request, [
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

        $user               = User::find($id);
        $imageName          = '';

        if(!empty($_FILES['image']['name']))
        {
            $imageName      = (new User())->userAvatar($request);
            unlink(public_path('images/users/'.$user->image));
        }

        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->role_id      = $request->role_id;
        $user->address      = $request->address;
        $user->phone_number = $request->phone_number;
        $user->department   = $request->department;
        $user->education    = $request->education;
        $user->description  = $request->description;
        $user->gender_id    = $request->gender_id;

        if(!empty($request->password))
        {
            $user->password = bcrypt($request->password);
        }

        if($imageName != '')
        {
            $user->image    = $imageName;
        }

        $user->update();

        return redirect('doctor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $response = [];
        if((isset(auth()->user()->id)) && auth()->user()->id == $id)
        {
            $response = [
                'result' => 0,
            ];
        }
        else
        {
            $user       = User::find($id);
            $userDelete = $user->delete();

            if($userDelete)
            {
                if(file_exists(public_path('images/users/'.$user->image)))
                {
                    unlink(public_path('images/users/'.$user->image));
                }

                $response = [
                    'result' => 1,
                ];
            }
        }

        return response()->json($response);
    }
}
