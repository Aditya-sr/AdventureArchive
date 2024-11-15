<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Journey;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PostList extends Component
{
    public $userJourneys;
    public $newComment = '';
    public $selectedJourneyId;
    protected $listners = ['refreshPosts' => '$refresh'];

    public function mount()
    {
        $this->userJourneys = Journey::where('user_id', auth()->id())
            ->with(['journeyImage', 'comments', 'likes'])
            ->get();
    }

    public function toggleLike($journeyId)
    {
        $like = Like::where('user_id', auth()->id())->where('journey_id', $journeyId)->first();

        if ($like) {
            $like->delete();
        } else {
            Like::create(['user_id' => auth()->id(), 'journey_id' => $journeyId]);
        }

        $this->emit('refreshPosts'); // Refresh the posts to update like count
    }



    public function addComment($journeyId)
    {
        $commentText = $this->newComment[$journeyId] ?? null;

        if ($commentText) {
            Comment::create([
                'user_id' => auth()->id(),
                'journey_id' => $journeyId,
                'content' => $commentText,
            ]);

            $this->newComment[$journeyId] = ''; // Clear the input after adding
            $this->emit('refreshPosts'); // Refresh the posts to update comments
        }
    }

    public function setJourneyForComment($journeyId)
    {
        $this->selectedJourneyId = $journeyId;
    }



    public function render()
    {
        $this->userJourneys = Journey::where('user_id', auth()->id())
            ->with(['journeyImage', 'comments', 'likes'])
            ->get();
        return view('livewire.post-list');
    }
}
