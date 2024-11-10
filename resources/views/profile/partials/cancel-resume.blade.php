<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Cancel / Resume') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Cancel / Resume Subscription') }}
        </p>
    </header>

    @if (Auth::user()->subscription('monthly-plan')->canceled())
        <a href="{{ route('resume') }}" class="btn btn-sm btn-success">Resume</a>
    @else
        <a href="{{ route('cancel') }}" class="btn btn-sm btn-danger">Cancel (End of the current period)</a>
        <a href="{{ route('cancel-now') }}" class="btn btn-sm btn-primary">Cancel Now</a>
    @endif
</section>
