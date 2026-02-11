<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trade Account Approved</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; background-color: #f4f4f4; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 20px auto; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .header { background: linear-gradient(135deg, #0f172a 0%, #1e3a5f 100%); color: #fff; padding: 40px; text-align: center; }
        .header h1 { margin: 0; font-size: 28px; }
        .logo { font-size: 28px; font-weight: bold; margin-bottom: 15px; }
        .logo span { color: #2563eb; }
        .content { padding: 30px; }
        .success-banner { background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%); color: #fff; padding: 20px; border-radius: 8px; text-align: center; margin-bottom: 30px; }
        .success-banner h2 { margin: 0; font-size: 22px; }
        .benefits { margin: 30px 0; }
        .benefit { display: flex; align-items: flex-start; margin-bottom: 20px; padding: 15px; background: #f8fafc; border-radius: 8px; }
        .benefit-icon { width: 40px; height: 40px; background: #2563eb; border-radius: 8px; display: flex; align-items: center; justify-content: center; margin-right: 15px; flex-shrink: 0; }
        .benefit-icon svg { width: 20px; height: 20px; fill: #fff; }
        .discount-box { background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%); color: #fff; padding: 25px; border-radius: 8px; text-align: center; margin: 30px 0; }
        .discount-box h3 { margin: 0 0 5px; font-size: 16px; opacity: 0.9; }
        .discount-box .discount { font-size: 48px; font-weight: bold; }
        .button { display: inline-block; background: #2563eb; color: #fff; padding: 15px 40px; border-radius: 8px; text-decoration: none; font-weight: bold; font-size: 16px; }
        .footer { background: #f8fafc; padding: 20px; text-align: center; font-size: 12px; color: #64748b; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">BLIND<span>POINT</span></div>
            <h1>🎉 Congratulations!</h1>
        </div>
        
        <div class="content">
            <div class="success-banner">
                <h2>Your Trade Account is Approved!</h2>
            </div>
            
            <p>Hi {{ $tradeAccount->contact_name }},</p>
            
            <p>Great news! Your BlindPoint Trade Account for <strong>{{ $tradeAccount->company_name }}</strong> has been approved. You now have access to exclusive trade pricing and benefits.</p>
            
            <div class="discount-box">
                <h3>Your Trade Discount</h3>
                <div class="discount">{{ number_format($tradeAccount->discount_percent, 0) }}% OFF</div>
            </div>
            
            <h3>Your Trade Benefits</h3>
            
            <div class="benefits">
                <div class="benefit">
                    <div class="benefit-icon">
                        <svg viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div>
                        <strong>Exclusive Pricing</strong><br>
                        <span style="color: #64748b;">Access trade-only prices across our entire range.</span>
                    </div>
                </div>
                <div class="benefit">
                    <div class="benefit-icon">
                        <svg viewBox="0 0 20 20" fill="currentColor">
                            <path d="M8 5a1 1 0 100 2h5.586l-1.293 1.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L13.586 5H8zM12 15a1 1 0 100-2H6.414l1.293-1.293a1 1 0 10-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L6.414 15H12z"/>
                        </svg>
                    </div>
                    <div>
                        <strong>Fast Track Orders</strong><br>
                        <span style="color: #64748b;">Priority processing and dedicated support.</span>
                    </div>
                </div>
                <div class="benefit">
                    <div class="benefit-icon">
                        <svg viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V8z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div>
                        <strong>Compliance Documentation</strong><br>
                        <span style="color: #64748b;">Easy access to all fire and safety certificates.</span>
                    </div>
                </div>
            </div>
            
            <p style="text-align: center; margin-top: 30px;">
                <a href="{{ route('trade.login') }}" class="button">Login to Your Account</a>
            </p>
            
            <p style="margin-top: 30px;">Welcome to BlindPoint Trade! If you have any questions, our dedicated trade team is here to help.</p>
        </div>
        
        <div class="footer">
            <p>&copy; {{ date('Y') }} BlindPoint Supply. All rights reserved.</p>
            <p>trade@blindpoint.co.uk</p>
        </div>
    </div>
</body>
</html>
