<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Plans') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="d-flex justify-content-center flex-wrap gap-4">
                        @if (count($plans) > 0)
                            @foreach ($plans as $plan)
                                <div class="text-center flex-grow-1 pt-3 px-lg-4">
                                    <h3 class="fs-6 fw-semibold text-dark">{{ $plan->name }}</h3>
                                    <p class="mt-3 d-flex align-items-center justify-content-center">
                                        <span class="display-5 fw-bold text-dark">{{ $plan->price() }}</span>
                                        <span class="ms-2 text-muted fs-6">/{{ $plan->interval }}</span>
                                    </p>
                                    <a href="{{ route('checkout', $plan) }}" class="btn btn-primary mt-3 w-50">
                                        {{ $plan->name == 'Monthly Plan' ? 'Try Now (Trial 7 Days)' : 'Buy Now' }}
                                    </a>
                                </div>
                            @endforeach
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
