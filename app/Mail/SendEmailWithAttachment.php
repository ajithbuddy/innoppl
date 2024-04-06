<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

class SendEmailWithAttachment extends Mailable
{
    use Queueable, SerializesModels;

    public $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function build()
    {
        $subject = 'New Product Added';
        $from = 'ajithbuddy22@gmail.com';
        $name = 'ajithbuddy22@gmail.com';
        $filePaths = $this->request->file('images');

        foreach ($filePaths as $filePath) {
            $this->attach($filePath->getRealPath(), [
                'as' => $filePath->getClientOriginalName(),
                'mime' => $filePath->getClientMimeType(),
            ]);
        }

        return $this->view('emails.product_template')
                    ->subject($subject)
                    ->from($from, $name);
    }
}
