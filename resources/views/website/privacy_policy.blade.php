@extends('website.layout.app')

@section('content')

<div class="container py-5">
    <div class="mx-auto" style="max-width: 900px;">

        <h1 class="fw-bold mb-3">Privacy Policy</h1>

        <p class="text-muted">
            <strong>Effective Date:</strong> {{ date('F d, Y') }}
        </p>

        <p>
            Welcome to <strong>VkBlog</strong>. Your privacy is important to us. This Privacy Policy explains what
            information we collect, how we use it, and how we protect it when you visit our website.
        </p>

        <hr>

        <h4 class="mt-4">1. Information We Collect</h4>

        <p>We may collect the following information when you use our website:</p>

        <ul>
            <li>Your name</li>
            <li>Your email address</li>
            <li>Messages submitted through our Contact form</li>
        </ul>

        <p>
            We only collect information that you voluntarily provide. We do not collect sensitive personal information.
        </p>

        <hr>

        <h4 class="mt-4">2. How We Use Your Information</h4>

        <p>The information you provide may be used to:</p>

        <ul>
            <li>Respond to your inquiries.</li>
            <li>Improve our website and user experience.</li>
            <li>Communicate with you regarding your message.</li>
        </ul>

        <p>
            We do not sell, rent, or share your personal information with third parties for marketing purposes.
        </p>

        <hr>

        <h4 class="mt-4">3. Cookies</h4>

        <p>
            Our website may use cookies to improve your browsing experience and enhance website functionality.
            You can choose to disable cookies through your browser settings at any time.
        </p>

        <hr>

        <h4 class="mt-4">4. Third-Party Services</h4>

        <p>
            We may use trusted third-party services such as analytics or advertising providers.
            These services may collect anonymous usage information in accordance with their own privacy policies.
        </p>

        <p>
            Our website may also contain links to external websites. We are not responsible for the privacy practices
            or content of those websites.
        </p>

        <hr>

        <h4 class="mt-4">5. Data Security</h4>

        <p>
            We take reasonable measures to protect the information you provide. However, no method of internet
            transmission or electronic storage is completely secure, and we cannot guarantee absolute security.
        </p>

        <hr>

        <h4 class="mt-4">6. Children's Privacy</h4>

        <p>
            VkBlog is not intended for children under the age of 13. We do not knowingly collect personal information
            from children.
        </p>
        <hr>

        <h4 class="mt-4">7. Advertising</h4>

        <p>
            In the future, this website may display advertisements provided by third-party advertising partners such as Google AdSense.
            These providers may use cookies to serve ads based on your previous visits to this and other websites.
            You can learn more about how Google uses data by visiting Google's Privacy Policy.
        </p>

        <hr>

        <h4 class="mt-4">8. Changes to This Privacy Policy</h4>

        <p>
            We may update this Privacy Policy from time to time. Any changes will be posted on this page with an
            updated effective date.
        </p>

        <hr>

        <h4 class="mt-4">9. Contact Us</h4>

        <p>
            If you have any questions regarding this Privacy Policy, please visit our
            <a href="{{ route('contact.index') }}">Contact</a> page.
        </p>



    </div>
</div>

@endsection
