<?php declare(strict_types=1);

require_once ('autoload.php');
Session::start();

if(!isset($_SESSION["InfosUser"]["ID"]))
{
    header("Location: findme.php");
}

if($_SESSION["InfosUser"]["CheckQCM4"]==false) {
    $num = $_SESSION["InfosUser"]["numQCM"];

    $title = "Bienvenue au QCM n°{$num}";
    $p = new WebPage($title);
    $stmt = MyPDO::getInstance()->prepare(<<<SQL
SELECT intitule
FROM QUESTION
SQL

    );
    $stmt->execute();
    $quest = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $questQCM = array_rand($quest,4);
    $quest1 = $quest[$questQCM[0]]["intitule"];
    $quest2 = $quest[$questQCM[1]]["intitule"];
    $quest3 = $quest[$questQCM[2]]["intitule"];
    $quest4 = $quest[$questQCM[3]]["intitule"];
    if(!isset($_SESSION["InfosUser"]["QCM1Q1"])) {
        $_SESSION["InfosUser"]["QCM4Q1"] = $quest1;
        $_SESSION["InfosUser"]["QCM4Q2"] = $quest2;
        $_SESSION["InfosUser"]["QCM4Q3"] = $quest3;
        $_SESSION["InfosUser"]["QCM4Q4"] = $quest4;
    }
    $p->appendContent(<<<HTML
 
 <div id="page-wrap">
 
 <h1>Simple Quiz Built On PHP</h1>
 
 <form action="resultQCM4.php" method="post" id="quiz">
 
            <ol>
            
                <li>
                
                    <h3>{$_SESSION["InfosUser"]["QCM4Q1"]}</h3>
                    
                    <div>
                        <input type="radio" name="question-1-answers" id="question-1-answers-A" value="A" />
                        <label for="question-1-answers-A">A) Software </label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-1-answers" id="question-1-answers-B" value="B" />
                        <label for="question-1-answers-B">B) Web App</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-1-answers" id="question-1-answers-C" value="C" />
                        <label for="question-1-answers-C">C) CMS</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-1-answers" id="question-1-answers-D" value="D" />
                        <label for="question-1-answers-D">D) Other</label>
                    </div>
                
                </li>
                
                <li>
                
                    <h3>{$_SESSION["InfosUser"]["QCM4Q2"]}</h3>
                    
                    <div>
                        <input type="radio" name="question-2-answers" id="question-2-answers-A" value="A" />
                        <label for="question-2-answers-A">A) Video Editing</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-2-answers" id="question-2-answers-B" value="B" />
                        <label for="question-2-answers-B">B) Graphic Designing</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-2-answers" id="question-2-answers-C" value="C" />
                        <label for="question-2-answers-C">C) Web Designing</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-2-answers" id="question-2-answers-D" value="D" />
                        <label for="question-2-answers-D">D) Digital Marketing</label>
                    </div>
                
                </li>
                
                <li>
                
                    <h3>{$_SESSION["InfosUser"]["QCM4Q3"]}</h3>
                    
                    <div>
                        <input type="radio" name="question-3-answers" id="question-3-answers-A" value="A" />
                        <label for="question-3-answers-A">A) Server Side Script</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-3-answers" id="question-3-answers-B" value="B" />
                        <label for="question-3-answers-B">B) Programming Language</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-3-answers" id="question-3-answers-C" value="C" />
                        <label for="question-3-answers-C">C) Markup Language</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-3-answers" id="question-3-answers-D" value="D" />
                        <label for="question-3-answers-D">D) None Of Above These</label>
                    </div>
                
                </li>
                
                <li>
                
                    <h3>{$_SESSION["InfosUser"]["QCM4Q4"]}</h3>
                    
                    <div>
                        <input type="radio" name="question-4-answers" id="question-4-answers-A" value="A" />
                        <label for="question-4-answers-A">A) 192.168.0.1</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-4-answers" id="question-4-answers-B" value="B" />
                        <label for="question-4-answers-B">B) 127.0.0.0</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-4-answers" id="question-4-answers-C" value="C" />
                        <label for="question-4-answers-C">C) 1080:80</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-4-answers" id="question-4-answers-D" value="D" />
                        <label for="question-4-answers-D">D) Any Other</label>
                    </div>
                
                </li>
            
            </ol>
            
            <input type="submit" value="Submit" class="submitbtn" />
 
 </form>
 
 </div>
 

HTML
    );
    echo $p->toHTML();
}
else
{

    header("Location: redirect.php");
    //die();

}
