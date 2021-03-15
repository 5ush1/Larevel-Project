<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProductAddedMail extends Mailable
{
    use Queueable, SerializesModels;


    public $name; // null
    public $price;
    public $amount;
    public $categoryId;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $name, int $price, int $amount, int $categoryId)
    {
        $this->name = $name;
        $this->price = $price;
        $this->amount = $amount;
        $this->categoryId = $categoryId;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('tomislav.nikolic@quantox.com')
            ->view('productAddedSuccessfully', [
                'ime_proizvoda' => $this->name,
                'cena_proizvoda' => $this->price,
                'kolicina_proizvoda' => $this->amount,
                'kategorija_proizvoda' => $this->categoryId,
            ]);
    }
}
