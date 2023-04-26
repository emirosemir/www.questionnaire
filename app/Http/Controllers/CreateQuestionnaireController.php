<?php
    namespace App\Http\Controllers;

    use App\Models\Questionnaires;
    use Illuminate\Http\Request;

    class CreateQuestionnaireController extends Controller {
        public function create(Request $request) {
            $POST = $request->all();
            
            $queryResult = Questionnaires::create([
                "name" => $POST["name"], 
                "multipleVotes" => $POST["multipleVotes"], 
                "options" => $POST["answers"], 
                "timestamp" => time(), 
                "senderIP" => $_SERVER["REMOTE_ADDR"]
            ]);

            if ($queryResult) {
                $message = "Anket başarıyla kaydedildi.";

                return redirect("/home")->with("formSuccess", $message);
            } else {
                $message = "Anket kaydetme başarısız.";

                return redirect("/home")->with("formUnsuccess", $message);
            }
        }
    }
