<!-- resources/views/hero-page.blade.php -->
<div class="min-h-screen bg-cover bg-center text-white flex flex-col justify-between "
    style="background-image: url('{{ asset('images/himalya.jpg') }}');">

    <!-- Navbar -->
    <nav class="flex justify-between items-center p-4 border-b border-gray-800 bg-black bg-opacity-50">
        <div class="flex items-center space-x-4">
            {{-- <x-icon name="backpack" class="w-10 h-10 text-red-500" /> --}}
            {{-- <x-icon name="rocket" class="w-10 h-10 text-blue-500" /> --}}
        </div>

        <div class="navbar">
            <ul class="flex gap-3 uppercase font-bold text-sm">
                <li>
                    <a href="{{ route('welcome') }}"class="hover:text-gray-300">Home</a>
                </li>
                <li>
                    <a href="{{ route('posts') }}" class="hover:text-gray-300">Post</a> <!-- Link to PostList page -->
                </li>
                <li>
                    <a href="{{ route('login') }}" class="hover:text-gray-300">Login</a>
                </li>
                <li>
                    <a href="#" class="hover:text-gray-300">Profile</a>
                </li>
            </ul>
        </div>

        <x-icon name="globe" class="w-10 h-10 text-green-500" />
    </nav>

    <!-- Hero Section -->
    <div class="flex flex-col  items-center flex-grow text-center bg- bg-opacity-50 p-8">
        <h1 class="flex justify-center items-center text-2xl  md:text-4xl uppercase font-bold tracking-wide text-white"
            style="font-family: 'Silkscreen', sans-serif;">
            Explore. Distribute. Link. Release your inherent desire to travel.
        </h1>
        <div class="">
            <x-button positive label="Explore More" class="mt-4" onclick="scrollToGallerySection()" />


        </div>

        <script>
            function scrollToGallerySection() {
                document.getElementById('gallery-section').scrollIntoView({
                    behavior: 'smooth'
                });
            }
        </script>



    </div>



</div>

<div class="gallrey">
    @livewire('gallrey-section')

</div>
