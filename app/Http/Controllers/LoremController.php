<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class LoremController extends Controller
{
    public function makeSentence()
    {
        $word = '';
        $sentence = '';
        $wordFile = base_path('resources/frankenWords.txt');

        # Turn the word list file into an array
        $wordArray = file($wordFile);

        # Determine the number of words in the sentence
        $wordCount = rand(2, 9);

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

        # Output the resulting sentence
        return $sentence;
    }

    public function makeParagraph()
    {
        $paragraph = '<p>';

        # Determine the number of sentences in the paragraph
        $sentenceCount = rand(2, 20);

        # Concatenate that many sentences into a paragraph
        for ($s = $sentenceCount; $s > 0; $s--) {

            $paragraph = $paragraph.$this->makeSentence();

            if ($s == 1) {
                $paragraph = $paragraph.'</p>';
            }

        }

        # Output the resulting paragraph
        return $paragraph;

    }

    public function generate(Request $request)
    {
        # Validate user input
        $this->validate($request, [
            'paraCount' => 'required|integer|between:1,20',
        ]);

        $allParas = array();
        $lorem = '';

        # Get the number of paragraphs the user requested
        $paraCount = $request->input('paraCount');

        # Create the requested number of paragraphs
        for ($p = $paraCount; $p > 0; $p--) {

            $paragraph = $this->makeParagraph();

            # Join paragraphs together
            array_push($allParas, $paragraph);
        }

        # Turn the array of many paragraphs into a string
        $lorem = implode('', $allParas);

        # Send resulting paragraphs collection to a view
        return view('lorem')->with('lorem', $lorem);
    }
}
