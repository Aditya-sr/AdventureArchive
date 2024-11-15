<div class="bg-black">
    <div class="mt-5 flex justify-center items-center gap-5">
        <x-avatar size="w-80 h-80" :src="'https://via.placeholder.com/150'" primary />
        <x-avatar size="w-80 h-80" :src="'https://via.placeholder.com/150'" primary />
        <x-avatar size="w-80 h-80" :src="'https://via.placeholder.com/150'" primary />
        <x-avatar size="w-80 h-80" :src="'https://via.placeholder.com/150'" primary />
    </div>

    <div class="card">
        @foreach ($userJourneys as $journey)
            <div class="card mb-4 shadow-md rounded-lg">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @foreach ($journey['images'] as $image)
                            <div class="swiper-slide">
                                <img src="{{ Storage::url($image['image_url']) }}"
                                    class="w-full h-60 object-cover rounded-lg" alt="{{ $journey['title'] }}">
                            </div>
                        @endforeach
                    </div>
                    <!-- Add Pagination if needed -->
                    <div class="swiper-pagination"></div>
                </div>

                <div class="p-4">
                    <h2 class="text-xl font-bold">{{ $journey['title'] }}</h2>
                    <p>{{ $journey['content'] }}</p>
                    <div class="flex justify-between mt-4">
                        <span class="text-gray-600">{{ $journey['location'] }}</span>
                        <span class="text-gray-600">{{ $journey['difficulty_level'] }}</span>
                    </div>
                </div>

                <div class="p-4 flex justify-between items-center">
                    <button class="text-blue-500">Like</button>
                    <button class="text-blue-500">Comment</button>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var swiper = new Swiper('.swiper-container', {
                loop: true,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
            });
        });
    </script>






</div>
