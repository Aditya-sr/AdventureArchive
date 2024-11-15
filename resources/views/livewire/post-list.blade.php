<div class="container mx-auto py-12">
    <h2 class="text-4xl font-extrabold mb-12 mt-16 text-center text-gray-800">User Posts</h2>

    @if ($userJourneys->isEmpty())
        <p class="text-4xl text-red-500 text-center">No posts found.</p>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach ($userJourneys as $journey)
                <div
                    class="bg-white shadow-lg rounded-lg overflow-hidden transform hover:-translate-y-2 transition duration-300">
                    <div class="relative">
                        @if ($journey->journeyImage && $journey->journeyImage->isNotEmpty())
                            <img src="{{ asset('storage/' . $journey->journeyImage->first()->image_url) }}"
                                alt="Main Image"
                                class="w-full h-48 object-cover transition duration-200 hover:opacity-90">
                        @else
                            <div class="bg-gray-200 w-full h-48 flex items-center justify-center">
                                <p class="text-gray-500">No image available</p>
                            </div>
                        @endif
                        <div
                            class="absolute top-0 left-0 bg-black bg-opacity-50 px-4 py-2 text-white text-sm rounded-br-lg">
                            {{ ucfirst($journey->journey_type) }}
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-semibold mb-2 text-gray-800">{{ $journey->title }}</h3>
                        <p class="text-gray-600 text-base leading-relaxed mb-4">{{ $journey->content }}</p>
                        <p class="text-gray-700 mb-2"><strong>📍 Location:</strong> {{ $journey->location }}</p>
                        <p class="text-gray-700"><strong>🗺️ Difficulty:</strong>
                            {{ ucfirst($journey->difficulty_level) }}</p>

                        <div class="grid grid-cols-3 gap-4 mt-4">
                            @foreach ($journey->journeyImage as $image)
                                <div
                                    class="overflow-hidden rounded-lg transform hover:scale-105 transition duration-300">
                                    <img src="{{ asset('storage/' . $image->image_url) }}" alt="Image"
                                        class="w-full h-32 object-cover">
                                </div>
                            @endforeach
                        </div>

                        <!-- Like and Comment Section -->
                        <div class="flex justify-between items-center mt-6">
                            <!-- Like Button -->
                            <button wire:click="toggleLike({{ $journey->id }})"
                                class="flex items-center text-gray-600 hover:text-blue-500 transition duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6 mr-2"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                                </svg>
                                <span class="text-sm">{{ $journey->likes->count() }} Like(s)</span>
                            </button>
                            <!-- Comment Button -->
                            <button class="flex items-center text-gray-600 hover:text-blue-500 transition duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6 mr-2"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M21 6h-2.18A3.001 3.001 0 0 0 12 5c-1.33 0-2.5.5-3.4 1.35a6.978 6.978 0 0 0-2.1 5C6.48 13.5 7.47 15 9 15h9.68L22 19V9c0-1.66-1.34-3-3-3z" />
                                </svg>
                                <span class="text-sm">{{ $journey->comments->count() }} Comment(s)</span>
                            </button>
                        </div>

                        <!-- Comments Section -->
                        <div class="mt-6 border-t border-gray-200 pt-4">
                            <h4 class="text-lg font-semibold mb-2">Comments</h4>
                            <div class="space-y-4">
                                @foreach ($journey->comments as $comment)
                                    <div class="flex items-start space-x-4">
                                        <div class="bg-gray-200 w-10 h-10 rounded-full"></div>
                                        <div>
                                            <p class="font-semibold text-gray-800">
                                                {{ $comment->user ? $comment->user->name : 'Anonymous' }}</p>
                                            <p class="text-gray-600">{{ $comment->content }}</p>
                                        </div>
                                    </div>
                                @endforeach

                                <!-- Add Comment -->
                                <div class="flex items-start space-x-4 mt-4">
                                    <div class="bg-gray-200 w-10 h-10 rounded-full"></div>
                                    <input wire:model.defer="newComment.{{ $journey->id }}" type="text"
                                        placeholder="Add a comment..."
                                        class="flex-grow bg-gray-100 rounded-full px-4 py-2 text-sm focus:outline-none focus:ring focus:ring-blue-200">
                                    <button wire:click="addComment({{ $journey->id }})"
                                        class="text-blue-500 font-semibold">Post</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
