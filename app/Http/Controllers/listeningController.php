<?php

    namespace App\Http\Controllers;


    use App\listening_grade;
    use App\listening_question;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\DB;
    use App\user_listening_answer;
    use App\listening_answer;


    class listeningController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function __construct()
        {
            $this->middleware('auth');
        }

        public function index()
        {
            $allquestion = DB::table('listening_questions')->get(['id', 'urls']);

            return view('listening', compact('allquestion'));;


        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            //
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {

            $request->validate([
                'ans.*' => 'nullable',
            ]);

            $user_ans = new user_listening_answer();
            $ac_ans = new listening_question();
            $size = count(collect($request)->get('ans'));

            for ($x = 0; $x < $size; $x++) {
                $user_ans[$x + 1] = $request->ans[$x];
            }
            $user_ans->user_id = Auth::id();
            $user_ans->listening_questions_id = $request->listening_question_id;
            $user_ans->save();
            $qid = $user_ans->listening_questions_id;
            $origina_ans = $ac_ans->find($qid)->listening_answer;
            $count = 0;
            for ($x = 1; $x < $size; $x++) {
                if (strtolower($user_ans[$x] )== strtolower($origina_ans[$x])) {
                    $count = $count + 1;
                }
            }
            $grade = new listening_grade();
            $final_grade = $grade->find($count)->grade ?? 0;

            return view('result',compact('user_ans'),compact('origina_ans'))
                ->with('final_grade', $final_grade)
                ->with('count', $count);
        }


        /**
         * Display the specified resource.
         *
         * @param int $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {

            $questions = listening_question::find($id);
            return view('listening_ans')->with('questions', $questions);

        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param int $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            //
        }

        /**
         * Update the specified resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @param int $id
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, $id)
        {
            //
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param int $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            //
        }

        public function result()
        {

        }
    }
