<footer class="bg-light border-top py-4 mt-auto">
    <div class="container text-center">

        <div class="mb-3">
            <a href="{{ route('about') }}" class="text-decoration-none mx-2">About</a>
            <a href="{{ route('contact.index') }}" class="text-decoration-none mx-2">Contact</a>
            <a href="{{ route('privacy.policy') }}" class="text-decoration-none mx-2">Privacy Policy</a>
            <a href="{{ route('terms.conditions') }}" class="text-decoration-none mx-2">Terms & Conditions</a>
            <a href="{{ route('disclaimer') }}" class="text-decoration-none mx-2">Disclaimer</a>
        </div>

        <p class="mb-0 text-muted">
            &copy; {{ date('Y') }} VkBlog. All rights reserved.
        </p>

    </div>
</footer>
