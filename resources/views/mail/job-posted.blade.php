<h3>{{$job->title}}</h3>
<p>Congrats!, your job is now posted on our website</p>
<a href="{{ url('/jobs/' . $job->id) }}">View your job</a>
