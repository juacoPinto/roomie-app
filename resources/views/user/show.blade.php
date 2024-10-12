<x-head>Usuario</x-head>
<x-nav-bar></x-nav-bar>

<body>
<div class="max-w-sm mx-auto bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <a href="#">
        <img class="rounded-t-lg" src="{{asset($user->image)}}" alt="foto de perfil" />
    </a>
    <div class="p-5">
        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $user->name }}</h5>
        </a>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Email: {{ $user->email  }}</p>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Phone: {{ $user->phone }}</p>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Direccion: {{ $user->address  }}</p>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Busco: {{ $user->user_type  }}</p>

        <a href="/user/{{ $user->id}}/edit" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Editar
            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg>
        </a>
    </div>
</div>
</body>
