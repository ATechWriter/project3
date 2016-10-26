<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Faker\Factory as Faker;

class UserController extends Controller
{
    public function generate(Request $request)
    {
        # Get the number of users requested
        $userCount = $request->input('userCount');

        # Turn the first names file into an array
        //include_once 'Constants.php';
        $firstFile = base_path('resources/first.txt');
        $firstList = fopen($firstFile, 'r');
        $firstListRead = fread($firstList, filesize($firstFile));
        $firstArray = explode(PHP_EOL, $firstListRead);

        # Turn the last names file into an array
        $lastFile = base_path('resources/last.txt');
        $lastList = fopen($lastFile, 'r');
        $lastListRead = fread($lastList, filesize($lastFile));
        $lastArray = explode(PHP_EOL, $lastListRead);

        # Generate the requested number of users
        $usersTable = '<table>';
        for ($i = $userCount; $i > 0; $i--) {

            # Pick an arbitrary first and last name
            $firstId = rand(0, 9);
            $first = $firstArray[$firstId];

            $lastId = rand(0, 9);
            $last = $lastArray[$lastId];

            $usersTable = $usersTable.'<tr><td>'.$first.'</td><td>'.$last.'</td>';

            # If birthdate option selected, add a birthdate
            $birthdateOption = $request->input('birthdate');
            if (!empty($birthdateOption)) {

                # Generate an arbitrary date and add to the table row
                $now = time();
                $birthtime = rand(1, $now);
                $birthdate = date('m/d/Y', $birthtime);

                $usersTable = $usersTable.'<td>'.$birthdate.'</td>';
            }

            # End the table row
            $usersTable = $usersTable.'</tr>';
        }
        echo $usersTable.'</table><br/>';
    }
}
