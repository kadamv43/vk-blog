@extends('website.layout.app')

@section('title', 'Disclaimer | VKBlog')

@section('content')

<div class="container py-5">
    <div class="mx-auto" style="max-width: 900px;">

        <h1 class="fw-bold mb-3">Disclaimer</h1>

        <p class="text-muted">
            <strong>Effective Date:</strong> {{ date('F d, Y') }}
        </p>

        <p>
            The information provided on <strong>VkBlog</strong> is published in good faith and is intended for general informational and educational purposes only. While we strive to keep the content accurate and up to date, we make no warranties or representations regarding the completeness, accuracy, reliability, or suitability of the information published on this website.
        </p>

        <hr>

        <h4 class="mt-4">1. General Information</h4>

        <p>
            All articles, tutorials, code examples, and opinions published on this website are based on personal knowledge, research, and experience. They should not be considered professional, legal, financial, or technical advice.
        </p>

        <hr>

        <h4 class="mt-4">2. Use at Your Own Risk</h4>

        <p>
            Any action you take based on the information found on this website is strictly at your own risk. VkBlog will not be liable for any losses, damages, or issues arising from the use of the information provided on this website.
        </p>

        <hr>

        <h4 class="mt-4">3. External Links</h4>

        <p>
            This website may contain links to third-party websites for your convenience. While we aim to link only to useful and reputable resources, we have no control over the content, policies, or practices of these external websites.
        </p>

        <p>
            Visiting external websites is at your own discretion, and we encourage you to review their respective privacy policies and terms of use.
        </p>

        <hr>

        <h4 class="mt-4">4. No Guarantees</h4>

        <p>
            We do not guarantee that the website will always be available, error-free, or free from viruses or other harmful components. Although we make every effort to provide accurate and reliable content, mistakes may occasionally occur.
        </p>

        <hr>

        <h4 class="mt-4">5. Copyright</h4>

        <p>
            Unless otherwise stated, all content on VkBlog is the intellectual property of VkBlog. Unauthorized copying, reproduction, or distribution of our content without permission is prohibited.
        </p>

        <hr>

        <h4 class="mt-4">6. Changes to This Disclaimer</h4>

        <p>
            We may update this Disclaimer from time to time. Any changes will be posted on this page with the updated effective date.
        </p>

        <hr>

        <h4 class="mt-4">7. Contact Us</h4>

        <p>
            If you have any questions regarding this Disclaimer, please visit our
            <a href="{{ route('contact.index') }}">Contact</a> page.
        </p>

    </div>
</div>

@endsection
