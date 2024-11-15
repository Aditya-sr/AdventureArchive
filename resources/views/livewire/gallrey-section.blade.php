<div id="gallery-section" class=" bg-black p-8">
    @if ($containerOpen)
        <div class="container mx-auto ">
            <div class="flex flex-wrap justify-center items-center gap-14">
                <!-- Card 1 -->
                @foreach ($cards as $card)
                    <div class="w-[480px] h-[480px] max-w-[500px] bg-black shadow-md rounded-lg overflow-hidden">
                        <div class="overflow-hidden">
                            <img class="w-full h-[300px] object-cover transform transition-transform duration-500 ease-in-out hover:scale-110 hover:rotate-3"
                                src="{{ $card['image'] }}" alt="Card Image">
                        </div>
                        <div class="p-4">
                            <button wire:click="selectCard('{{ $card['id'] }}')"
                                class="font-bold text-[#B75D69] text-4xl"
                                style="font-family: 'Silkscreen', sans-serif;">
                                {{ $card['title'] }}
                            </button>
                            <p class="text-[#EACDC2] text-2xl mt-2">{{ $card['description'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <div class="flex justify-center items-center">
        <button class="text-white py-3 px-4 rounded animate-bounce bg-green-500 hover:bg-green-700"
            wire:click="openModal">Create your Journey</button>
    </div>

    @if ($modalOpen)
        <div class="fixed inset-0 flex justify-center items-center bg-gray-900 bg-opacity-70 z-50 overflow-y-auto">
            <div class="w-[40%] relative md:w-75% mt-4">
                <x-card class="bg-black p-30">
                    <div class="p-32">
                        <form class="space-y-7" wire:submit.prevent="saveJourney">
                            <h1 class="text-[#B75D69] flex justify-center items-center text-2xl md:text-4xl uppercase font-bold tracking-wide"
                                style="font-family: 'Silkscreen', sans-serif;">
                                Create Your Journey
                            </h1>

                            @if ($currentStep === 1)
                                <div class="space-y-7">
                                    <x-input class="bg-gray-100 text-red- font-semibold" label="Title"
                                        placeholder="Enter journey title" wire:model.defer="title" />
                                    @error('title')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror

                                    <!-- Description -->
                                    <x-textarea label="Description" placeholder="Share your trip experience"
                                        wire:model.defer="content" />
                                    @error('description')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror

                                    <!-- Location -->
                                    <x-input label="Location" placeholder="Enter location"
                                        wire:model.defer="location" />
                                    @error('location')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror

                                    <!-- Type of Trip -->
                                    <x-select label="Type of Trip" wire:model.defer="journey_type"
                                        placeholder="Select trip type">
                                        <x-select.option label="Trekking" value="trekking" />
                                        <x-select.option label="Hiking" value="hiking" />
                                        <x-select.option label="Mountaineering" value="mountaineering" />
                                        <x-select.option label="Camping" value="camping" />
                                        <x-select.option label="Wildlife Safari" value="wildlife_safari" />
                                    </x-select>
                                    <x-select label="Difficulty Level" wire:model.defer="difficulty_level"
                                        placeholder="Select difficulty level">
                                        <x-select.option label="Beginner" value="beginner" />
                                        <x-select.option label="Moderate" value="moderate" />
                                        <x-select.option label="Experienced" value="experienced" />
                                    </x-select>
                                    @error('tripType')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                            @endif

                            @if ($currentStep === 2)
                                <div class="space-y-7">
                                    <x-input type="file" label="Upload Images" wire:model="images" multiple />
                                    @error('images')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror

                                    {{-- Uploaded image preview --}}
                                    <div class="grid grid-cols-3 gap-4 mt-4">
                                        @foreach ($images as $image)
                                            <div class="bg-black shadow-md rounded-lg p-4">
                                                <img src="{{ $image->temporaryUrl() }}" alt="Uploaded Image"
                                                    class="w-full h-32 object-cover rounded-lg">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            @if ($currentStep === 3)
                                <div class="space-y-7">
                                    <h3 class="text-xl font-semibold text-white">Review Your Journey</h3>

                                    <div class="text-white">
                                        <p><strong>Title:</strong> {{ $title }}</p>
                                        <p><strong>Description:</strong> {{ $content }}</p>
                                        <p><strong>Location:</strong> {{ $location }}</p>
                                        <p><strong>Type of Trip:</strong> {{ $journey_type }}</p>
                                        <p><strong>Difficulty Level:</strong> {{ $difficulty_level }}</p>
                                    </div>

                                    <!-- Images -->
                                    <h4 class="text-lg font-semibold text-white">Images:</h4>
                                    <div class="grid grid-cols-3 gap-4 mt-4">
                                        @foreach ($images as $image)
                                            <div class="bg-black shadow-md rounded-lg p-4">
                                                <img src="{{ $image->temporaryUrl() }}" alt="Uploaded Image"
                                                    class="w-full h-32 object-cover rounded-lg">
                                            </div>
                                        @endforeach
                                    </div>

                                    <x-button class="mt-4 flex items-center space-x-2" wire:click="editPost">
                                        <span>Edit Journey</span>
                                    </x-button>
                                </div>
                            @endif

                            <div class="mt-5 flex justify-between">
                                @if ($currentStep > 1)
                                    <x-button class="font-semibold" rounded label="Previous"
                                        wire:click="previousStep" />
                                @endif
                                @if ($currentStep < 3)
                                    <x-button class="font-semibold" rounded label="Next" wire:click="nextStep" />
                                @else
                                    <x-button positive label="Create Journey" type="submit" />
                                @endif
                            </div>

                            <div class="mt-5 flex justify-between">
                                <x-button class="font-semibold" rounded label="Cancel" wire:click="closeModal" />
                            </div>
                        </form>
                    </div>
                </x-card>
            </div>
        </div>
    @endif
</div>
