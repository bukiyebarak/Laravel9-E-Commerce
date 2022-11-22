<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CreditCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'card_name',
        'card_no',
        'expire_month',
        'expire_year',
        'cvc',
    ];

    /**
     * @return mixed
     */
    public function getCardName()
    {
        return $this->card_name;
    }


    public function setCardName($card_name)
    {
        $this->card_name = $card_name;
    }


    public function getCardNo()
    {
        return $this->card_no;
    }


    public function setCardNo($card_no)
    {
        $this->card_no = $card_no;
    }


    public function getExpireMonth()
    {
        return $this->expire_month;
    }


    public function setExpireMonth($expire_month)
    {
        $this->expire_month = $expire_month;
    }


    public function getExpireYear()
    {
        return $this->expire_year;
    }

    public function setExpireYear($expire_year)
    {
        $this->expire_year = $expire_year;
    }


    public function getCvc()
    {
        return $this->cvc;
    }


    public function setCvc($cvc)
    {
        $this->cvc = $cvc;
    }


}
