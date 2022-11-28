<?php

namespace App\Helpers;

class MultipleMailAndUser
{
    public function regionSendMail(): void
    {
        #region Send Mail

//        sending user
        // $datalist=Shopcart::with('product')->where('user_id',Auth::id())->get();
//        $user = Order::orderByDesc('id')->first();
//        $user->notify(new OrderMail($data));

//        sending to email
        // Notification::route('mail',['someexample@example.com'])->notify(new OrderMail($data));


        //sending to multiple emails
//        $receipients = [
//            'someone@example.com' => 'John  Doe',
//            'luck@example.com' => 'Lucky'
//        ];
//        Notification::route('mail', $receipients)->notify(new OrderMail($data));


        //sending to multiple users
//        $users=User::all();
//        Notification::route('mail', $users)->notify(new OrderMail($data));

        //User tablosundaki kullanıcıları 10'ar gruplar ve mail atar.
//        User::chunk(10,function ($users) use($data){
//            $receipients=$users->pluck('name','email');
//
//           Notification::route('mail', $receipients)->notify(new OrderMail($data));
//        });
#endregion
    }

}
