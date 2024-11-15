<x-modal.card title="Create Your Journey" wire:model="createJourneyModal">
    <form wire:submit.prevent="submit">
        <!-- Title -->
        <x-input label="Title" placeholder="Enter journey title" wire:model.defer="title" />
        @error('title')
            <span class="text-red-500">{{ $message }}</span>
        @enderror

        <!-- Description -->
        <x-textarea label="Description" placeholder="Share your trip experience" wire:model.defer="content" />
        @error('content')
            <span class="text-red-500">{{ $message }}</span>
        @enderror

        <!-- Location -->
        <x-input label="Location" placeholder="Enter location" wire:model.defer="location" />
        @error('location')
            <span class="text-red-500">{{ $message }}</span>
        @enderror

        <!-- Type of Trip -->
        <x-select label="Type of Trip" wire:model.defer="tripType" placeholder="Select trip type">
            <x-select.option label="Beginner" value="beginner" />
            <x-select.option label="Moderate" value="moderate" />
            <x-select.option label="Experienced" value="experienced" />
        </x-select>
        <x-select label="Difficulty Level" wire:model.defer="tripType" placeholder="Select trip type">
            <x-select.option label="Beginner" value="beginner" />
            <x-select.option label="Moderate" value="moderate" />
            <x-select.option label="Experienced" value="experienced" />
        </x-select>
        @error('tripType')
            <span class="text-red-500">{{ $message }}</span>
        @enderror

        <!-- Submit Button -->
        <x-slot name="footer">
            <x-button flat label="Cancel" x-on:click="close" />
            <x-button positive label="Create Journey" type="submit" />
        </x-slot>
    </form>
</x-modal.card>
