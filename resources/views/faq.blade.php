<title>{{ config('app.name', 'Laravel') . ' | ' . 'faq' }}</title>
@extends('layouts.app')
<!--navbar-->
@include('inc.navbar')

@section('content')


<div class="container ">
    <div class="panel-group" id="faqAccordion">

        <div class="panel panel-default ">
            <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question0">
                 <h4 class="panel-title">
                    <a style="color:#181818;"href="javascript:void(0);" class="ing"><span style="color:#F04646;">|</span> What is r8myprof?</a>
              </h4>

            </div>
            <div id="question0" class="panel-collapse collapse" style="height: 0px;">
                <div class="panel-body">

                    <p>
                    	r8myprof is a platform for students to rate their professors and courses to provide honest anonymous feedback and keep a public record of their experience to help improve universities and educators performance.
                    </p>
                </div>
            </div>
        </div>
        <br>

        <div class="panel panel-default ">
            <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question1">
                 <h4 class="panel-title">
                    <a style="color:#181818;"href="javascript:void(0);" class="ing"><span style="color:#F04646;">|</span> Will my professors know who I am?</a>
              </h4>

            </div>
            <div id="question1" class="panel-collapse collapse" style="height: 0px;">
                <div class="panel-body">

                    <p>
                    	No, they won't! Rest assured that all information you submit to us is not to be shared with any third party. This platform is created by independant students like you who will maintain your anonimity.
                    </p>
                </div>
            </div>
        </div>
        
        <br>
        <div class="panel panel-default ">
            <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question2">
                 <h4 class="panel-title">
                    <a id="faqHelp"style="color:#181818;"href="javascript:void(0);" class="ing"><span style="color:#F04646;">|</span> How can I help?</a>
              </h4>

            </div>
            <div id="question2" class="panel-collapse collapse" style="height: 0px;">
                <div class="panel-body">

                    <p>
                    	We hope to have you involved in the development process of this platform!
                    	Whether you are a developer, designer, a student, or someone who is passionate about fixing the educational process in our universities, we have a place for you!
                    	<ul>
                    		<li>If you are a <span style="color:#F04646;">developer</span>, you can go to our <a href="https://github.com/t-gitt/r8myprof">github repo</a> and contribute by submitting bugs, exploits, enhancments, or suggestions to further improve this platform!</li>
                    		<br>
                    		<li>If you have extra time on your hand, we can use an extra <span style="color:#F04646">moderator!</span> With ratings coming in, we need to make sure they are respectful, objective, and do not violate internet etiquites. Send us an email at <a href="mailto:r8myprof@gmail.com">r8myprof@gmail.com</a> to volunteer for moderating content here! </li>
                    		<br>
                    		<li>There is more to resources than time. If you don't have the time but still want to contribute, you can <span style="color:#F04646">donate </span>to the developer <a href="https://www.paypal.me/Taheralkamel">here </a>to make sure this platform stays up and running!</li>
                    	</ul>
                    </p>
                </div>
            </div>
        </div>


<br>
        <div class="panel panel-default ">
            <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question3">
                 <h4 class="panel-title">
                    <a style="color:#181818;"href="javascript:void(0);" class="ing"><span style="color:#F04646;">|</span> I am a professor, how can I better represent my profile?</a>
              </h4>

            </div>
            <div id="question3" class="panel-collapse collapse" style="height: 0px;">
                <div class="panel-body">

                    <p>
                    	This is great! We love our professors and we would be happy to assist you! Please contact us at <a href="mailto:r8myprof@gmail.com">r8myprof@gmail.com</a> with your concerns and we will make sure we assist you accordingly!
                    </p>
                </div>
            </div>
        </div>

<br>
        <div class="panel panel-default ">
            <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question4">
                 <h4 class="panel-title">
                    <a style="color:#181818;"href="javascript:void(0);" class="ing"><span style="color:#F04646;">|</span> Why do I need an @edu email to sign up?</a>
              </h4>

            </div>
            <div id="question4" class="panel-collapse collapse" style="height: 0px;">
                <div class="panel-body">

                    <p>
                    	Unfortunately, due to our need to moderate the content on this platform, we felt it's the only solution to better manage our user base to make sure all ratings are from real students and people related to educational institutions. If you want to add your university and professors, but don't have an @edu email, please contact us at <a href="mailto:r8myprof@gmail.com">r8myprof@gmail.com</a> and we will see how we can help you!
                    </p>
                </div>
            </div>
        </div>

<br>
        <div class="panel panel-default ">
            <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question5">
                 <h4 class="panel-title">
                    <a id="overallscore"style="color:#181818;"href="javascript:void(0);" class="ing"><span style="color:#F04646;">|</span> How do we calculate the overall score for professors?</a>
              </h4>

            </div>
            <div id="question5" class="panel-collapse collapse" style="height: 0px;">
                <div class="panel-body">

                    <p>
                    	To calculate the overall score we only take into consideration the professor's ratings (character, teaching methods, and course mastery) as they are related to professors' performance. Moreover, from our consultation with academics at IIUM and other universities, we assigned a weight value for each rating as follows:
                    </p>
                    <table>
                    	<thead>
                    		<tr>
                    			<th>Rating   </th>
                    			<th>Weight</th>
                    		</tr>
                    	</thead>
                    	<tbody >
                    		<tr>
                    			<td>Character</td>
                    			<td style="text-align:center;color:#F04646;">35%</td>
                    		</tr>
                    		<tr>
                    			<td>Teaching Methods</td>
                    			<td style="text-align:center;color:#F04646;">40%</td>
                    		</tr>
                    		<tr>
                    			<td>Course Mastery</td>
                    			<td style="text-align:center;color:#F04646;">25%</td>
                    		</tr>
                    	</tbody>
                    </table>
                    <br>
                    <p>
                    	Then, after calculating weight average for each rating, we calculate the average of their sum and use it as our overall score.
                    </p>
                </div>
            </div>
        </div>



    </div>
    <!--/panel-group-->
</div>

@endsection

