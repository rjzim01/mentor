@include('admin.0_top_admin_dash')

@include('admin.0_side_admin_dash')

<main id="main" class="main" style="min-height: 600px">

    <h1>Add Question for the Quiz: {{$quiz_list->title}}</h1>
    <div class="text-center">
        <div>
            <form method="post" action="{{route('store_question')}}">
                @csrf
                <ul class="nav nav-tabs nav-tabs-bordered">

                    <li class="nav-item">
                      <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#type-1">Type-1</button>
                    </li>
    
                    <li class="nav-item">
                      <button class="nav-link" data-bs-toggle="tab" data-bs-target="#type-2">Type-2</button>
                    </li>

                    <li class="nav-item">
                      <button class="nav-link" data-bs-toggle="tab" data-bs-target="#type-3">Type-3</button>
                    </li>

                    <li class="nav-item">
                      <button class="nav-link" data-bs-toggle="tab" data-bs-target="#type-4">Type-4</button>
                    </li>
    
                </ul>
                <div class="form-group">
                    <select id="type" class="form-control" name="question_type" required>
                        <option selected disabled value>-- Select Question Type --</option>
                        <option value=1>Multiple Choice</option>
                        <option value=2>True False</option>
                        <option value=3>blank fill</option>
                        <option value=4>Short answer</option>
                    </select>
                </div>
                <div class="tab-content pt-2">
                    <div class="tab-pane fade show active " id="type-1">

                        <div class="form-group">
                            <input type="text" placeholder="Question" name="question" class="form-control">
                        </div>
                        <input type="hidden" name="quiz_id" value="{{$quiz_id}}" readonly>
                        <div class="form-group">
                            <input type="text" placeholder="Option A" name="option_a" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Option B" name="option_b" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Option C" name="option_c" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Option D" name="option_d" class="form-control">
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="correct_option" >
                                <option selected disabled value>-- Select Correct Option --</option>
                                <option value="option_a">A</option>
                                <option value="option_b">B</option>
                                <option value="option_c">C</option>
                                <option value="option_d">D</option>
                            </select>
                        </div>
                        
                        <div class="text-center">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </div>
                                    
                    <div class="tab-pane fade" id="type-2">
                        
                        <div class="form-group">
                            <input type="text" placeholder="Question" name="question" class="form-control">
                        </div>
                        <input type="hidden" name="quiz_id" value="{{$quiz_id}}" readonly>
                        <div class="form-group">
                            <input type="text" placeholder="True" name="option_a" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="False" name="option_b" class="form-control" readonly>
                        </div>
                        
                        <div class="form-group">
                            <select class="form-control" name="correct_option">
                                <option selected disabled value>-- Select Correct Option --</option>
                                <option value="option_a">True</option>
                                <option value="option_b">False</option>
                            </select>
                        </div>
                        
                        <div class="text-center">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </div>
{{-- 
                    <div class="tab-pane fade" id="type-3">
                        
                        <div class="form-group">
                            <input type="text" placeholder="Question" name="question" class="form-control">
                        </div>
                        <input type="hidden" name="quiz_id" value="{{$quiz_id}}" readonly>
                        
                        <div class="form-group">
                            <input type="text" placeholder="Answer of the blank" name="correct_option" class="form-control">
                        </div>
                        
                        <div class="text-center">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </div> --}}
{{-- 
                    <div class="tab-pane fade" id="type-4">
                        
                        <div class="form-group">
                            <input type="text" placeholder="Question" name="question" class="form-control">
                        </div>
                        <input type="hidden" name="quiz_id" value="{{$quiz_id}}" readonly>
                        <div class="form-group">
                            <input type="text" placeholder="True" name="option_a" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="False" name="option_b" class="form-control" readonly>
                        </div>
                        
                        <div class="form-group">
                            <select class="form-control" name="correct_option">
                                <option selected disabled value>-- Select Correct Option --</option>
                                <option value="option_a">True</option>
                                <option value="option_b">False</option>
                            </select>
                        </div>
                        
                        <div class="text-center">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </div> --}}

                </div>
            </form>
        </div>
    </div>

    <div class="text-center">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Question</th>
                <th scope="col">A</th>
                <th scope="col">B</th>
                <th scope="col">C</th>
                <th scope="col">D</th>
                <th scope="col">Correct</th>
                <th scope="col">Type</th>
            </tr>
            </thead>
            <tbody>
            @php
                $sl=1;
            @endphp
            @foreach($questions as $question)
                @if ($question->question_type==1)
                    <tr>
                        <th scope="row">{{$sl++}}</th>
                        <td>{{$question->question}}</td>
                        <td>{{$question->option_a}}</td>
                        <td>{{$question->option_b}}</td>
                        <td>{{$question->option_c}}</td>
                        <td>{{$question->option_d}}</td>
                        <td style="color:rgb(255, 0, 0);">{{$question->correct_option}}</td>
                        <td>{{ $question->question_type }}__Multiple Choice</td>
                    </tr>
                @elseif($question->question_type==2)
                    <tr>
                        <th scope="row">{{$sl++}}</th>
                        <td>{{$question->question}}</td>
                        <td>{{$question->option_a}}</td>
                        <td>{{$question->option_b}}</td>
                        <td>_</td>
                        <td>_</td>
                        <td style="color:rgb(204, 0, 255);">{{$question->correct_option}}</td>
                        <td>{{ $question->question_type }}__True False</td>
                    </tr>
                @elseif($question->question_type==3)
                    <tr>
                        <th scope="row">{{$sl++}}</th>
                        <td>{{$question->question}}</td>
                        <td>_</td>
                        <td>_</td>
                        <td>_</td>
                        <td>_</td>
                        <td style="color:rgb(21, 0, 255);">{{$question->correct_option}}</td>
                        <td>{{ $question->question_type }}__Fill in the blanks</td>
                    </tr>
                    @elseif($question->question_type==4)
                    <tr>
                        <th scope="row">{{$sl++}}</th>
                        <td>{{$question->question}}</td>
                        <td>_</td>
                        <td>_</td>
                        <td>_</td>
                        <td>_</td>
                        <td style="color:rgb(255, 187, 2);">Based on Examiner evaluation</td>
                        <td>{{ $question->question_type }}__Short Question</td>
                    </tr>
                @endif
                
            @endforeach
            </tbody>
        </table>
    </div>


</main>

@include('admin.0_bottom_admin_dash')
<script>
    var typeOne = document.getElementById("f1");
    var typeTwo = document.getElementById("f2");
    var type = document.getElementById("type");
    //typeOne.style.display = "block";
    //typeTwo.style.display = "none";
    if(type==1){
        typeOne.style.display = "block";
    }else{
        
    }
</script>