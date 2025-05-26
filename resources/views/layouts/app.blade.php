<!DOCTYPE html>
<html>
    <head>
        <title>Laravel 10 Task List App</title>
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
         {{-- blade-formatter-disable --}}
          <style type="text/tailwindcss">
            .btn {
              @apply rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50
            }

            .link {
              @apply font-medium text-gray-700 underline decoration-pink-500
            }

            label{
              @apply block uppercase text-slate-700 mb-2
            }
            input, textarea{ 
              @apply shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none 
            }
            .error{
              @apply text-red-500 text-sm
            }
          </style>
          
          {{-- blade-formatter-enable --}}
          <script src="//unpkg.com/alpinejs" defer></script>
    </head>
    @yield('styles')

    <body class="bg-gray-100 flex flex-col min-h-screen">
        <nav class="bg-white shadow-md py-4">
            <div class="container mx-auto flex items-center justify-between">
                <a href="/" class="text-2xl font-semibold text-gray-800">Task List</a>
                <div class="space-x-4">
                    <a href="/" class="text-gray-600 hover:text-gray-800">Home</a>
                    <a href="/tasks/create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">New Task</a>
                </div>
            </div>
        </nav>

        <div class="container mx-auto mt-10 mb-10 max-w-lg flex-grow">
            <h1 class="mb-4 text-2xl">@yield('title')</h1>
            <div x-data="{ flash: true }">
                @if (session()->has('success'))
                    <div x-show="flash" class="relative mb-10 rounded border border-green-400 bg-green-100 px-4 py-3 text-lg text-green-700" role="alert">
                        <strong class='font-bold'>Success!</strong> <div>{{ session('success') }}</div>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" @click="flash = false" stroke="currentColor" class="h-6 w-6 cursor-pointer">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </span>
                    </div>
                @endif
                @yield('content')
            </div>
        </div>

        <footer class="bg-white shadow-md py-4 text-center mt-auto">
            <p class="text-gray-500">© 2025 Task List App</p>
        </footer>
    </body>
</html>
