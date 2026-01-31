<div class="min-h-screen flex items-center justify-center relative overflow-hidden bg-gray-900">
    <!-- CI/CD Deployment Status Banner -->
    <div class="absolute top-0 left-0 right-0 z-30">
        <div class="bg-gradient-to-r from-blue-600 to-green-600 text-white py-2 px-4 text-center">
            <div class="flex justify-center items-center space-x-2">
                <div class="flex items-center space-x-1">
                    <svg class="w-4 h-4 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="font-semibold">CI/CD Auto Deploy LIVE 🚀</span>
                </div>
                <span class="hidden md:inline">|</span>
                <span class="text-sm">Auto deploy on push to main branch</span>
            </div>
        </div>
    </div>

    <!-- Background SVG -->
    <div class="absolute inset-0 overflow-hidden z-0">
        <svg class="w-full h-full opacity-70" viewBox="0 0 800 400" preserveAspectRatio="xMidYMid slice">
            <path d="M0,400 L100,200 L200,300 L400,100 L600,250 L800,150 L800,400 Z" fill="#8fa0a8" />
            <path d="M0,400 L50,250 L150,350 L300,150 L500,300 L700,200 L800,300 L800,400 Z"
                fill="#65737e" />
            <path d="M0,400 L80,300 L200,400 L400,250 L600,380 L800,220 L800,400 Z" fill="#49545b" />
        </svg>
    </div>

    <div class="absolute inset-0 bg-black bg-opacity-60 z-10"></div>

    <!-- Main Card -->
    <div
        class="relative z-20 w-full max-w-md p-10 rounded-2xl shadow-lg text-white backdrop-blur-lg bg-opacity-75 bg-gradient-to-br from-gray-700 via-gray-800 to-black border border-gray-600 transform transition-transform duration-500 hover:scale-105">

        <!-- Status Badge -->
        <div class="absolute -top-3 -right-3">
            <div class="relative">
                <div
                    class="w-12 h-12 rounded-full bg-gradient-to-r from-green-400 to-blue-500 flex items-center justify-center shadow-lg">
                    ⚡
                </div>
                <div
                    class="absolute -top-1 -right-1 w-4 h-4 bg-green-400 rounded-full border-2 border-gray-800 animate-pulse">
                </div>
            </div>
        </div>

        <!-- Heading -->
        <h2
            class="text-4xl font-bold text-center mb-6 bg-gradient-to-r from-green-400 to-blue-500 bg-clip-text text-transparent">
            Embark on Your Adventure 🏔️
        </h2>

        <!-- Build Info -->
        <div class="mb-4 p-3 bg-gray-800 rounded-lg border border-gray-700 text-sm">
            <div class="flex items-center justify-between">
                <span>
                    Build:
                    <span class="text-green-400 font-semibold">
                        {{ substr(env('GITHUB_SHA', 'local'), 0, 7) }}
                    </span>
                </span>
                <span class="text-gray-400 text-xs">
                    Deployed at: {{ now()->format('d M Y, h:i A') }}
                </span>
            </div>
        </div>

        @if ($loginpage)
            <div class="text-center text-gray-300 mb-8">Sign in to start your journey</div>

            <form class="space-y-6">
                <x-input wire:model="login.email" label="Email" />
                <x-input wire:model="login.password" label="Password" type="password" />

                <x-button class="w-full bg-gradient-to-r from-blue-500 to-green-500"
                    wire:click="login" label="Login" />
            </form>

            <div class="text-center mt-6">
                <x-button wire:click="goToRegister" label="Register" secondary />
            </div>
        @endif

        @if ($registration)
            <div class="text-center text-gray-300 mb-8">Create your account</div>

            <form class="space-y-6">
                <x-input wire:model="name" label="Name" />
                <x-input wire:model="email" label="Email" />
                <x-input wire:model="password" label="Password" type="password" />

                <x-button class="w-full bg-gradient-to-r from-green-500 to-blue-500"
                    wire:click="register" label="Register" />
            </form>

            <div class="text-center mt-6">
                <x-button wire:click="goToLogin" label="Login" secondary />
            </div>
        @endif

        <!-- CI/CD Proof Section -->
        <div class="mt-8 pt-6 border-t border-gray-700 text-xs">
            <p class="text-gray-400 mb-2">CI/CD Pipeline Status</p>
            <div class="flex justify-between"><span>Git Push</span><span class="text-green-400">✔</span></div>
            <div class="flex justify-between"><span>GitHub Actions</span><span class="text-green-400">✔</span></div>
            <div class="flex justify-between"><span>Auto Deploy</span><span class="text-green-400">✔</span></div>
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
