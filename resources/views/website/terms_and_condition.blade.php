@extends('website.layout.app')

@section('title', 'Terms & Conditions | VKBlog')

@section('content')

<div class="container py-5">
    <div class="mx-auto" style="max-width: 900px;">

        <h1 class="fw-bold mb-3">Terms & Conditions</h1>

        <p class="text-muted">
            <strong>Effective Date:</strong> {{ date('F d, Y') }}
        </p>

        <p>
            Welcome to <strong>VkBlog</strong>. By accessing and using this website, you agree to comply with and be bound by the following Terms & Conditions. If you do not agree with any part of these terms, please do not use this website.
        </p>

        <hr>

        <h4 class="mt-4">1. Use of the Website</h4>

        <p>
            The content on VkBlog is provided for informational and educational purposes only. You agree to use this website only for lawful purposes and in a manner that does not infringe the rights of others.
        </p>

        <hr>

        <h4 class="mt-4">2. Intellectual Property</h4>

        <p>
            Unless otherwise stated, all content on this website, including articles, text, images, logos, and other materials, is the property of VkBlog and is protected by applicable copyright laws.
        </p>

        <p>
            You may not copy, reproduce, distribute, or republish any content without prior written permission, except where permitted by law.
        </p>

        <hr>

        <h4 class="mt-4">3. User Conduct</h4>

        <p>You agree not to:</p>

        <ul>
            <li>Use the website for any unlawful purpose.</li>
            <li>Attempt to gain unauthorized access to the website or its systems.</li>
            <li>Distribute malicious software or harmful content.</li>
            <li>Interfere with the normal operation of the website.</li>
        </ul>

        <hr>

        <h4 class="mt-4">4. External Links</h4>

        <p>
            This website may contain links to third-party websites for your convenience. We do not control or endorse these websites and are not responsible for their content, services, or privacy practices.
        </p>

        <hr>

        <h4 class="mt-4">5. Disclaimer of Liability</h4>

        <p>
            While we strive to keep the information on this website accurate and up to date, we make no warranties or guarantees regarding its completeness, accuracy, or reliability.
        </p>

        <p>
            Your use of the information on this website is entirely at your own risk. VkBlog shall not be liable for any direct or indirect damages arising from the use of this website.
        </p>

        <hr>

        <h4 class="mt-4">6. Changes to These Terms</h4>

        <p>
            We reserve the right to modify these Terms & Conditions at any time. Updated versions will be posted on this page with the revised effective date.
        </p>

        <hr>

        <h4 class="mt-4">7. Governing Law</h4>

        <p>
            These Terms & Conditions shall be governed by and interpreted in accordance with the laws of India. Any disputes arising from the use of this website shall be subject to the jurisdiction of the appropriate courts in India.
        </p>

        <hr>

        <h4 class="mt-4">8. Contact Us</h4>

        <p>
            If you have any questions regarding these Terms & Conditions, please visit our
            <a href="{{ route('contact.index') }}">Contact</a> page.
        </p>

    </div>
</div>

@endsection
