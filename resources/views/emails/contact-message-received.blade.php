<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>New Contact Message</title>
</head>

<body style="margin:0; padding:0; background:#09090b; font-family:Arial,Helvetica,sans-serif; color:#ffffff;">

    <div style="max-width:680px; margin:0 auto; padding:40px 20px;">

        <div style="border:1px solid #27272a; background:#111113; border-radius:16px; overflow:hidden;">

            {{-- Header --}}
            <div style="padding:28px 30px; border-bottom:1px solid #27272a;">

                <p style="margin:0 0 8px; color:#f5b642; font-size:11px; font-weight:bold; letter-spacing:2px; text-transform:uppercase;">
                    {{ config('portfolio.company')}} Portfolio
                </p>

                <h1 style="margin:0; font-size:26px; line-height:1.3;">
                    New contact message
                </h1>

            </div>


            {{-- Message information --}}
            <div style="padding:30px;">

                <div style="margin-bottom:24px;">

                    <p style="margin:0 0 7px; color:#71717a; font-size:11px; text-transform:uppercase; letter-spacing:1px;">
                        From
                    </p>

                    <p style="margin:0; font-size:16px;">
                        {{ $contactMessage->name }}
                    </p>

                    <p style="margin:5px 0 0; color:#a1a1aa; font-size:14px;">
                        {{ $contactMessage->email }}
                    </p>

                </div>


                <div style="margin-bottom:24px;">

                    <p style="margin:0 0 7px; color:#71717a; font-size:11px; text-transform:uppercase; letter-spacing:1px;">
                        Subject
                    </p>

                    <p style="margin:0; font-size:16px;">
                        {{ $contactMessage->subject }}
                    </p>

                </div>


                <div>

                    <p style="margin:0 0 7px; color:#71717a; font-size:11px; text-transform:uppercase; letter-spacing:1px;">
                        Message
                    </p>

                    <div style="padding:18px; border:1px solid #27272a; border-radius:10px; background:#09090b; color:#d4d4d8; font-size:15px; line-height:1.7;">
                        {!! nl2br(e($contactMessage->message)) !!}
                    </div>

                </div>

            </div>


            {{-- Footer --}}
            <div style="padding:20px 30px; border-top:1px solid #27272a;">

                <p style="margin:0; color:#52525b; font-size:11px; line-height:1.6;">
                    This message was submitted through the {{ config('portfolio.company')}} portfolio contact form.
                </p>

            </div>

        </div>

    </div>

</body>
</html>