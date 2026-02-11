<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Form Submission</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            line-height: 1.6;
            color: #1e293b;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: #0f172a;
            color: white;
            padding: 24px;
            border-radius: 12px 12px 0 0;
            margin-bottom: 0;
        }
        .header h1 {
            margin: 0 0 8px 0;
            font-size: 24px;
        }
        .header p {
            margin: 0;
            opacity: 0.8;
            font-size: 14px;
        }
        .content {
            background: #f8fafc;
            padding: 24px;
            border: 1px solid #e2e8f0;
            border-top: none;
            border-radius: 0 0 12px 12px;
        }
        .field {
            margin-bottom: 16px;
            padding-bottom: 16px;
            border-bottom: 1px solid #e2e8f0;
        }
        .field:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }
        .label {
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #64748b;
            margin-bottom: 4px;
        }
        .value {
            font-size: 16px;
            color: #1e293b;
        }
        .message-box {
            background: white;
            padding: 16px;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            white-space: pre-wrap;
        }
        .footer {
            margin-top: 24px;
            padding-top: 16px;
            border-top: 1px solid #e2e8f0;
            font-size: 12px;
            color: #64748b;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>New Contact Form Submission</h1>
        <p>You have received a new enquiry from the BlindPoint website.</p>
    </div>
    
    <div class="content">
        <div class="field">
            <div class="label">Subject</div>
            <div class="value">
                @php
                    $subjects = [
                        'general' => 'General Enquiry',
                        'quote' => 'Request a Quote',
                        'trade' => 'Trade Account Enquiry',
                        'order' => 'Existing Order Query',
                        'compliance' => 'Compliance Documentation',
                        'other' => 'Other',
                    ];
                @endphp
                {{ $subjects[$formData['subject']] ?? $formData['subject'] }}
            </div>
        </div>

        <div class="field">
            <div class="label">Name</div>
            <div class="value">{{ $formData['name'] }}</div>
        </div>

        <div class="field">
            <div class="label">Email</div>
            <div class="value"><a href="mailto:{{ $formData['email'] }}">{{ $formData['email'] }}</a></div>
        </div>

        @if(!empty($formData['phone']))
        <div class="field">
            <div class="label">Phone</div>
            <div class="value"><a href="tel:{{ $formData['phone'] }}">{{ $formData['phone'] }}</a></div>
        </div>
        @endif

        @if(!empty($formData['company']))
        <div class="field">
            <div class="label">Company</div>
            <div class="value">{{ $formData['company'] }}</div>
        </div>
        @endif

        <div class="field">
            <div class="label">Message</div>
            <div class="message-box">{{ $formData['message'] }}</div>
        </div>
    </div>

    <div class="footer">
        <p>This email was sent from the contact form at blindpoint.co.uk</p>
        <p>Submitted on {{ now()->format('d M Y \a\t H:i') }}</p>
    </div>
</body>
</html>
