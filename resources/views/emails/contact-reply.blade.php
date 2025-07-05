<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reply to Your Message</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f8f9fa;
        }
        .container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
        }
        .content {
            padding: 30px;
        }
        .original-message {
            background: #f8f9fa;
            border-left: 4px solid #667eea;
            padding: 20px;
            margin: 20px 0;
            border-radius: 0 8px 8px 0;
        }
        .original-message h3 {
            margin-top: 0;
            color: #667eea;
            font-size: 16px;
        }
        .reply-message {
            background: #e8f4fd;
            border-left: 4px solid #10b981;
            padding: 20px;
            margin: 20px 0;
            border-radius: 0 8px 8px 0;
        }
        .reply-message h3 {
            margin-top: 0;
            color: #10b981;
            font-size: 16px;
        }
        .footer {
            background: #f8f9fa;
            padding: 20px 30px;
            border-top: 1px solid #e9ecef;
            text-align: center;
            font-size: 14px;
            color: #6c757d;
        }
        .signature {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e9ecef;
        }
        .signature .name {
            font-weight: 600;
            color: #667eea;
            font-size: 18px;
        }
        .signature .title {
            color: #6c757d;
            font-size: 14px;
            margin-top: 5px;
        }
        .contact-info {
            margin-top: 15px;
            font-size: 14px;
            color: #6c757d;
        }
        .contact-info a {
            color: #667eea;
            text-decoration: none;
        }
        .contact-info a:hover {
            text-decoration: underline;
        }
        .social-links {
            margin-top: 15px;
        }
        .social-links a {
            display: inline-block;
            margin: 0 10px;
            color: #667eea;
            text-decoration: none;
            font-size: 14px;
        }
        .btn {
            display: inline-block;
            padding: 12px 24px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 500;
            margin-top: 20px;
        }
        .btn:hover {
            background: linear-gradient(135deg, #5a6fd8 0%, #6d4299 100%);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Thank you for reaching out!</h1>
            <p style="margin: 10px 0 0 0; opacity: 0.9;">Reply to your message</p>
        </div>
        
        <div class="content">
            <p>Hello <strong>{{ $contact->name }}</strong>,</p>
            
            <p>Thank you for your message. I hope this email finds you well.</p>
            
            <!-- Original Message -->
            <div class="original-message">
                <h3>📧 Your Original Message:</h3>
                <p><strong>Subject:</strong> {{ $contact->subject }}</p>
                <p><strong>Message:</strong></p>
                <p style="white-space: pre-line;">{{ $contact->message }}</p>
                <p style="font-size: 12px; color: #6c757d; margin-top: 15px;">
                    <em>Sent on {{ $contact->created_at->format('M d, Y \a\t H:i') }}</em>
                </p>
            </div>
            
            <!-- Reply Message -->
            <div class="reply-message">
                <h3>💬 My Reply:</h3>
                <div style="white-space: pre-line;">{{ $replyMessage }}</div>
            </div>
            
            <p>If you have any questions or would like to continue our conversation, please feel free to reply to this email.</p>
            
            <!-- Call to Action -->
            <div style="text-align: center; margin: 30px 0;">
                <a href="mailto:rafipramanaputra05@gmail.com" class="btn">Continue Conversation</a>
            </div>
            
            <!-- Signature -->
            <div class="signature">
                <div class="name">Rafi Pramana Putra</div>
                <div class="title">Law Student & Community Leader</div>
                
                <div class="contact-info">
                    <div>📧 Email: <a href="mailto:rafipramanaputra05@gmail.com">rafipramanaputra05@gmail.com</a></div>
                    <div>📱 WhatsApp: <a href="https://wa.me/6282227632685">+62-822-2763-2685</a></div>
                    <div>🌐 Portfolio: <a href="{{ url('/') }}">{{ url('/') }}</a></div>
                </div>
                
                <div class="social-links">
                    <a href="https://www.linkedin.com/in/rafipramanaputra">LinkedIn</a>
                    <a href="https://wa.me/6282227632685">WhatsApp</a>
                </div>
            </div>
        </div>
        
        <div class="footer">
            <p>This email was sent in response to your message from my portfolio website.</p>
            <p>University of Brawijaya | Malang, Indonesia</p>
            <p style="margin-top: 10px; font-size: 12px;">
                &copy; {{ date('Y') }} Rafi Pramana Putra. All rights reserved.
            </p>
        </div>
    </div>
</body>
</html>
