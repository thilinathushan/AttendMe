<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Badge;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BadgeController extends Controller
{
    public function AddBadge()
    {
        return view('admin.admin-badge');
    }

    public function save(Request $request)
    {
        Badge::create([
            'BadgeCode' => $request->Badge_C,
            'BadgeName' => $request->Badge_N
        ]);


        return redirect()->intended(RouteServiceProvider::ADMINDASHCOPY)->with('status', "Badge Created Successfully!");
    }

    public function ManageBadge()
    {
        $badge = Badge::all();
        return view('admin.admin-badge-manage', compact('badge'));
    }

    public function EditBadge($id)
    {
        $badge = Badge::find($id);
        return view('admin.admin-badge-edit', compact('badge'));
    }

    public function UpdateBadge(Request $request, $id): RedirectResponse
    {
        $badge = Badge::find($id);
        $badge->BadgeCode = $request->input('Badge_C');
        $badge->BadgeName = $request->input('Badge_N');
        $badge->update();
        return redirect()->intended(RouteServiceProvider::ADMINDASHCOPY)->with('status', "Update Successfully!");
    }

    public function DeleteBadge($id)
    {
        $badge = Badge::find($id);
        $badge->delete();
        return redirect()->intended(RouteServiceProvider::ADMINDASHCOPY)->with('status', "Deleted Successfully!");
    }

    public function BadgeAllDelete(Request $request)
    {
        $badge = $request->selectedItem;  // ids ---name of tha chackbox

        if (!is_array($badge)) {
            $badge = [$badge];
        }
        Badge::wherein('id', $badge)->delete();
        return redirect()->intended(RouteServiceProvider::ADMINDASHCOPY)->with('status', "Selected Badges, Deleted Successfully!.");
    }
}
