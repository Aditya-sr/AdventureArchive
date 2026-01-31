<div class="min-h-screen flex items-center justify-center relative overflow-hidden bg-gray-900">
    <!-- CI/CD Deployment Status Banner -->
    <div class="absolute top-0 left-0 right-0 z-30">
        <div class="bg-gradient-to-r from-blue-600 to-green-600 text-white py-2 px-4 text-center">
            <div class="flex justify-center items-center space-x-2">
                <div class="flex items-center space-x-1">
                    <svg class="w-4 h-4 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="font-semibold">CI/CD Pipeline Active</span>
                </div>
                <span class="hidden md:inline">|</span>
                <span class="text-sm">Auto-deploy on push to main branch</span>
            </div>
        </div>
    </div>

    <!-- Mountain SVG Animation Background -->
    <div class="absolute inset-0 overflow-hidden z-0">
        <div class="mountain-animation">
            <!-- Animated SVG Background (mountain scene) -->
            <svg class="mountain-svg w-full h-full opacity-70" viewBox="0 0 800 400" preserveAspectRatio="xMidYMid slice">
                <path d="M0,400 L100,200 L200,300 L400,100 L600,250 L800,150 L800,400 Z" fill="#8fa0a8" />
                <path d="M0,400 L50,250 L150,350 L300,150 L500,300 L700,200 L800,300 L800,400 Z" fill="#65737e" />
                <path d="M0,400 L80,300 L200,400 L400,250 L600,380 L800,220 L800,400 Z" fill="#49545b" />
            </svg>
        </div>
    </div>

    <!-- Dark Overlay for Contrast -->
    <div class="absolute inset-0 bg-black bg-opacity-60 z-10"></div>

    <!-- Frosted Glass Effect on the Form Card -->
    <div class="relative z-20 w-full max-w-md p-10 rounded-2xl shadow-lg text-white backdrop-blur-lg bg-opacity-75 bg-gradient-to-br from-gray-700 via-gray-800 to-black border border-gray-600 transform transition-transform duration-500 hover:scale-105"
        style="font-family: 'Poppins', sans-serif;">

        <!-- CI/CD Status Indicator -->
        <div class="absolute -top-3 -right-3">
            <div class="relative">
                <div class="w-12 h-12 rounded-full bg-gradient-to-r from-green-400 to-blue-500 flex items-center justify-center shadow-lg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <div class="absolute -top-1 -right-1 w-4 h-4 bg-green-400 rounded-full border-2 border-gray-800 animate-pulse"></div>
            </div>
        </div>

        <!-- Heading with Gradient Animation -->
        <h2 class="text-4xl font-bold text-center mb-6 bg-gradient-to-r from-green-400 to-blue-500 bg-clip-text text-transparent animate-gradient">
            Embark on Your Adventure
        </h2>

        <!-- CI/CD Build Info -->
        <div class="mb-4 p-3 bg-gray-800 rounded-lg border border-gray-700">
            <div class="flex items-center justify-between text-sm">
                <div class="flex items-center space-x-2">
                    <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <span>Build: v{{ $buildNumber ?? '1.0.0' }}</span>
                </div>
                <div class="text-gray-400">
                    <span id="lastDeployed"></span>
                </div>
            </div>
        </div>

        @if ($loginpage)
            <div class="text-center text-gray-300 mb-8">Sign in to start your journey</div>

            <form class="space-y-6">
                <x-input wire:model="login.email" icon="mail" label="Email" placeholder="Enter your email"
                    class="bg-gray-600 font-semibold text-black placeholder-gray-400 focus:ring-2 focus:ring-blue-500 rounded-lg transition-all duration-300 transform hover:scale-105" />

                <x-input wire:model="login.password" icon="lock-closed" label="Password"
                    placeholder="Enter your password" type="password" class="text-black"
                    class="bg-gray-600 text-black font-semibold placeholder-gray-400 focus:ring-2 focus:ring-blue-500 rounded-lg transition-all duration-300 transform hover:scale-105" />

                <x-button
                    class="w-full mt-8 transform hover:scale-110 transition-all duration-300 ease-in-out bg-gradient-to-r from-blue-500 to-green-500 shadow-lg"
                    primary wire:click="login" label="Login" />
            </form>

            <div class="text-center mt-6">
                <p class="text-sm text-gray-400">New here?</p>
                <x-button
                    class="transform hover:scale-105 transition-all duration-300 ease-in-out bg-gray-700 hover:bg-gray-800 shadow-md mt-2"
                    wire:click="goToRegister" label="Register" secondary />
            </div>
        @endif

        @if ($registration)
            <div class="text-center text-gray-300 mb-8">Join the adventure and create an account</div>

            <form class="space-y-6">
                <div class="flex flex-col items-center mb-4">
                    @if ($image)
                    <img
                    src="https://aditya-s3-learning-2026.s3.ap-south-1.amazonaws.com/IMG_20240421_134739.jpg"                            class="w-20 h-20 rounded-full border-4 border-blue-500 shadow-md transform hover:scale-110 transition-transform duration-300"
                            alt="Profile Preview" />
                    @else
                        <img src="https://via.placeholder.com/150"
                            class="w-20 h-20 rounded-full shadow-md border-4 border-blue-500 transform hover:scale-110 transition-transform duration-300"
                            alt="Placeholder Avatar">
                    @endif
                    <label class="text-gray-300 mt-2">Profile Image</label>
                    <input type="file" wire:model="image" accept="image/*"
                        class="mt-2 bg-gray-600 text- placeholder-gray-400 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition-transform transform hover:scale-105" />
                </div>

                <x-input wire:model="name" icon="user" label="Name" placeholder="Enter your name"
                    class="bg-gray-white text-black placeholder-gray-400 focus:ring-2 focus:ring-blue-500 rounded-lg transition-all duration-300 transform hover:scale-105" />

                <x-input wire:model="email" icon="mail" label="Email" placeholder="Enter your email" type="email"
                    class="bg-gray-600 text-black placeholder-gray-400 focus:ring-2 focus:ring-blue-500 rounded-lg transition-all duration-300 transform hover:scale-105" />

                <x-input wire:model="password" icon="lock-closed" label="Password" placeholder="Enter your password"
                    type="password"
                    class="bg-gray-600 text-black placeholder-gray-400 focus:ring-2 focus:ring-blue-500 rounded-lg transition-all duration-300 transform hover:scale-105" />

                <x-button
                    class="w-full mt-8 transform hover:scale-110 transition-all duration-300 ease-in-out bg-gradient-to-r from-green-500 to-blue-500 shadow-lg"
                    primary wire:click="register" label="Register" />
            </form>

            <div class="text-center mt-6">
                <p class="text-sm text-gray-400">Already a member?</p>
                <x-button wire:click="goToLogin" label="Login" secondary
                    class="transform hover:scale-105 transition-all duration-300 ease-in-out bg-gray-700 hover:bg-gray-800 shadow-md mt-2" />
            </div>
        @endif

        <!-- CI/CD Pipeline Visualization -->
        <div class="mt-8 pt-6 border-t border-gray-700">
            <h3 class="text-sm font-semibold text-gray-300 mb-3 flex items-center">
                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
                CI/CD Pipeline Status
            </h3>
            <div class="flex items-center justify-between mb-1">
                <span class="text-xs text-gray-400">Push to GitHub</span>
                <div class="w-4 h-4 rounded-full bg-green-500 animate-pulse"></div>
            </div>
            <div class="flex items-center justify-between mb-1">
                <span class="text-xs text-gray-400">GitHub Actions Run</span>
                <div class="w-4 h-4 rounded-full bg-green-500"></div>
            </div>
            <div class="flex items-center justify-between mb-1">
                <span class="text-xs text-gray-400">Build & Test</span>
                <div class="w-4 h-4 rounded-full bg-green-500"></div>
            </div>
            <div class="flex items-center justify-between">
                <span class="text-xs text-gray-400">Auto Deploy</span>
                <div class="w-4 h-4 rounded-full bg-green-500 animate-pulse"></div>
            </div>
        </div>
    </div>
