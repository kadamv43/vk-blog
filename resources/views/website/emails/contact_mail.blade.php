<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>New Contact Form Submission</title>
</head>

<body style="margin:0;padding:20px;background:#f5f5f5;font-family:Arial,Helvetica,sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">
                <table width="600" cellpadding="20" cellspacing="0"
                    style="background:#ffffff;border-radius:8px;border:1px solid #e5e5e5;">

                    <tr>
                        <td style="background:#2563eb;color:#ffffff;text-align:center;">
                            <h2 style="margin:0;">New Contact Form Submission</h2>
                        </td>
                    </tr>

                    <tr>
                        <td>

                            <p>Hello,</p>

                            <p>You have received a new message from your blog contact form.</p>

                            <table width="100%" cellpadding="8" cellspacing="0"
                                style="border-collapse:collapse;">

                                <tr>
                                    <td width="150"
                                        style="font-weight:bold;border:1px solid #ddd;background:#f9f9f9;">
                                        Name
                                    </td>
                                    <td style="border:1px solid #ddd;">
                                        {{ $data['name'] }}
                                    </td>
                                </tr>

                                <tr>
                                    <td
                                        style="font-weight:bold;border:1px solid #ddd;background:#f9f9f9;">
                                        Email
                                    </td>
                                    <td style="border:1px solid #ddd;">
                                        {{ $data['email'] }}
                                    </td>
                                </tr>

                                <tr>
                                    <td
                                        style="font-weight:bold;border:1px solid #ddd;background:#f9f9f9;">
                                        Message
                                    </td>
                                    <td style="border:1px solid #ddd;white-space:pre-line;">
                                        {{ $data['message'] }}
                                    </td>
                                </tr>

                            </table>

                            <br>

                            <p>
                                You can reply directly to this email if the sender's email has been set as the
                                Reply-To address.
                            </p>

                            <hr>

                            <small>
                                This email was sent automatically from the VK Blog contact form.
                            </small>

                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

</body>

</html>
