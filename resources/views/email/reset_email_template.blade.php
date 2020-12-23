<div style="margin-left: auto;margin-right: auto">
<p>Hi {{ @$data['name'] }},</P>
<p>You are receiving this email because we received a password reset request for your account.</P>
<a href="{{ @$data['link'] }}" style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';box-sizing:border-box;border-radius:3px;color:#fff;display:inline-block;text-decoration:none;background-color:#3490dc;border-top:10px solid #3490dc;border-right:18px solid #3490dc;border-bottom:10px solid #3490dc;border-left:18px solid #3490dc" target="_blank" >Reset Password</a>
<p>This password reset link will expire in 60 minutes.</p>
<p>If you did not request a password reset, no further action is required.</p>
<p>Regards,</p>
<p>Coffee</p>
<hr>
<p>If you’re having trouble clicking the "Reset Password" button, copy and paste the URL below into your web browser:{{  @$data['link']  }}</p>
</div>