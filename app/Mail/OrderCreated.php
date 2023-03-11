<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

//Ši klasė paveldi Mailable klasę iš Laravel Illuminate\Mail bibliotekos, todėl yra naudojama sukurti el. laiškus.
//Klasėje yra apibrėžti trys savybės - $name, $order ir $fullSum.$name yra vartotojo vardas, kuris bus naudojamas
// pranešime, kad parodytų, kam laiškas skirtas.$order yra Order objektas, kurio informacija bus rodoma laiške.
//$fullSum yra kintamasis, kuriame saugoma bendra užsakymo kaina.Klasė turi konstruktorių su dviem parametrais $name
// ir $order. Konstruktorius nustato šias savybes pagal perduodamus parametrus.Klasė taip pat turi build() metodą,
// kuris yra naudojamas sukurti el. laišką. Metodas grąžina šabloną mail.order_created ir perduoda jam tris
// kintamuosius: $name, $fullSum ir $order. Šis šablonas vėliau bus panaudotas, kad suformuoti el. laišką ir išsiųsti jį vartotojui.
class OrderCreated extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $order;

    /**
     * OrderCreated constructor.
     * @param $name
     * @param $order
     */
    public function __construct($name, Order $order)
    {
        $this->name = $name;
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $fullSum = $this->order->calculateFullSum();
        return $this->view('mail.order_created', [
            'name' => $this->name,
            'fullSum' => $fullSum,
            'order' => $this->order
        ]);
    }
}
