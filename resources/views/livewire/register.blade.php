<div class="multi-register">
    <!-- Progress bar -->
    <div class="progressbar">
        <div class="progress" id="progress"></div>
        <div class="progress-step {{ $stepOne ? 'progress-step-active' : '' }}" data-title="{{ __('One') }}"></div>
        <div class="progress-step {{ $stepTwo ? 'progress-step-active' : '' }}" data-title="{{ __('Two') }}"></div>
        <div class="progress-step {{ $stepThree ? 'progress-step-active' : '' }}" data-title="{{ __('Three') }}"></div>
    </div>

    <!-- Step1 -->
    <div class="form-step {{ $stepOne ? 'form-step-active' : '' }}">
        <div>
            <x-label for="name" :value="__('Name')" />
            <x-input wire:model.lazy="name" id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            @error('name')
            <span class="text-red-600">
                <p>{{ $message }}</p>
            </span>
            @enderror
        </div>
        <div class="mt-2">
            <x-label for="email" :value="__('Email')" />
            <x-input wire:model.lazy="email" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            @error('email')
            <span class="text-red-600">
                <p>{{ $message }}</p>
            </span>
            @enderror
        </div>
        <div>
            <x-label for="username" :value="__('Username')" />
            <x-input wire:model.lazy="username" id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus />
            @error('username')
            <span class="text-red-600">
                <p>{{ $message }}</p>
            </span>
            @enderror
        </div>
        <div class="mt-3">
            <x-button wire:click.prevent="checkStepOne">{{ __('Next') }}</x-button>
        </div>
    </div>

    <!-- Step2 -->
    <div class="form-step {{ $stepTwo ? 'form-step-active' : '' }}">
        <div class="mt-2">
            <x-label for="phone" :value="__('Phone')" />
            <x-input wire:model.lazy="phone" id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" placeholder="05xxxxxxxx" required autofocus />
            @error('phone')
            <span class="text-red-600">
                <p>{{ $message }}</p>
            </span>
            @enderror
        </div>
        <div class="mt-2">
            <label for="bio">{{ __('Bio') }}</label>
            <textarea wire:model.lazy="bio" id="bio" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="bio" >{{ old('bio') }}</textarea>
            @error('bio')
            <span class="text-red-600">
                <p>{{ $message }}</p>
            </span>
            @enderror
        </div>
        <div class="mt-2">
            <label for="gender">{{ __('Gender') }}</label>
            <select wire:model="gender" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="gender">
                <option value="">-- Choose --</option>
                <option value="male" {{ old('gender') }}>{{ __('Male') }}</option>
                <option value="female" {{ old('female') }}>{{ __('Female') }}</option>
            </select>
            @error('gender')
            <span class="text-red-600">
                <p>{{ $message }}</p>
            </span>
            @enderror
        </div>
        <div class="mt-2">
            <x-label for="birth_date" :value="__('Birth Date')" />
            <x-input wire:model.lazy="birth_date" id="birth_date" class="block mt-1 w-full" type="date" name="birth_date" :value="old('birth_date')" required autofocus />
            @error('birth_date')
            <span class="text-red-600">
                <p>{{ $message }}</p>
            </span>
            @enderror
        </div>
        <div class="flex justify-between mt-3">
            <x-button wire:click.prevent="backToStepOne" type="button" class="">{{ __('Previous') }}</x-button>
            <x-button wire:click.prevent="checkStepTwo">{{ __('Next') }}</x-button>
        </div>
    </div>

    <!-- Final step -->
    <div class="form-step {{ $stepThree ? 'form-step-active' : '' }}">
        <div class="mt-2">
            <x-label for="password" :value="__('Password')" />
            <x-input wire:model.lazy="password" id="password" class="block mt-1 w-full" type="password" name="password" :value="old('password')" required autofocus />
            @error('password')
            <span class="text-red-600">
                <p>{{ $message }}</p>
            </span>
            @enderror
        </div>
        <div class="mt-2">
            <x-label for="password-confirmation" :value="__('Confirm Password')" />
            <x-input wire:model.lazy="password_confirmation" id="password-confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" :value="old('password_confirmation')" required autofocus />
            @error('password_confirmation')
            <span class="text-red-600">
                <p>{{ $message }}</p>
            </span>
            @enderror
        </div>
        <div class="flex justify-between mt-3">
            <x-button wire:click.prevent="backToStepTwo" type="button" class="">{{ __('Previous') }}</x-button>
            <x-button wire:click.prevent="store" class="">{{ __('Save') }}</x-button>
        </div>
    </div>
</div>
