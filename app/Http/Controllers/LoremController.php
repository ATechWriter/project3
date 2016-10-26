<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class LoremController extends Controller
{
    public function generate(Request $request)
    {

        # Set up some variables
        $paragraph = '<p>';
        $allParas = array();
        $lorem = '';

        # Get the number of paragraphs the user requested
        $paraCount = $request->input('paraCount');

        # Turn the word list into an array
        $wordFile = base_path('resources/frankenWords.txt');
        $wordArray = file($wordFile);

        # Create the requested number of paragraphs
        for ($p = $paraCount; $p > 0; $p--) {

            $sentence = '';

            # Determine the number of sentences in the paragraph
            $sentenceCount = rand(4, 20);

            for ($s = $sentenceCount; $s > 0; $s--) {

                $word = '';

                # Determine the number of words in the sentence
                $wordCount = rand(4, 9);

                for ($w = 1; $w <= $wordCount; $w++) {
                    # Pick an arbitrary word from the arrayed list
                    $wordId = rand(0, 6964);
                    $word = $wordArray[$wordId];

                    # Trim off trailing whitespace
                    $word = rtrim($word);

                    # If it's the first in the sentence, capitalize
                    if ($w == 1) {
                        $word = ucfirst($word);
                    }

                    # Join words onto sentence each time through
                    $sentence = $sentence.$word;

                    # Add spaces after words, periods after sentences
                    if ($w == $wordCount) {
                        $sentence = $sentence.'. ';
                    } else {
                        $sentence = $sentence.' ';
                    }
                }

                # Join sentences into paragraphs
                $paragraph = $paragraph.$sentence;
                    if ($s == 1) {
                        $paragraph = $paragraph.'</p>';
                    }
            }

        # Join paragraphs together
        array_push($allParas, $paragraph);
        $lorem = implode('', $allParas);

    }

        # Send it to a view
        return view('lorem')->with('lorem', $lorem);
    }
}
