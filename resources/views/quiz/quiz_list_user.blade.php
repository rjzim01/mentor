@include('users_dashboard.0_top_u_dash')

@include('users_dashboard.0_side_u_dash')

<main id="main" class="main" style="min-height: 600px">

    <div class="pagetitle">
        <h1>Quiz List</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active">quiz</li>
            </ol>
        </nav>
    </div>

    <div class="text-center">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">From</th>
                <th scope="col">To</th>
                <th scope="col">Duration</th>
            </tr>
            </thead>
            <tbody>
            @php
            $sl=1;
            @endphp
            @foreach($quiz_list as $quiz)
                <tr>
                    <th scope="row">{{$sl++}}</th>
                    {{-- <td><a href="/add-question/{{$quiz->id}}" target="_blank">{{$quiz->title}}</a></td> --}}
                    <td><a href="/give-quiz/{{$quiz->id}}" >{{$quiz->title}}</a></td>
                    <td>{{$quiz->from_time}}</td>
                    <td>{{$quiz->to_time}}</td>
                    <td>{{$quiz->duration}} minutes</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</main>

@include('users_dashboard.0_bottom_u_dash')