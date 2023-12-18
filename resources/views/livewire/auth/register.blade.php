<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Register For an Account</h2>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form  class="space-y-6" wire:submit.prevent="register">
            <div>

                <label for="Name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                <div class="mt-2">
                    <input wire:model.lazy="name" id="name"  type="text"   class="@error('name') border-red-500 @enderror block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    @error('name')
                       <span class="text-red-500"> {{ $message }}</span>
                    @enderror


                </div>
            </div>
            <div>

                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                <div class="mt-2">
                    <input wire:model="email" id="email"  type="email"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    @error('email')
                    <span class="text-red-500"> {{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div>
                <div class="flex items-center justify-between">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                </div>
                <div class="mt-2">
                    <input wire:model.lazy="password" id="password" name="password" type="password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    @error('password')
                    <span class="text-red-500"> {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div>
                <div class="flex items-center justify-between">
                    <label for="passwordConfirmation" class="block text-sm font-medium leading-6 text-gray-900">Password Confirmation</label>
                </div>
                <div class="mt-2">
                    <input  wire:model.lazy="password_confirmation"  type="password"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    @error('password_confirmation')
                    <span class="text-red-500"> {{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div>
                <button type="submit" value="register" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Register</button>
            </div>
        </form>

        <p class="mt-10 text-center text-sm text-gray-500">
            Already Have an Account?
            <a href="#" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Sign in</a>
        </p>
    </div>
</div>
