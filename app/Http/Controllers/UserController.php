<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Faker\Factory as Faker;

class UserController extends Controller
{
    public function generate(Request $request)
    {
        # Validate user input
        $this->validate($request, [
            'userCount' => 'required|integer|between:1,200',
        ]);

        # Set up fzaninotto's Faker package
        $faker = Faker::create();

        # Get the info the user submitted
        $userCount = $request->input('userCount');
        $birthdateOption = $request->input('birthdate');

        # Set up the table header row
        $usersTable = '<table><tr><th>First</th><th>Last</th>';
        if (!empty($birthdateOption)) {
            $usersTable = $usersTable.'<th>Birthdate</th></tr>';
        } else {
            $usersTable = $usersTable.'</tr>';
        }

        # Generate the requested number of users

        for ($i = $userCount; $i > 0; $i--) {

            # User Faker to generate first and last name
            $first = $faker->firstName;
            $last = $faker->lastName;
            $usersTable = $usersTable.'<tr><td>'.$first.'</td><td>'.$last.'</td>';

            # If birthdate option selected, add a birthdate
            if (!empty($birthdateOption)) {

                # Generate an arbitrary date no later than today and add to the table row
                $now = time();
                $birthtime = rand(1, $now);
                $birthdate = date('m/d/Y', $birthtime);

                $usersTable = $usersTable.'<td>'.$birthdate.'</td>';
            }

            # End the table row
            $usersTable = $usersTable.'</tr>';
        }

        # End the table
        $usersTable = $usersTable.'</table><br/>';

        # Send to a view
        return view('users')->with('usersTable', $usersTable);
    }
}
