<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;
use App\Http\Requests\ShortRequest;

class ShortUrlController extends Controller
{
    public function short(ShortRequest $request)
    {
        if($request->original_url)
        {
            if(auth()->user())
            {
                $new_url = auth()->user()->links()->create([
                    'original_url' => $request->original_url
                ]);
            }
            else
            {
                $new_url = ShortUrl::create([
                    'original_url' => $request->original_url
                ]);
            }

            if($new_url)
            {
                $short_url = base_convert($new_url->id, 10,36);
                $short_url = str_pad($short_url, 6, 'Milon', STR_PAD_LEFT);
                $new_url->update([
                    'short_url' => $short_url
                ]);

                return redirect()->back()->with('success_message','Your Short url: <a class="btn btn-sucess m-2" style="background-color: darksalmon;" target="_blank" href="'.  url($short_url) .'">'.  url($short_url) .'</a>');
            }
        }
        return back();
    }

    public function show($code)
    {
        $short_url = ShortUrl::where('short_url', $code)->first();

        if($short_url)
        {
            return redirect()->to(url($short_url->original_url));
        }
        return redirect()->to(url('/'));
    }
}
