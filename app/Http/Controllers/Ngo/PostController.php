<?php

namespace App\Http\Controllers\Ngo;

use App\Models\NgoHasPost;
use App\Models\PostHasLike;
use App\Models\PostHasMedia;
use Illuminate\Http\Request;
use App\Models\PostHasComment;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    // Validate the incoming fields 
    public function createPost(Request $request)
    {
        $request->validate([
            'description' => 'nullable|string',
            'type' => 'required|in:text,media',
            'media.*' => 'nullable|file|mimes:jpg,jpeg,png,mp4|max:20480', // 20MB 
        ]);

        DB::transaction(function () use ($request) {
            // Create new post
            $post = NgoHasPost::create([
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

                    PostHasMedia::create([
                        'media_type' => $type,
                        'media_path_name' => $path,
                        'post_id' => $post->id,
                    ]);
                }
            }
        });

        return response()->json(['message' => 'Post created successfully!']);
    }

    // Method to update Like on a post
    public function toggleLike(Request $request)
    {

        $request->validate([
            'post_id' => 'required|exists:ngo_has_posts,id',
        ]);

        if (!Auth::check()) {
            return response()->json(['message' => 'You are not authorized to like the post'], 401);
        }

        // dd($request->all());
        $post = NgoHasPost::findOrFail($request->post_id);

        $alreadyLiked = PostHasLike::where('user_id', auth()->user()->id)->where('post_id', $post->id);
        // dd($alreadyLiked);

        if ($alreadyLiked->exists()) {
            $alreadyLiked = $alreadyLiked->first();
            $alreadyLiked->delete();

            return response()->json([
                'success' => true,
                'message' => 'like removed !',
                'totalLikes' => $post->likes()->count(),
            ], 200);
        }

        // Save the like
        PostHasLike::create([
            'user_id' => auth()->user()->id,
            'post_id' => $post->id
        ]);

        $this->updatePostAnalytics($post);

    // Add logic for sending notifications

        return response()->json([
            'success' => true,
            'message' => 'post liked successfully',
            'totalLikes' => $post->likes()->count()
        ]);
    }

    public function updatePostAnalytics(NgoHasPost $post)
    {
        // Increment impression whenever a post is liked
        $currentImpressions = (int) $post->impressions;
        $post->update(['impressions' => $currentImpressions + 1]);
    }
    
    // Method to update comment on a post
    public function addComment(Request $request){
        // Validate comment data
        $request->validate([
            'post_id' => 'required|exists:ngo_has_posts,id',
            'comment' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:post_has_comments,id',
        ]);

        // Check whether the post exists or not
        $post = NgoHasPost::findOrFail($request->post_id);

        if (!Auth::user()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        
// Create the comment or reply
        $comment = PostHasComment::create([
            'comment' => $request->comment,
            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
            'parent_id' => $request->parent_id,
        ]);

    // Add logic for sending notifications

    // Update post impressions
        $post->increment('impressions');

        // Fetch all comments related to this post
        $comments = PostHasComment::with('user')->where('post_id',$request->post_id)->get();
        $totalcomments = $post->comments()->count();

        return response()->json([
            'success' => true,
            'message' => 'Comment added successfully',
            'comment' => [
                'id' => $comment->id,
                'comment' => $comment->replies(),
                'user_name' => auth()->user()->name,
                // how to send the replies??
            ],
            'total_comments' => $totalcomments
        ], 201);
    }
}
