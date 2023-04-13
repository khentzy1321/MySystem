<?php

namespace App\Http\Controllers;

use App\Models\Bio;
// use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
// use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $users = User::orderBy('created_at', 'desc')->paginate(5);
        return view('users.index', compact('users'))->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Check if there are any validation errors in the session data
        $users = User::All();

        // If there are validation errors, pass them to the view
        return view('users.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:8|max:255',

        ]);



        // Create a new user with the validated data
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),


        ]);

        return redirect()->route('users.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bios = Bio::get();
        $user = User::findOrFail($id);
        return view('profile.index', compact('user','bios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
         return view('users.editsetting', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$user->id,
            // 'gender' => 'required',
            'password' => 'nullable|min:8|max:255',
        ]);

        // Update the user with the validated data
        $user->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            // 'gender' => $validatedData['gender'],
            'password' => $validatedData['password'] ? Hash::make($validatedData['password']) : $user->password,
        ]);

        // Alert::toast('Updated Successfully', 'success')->autoClose(3000)->timerProgressBar()->width('20rem')->padding('1.5rem');
        return redirect()->route('users.index');
    }


    public function bgView($id)
    {

        $user = User::findOrFail($id);

        return view('users.editbgimage', compact('user'));
    }
      public function profView($id)
    {

        $user = User::findOrFail($id);

        return view('users.editprofileimage', compact('user'));
    }

    public function updateBackImage(Request $request, $id)
{
    // Validate the form data
    // Validate the form data
    $user = User::findOrFail($id);

    $validatedData = $request->validate([
        'background_image' => 'required|image|max:2048', // max file size of 2MB
        'background_image*' => 'image|mimes:jpeg,jpg,gif,svg|max:5000', // max file size of 2MB
    ],
    [
        'background_image.required' => 'The background image field is required.',
        'background_image.image' => 'The file must be an image.',
        'background_image.max' => 'The file size must not exceed 2MB.',
        'background_image*.image' => 'The file must be an image.',
        'background_image*.mimes' => 'The file must be a JPEG, JPG, GIF, or SVG.',
        'background_image*.max' => 'The file size must not exceed 5MB.',
    ]);

    if ($request->hasFile('background_image')) {
        // Delete the old image file
        if (!empty($user->background_image)) {
            $oldImage = public_path('images/background/' . $user->background_image);
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }
        }

        $background_image = $request->file('background_image');
        $backgroundName = $background_image->getClientOriginalName();
        $background_image->move(public_path().'/images/background', $backgroundName);

        // Update the image path in the database
        $user->background_image = $backgroundName;
        $user->save();
    }
    return redirect()->back();


        // Upload the image and get the file path


    }

    public function updateProfImage(Request $request, $id)
    {
        // Validate the form data
        // Validate the form data
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'profile_image' => 'required|image|max:2048', // max file size of 2MB
            'profile_image*' => 'image|mimes:jpeg,jpg,gif,svg|max:5000',
        ]);

        if ($request->hasFile('profile_image')) {
            // Delete the old image file
            if (!empty($user->profile_image)) {
                $oldImage = public_path('images/background/' . $user->profile_image);
                if (file_exists($oldImage)) {
                    unlink($oldImage);
                }
            }

            $profile_image = $request->file('profile_image');
            $profileImageName = $profile_image->getClientOriginalName();
            $profile_image->move(public_path().'/images/profile', $profileImageName);

            // Update the image path in the database
            $user->profile_image = $profileImageName;
            $user->save();
        }


        return redirect()->back();



            // Upload the image and get the file path


        }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if(!empty($user->profile_image) && file_exists(public_path('images/profile/'. $user->profile_image))) {
            File::delete(public_path('images/profile/'. $user->profile_image));
        }

        if(!empty($user->background_image) && file_exists(public_path('images/background/'. $user->background_image))) {
            File::delete(public_path('images/background/'. $user->background_image));
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }


    public function deleteSelected(Request $request)
    {

    $id = $request->input('selected_users');

    if(!empty($id)){
        User::whereIn('id', $id)->delete();
    }
    return redirect()->back();
    }
}