</div>

<style>
    .mountain-animation {
        position: absolute;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    .mountain-svg {
        animation: moveMountains 20s linear infinite alternate;
    }

    @keyframes moveMountains {
        0% {
            transform: translateX(0);
        }
        100% {
            transform: translateX(-5%);
        }
    }

    /* Gradient Text Animation */
    .animate-gradient {
        animation: gradient 5s infinite alternate;
    }

    @keyframes gradient {
        0% {
            color: #76b852;
        }
        100% {
            color: #8DC26F;
        }
    }

    /* CI/CD Status Animation */
    @keyframes pipelineFlow {
        0% {
            transform: translateX(-100%);
        }
        100% {
            transform: translateX(100%);
        }
    }

    .pipeline-flow {
        position: relative;
        overflow: hidden;
    }

    .pipeline-flow::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 2px;
        background: linear-gradient(90deg, transparent, #3B82F6, transparent);
        animation: pipelineFlow 2s infinite;
    }
</style>

<script>
    // Update last deployed timestamp
    document.addEventListener('DOMContentLoaded', function() {
        const now = new Date();
        const formattedTime = now.toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});
        const formattedDate = now.toLocaleDateString();
        document.getElementById('lastDeployed').textContent = `Deployed: ${formattedDate} ${formattedTime}`;

        // Simulate CI/CD pipeline flow
        const pipelineSteps = document.querySelectorAll('.pipeline-flow');
        pipelineSteps.forEach((step, index) => {
            step.style.animationDelay = `${index * 0.5}s`;
        });
    });
</script>
