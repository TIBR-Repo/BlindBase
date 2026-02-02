<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trade Account Application Received</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; background-color: #f4f4f4; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 20px auto; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .header { background: #0f172a; color: #fff; padding: 30px; text-align: center; }
        .header h1 { margin: 0; font-size: 24px; }
        .logo { font-size: 28px; font-weight: bold; margin-bottom: 10px; }
        .logo span { color: #2563eb; }
        .content { padding: 30px; }
        .info-icon { text-align: center; margin-bottom: 20px; }
        .info-icon svg { width: 60px; height: 60px; fill: #2563eb; }
        .details-box { background: #f8fafc; padding: 20px; border-radius: 8px; margin: 20px 0; }
        .detail-row { padding: 8px 0; border-bottom: 1px solid #e2e8f0; }
        .detail-row:last-child { border-bottom: none; }
        .detail-label { font-weight: 600; color: #64748b; font-size: 12px; text-transform: uppercase; }
        .detail-value { margin-top: 4px; }
        .steps { margin: 30px 0; }
        .step { display: flex; align-items: flex-start; margin-bottom: 15px; }
        .step-number { background: #2563eb; color: #fff; width: 28px; height: 28px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; margin-right: 15px; flex-shrink: 0; }
        .footer { background: #f8fafc; padding: 20px; text-align: center; font-size: 12px; color: #64748b; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">BLIND<span>BASE</span></div>
            <h1>Application Received</h1>
        </div>
        
        <div class="content">
            <div class="info-icon">
                <svg viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
            </div>
            
            <p>Hi {{ $tradeAccount->contact_name }},</p>
            
            <p>Thank you for applying for a BlindBase Trade Account! We've received your application for <strong>{{ $tradeAccount->company_name }}</strong>.</p>
            
            <div class="details-box">
                <div class="detail-row">
                    <div class="detail-label">Company</div>
                    <div class="detail-value">{{ $tradeAccount->company_name }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Contact</div>
                    <div class="detail-value">{{ $tradeAccount->contact_name }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Email</div>
                    <div class="detail-value">{{ $tradeAccount->email }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Sector</div>
                    <div class="detail-value" style="text-transform: capitalize;">{{ str_replace('-', ' ', $tradeAccount->sector ?? 'Not specified') }}</div>
                </div>
            </div>
            
            <h3>What Happens Next?</h3>
            
            <div class="steps">
                <div class="step">
                    <div class="step-number">1</div>
                    <div>
                        <strong>Review</strong><br>
                        <span style="color: #64748b;">Our team will review your application within 1-2 business days.</span>
                    </div>
                </div>
                <div class="step">
                    <div class="step-number">2</div>
                    <div>
                        <strong>Approval</strong><br>
                        <span style="color: #64748b;">You'll receive an email once your account has been approved.</span>
                    </div>
                </div>
                <div class="step">
                    <div class="step-number">3</div>
                    <div>
                        <strong>Start Saving</strong><br>
                        <span style="color: #64748b;">Log in to access trade pricing and exclusive discounts.</span>
                    </div>
                </div>
            </div>
            
            <p>If you have any questions in the meantime, please contact us at <a href="mailto:trade@blindbase.co.uk">trade@blindbase.co.uk</a>.</p>
        </div>
        
        <div class="footer">
            <p>&copy; {{ date('Y') }} BlindBase. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
