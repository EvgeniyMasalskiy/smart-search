<?php
namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
class Subscribe extends Mailable
{
    use Queueable, SerializesModels;
    public $email;
    public $text;
    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $text, $data)
    {
        $this->email = $email;
        $this->text = $text;
        $this->data = $data;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Новые результаты по запросу "'.$this->text.'"')
        ->markdown('emails.subscribers');
    }
}