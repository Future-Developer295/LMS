<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\ClassModel;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required|string|max:5000',
        ]);

        $classCode = session('joined_class_code');

        $class = $classCode
            ? ClassModel::whereRaw('UPPER(TRIM(class_code)) = ?', [strtoupper(trim($classCode))])->first()
            : null;

        if (!$class) {
            return back()->withErrors([
                'content' => 'You need to join a class before posting an announcement.',
            ]);
        }

        Announcement::create([
            'class_id' => $class->id,
            'user_id' => auth()->id(),
            'content' => $validated['content'],
        ]);

        return redirect()->route('steam')->with('success', 'Announcement posted successfully.');
    }

    public function destroy($id)
    {
        $announcement = Announcement::findOrFail($id);

        if ($announcement->user_id !== auth()->id()) {
            return back()->withErrors([
                'content' => 'You can only delete your own announcements.',
            ]);
        }

        $announcement->delete();

        return redirect()->route('steam')->with('success', 'Announcement deleted.');
    }
}
