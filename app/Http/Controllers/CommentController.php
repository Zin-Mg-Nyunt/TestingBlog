<?php

namespace App\Http\Controllers;

use App\Mail\SubscriberMail;
use App\Models\Blog;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    public function store(Blog $blog)
    {
        request()->validate([
            'comment'=>['required']
        ], [
            'comment.required'=>'Your comment should not be blank.'
        ]);
        $blog->comments()->create([
            'body'=>request('comment'),
            'user_id'=>auth()->user()->id
        ]);

        $subscribers=$blog->subscribers->filter(fn ($subscriber) => $subscriber->id != auth()->id());

        $subscribers->each(function ($subscriber) use ($blog) {
            Mail::to($subscriber->email)->queue(new SubscriberMail($blog));
        });

        return redirect('/blogs/'.$blog->slug);
    }
}
