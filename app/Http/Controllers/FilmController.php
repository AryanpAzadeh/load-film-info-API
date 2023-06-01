<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function search(Request $request)
    {
        $f = $request->title;
        $film = str_replace(' ', '%20', $f);

        $api_result = file_get_contents('http://moviesapi.ir/api/v1/movies?q=' . $film);
        $data = json_decode($api_result, true);
        $d_id = $data['data'][0]['id'];
//        dd($d_id);
        $api_result2 = file_get_contents('http://moviesapi.ir/api/v1/movies/' . $d_id);
        $data2 = json_decode($api_result2, true);
//        dd($data2['poster']);

        $result = '';
        if ($request->ajax())
        {
            $result .= '
        <div class="card  mb-5" id="ff" style="width: 18rem;">
  <img src="'.$data2['poster'].'" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">'.$data2['title'].'</h5>
    <p class="card-text">director : '.$data2['director'].'</p>

  </div>
</div>


        ';
            return $result;

        }



    }
}
