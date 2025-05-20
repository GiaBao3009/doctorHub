<?php
// Include the initialization file
require_once '../../../config/init.php';
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bài Test Mức độ Căng thẳng (RADS) - DoctorHub</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <!-- Thư viện SweetAlert và jsPDF -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

    <link rel="stylesheet" href="../../../assets/css/view_test.css">
</head>

<body>
    <div class="test-container">
        <div class="test-header">
            <h1 class="test-title">Bài Test Mức độ Căng thẳng (RADS)</h1>
            <div class="progress-container">
                <div class="progress-bar">
                    <div class="progress-bar-fill" id="progress-bar-fill"></div>
                </div>
                <span class="progress-text" id="progress-text">1/14</span>
            </div>
        </div>

        <div id="question-container">
            <div class="question" id="question-text"></div>
            <div class="options" id="options-container"></div>
        </div>

        <div class="navigation">
            <button class="nav-button menu-button" onclick="goToMenu()">Quay lại</button>
            <button class="nav-button prev-button" id="prev-button" onclick="prevQuestion()" disabled>Trước đó</button>
            <button class="nav-button next-button" id="next-button" onclick="nextQuestion()" disabled>Tiếp theo</button>
        </div>
    </div>

    <script>
    const questions = [{
            question: "Bạn có cảm thấy khó thư giãn không?",
            options: [{
                    text: "Không bao giờ",
                    score: 0
                },
                {
                    text: "Thỉnh thoảng",
                    score: 1
                },
                {
                    text: "Thường xuyên",
                    score: 2
                },
                {
                    text: "Hầu như lúc nào cũng vậy",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có cảm thấy bồn chồn hoặc lo lắng quá mức không?",
            options: [{
                    text: "Không bao giờ",
                    score: 0
                },
                {
                    text: "Thỉnh thoảng",
                    score: 1
                },
                {
                    text: "Thường xuyên",
                    score: 2
                },
                {
                    text: "Hầu như lúc nào cũng vậy",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có dễ bị kích động hoặc cáu gắt không?",
            options: [{
                    text: "Không bao giờ",
                    score: 0
                },
                {
                    text: "Thỉnh thoảng",
                    score: 1
                },
                {
                    text: "Thường xuyên",
                    score: 2
                },
                {
                    text: "Hầu như lúc nào cũng vậy",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có cảm thấy khó tập trung vào công việc không?",
            options: [{
                    text: "Không bao giờ",
                    score: 0
                },
                {
                    text: "Thỉnh thoảng",
                    score: 1
                },
                {
                    text: "Thường xuyên",
                    score: 2
                },
                {
                    text: "Hầu như lúc nào cũng vậy",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có cảm thấy mệt mỏi hoặc thiếu năng lượng không?",
            options: [{
                    text: "Không bao giờ",
                    score: 0
                },
                {
                    text: "Thỉnh thoảng",
                    score: 1
                },
                {
                    text: "Thường xuyên",
                    score: 2
                },
                {
                    text: "Hầu như lúc nào cũng vậy",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có gặp khó khăn khi ngủ không?",
            options: [{
                    text: "Không bao giờ",
                    score: 0
                },
                {
                    text: "Thỉnh thoảng",
                    score: 1
                },
                {
                    text: "Thường xuyên",
                    score: 2
                },
                {
                    text: "Hầu như lúc nào cũng vậy",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có cảm thấy căng thẳng đến mức khó kiểm soát không?",
            options: [{
                    text: "Không bao giờ",
                    score: 0
                },
                {
                    text: "Thỉnh thoảng",
                    score: 1
                },
                {
                    text: "Thường xuyên",
                    score: 2
                },
                {
                    text: "Hầu như lúc nào cũng vậy",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có cảm thấy tim đập nhanh hoặc hồi hộp không?",
            options: [{
                    text: "Không bao giờ",
                    score: 0
                },
                {
                    text: "Thỉnh thoảng",
                    score: 1
                },
                {
                    text: "Thường xuyên",
                    score: 2
                },
                {
                    text: "Hầu như lúc nào cũng vậy",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có cảm thấy khó thở hoặc ngột ngạt không?",
            options: [{
                    text: "Không bao giờ",
                    score: 0
                },
                {
                    text: "Thỉnh thoảng",
                    score: 1
                },
                {
                    text: "Thường xuyên",
                    score: 2
                },
                {
                    text: "Hầu như lúc nào cũng vậy",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có cảm thấy sợ hãi mà không rõ lý do không?",
            options: [{
                    text: "Không bao giờ",
                    score: 0
                },
                {
                    text: "Thỉnh thoảng",
                    score: 1
                },
                {
                    text: "Thường xuyên",
                    score: 2
                },
                {
                    text: "Hầu như lúc nào cũng vậy",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có cảm thấy mất hứng thú với các hoạt động thường ngày không?",
            options: [{
                    text: "Không bao giờ",
                    score: 0
                },
                {
                    text: "Thỉnh thoảng",
                    score: 1
                },
                {
                    text: "Thường xuyên",
                    score: 2
                },
                {
                    text: "Hầu như lúc nào cũng vậy",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có cảm thấy khó đưa ra quyết định không?",
            options: [{
                    text: "Không bao giờ",
                    score: 0
                },
                {
                    text: "Thỉnh thoảng",
                    score: 1
                },
                {
                    text: "Thường xuyên",
                    score: 2
                },
                {
                    text: "Hầu như lúc nào cũng vậy",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có cảm thấy căng cơ hoặc đau nhức cơ thể không?",
            options: [{
                    text: "Không bao giờ",
                    score: 0
                },
                {
                    text: "Thỉnh thoảng",
                    score: 1
                },
                {
                    text: "Thường xuyên",
                    score: 2
                },
                {
                    text: "Hầu như lúc nào cũng vậy",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có cảm thấy mình đang chịu áp lực quá lớn không?",
            options: [{
                    text: "Không bao giờ",
                    score: 0
                },
                {
                    text: "Thỉnh thoảng",
                    score: 1
                },
                {
                    text: "Thường xuyên",
                    score: 2
                },
                {
                    text: "Hầu như lúc nào cũng vậy",
                    score: 3
                }
            ]
        }
    ];

    let currentQuestionIndex = 0;
    let answers = new Array(questions.length).fill(null);

    function loadQuestion(index) {
        const question = questions[index];
        document.getElementById('question-text').textContent = question.question;
        const optionsContainer = document.getElementById('options-container');
        optionsContainer.innerHTML = '';

        question.options.forEach((option, i) => {
            const div = document.createElement('div');
            div.className = 'option';
            div.innerHTML = `
                    <input type="radio" name="option" id="option-${i}" value="${option.score}" ${answers[index] === option.score ? 'checked' : ''}>
                    <label for="option-${i}">${option.text}</label>
                `;
            optionsContainer.appendChild(div);
        });

        updateProgress();
        updateButtons();
    }

    function updateProgress() {
        const progressText = document.getElementById('progress-text');
        progressText.textContent = `${currentQuestionIndex + 1}/${questions.length}`;
        const progressBarFill = document.getElementById('progress-bar-fill');
        const progressPercent = ((currentQuestionIndex + 1) / questions.length) * 100;
        progressBarFill.style.width = `${progressPercent}%`;
    }

    function updateButtons() {
        const prevButton = document.getElementById('prev-button');
        const nextButton = document.getElementById('next-button');
        prevButton.disabled = currentQuestionIndex === 0;
        nextButton.disabled = answers[currentQuestionIndex] === null;

        if (currentQuestionIndex === questions.length - 1 && answers[currentQuestionIndex] !== null) {
            nextButton.textContent = 'Hoàn thành';
        } else {
            nextButton.textContent = 'Tiếp theo';
        }
    }

    function nextQuestion() {
        if (currentQuestionIndex < questions.length - 1) {
            currentQuestionIndex++;
            loadQuestion(currentQuestionIndex);
        } else {
            calculateResult();
        }
    }

    function prevQuestion() {
        if (currentQuestionIndex > 0) {
            currentQuestionIndex--;
            loadQuestion(currentQuestionIndex);
        }
    }

    function goToMenu() {
        window.location.href = '../../views/test.php';
    }

    function calculateResult() {
        const totalScore = answers.reduce((sum, score) => sum + (score || 0), 0);
        let resultMessage = '';

        if (totalScore <= 10) {
            resultMessage = "Bạn đang ở mức căng thẳng thấp hoặc không đáng lo ngại.";
        } else if (totalScore <= 20) {
            resultMessage = "Bạn đang trải qua mức căng thẳng nhẹ. Hãy chú ý thư giãn và chăm sóc bản thân.";
        } else if (totalScore <= 30) {
            resultMessage =
                "Bạn đang ở mức căng thẳng vừa phải. Cân nhắc tìm cách giảm căng thẳng hoặc tham khảo ý kiến chuyên gia.";
        } else {
            resultMessage = "Bạn đang ở mức căng thẳng cao. Hãy tìm sự hỗ trợ từ chuyên gia tâm lý ngay lập tức.";
        }

        const resultText = `Điểm số của bạn: ${totalScore}\n${resultMessage}`;

        swal({
            title: "Kết quả đánh giá",
            text: resultText,
            icon: "success",
            buttons: {
                cancel: {
                    text: "Thoát",
                    visible: true,
                    className: "btn btn-danger",
                },
                confirm: {
                    text: "Quay lại",
                    className: "btn btn-primary"
                },
                download: {
                    text: "Xuất PDF",
                    value: "download",
                    className: "btn btn-success"
                }
            }
        }).then((value) => {
            if (value === true) {
                window.location.href = '../../views/test.php';
            } else if (value === "download") {
                generatePDF(totalScore, resultMessage);
            }
        });
    }

    function generatePDF(score, message) {
        const {
            jsPDF
        } = window.jspdf;
        const doc = new jsPDF();

        doc.setFontSize(20);
        doc.text("Kết quả đánh giá mức độ căng thẳng", 105, 30, {
            align: "center"
        });

        doc.setFontSize(14);
        doc.setTextColor(50, 50, 50);
        doc.text(`Điểm số của bạn: ${score}`, 20, 50);

        doc.setFontSize(12);
        doc.setTextColor(80, 80, 80);
        let splitText = doc.splitTextToSize(message, 170);
        doc.text(splitText, 20, 70);

        doc.setFontSize(10);
        doc.setTextColor(150, 150, 150);
        doc.text("Generated by DoctorHub", 105, 290, {
            align: "center"
        });

        doc.save("ketqua-cangthang.pdf");
    }

    document.getElementById('options-container').addEventListener('change', (e) => {
        answers[currentQuestionIndex] = parseInt(e.target.value);
        updateButtons();
    });

    // Load the first question
    loadQuestion(currentQuestionIndex);
    </script>
</body>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

</html>