<x-layout>
    <x-slot:title> User Registration </x-slot:title>
    <x-slot:heading> User Registration </x-slot:heading>

    <form method="POST" action="/register">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <p class="mt-1 text-sm leading-6 text-gray-600">
                    Please fill the information below as requested
                </p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="first-name">First Name</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="text" name="first-name" id="first-name" placeholder='Pedri' required />
                        </div>
                        <x-form-error name='first-name' />
                    </x-form-field>
                    <x-form-field>
                        <x-form-label for="last-name">last name</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="text" name="last-name" id="last-name" placeholder='Alcantara' required />
                        </div>
                        <x-form-error name='last-name' />
                    </x-form-field>
                    <x-form-field>
                        <x-form-label for="email">Email</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="email" name="email" id="email" placeholder='gavi.pedri@example.com' required />
                        </div>
                        <x-form-error name='email' />
                    </x-form-field>
                    <x-form-field>
                        <x-form-label for="password">Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="password" name="password" id="password" required />
                        </div>
                        <x-form-error name='password' />
                    </x-form-field>
                    <x-form-field>
                        <x-form-label for="confirm-password"> Confirm Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="password" name="confirm-password" id="confirm-password" required />
                        </div>
                        <x-form-error name='confirm-password' />
                    </x-form-field>

                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <x-form-cancel-button href='/jobs'>Cancel</x-form-cancel-button>
            <x-form-button>Register</x-form-button>
        </div>
    </form>
</x-layout>

