<?php

namespace App\Http\Controllers;

use Sentinel;
use Validator;
use Datatables;
use App\Models\Category;
use App\Models\Question;
use App\Models\SubCategory;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use PhpParser\Node\Expr\Cast\Object_;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class QuestionController extends Controller
{

    public function getIndex() {
        return view('admin.questions.index');
    }

    public function getCreate() {
        return view('admin.questions.create');
    }

    protected function validationRuleQusetion(array $data) {
        if(!isset($data['answer'])){
            $rules = array(
                'question'          => 'required|string',
                'answer_type'       => 'required|string',
            );
        } else {
            $rules = array(
                'question'          => 'required|string',
                'answer_type'       => 'required|string',
                'answer'            => 'required|array', 
                // 'answer.*'          => 'required|array|string|max:1',                
            );
            $answers = $data['answer'];
            foreach ($answers as $index => $value){
                $rules["answer[".$index."]"] = 'integer|max:3';
            }
        }
        return $rules;
    }

    public function postCreate(Request $request) {
        // dd($request->all());
        $rules = $this->validationRuleQusetion($request->all());
        
        
        // Create a new validator instance from our validation rules
        $validator = Validator::make($request->all(), $rules);
        
        // dd('inside Controller', $rules);
        // dd($validator->messages());
        // dd($validator);
        // If validation fails, we'll exit the operation now.
        if ($validator->fails()) {
            // Ooops.. something went wrong
            // dd($validator->messages());
            return back()->withInput()->withErrors($validator);
        }
        
        $data = Question::create([
            'title'             => $request->title,
            'question'          => $request->question,
            'answer_type'       => $request->answer_type,
            'answer'            => $request->answer ? json_encode($request->answer) : null ,
        ]);

        return redirect()->route('question')->with(['message' => 'Question Created Successfully.']);
    }

    public function attachDetach() {
        $categories = Category::where('status', 1)->get();
        return view('admin.questions.attachDetach', compact('categories'));
    }

    public function subCategories(Request $request){
        if($request->ajax()) {
            $sub_categories = SubCategory::where('category_id', '=', $request->catgory)->get();
            return response()->json($sub_categories);
        }
    }

    public function question(Request $request) {
        if($request->ajax()) {
            $Questions = Question::all();
            if($request->sub_category){
                $attachQue = DB::table('subcategory_questions')->where('asso_category', $request->sub_category)->get();
                return response()->json(['questions' => $Questions, 'attachQue' => $attachQue]);
            }
            return response()->json(['questions' => $Questions]);
        }
    }

    protected function ValidationRulesLink (array $data) {
        $rules = array(
            'subCategory'           => 'required|string',
            'question'              => 'required|array|min:1',
        );
        // $answers = $data['question'];
        // foreach ($answers as $index => $value){
        //     $rules["question[".$index."]"] = 'integer|max:3';
        // }
        return $rules;
    }

    public function syncQue(Request $request) {

        $rules = $this->ValidationRulesLink($request->all());
       
        // Create a new validator instance from our validation rules
        $validator = Validator::make($request->all(), $rules);

        // If validation fails, we'll exit the operation now.
        if ($validator->fails()) {
            // Ooops.. something went wrong
            return back()->withInput()->withErrors($validator);
        }
        // sync Questions
        if($request->question){
            $sub_categories = SubCategory::where('id', $request->subCategory)->first();
            $sub_categories->questions()->sync($request->question);
            return redirect()->back()->with(['success' => 'Questions attach successfully.']);
            // return redirect()->route('question')->with(['success' => 'Questions Attach successfully.']);
        }
        return redirect()->route('question')->with(['warning' => 'Please select question for attachment.']);
    }

    public function Preview($id) {
        $question = Question::find($id);
        $question->answer = json_decode($question->answer);
        return view('admin.questions.preview', compact('question'));
    }

    public function getEdit($id) {
        if(Sentinel::check() && Sentinel::getUser()->roles[0]->slug == 'admin'){
            $question = Question::where('id', $id)->first();
            return view('admin.questions.edit', compact('question'));
        } else {
            return abort(403);
        }

    }

    public function postEdit(Request $request, $id) {
        
        if(Sentinel::check() && Sentinel::getUser()->roles[0]->slug == 'admin'){
            try {
                $question = Question::where('id', $id)->first();
                $question->update([
                    'title'             => $request->title,
                    'question'          => $request->question,
                    'answer_type'       => $request->answer_type,
                    'answer'            => $request->answer ? json_encode($request->answer) : null ,
                ]);
                return view('admin.questions', compact('question'));
            }catch(ModelNotFoundException $execption){
                return;
            }

        } else {
            return abort(403);
        }

    }

    public function destroy($id) {
        //
    }

    public function data() {

        $que = Question::select(['id', 'question', 'created_at'])->get();

        return Datatables::of($que)
            ->editColumn('created_at','{{ $created_at->diffForHumans() }}')
            ->add_column('actions',
                '<a href="{{ route(\'preview/question\', $id) }}"><i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Info Question"></i></a>
                <a href="{{ route(\'update/question\', $id) }}"><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Edit Question"></i></a>
            ')
            ->make(true);
    }
}
