<?php

namespace App\Http\Livewire;

use App\Models\Journey;
use App\Models\JourneyImage;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;

class GallreySection extends Component
{
    use Actions, WithFileUploads;
    public $cards = [];
    public $modalOpen = false;
    public $currentCardId = null;
    public $currentCard;
    public $containerOpen = true;
    public $contentView = false;
    public $title, $content, $location, $journey_type, $difficulty_level;
    public $currentStep = 1;
    public $journey;
    public $userJourneys = [];
    public $images = [];



    //Validation rules
    protected $rules = [
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'location' => 'required|string|max:255',
        'difficulty_level' => 'required|string|max:255',
        'journey_type' => 'required|string|max:255',
        'images.*' => 'image|max:4024'

    ];

    // Custom validation messages
    protected $messages = [
        'title.required' => 'Please enter a title.',
        'content.required' => 'Please enter your journey content.',
        'location.required' => 'Please enter a location.',
        'journey_type.required' => 'Please select the type of trip.',
        'difficulty_level.required' => 'Please select the type of trip.',
        'images.*.image' => 'Only image files are allowed.',
        'images.*.max' => 'Each image must not exceed 1MB.'
    ];



    public function saveJourney()
    {
        // Validate the form fields
        $this->validate();

        $journey = Journey::create([
            'user_id' => Auth::id(),
            'title' => $this->title,
            'content' => $this->content,
            'location' => $this->location,
            'journey_type' => $this->journey_type,
            'difficulty_level' => $this->difficulty_level,
        ]);

        // Save each uploaded image
        foreach ($this->images as $image) {
            $path = $image->store('journey-images', 'public');
            JourneyImage::create([
                'journey_id' => $journey->id,
                'image_url' => $path,
            ]);
        }

        // Reset the form fields
        $this->reset(['title', 'content', 'location', 'journey_type', 'difficulty_level', 'images', 'currentStep']);

        // Show success notification
        $this->notification()->success(
            $title = 'Journey Created',
            $description = 'You have successfully created your journey.'
        );

        // Close the modal
        $this->modalOpen = false;
    }

    public function mount()
    {
        $this->userJourneys = Journey::where('user_id', Auth::id())->with('journeyImage')->get();

        $this->cards = [
            [
                'id' => 1,
                'image' => asset('images/mountain.jpg'),
                'title' => 'Mountain Mantra',
                'description' => 'Explore the heights, befriend the winds, and share the view.',
            ],
            [
                'id' => 2,
                'image' => asset('images/morning-view.jpg'),
                'title' => 'Forest Mist',
                'description' => 'Dive in the urban dream, decode the city pulse and craft your metropolitan chronicle.',
            ],
            [
                'id' => 3,
                'image' => asset('images/manwithcigreete.jpg'),
                'title' => 'Cosmic Chronicle',
                'description' => 'Whisk away to the cosmic realms, star-gaze, and pen down your galactic diary.',
                'redirectRoute' => 'cosmic.chronicle'
            ],
            [
                'id' => 4,
                'image' => asset('images/wool-woman.jpg'),
                'title' => 'Forest Fables',
                'description' => 'Walk into the woods, live the folklore, and inspire others with your green tales.',
                'redirectRoute' => 'forest.fables'
            ]
        ];

        $this->currentCardId = $this->cards[0]['id'];
        $this->currentCard = collect($this->cards)->firstWhere('id', $this->currentCardId);
    }

    public function render()
    {
        return view('livewire.gallrey-section');
    }

    public function nextStep()
    {
        $this->validateStep();
        $this->currentStep++;
    }
    public function previousStep()
    {
        $this->currentStep--;
    }

    public function validateStep()
    {
        if ($this->currentStep === 1) {
            $this->validate(['title' => 'required', 'content' => 'required', 'location' => 'required']);
        }
    }


    public function scrollToSection()
    {
        $this->dispatchBrowserEvent('scroll-to-gallery-section');
    }

    public function selectCard($id)
    {
        $this->currentCardId = $id;
        $this->containerOpen = false;
        $this->contentView = true;
    }

    public function openModal()
    {
        $this->modalOpen = true;
    }
    public function closeModal()
    {
        $this->reset(['title', 'content', 'location', 'journey_type', 'difficulty_level', 'images', 'currentStep']);
        $this->modalOpen = false;
    }
}
