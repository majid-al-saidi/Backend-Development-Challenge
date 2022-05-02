<?php

namespace App\Http\Livewire;

use App\Models\Resume;
use Livewire\Component;

class SearchResume extends Component
{
    public $wordone;
    public $wordtwo;
    public $wordthree;
    public $wordfour;
    public $wordfive;

    public $resume;

    public $count = 5;

    //results:
    public $matchesone, $matchestwo, $matchesthree, $matchesfour, $matchesfive;
    //errors:
    public $errorone, $errortwo, $errorthree, $errorfour, $errorfive;

    public function render()
    {
        return view('livewire.search-resume');
    }

    public function updated()
    {
        if ($this->wordone != null) {
            if ($this->wordsNumber($this->wordone) > 1) {
                $this->errorone = "Only One Word";
            } else {
                $this->errorone = "";
                $this->matchesone = $this->findMatches($this->wordone);
            }
        }
        if ($this->wordtwo != null) {
            if ($this->wordsNumber($this->wordtwo) > 1) {
                $this->errortwo = "Only One Word";
            } else {
                $this->errortwo = "";
                $this->matchestwo = $this->findMatches($this->wordtwo);
            }
        }
        if ($this->wordthree != null) {
            if ($this->wordsNumber($this->wordthree) > 1) {
                $this->errorthree = "Only One Word";
            } else {
                $this->errorthree = "";
                $this->matchesthree = $this->findMatches($this->wordthree);
            }
        }
        if ($this->wordfour != null) {
            if ($this->wordsNumber($this->wordfour) > 1) {
                $this->errorfour = "Only One Word";
            } else {
                $this->errorone = "";
                $this->matchesfour = $this->findMatches($this->wordfour);
            }
        }
        if ($this->wordfive != null) {
            if ($this->wordsNumber($this->wordfive) > 1) {
                $this->errorfive = "Only One Word";
            } else {
                $this->errorone = "";
                $this->matchesfive = $this->findMatches($this->wordfive);
            }
        }
    }

    public function mount($resume)
    {
        $this->resume = $resume;
    }


    // public function updatedwordone($value)
    // {
    // }
    // public function updatedwordtwo($value)
    // {
    // }
    // public function updatedwordthree($value)
    // {
    // }
    // public function updatedwordfour($value)
    // {
    // }

    public function findMatches($word)
    {
        $word = strtolower($word);
        $content = strtolower($this->resume->content);
        if (strpos($content, $word) !== false) {
            $content = str_replace('•', '.', $content);
            $content = trim(preg_replace('/\n/', '.', $content));
            $resumeSentences = preg_split('/\.|\?|!/', $content);

            return array_filter($resumeSentences, function ($var) use ($word) {
                return preg_match("/\b$word\b/i", $var);
            });
        }
    }

    public function wordsNumber($input)
    {
        $string  = preg_replace("/\\s+/", " ", $input);

        //trim off beginning and end spaces;
        $string = trim($string);

        //get an array of the words
        $wordArray = explode(" ", $string);

        //get the word count
        return sizeof($wordArray);
    }
}
