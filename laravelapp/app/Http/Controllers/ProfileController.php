<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {   
        $user = $request->user();
        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // Handle profile picture upload
    if ($request->hasFile('image')) {
    $fileName = time() . '.' . $request->image->extension();
    $filePath = $request->image->storeAs('public/images', $fileName);

    // Check if the uploaded file is an image
    $image = Image::make(storage_path("app/$filePath"));
    
    if ($image->mime() == 'image/jpeg' || $image->mime() == 'image/png' || $image->mime() == 'image/gif') {
        // Resize the image
        $resizedImage = $image->fit(200, 200)->save(storage_path("app/$filePath"));

        // Update the user's image attribute
        $user->image = $fileName;
    } else {
        // Handle the case where the uploaded file is not an image
        return Redirect::back()->withErrors(['image' => 'The uploaded file is not a valid image.'])->withInput();
    }
}


        $user->save();
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
