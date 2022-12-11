<?php namespace Umaha\Courses\Components;

use Cms\Classes\ComponentBase;
use Umaha\Courses\Models\Course;
use Umaha\Courses\Models\TestQuestion;
use Umaha\Courses\Models\UsersQuestionAnswer;
use Auth;

/**
 * QuizResult Component
 */
class QuizResult extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Quiz Result',
            'description' => 'Display Quiz Result'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun() {

        $this->page['alphabet'] = $this->getAlphabets();

        $slug = $this->param('slug');
        $course = Course::where('slug', $slug)->with('questions')->first();

        $user = Auth::getUser();
        $responses = UsersQuestionAnswer::where(['user_id' => $user->id])
        ->whereHas('question', function ($query) use($course) {
            return $query->where('course_id', '=', $course->id);
        })
        ->with('question')
        ->get();

        $responsesAndCorrectAnswers = [];
        $responses->map(function($response) use(&$responsesAndCorrectAnswers) {
          $correctAnswer = TestQuestion::getCorrectAnswer($response->question_id);
          return $responsesAndCorrectAnswers[$response->question_id] = [
            'question_id' => $response->question_id,
            'is_correct' => !is_null($correctAnswer) ? $correctAnswer['option'] : null,
            'chosen_option' => $response->chosen_option,
          ];
        });
        // dd($responsesAndCorrectAnswers);

        $this->page['course'] = $course;
        $this->page['responses'] = $responsesAndCorrectAnswers;
        $this->page['percentageScore'] = TestQuestion::getPercentageScore($user->id, $course->id);
        $this->page['nextCourse'] = Course::getNextCourse($course->id);

    }

    public function getAlphabets() {
      return [
          0 => 'A',
          1 => 'B',
          2 => 'C',
          3 => 'D',
          4 => 'E',
          5 => 'F',
          6 => 'G',
          7 => 'H',
          8 => 'I',
          9 => 'J',
          10 => 'K',
          11 => 'L',
          12 => 'M',
          13 => 'N',
          14 => 'O',
          15 => 'P',
          16 => 'Q',
          17 => 'R',
          18 => 'S',
          19 => 'T',
          20 => 'U',
          21 => 'V',
          22 => 'W',
          23 => 'X',
          24 => 'Y',
          25 => 'Z',
      ];
    }

}
