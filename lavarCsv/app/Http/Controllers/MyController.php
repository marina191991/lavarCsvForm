<?php

namespace App\Http\Controllers;


use App\Models\User;


class   MyController extends Controller
{


    public function readFile(): array
    {
        $file = file_get_contents('../storage/app/data.csv');
        $sep = explode("\n", $file);
        array_shift($sep);
        return $sep;
    }


    public function show(\Illuminate\Http\Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $usersAr = $this->readFile();
        $usersObjArr = [];

        foreach ($usersAr as $user) {

            $expl = explode(",", $user);
            if (count($expl) != 7) {
                continue;
            }
            $usersObjArr[] = new User ($expl[0], $expl[1], $expl[2], $expl[3], $expl[4],
                $expl[5], $expl[6]);


        }


        $fName = $request->get('f_name');
        $lName = $request->get('l_name');
        $ageMin = $request->get('age_Min');
        $ageMax = $request->get('age_Max');
        $country = $request->get('country');

        $usersObjArr = collect($usersObjArr);
        if ($fName) {
            $fName = mb_strtolower($fName);
            $usersObjArr = $usersObjArr->filter(function ($user) use ($fName) {
                $userLow = mb_strtolower($user->getFirstName());

                return str_contains($userLow, $fName);
            });
        }

        if ($lName) {
            $lName = mb_strtolower($lName);
            $usersObjArr = $usersObjArr->filter(function ($user) use ($lName) {
                $userLow = mb_strtolower($user->getLastName());
                return str_contains($userLow, $lName);
            });
        }


        if (($ageMin) && ($ageMax)) {
            $usersObjArr = $usersObjArr->filter(function ($user) use ($ageMax, $ageMin) {
                $age = $user->getAge();
                if (($age >= $ageMin) && ($age <= $ageMax)) {
                    return $user;
                }
            });
        }

        if (($ageMin) && !($ageMax)) {
            $usersObjArr = $usersObjArr->filter(function ($user) use ($ageMin) {
                $age = $user->getAge();

                if (($age >= $ageMin)) {
                    return $user;
                }
            });
        }
        if (!($ageMin) && ($ageMax)) {
            
            $usersObjArr = $usersObjArr->filter(function ($user) use ($ageMax) {
                $age = $user->getAge();

                if (($age <= $ageMax)) {
                    return $user;
                }
            });
        }

        if ($country) {
            $usersObjArr = $usersObjArr->filter(function ($user) use ($country) {
                return str_contains($user->getCountry(), $country);
            });
        }

        return view('welcome', [
            'users' => $usersObjArr,
            'f_name' => $fName,
            'l_name' => $lName,
            'country' => $country,
            'age_Min' => $ageMin,
            'age_Max' => $ageMax
        ]);
    }

}
