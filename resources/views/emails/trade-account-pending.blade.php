<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Trade Account Application</title>
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
            background: #2563eb;
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
            opacity: 0.9;
            font-size: 14px;
        }
        .content {
            background: #f8fafc;
            padding: 24px;
            border: 1px solid #e2e8f0;
            border-top: none;
            border-radius: 0 0 12px 12px;
        }
        .section {
            margin-bottom: 24px;
        }
        .section:last-child {
            margin-bottom: 0;
        }
        .section-title {
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #64748b;
            margin-bottom: 12px;
            padding-bottom: 8px;
            border-bottom: 1px solid #e2e8f0;
        }
        .field {
            margin-bottom: 12px;
        }
        .label {
            font-size: 12px;
            font-weight: 500;
            color: #64748b;
            margin-bottom: 2px;
        }
        .value {
            font-size: 15px;
            color: #1e293b;
        }
        .badge {
            display: inline-block;
            padding: 4px 12px;
            background: #fef3c7;
            color: #92400e;
            border-radius: 9999px;
            font-size: 12px;
            font-weight: 600;
        }
        .cta {
            display: inline-block;
            padding: 12px 24px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            margin-top: 16px;
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
        <h1>New Trade Account Application</h1>
        <p>A new trade account application requires your review.</p>
    </div>
    
    <div class="content">
        <div class="section">
            <div class="section-title">Company Details</div>
            <div class="field">
                <div class="label">Company Name</div>
                <div class="value">{{ $account->company_name }}</div>
            </div>
            @if($account->company_reg_number)
            <div class="field">
                <div class="label">Company Registration Number</div>
                <div class="value">{{ $account->company_reg_number }}</div>
            </div>
            @endif
            @if($account->vat_number)
            <div class="field">
                <div class="label">VAT Number</div>
                <div class="value">{{ $account->vat_number }}</div>
            </div>
            @endif
            <div class="field">
                <div class="label">Business Sector</div>
                <div class="value">{{ ucfirst(str_replace('-', ' ', $account->sector)) }}</div>
            </div>
        </div>

        <div class="section">
            <div class="section-title">Contact Details</div>
            <div class="field">
                <div class="label">Contact Name</div>
                <div class="value">{{ $account->contact_name }}</div>
            </div>
            @if($account->job_title)
            <div class="field">
                <div class="label">Job Title</div>
                <div class="value">{{ $account->job_title }}</div>
            </div>
            @endif
            <div class="field">
                <div class="label">Email</div>
                <div class="value"><a href="mailto:{{ $account->email }}">{{ $account->email }}</a></div>
            </div>
            <div class="field">
                <div class="label">Phone</div>
                <div class="value">{{ $account->phone }}</div>
            </div>
        </div>

        <div class="section">
            <div class="section-title">Delivery Address</div>
            <div class="value">
                {{ $account->delivery_address }}<br>
                {{ $account->delivery_city }}<br>
                {{ $account->delivery_postcode }}
            </div>
        </div>

        <div class="section">
            <div class="section-title">Volume Estimate</div>
            <div class="field">
                <div class="label">Estimated Monthly Orders</div>
                <div class="value">{{ $account->estimated_volume }} blinds per month</div>
            </div>
        </div>

        <div class="section">
            <div class="section-title">Status</div>
            <span class="badge">Pending Approval</span>
        </div>

        <p style="margin-top: 24px;">Log in to the admin panel to review and approve this application.</p>
    </div>

    <div class="footer">
        <p>Application submitted on {{ $account->created_at->format('d M Y \a\t H:i') }}</p>
    </div>
</body>
</html>
