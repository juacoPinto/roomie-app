<!--
  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
<!--
  This example requires updating your template:

  ```
  <html class="h-full bg-white">
  <body class="h-full">
  ```
-->
<x-head>Editar Cuenta</x-head>
<x-nav-bar></x-nav-bar>
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Edita tus datos personales</h2>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" action="/user/{{ $user->id  }}" method="POST">
            @csrf
            @method('PATCH')
            <div>
                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Nombre</label>
                <div class="mt-2">
                    <input id="name" name="name" type="text" autocomplete="name" required  value="{{ old('name')  }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            @error('name')
            <div>{{ $message  }}</div>
            @enderror

            <div>
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Correo</label>
                <div class="mt-2">
                    <input id="email" name="email" type="email" autocomplete="email" required value="{{ old('email')  }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            @error('email')
            <div>{{ $message  }}</div>
            @enderror


            <div>
                <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Telefono</label>
                <div class="mt-2">
                    <input id="phone" name="phone" type="text" autocomplete="name" required value="{{ old('phone')  }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            @error('phone')
            <div>{{ $message  }}</div>
            @enderror

            <div>
                <label for="address" class="block text-sm font-medium leading-6 text-gray-900">Direccion</label>
                <div class="mt-2">
                    <input id="address" name="address" type="text" autocomplete="name" required value="{{ old('address')  }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            @error('address')
            <div>{{ $message  }}</div>
            @enderror

            <!--
                      Selector para user_type  :
            -->

            <label for="user_type" class="block mb-2 text-sm font-medium text-gray-900 light:text-black">Que estas buscando?</label>
            <select id="user_type" name="user_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Choose a country</option>
                <option value="Room">Room</option>
                <option value="Roomie">Roomie</option>
            </select>
            @error('user_type')
            <div>{{ $message  }}</div>
            @enderror

            <div>
                <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Editar</button>
            </div>
        </form>
    </div>
</div>
