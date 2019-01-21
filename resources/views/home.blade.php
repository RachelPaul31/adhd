@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 text-center">
            <h1> An App for ADHD Using Self-Management </h1>
            <h3>Please Read! </h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p>Thank you for agreeing to participating in this research project.
            This explains the self-management techniques that are used in this app, and some of the research behind it. For those who are interested, I summarized some of the previous research and explained how it works. For those who aren’t interested, skip to “So what do you do?” and you’ll get all the information you need. </p> 
            <p>The Barkley theoretical model of ADHD proposed a theory that ADHD stems from a deficit in inhibitory control caused by a neurological difference in the prefrontal cortex, causing issues with sustained attention, behavioral inhibition, and executive function, affecting organization and planning, self-regulation of affect/motivation, and behavioral analysis and synthesis. These impaired executive functions directly affect an individual’s ability to self-manage behavior by limiting their capacity to a) consider their own behavior in the context of past events or possible future consequences, b) internalize self-directing statements c) self-regulate emotional reactions, motivation or effort towards a goal, and d) coordinate evaluation of behavior through analysis of events or synthesis of ideas. 
            </p>
            <p>Self-management involves reflecting on and rating behavior related to symptoms in order to better understand and control yourself and is used to independently complete tasks and take an active role in monitoring and reinforcing your own behavior. The key to self-management is conscious appraisal of immediate past behaviors. In periodically taking the time to consciously evaluate yourself and notice how you are performing, you start to recognize your symptoms before they derail you. Studies from Blicha and Belfiore, Reid et al, Axelrod et al, and more have shown consistent results with self-management interventions improving task behavior, task completion, and productivity.
 </p>
            <p>Self-management includes self-monitoring, when one monitors and assesses a target behavior and self-records the results, with two common types being self-monitoring of attention and self-monitoring of performance. It also includes self-reinforcement, where one sets goals, self-assesses their performance, and self-rewards.  </p>
            <h4>So what do you do? </h4>
            <p>On the Self-Assess page of this app, you can assess your behaviors(On task behavior, productivity, progress/completion of tasks, prompt completion of tasks, and organization.) on a 1-5 scale.  Periodically, (ideally every 15-30 minutes or less while you are working), take a few seconds to reflect and appraise your immediate past behavior and submit a self-assessment, and also think about the behaviors that helped or hurt your self-assessed score in that area, and how you can go about improving it. Set goals for yourself (on the goals page) based on the behaviors you are going to be self-assessing, and general short-term goals for yourself, and reward yourself when you progress towards your goal, complete a goal, or improve on your assessed behaviors. </p>
            <p>The goal of this project is to determine the effectiveness of an app using self-management techniques to help people with ADHD manage their symptoms, but the app also includes aspects of other apps that have been found beneficial in past research. It functions as a task manager where you can visually see your tasks by date and color coded by importance on a calendar, or as a checklist that can be sorted various ways. Additionally, it has a timer page where it explains Tomatoes and allows you to set a timer.</p>
            <p>You are the beta group for this so please let me know if anything does not work so I can fix and update it to get it working. If you have any questions, comments, or concerns, my email is rachelp4701@gmail.com, feel free to email me anytime. 

</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
        <a class="btn btn-primary btn-lg" href="/register" role="button">Sign Up</a>
        <a class="btn btn-primary btn-lg" href="/login" role="button">Log In</a>
        </div>
    </div>
</div>


@endsection