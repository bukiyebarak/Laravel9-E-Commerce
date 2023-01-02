<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Review extends Component
{
    public $record, $subject, $review, $product_id, $rate, $IP;

    public function mount($id)
    {
        $this->record = Product::findOrFail($id);
        $this->product_id = $this->record->id;
    }

    public function render()
    {
        return view('livewire.review');
    }

    private function resetInput()
    {
        $this->subject = null;
        $this->review = null;
        $this->rate = null;
        $this->product_id = null;
        $this->IP = null;
    }

    public function store()
    {
        $this->validate([
            'subject' => 'required|min:5',
            'review' => 'required|min:10',
            'rate' => 'required',
        ]);

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip_address = $_SERVER['HTTP_CLIENT_IP'];
        } //whether ip is from proxy
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } //whether ip is from remote address
        else {
            $ip_address = $_SERVER['REMOTE_ADDR'];
        }
        $ip=request()->ip();
//        dd($ip_address, $ip);
        \App\Models\Review::create([
            'product_id' => $this->product_id,
            'user_id' => Auth::id(),
            'IP' => $ip,
            'rate' => $this->rate,
            'subject' => $this->subject,
            'review' => $this->review
        ]);

        session()->flash('message', 'Review Send Successfully');
        $this->resetInput();
    }

}
