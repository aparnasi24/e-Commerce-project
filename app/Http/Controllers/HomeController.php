<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client; // Make sure this line is included
use Illuminate\Support\Facades\Auth;
use App\Models\Problem; // Ensure you import the Problem model
use Illuminate\Http\Request;


class HomeController extends Controller
{
    private function getViewData()
    {
        // Retrieve the authenticated user
        $user = Auth::user();
        $username = $user ? $user->name : null;
        $profilepicture = $user ? $user->profile_picture : null;
        $status = $user ? $user->status : null;

//        dd($profilepicture);
        $firstLetter = $username ? substr($username, 0, 1) : null;


        return compact('user', 'username', 'firstLetter', 'profilepicture','status');
    }
    public function dashboard()
    {
        $data = $this->getViewData();
        return view("dashboard",$data);
    }

    public function index()
    {
        $data = $this->getViewData();
        return view("welcome",$data);
    }
    public function compiler()
    {

        return view("home.compiler");
    }
    public function compile(Request $request)
    {

        $request->validate([
            'code' => 'required|string',
            'language' => 'required|string',
        ]);
    
        $client = new Client();
        $response = $client->post('https://api.jdoodle.com/v1/execute', [
            'json' => [
                'script' => $request->code,
                'language' => $request->language,
                'versionIndex' => '0',
                'clientId' => env('JDOODLE_CLIENT_ID'),
                'clientSecret' => env('JDOODLE_CLIENT_SECRET'),
            ]
        ]);
    
        $output = json_decode($response->getBody()->getContents());
    
        return response()->json([
            'output' => $output->output ?? $output->error
        ]);
    }

    public function problem() {
        $data = $this->getViewData(); // Retrieve existing view data
        $problems = Problem::all(); // Retrieve all problems from the database
    
        // Add problems to the data array
        $data['problems'] = $problems;
    
        // Return the view with the combined data
        return view("home.problem", $data);
    }
    public function solve(Request $request)
    {
        $data = $this->getViewData(); // Retrieve existing view data
    
        // Validate the incoming request
        $request->validate([
            'problem_id' => 'required|integer|exists:problems,id',
        ]);
    
        // Retrieve the problem ID
        $problemId = $request->input('problem_id');
    
        // Retrieve the problem
        $problem = Problem::find($problemId);
        
        // Assuming the solution is stored in the 'solution' attribute of the Problem model
        $problem_solution = json_decode($problem->solution); // Decode if it's in JSON format
    
        // Add the problem and its solution to the data array
        $data['problem'] = $problem;
        $data['problem_solution'] = $problem_solution;
    
        // Return the view with the data
        return view('home.solve', $data);
    }

    public function trackrecord(Request $request)
    {
        $data = $this->getViewData(); // Retrieve existing view data

        // Validate the incoming request data
        $validatedData = $request->validate([
            'problem_solution' => 'required', // Adjust validation as necessary
            // Add any other fields you expect
        ]);

        // Retrieve the problem_solution from the validated data
        $problemSolution = $validatedData['problem_solution'];

        // Now you can use $problemSolution as needed
        // For example, save it to the database, log it, etc.
         // Increment the logged-in user's track column
        $user = auth()->user(); // Get the authenticated user
        if ($user) {
            // Assuming 'track' is the column you want to increment
            $user->increment('track');
        }



        
        // Redirect to the intended URL or a specific route
        return redirect()->intended('track');
    }

    public function track()
    {

        $user = auth()->user(); // Get the authenticated user
        $track = $user->track;

        
        
        // Redirect to the intended URL or a specific route
        return view("home.track",compact("track"));
    }



    

   
}
