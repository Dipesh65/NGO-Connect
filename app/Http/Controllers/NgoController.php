<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\PostMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NgoController extends Controller
{
    public function showNgoDashboard()
    {
        return view("NGO.Dashboard.index");
    }

    // Validate the incoming fields 
    public function createPost(Request $request)
    {
        $request->validate([
            'description' => 'nullable|string',
            'type' => 'required|in:text,media',
            'media.*' => 'nullable|file|mimes:jpg,jpeg,png,mp4|max:20480', // 20MB 
        ]);
        
        DB::transaction(function() use ($request){
        // Create new post
        $post = Post::create([
            'description' => $request->description,
            'type' => $request->type,
            'user_id' => auth()->id()
        ]); 

        // If media exists, upload & save
          if ($request->hasFile('media')) {
            foreach ($request->file('media') as $file) {
                $path = $file->store('post_media', 'public');
                $mediaType = $file->getClientMimeType();

                $type = str_contains($mediaType, 'video') ? 'video' : 'image';

                PostMedia::create([
                    'media_type' => $type,
                    'media_path_name' => $path,
                    'post_id' => $post->id,
                ]);
            }
        }
        });

        // Should be anything else instead of the message
    return response()->json(['message' => 'Post created successfully!']);
}
}