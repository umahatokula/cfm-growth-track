<?php namespace Umaha\Courses\Components;

use Cms\Classes\ComponentBase;
use Umaha\Courses\Models\Course;
use Umaha\Courses\Models\TestQuestion;
use Umaha\Courses\Models\UsersQuestionAnswer;
use Auth;
use Event;

/**
 * TestQuestions Component
 */
class TestQuestions extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'TestQuestions Component',
            'description' => 'No description provided yet...'
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
            'is_correct' => !is_null($correctAnswer) ?  $correctAnswer['option'] : null,
            'chosen_option' => $response->chosen_option,
          ];
        });

        $this->page['course'] = $course;
        $this->page['responses'] = $responsesAndCorrectAnswers;

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

    public function onSelectOption() {

      $correctAnswer = TestQuestion::getCorrectAnswer(post('questionId'));
      $question = TestQuestion::find(post('questionId'));
      $correctly_answered = null;
      if(!is_null($correctAnswer)) {
        $correctly_answered = strcmp(strtolower($correctAnswer['option']), strtolower(post('option'))) ? 0 : 1;
      }

      $answer = UsersQuestionAnswer::updateOrCreate(
          [
            'user_id' =>  Auth::getUser()->id,
            'question_id' => post('questionId')
          ],
          [
            'chosen_option' => post('option'),
            'course_id' => $question->course?->id,
            'correct_answer' => !is_null($correctAnswer) ? $correctAnswer['option'] : null,
            'correctly_answered' => $correctly_answered,
          ]
      );

      return [
          '#question-'.post('questionId') => $this->renderPartial('@_question', [
            'question' => $question,
            'chosen_option' => post('option'),
            'alphabet' => $this->getAlphabets()
          ])
      ];

    }

    public function onSubmit() {
        $user = Auth::getUser();
        $course = Course::where('slug', $this->param('slug'))->first();

        $percentageScore = TestQuestion::getPercentageScore($user->id, $course->id);

        if(($percentageScore * 100) >= $course->pass_mark) {
            Event::fire('umaha.courses.coursePassed', [$course->id, $user]);
        }


        return redirect('/quiz-result/'.$this->param('slug'));
    }

}
