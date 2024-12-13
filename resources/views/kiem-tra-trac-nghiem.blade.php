@extends('master')

@section('contents')
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-8">
                <div class="card border-0 shadow rounded-lg mb-4">
                    <div class="card-body p-4">
                        <h2 class="text-primary fw-bold mb-3">Làm Bài Kiểm Tra</h2>
                        <p class="text-muted mb-4">Vui lòng trả lời tất cả các câu hỏi và nhấn "Nộp Bài" khi bạn hoàn thành.</p>

                        <form action="{{ route('kiem-tra-trac-nghiem') }}" method="POST">
                            @csrf

                            <!-- Render Câu hỏi -->
                            @foreach(range(1, 5) as $i) <!-- Giả sử có 5 câu hỏi -->
                            <div id="question_{{ $i }}" class="exam-question mb-4">
                                <h5 class="text-dark fw-semibold">Câu {{ $i }}: Câu hỏi trắc nghiệm {{ $i }}</h5>
                                @foreach(['a', 'b', 'c', 'd'] as $option)
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="question_{{ $i }}" value="{{ $option }}" id="q{{ $i }}_{{ $option }}" {{ old('question_' . $i) == $option ? 'checked' : '' }}>
                                        <label class="form-check-label" for="q{{ $i }}_{{ $option }}">Đáp án {{ strtoupper($option) }}</label>
                                    </div>
                                @endforeach
                            </div>
                            @endforeach

                            <!-- Nút Nộp Bài -->
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-lg px-5 py-2">Nộp Bài</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <!-- Danh sách câu hỏi -->
                <div class="card border-0 shadow sticky-top" style="top: 20px;">
                    <div class="card-body p-3">
                        <h5 class="text-primary fw-bold mb-3">Danh Sách Câu Hỏi</h5>
                        <div class="d-flex flex-wrap">
                            @foreach(range(1, 5) as $i) <!-- Giả sử có 5 câu hỏi -->
                            <div class="px-2 py-1">
                                <a href="#question_{{ $i }}" class="text-decoration-none text-dark fw-semibold" onclick="scrollToQuestion({{ $i }})">
                                    Câu {{ $i }}
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function scrollToQuestion(questionId) {
            const element = document.getElementById('question_' + questionId);
            window.scrollTo({
                top: element.offsetTop - 70,
                behavior: 'smooth'
            });
        }
    </script>
@endsection
