<?php

namespace App\Http\Controllers;

use App\Models\Horoscope;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $date = $request->date;

        $time=strtotime($date);

        $date2 = date("d F",$time);

        $babyBirthDate = new \DateTime($date2);

        // array segni zodiacali
        $zodiacs = array(
            'aries' => array(
                new \DateTime('21 March'),
                new \DateTime('20 April'),
            ),
            'taurus' => array(
                new \DateTime('21 April'),
                new \DateTime('20 May'),
            ),
            'gemini' => array(
                new \DateTime('21 May'),
                new \DateTime('20 June'),
            ),
            'cancer' => array(
                new \DateTime('21 June'),
                new \DateTime('22 July'),
            ),
            'leo' => array(
                new \DateTime('23 July'),
                new \DateTime('23 August'),
            ),
            'virgo' => array(
                new \DateTime('24 August'),
                new \DateTime('22 September'),
            ),
            'libra' => array(
                new \DateTime('23 September'),
                new \DateTime('22 October'),
            ),
            'scorpio' => array(
                new \DateTime('23 October'),
                new \DateTime('21 November'),
            ),
            'sagittarius' => array(
                new \DateTime('22 November'),
                new \DateTime('21 December'),
            ),
            'aquarius' => array(
                new \DateTime('20 January'),
                new \DateTime('19 February'),
            ),
            'pisces' => array(
                new \DateTime('20 February'),
                new \DateTime('20 March'),
            ),
            'capricorn' => array(
                new \DateTime('22 December'),
                new \DateTime('31 December'),
            ),
        );

        // controllo il segno zodiacale
        foreach ($zodiacs as $zodiac => $dateTimeRange) {
            if ($babyBirthDate >= $dateTimeRange[0] && $babyBirthDate <= $dateTimeRange[1]) {
                break;
            }
        }

        // assegno il segno zodiacale
        $sign = $zodiac;

        // prendo solo gli oroscopi con segno zodiacale corretto, in ordine e li inpagino per 10
        $horoscopes = Horoscope::where('sign', $sign)->orderBy('date', 'ASC')->paginate(10);

        return view('admin.home', compact('horoscopes', 'sign', 'date'));
    }
}
