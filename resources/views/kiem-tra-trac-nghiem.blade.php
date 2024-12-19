@extends('master')

@section('contents')
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-primary fw-bold mb-0">{{ $baiKiemTra->ten_bai_kiem_tra }}</h2>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="card border-0 shadow rounded-lg mb-4">
                    <div class="card-body p-4">
                        <p class="text-muted mb-4">Vui lòng trả lời tất cả các câu hỏi và nhấn "Nộp Bài" khi bạn hoàn thành.</p>

                        <form action="{{ route('nop-bai', ['id_bai_kiem_tra' => $id_bai_kiem_tra, 'id_bai_giang' => $id_bai_giang]) }}" method="POST" id="examForm">
                            @csrf

                            @foreach($questions as $index => $question)
                                <div id="question_{{ $index+1 }}" class="exam-question mb-4">
                                    <h5 class="text-dark fw-semibold">Câu {{ $index+1 }}: {{ $question->cau_hoi }}</h5>

                                    @if($question->anh_cau_hoi)
                                        <div class="mb-3">
                                            <img src="{{ asset('path/to/images/' . $question->anh_cau_hoi) }}" alt="Hình câu hỏi" style="max-width:100%;">
                                        </div>
                                    @endif

                                    @foreach(['a', 'b', 'c', 'd'] as $option)
                                        @php
                                            $label = 'dap_an_'.$option;
                                        @endphp
                                        <div class="form-check mb-2">
                                            <input class="form-check-input answer-radio" type="radio"
                                                   name="answers[{{ $question->id }}]"
                                                   value="{{ strtoupper($option) }}"
                                                   id="q{{ $index+1 }}_{{ $option }}">
                                            <label class="form-check-label" for="q{{ $index+1 }}_{{ $option }}">{{ $question->$label }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach

                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary btn-lg px-5 py-2">Nộp Bài</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card border-0 shadow sticky-top" style="top: 70px;">
                    <div class="card-body p-3">
                        <h5 class="text-primary fw-bold mb-3">Danh Sách Câu Hỏi</h5>
                        <div class="question-grid" style="display: grid; grid-template-columns: repeat(5, 1fr); gap: 5px;">
                            @foreach($questions as $index => $q)
                                <a href="#question_{{ $index+1 }}"
                                   class="question-box text-decoration-none fw-semibold d-flex align-items-center justify-content-center"
                                   onclick="scrollToQuestion({{ $index+1 }})"
                                   data-question-index="{{ $index+1 }}"
                                   data-question-id="{{ $q->id }}"
                                   style="border:1px solid black; width:40px; height:40px; background:#fff; color:#000; border-radius:5px;">
                                    {{ $index+1 }}
                                </a>
                            @endforeach
                        </div>

                        <div class="mt-3">
                            <span class="text-danger fw-bold">Thời gian còn lại: <span id="timer"></span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function scrollToQuestion(questionId) {
            const element = document.getElementById('question_' + questionId);
            const offset = 70;
            const y = element.getBoundingClientRect().top + window.pageYOffset - offset;
            window.scrollTo({top: y, behavior: 'smooth'});
        }

        let timeRemaining = {{ $timeRemaining }};

        let timerInterval = setInterval(function() {
            timeRemaining--;
            if (timeRemaining <= 0) {
                clearInterval(timerInterval);
                document.getElementById('examForm').submit();
            }
            document.getElementById('timer').innerText = formatTime(timeRemaining);
        }, 1000);

        function formatTime(seconds) {
            let m = Math.floor(seconds / 60);
            let s = seconds % 60;
            return m.toString().padStart(2, '0') + ':' + s.toString().padStart(2, '0');
        }

        const examAnswerKey = 'exam_answers_{{ $id_bai_kiem_tra }}';

        document.addEventListener('DOMContentLoaded', function() {
            let savedAnswers = localStorage.getItem(examAnswerKey);
            if (savedAnswers) {
                savedAnswers = JSON.parse(savedAnswers);
                for (const [qId, ans] of Object.entries(savedAnswers)) {
                    const radio = document.querySelector(`input[name="answers[${qId}]"][value="${ans}"]`);
                    if (radio) {
                        radio.checked = true;
                        let box = document.querySelector('.question-box[data-question-id="'+qId+'"]');
                        if (box) {
                            box.style.backgroundColor = '#c8e6c9';
                        }
                    }
                }
            }
        });

        document.querySelectorAll('.answer-radio').forEach(radio => {
            radio.addEventListener('change', function() {
                let name = this.name;
                let questionIdMatch = name.match(/\d+/);
                if (questionIdMatch) {
                    let qId = questionIdMatch[0];
                    let box = document.querySelector('.question-box[data-question-id="'+qId+'"]');
                    if (box) {
                        box.style.backgroundColor = '#c8e6c9';
                    }

                    let savedAnswers = localStorage.getItem(examAnswerKey);
                    savedAnswers = savedAnswers ? JSON.parse(savedAnswers) : {};
                    savedAnswers[qId] = this.value;
                    localStorage.setItem(examAnswerKey, JSON.stringify(savedAnswers));
                }
            });
        });

        const examForm = document.getElementById('examForm');
        examForm.addEventListener('submit', function() {
            localStorage.removeItem(examAnswerKey);
        });
    </script>
@endsection
