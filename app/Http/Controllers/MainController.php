<?php

namespace App\Http\Controllers;

use App\Category;
use App\Mail\ContactMessage;
use App\Shop;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Mail;

class MainController extends Controller
{
    public function index()
    {

        $mainCats = Category::all();
        $topShops = Shop::active()->where('popular', 1)->paginate(30);


        if (request()->query('page') > $topShops->lastPage()) {
            abort(404);
        }


        return view('home', compact('topShops', 'mainCats'));
    }


    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function sendContactMessage(Request $request)
    {

        $message = $request->all();

        Mail::to(config('mail.from.address'))->send(new ContactMessage($message));


        return redirect()->route('page.contact')->with('sendMessageStatus', 'Сообщение успешно отправлено!');

    }
}
