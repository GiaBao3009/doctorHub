<?php
// Include the initialization file
require_once '../../../config/init.php';
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bài Test Lo âu – Trầm cảm – Stress (DASS 42) - DoctorHub</title>
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
            <h1 class="test-title">Bài Test Lo âu – Trầm cảm – Stress (DASS 42)</h1>
            <div class="progress-container">
                <div class="progress-bar">
                    <div class="progress-bar-fill" id="progress-bar-fill"></div>
                </div>
                <span class="progress-text" id="progress-text">1/21</span>
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
            question: "Tôi cảm thấy khó thư giãn.",
            category: "stress",
            options: [{
                    text: "Không đúng với tôi",
                    score: 0
                },
                {
                    text: "Đúng một phần",
                    score: 1
                },
                {
                    text: "Đúng khá nhiều",
                    score: 2
                },
                {
                    text: "Hoàn toàn đúng",
                    score: 3
                }
            ]
        },
        {
            question: "Tôi cảm thấy buồn bã và chán nản.",
            category: "depression",
            options: [{
                    text: "Không đúng với tôi",
                    score: 0
                },
                {
                    text: "Đúng một phần",
                    score: 1
                },
                {
                    text: "Đúng khá nhiều",
                    score: 2
                },
                {
                    text: "Hoàn toàn đúng",
                    score: 3
                }
            ]
        },
        {
            question: "Tôi cảm thấy tim đập nhanh hoặc hồi hộp.",
            category: "anxiety",
            options: [{
                    text: "Không đúng với tôi",
                    score: 0
                },
                {
                    text: "Đúng một phần",
                    score: 1
                },
                {
                    text: "Đúng khá nhiều",
                    score: 2
                },
                {
                    text: "Hoàn toàn đúng",
                    score: 3
                }
            ]
        },
        {
            question: "Tôi dễ bị kích động hoặc cáu gắt.",
            category: "stress",
            options: [{
                    text: "Không đúng với tôi",
                    score: 0
                },
                {
                    text: "Đúng một phần",
                    score: 1
                },
                {
                    text: "Đúng khá nhiều",
                    score: 2
                },
                {
                    text: "Hoàn toàn đúng",
                    score: 3
                }
            ]
        },
        {
            question: "Tôi cảm thấy mất hứng thú với mọi thứ.",
            category: "depression",
            options: [{
                    text: "Không đúng với tôi",
                    score: 0
                },
                {
                    text: "Đúng một phần",
                    score: 1
                },
                {
                    text: "Đúng khá nhiều",
                    score: 2
                },
                {
                    text: "Hoàn toàn đúng",
                    score: 3
                }
            ]
        },
        {
            question: "Tôi cảm thấy sợ hãi mà không rõ lý do.",
            category: "anxiety",
            options: [{
                    text: "Không đúng với tôi",
                    score: 0
                },
                {
                    text: "Đúng một phần",
                    score: 1
                },
                {
                    text: "Đúng khá nhiều",
                    score: 2
                },
                {
                    text: "Hoàn toàn đúng",
                    score: 3
                }
            ]
        },
        {
            question: "Tôi cảm thấy khó đưa ra quyết định.",
            category: "stress",
            options: [{
                    text: "Không đúng với tôi",
                    score: 0
                },
                {
                    text: "Đúng một phần",
                    score: 1
                },
                {
                    text: "Đúng khá nhiều",
                    score: 2
                },
                {
                    text: "Hoàn toàn đúng",
                    score: 3
                }
            ]
        },
        {
            question: "Tôi cảm thấy mình vô dụng.",
            category: "depression",
            options: [{
                    text: "Không đúng với tôi",
                    score: 0
                },
                {
                    text: "Đúng một phần",
                    score: 1
                },
                {
                    text: "Đúng khá nhiều",
                    score: 2
                },
                {
                    text: "Hoàn toàn đúng",
                    score: 3
                }
            ]
        },
        {
            question: "Tôi cảm thấy khó thở hoặc ngột ngạt.",
            category: "anxiety",
            options: [{
                    text: "Không đúng với tôi",
                    score: 0
                },
                {
                    text: "Đúng một phần",
                    score: 1
                },
                {
                    text: "Đúng khá nhiều",
                    score: 2
                },
                {
                    text: "Hoàn toàn đúng",
                    score: 3
                }
            ]
        },
        {
            question: "Tôi cảm thấy căng thẳng đến mức khó kiểm soát.",
            category: "stress",
            options: [{
                    text: "Không đúng với tôi",
                    score: 0
                },
                {
                    text: "Đúng một phần",
                    score: 1
                },
                {
                    text: "Đúng khá nhiều",
                    score: 2
                },
                {
                    text: "Hoàn toàn đúng",
                    score: 3
                }
            ]
        },
        {
            question: "Tôi cảm thấy không còn gì đáng để sống.",
            category: "depression",
            options: [{
                    text: "Không đúng với tôi",
                    score: 0
                },
                {
                    text: "Đúng một phần",
                    score: 1
                },
                {
                    text: "Đúng khá nhiều",
                    score: 2
                },
                {
                    text: "Hoàn toàn đúng",
                    score: 3
                }
            ]
        },
        {
            question: "Tôi cảm thấy run rẩy hoặc hoảng loạn.",
            category: "anxiety",
            options: [{
                    text: "Không đúng với tôi",
                    score: 0
                },
                {
                    text: "Đúng một phần",
                    score: 1
                },
                {
                    text: "Đúng khá nhiều",
                    score: 2
                },
                {
                    text: "Hoàn toàn đúng",
                    score: 3
                }
            ]
        },
        {
            question: "Tôi cảm thấy bồn chồn, không thể ngồi yên.",
            category: "stress",
            options: [{
                    text: "Không đúng với tôi",
                    score: 0
                },
                {
                    text: "Đúng một phần",
                    score: 1
                },
                {
                    text: "Đúng khá nhiều",
                    score: 2
                },
                {
                    text: "Hoàn toàn đúng",
                    score: 3
                }
            ]
        },
        {
            question: "Tôi cảm thấy khó khăn khi bắt đầu làm việc gì đó.",
            category: "depression",
            options: [{
                    text: "Không đúng với tôi",
                    score: 0
                },
                {
                    text: "Đúng một phần",
                    score: 1
                },
                {
                    text: "Đúng khá nhiều",
                    score: 2
                },
                {
                    text: "Hoàn toàn đúng",
                    score: 3
                }
            ]
        },
        {
            question: "Tôi cảm thấy lo lắng về những tình huống có thể xảy ra.",
            category: "anxiety",
            options: [{
                    text: "Không đúng với tôi",
                    score: 0
                },
                {
                    text: "Đúng một phần",
                    score: 1
                },
                {
                    text: "Đúng khá nhiều",
                    score: 2
                },
                {
                    text: "Hoàn toàn đúng",
                    score: 3
                }
            ]
        },
        {
            question: "Tôi cảm thấy khó chịu với những việc nhỏ nhặt.",
            category: "stress",
            options: [{
                    text: "Không đúng với tôi",
                    score: 0
                },
                {
                    text: "Đúng một phần",
                    score: 1
                },
                {
                    text: "Đúng khá nhiều",
                    score: 2
                },
                {
                    text: "Hoàn toàn đúng",
                    score: 3
                }
            ]
        },
        {
            question: "Tôi cảm thấy bi quan về tương lai.",
            category: "depression",
            options: [{
                    text: "Không đúng với tôi",
                    score: 0
                },
                {
                    text: "Đúng một phần",
                    score: 1
                },
                {
                    text: "Đúng khá nhiều",
                    score: 2
                },
                {
                    text: "Hoàn toàn đúng",
                    score: 3
                }
            ]
        },
        {
            question: "Tôi cảm thấy cơ thể run hoặc đổ mồ hôi khi căng thẳng.",
            category: "anxiety",
            options: [{
                    text: "Không đúng với tôi",
                    score: 0
                },
                {
                    text: "Đúng một phần",
                    score: 1
                },
                {
                    text: "Đúng khá nhiều",
                    score: 2
                },
                {
                    text: "Hoàn toàn đúng",
                    score: 3
                }
            ]
        },
        {
            question: "Tôi cảm thấy khó kiểm soát cảm xúc của mình.",
            category: "stress",
            options: [{
                    text: "Không đúng với tôi",
                    score: 0
                },
                {
                    text: "Đúng một phần",
                    score: 1
                },
                {
                    text: "Đúng khá nhiều",
                    score: 2
                },
                {
                    text: "Hoàn toàn đúng",
                    score: 3
                }
            ]
        },
        {
            question: "Tôi cảm thấy không có động lực để làm bất cứ việc gì.",
            category: "depression",
            options: [{
                    text: "Không đúng với tôi",
                    score: 0
                },
                {
                    text: "Đúng một phần",
                    score: 1
                },
                {
                    text: "Đúng khá nhiều",
                    score: 2
                },
                {
                    text: "Hoàn toàn đúng",
                    score: 3
                }
            ]
        },
        {
            question: "Tôi cảm thấy sợ hãi khi nghĩ về một số tình huống.",
            category: "anxiety",
            options: [{
                    text: "Không đúng với tôi",
                    score: 0
                },
                {
                    text: "Đúng một phần",
                    score: 1
                },
                {
                    text: "Đúng khá nhiều",
                    score: 2
                },
                {
                    text: "Hoàn toàn đúng",
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
        let stressScore = 0;
        let depressionScore = 0;
        let anxietyScore = 0;

        answers.forEach((score, index) => {
            const category = questions[index].category;
            if (category === 'stress') {
                stressScore += score || 0;
            } else if (category === 'depression') {
                depressionScore += score || 0;
            } else if (category === 'anxiety') {
                anxietyScore += score || 0;
            }
        });

        // Nhân đôi điểm số để phù hợp với thang điểm DASS 42
        stressScore *= 2;
        depressionScore *= 2;
        anxietyScore *= 2;

        // Đánh giá mức độ cho từng thang
        const getLevel = (score, type) => {
            if (type === 'depression') {
                if (score <= 9) return 'Bình thường';
                if (score <= 13) return 'Nhẹ';
                if (score <= 20) return 'Vừa phải';
                if (score <= 27) return 'Nặng';
                return 'Rất nặng';
            } else if (type === 'anxiety') {
                if (score <= 7) return 'Bình thường';
                if (score <= 9) return 'Nhẹ';
                if (score <= 14) return 'Vừa phải';
                if (score <= 19) return 'Nặng';
                return 'Rất nặng';
            } else if (type === 'stress') {
                if (score <= 14) return 'Bình thường';
                if (score <= 18) return 'Nhẹ';
                if (score <= 25) return 'Vừa phải';
                if (score <= 33) return 'Nặng';
                return 'Rất nặng';
            }
        };

        const stressLevel = getLevel(stressScore, 'stress');
        const depressionLevel = getLevel(depressionScore, 'depression');
        const anxietyLevel = getLevel(anxietyScore, 'anxiety');

        // Tạo thông báo kết quả
        let resultMessage = `
                Kết quả đánh giá DASS 42:\n
                - Căng thẳng: ${stressScore} (${stressLevel})\n
                - Trầm cảm: ${depressionScore} (${depressionLevel})\n
                - Lo âu: ${anxietyScore} (${anxietyLevel})\n\n
            `;

        if (stressLevel === 'Nặng' || stressLevel === 'Rất nặng' ||
            depressionLevel === 'Nặng' || depressionLevel === 'Rất nặng' ||
            anxietyLevel === 'Nặng' || anxietyLevel === 'Rất nặng') {
            resultMessage += 'Bạn đang có dấu hiệu nghiêm trọng. Hãy tìm sự hỗ trợ từ chuyên gia tâm lý ngay lập tức.';
        } else if (stressLevel === 'Vừa phải' || depressionLevel === 'Vừa phải' || anxietyLevel === 'Vừa phải') {
            resultMessage += 'Bạn có thể đang gặp vấn đề ở mức vừa phải. Cân nhắc tham khảo ý kiến chuyên gia.';
        } else if (stressLevel === 'Nhẹ' || depressionLevel === 'Nhẹ' || anxietyLevel === 'Nhẹ') {
            resultMessage += 'Bạn có dấu hiệu nhẹ. Hãy chú ý chăm sóc sức khỏe tinh thần.';
        } else {
            resultMessage += 'Tình trạng của bạn hiện tại bình thường.';
        }

        swal({
            title: "Kết quả đánh giá",
            text: resultMessage,
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
                generatePDF(stressScore, depressionScore, anxietyScore, stressLevel, depressionLevel,
                    anxietyLevel, resultMessage);
            }
        });
    }

    function generatePDF(stressScore, depressionScore, anxietyScore, stressLevel, depressionLevel, anxietyLevel,
        message) {
        const {
            jsPDF
        } = window.jspdf;
        const doc = new jsPDF();

        doc.setFontSize(20);
        doc.text("Kết quả đánh giá DASS 42", 105, 30, {
            align: "center"
        });

        doc.setFontSize(14);
        doc.setTextColor(50, 50, 50);
        doc.text(`Căng thẳng: ${stressScore} (${stressLevel})`, 20, 50);
        doc.text(`Trầm cảm: ${depressionScore} (${depressionLevel})`, 20, 60);
        doc.text(`Lo âu: ${anxietyScore} (${anxietyLevel})`, 20, 70);

        doc.setFontSize(12);
        doc.setTextColor(80, 80, 80);
        let splitText = doc.splitTextToSize(message.split('\n\n')[1], 170);
        doc.text(splitText, 20, 90);

        doc.setFontSize(10);
        doc.setTextColor(150, 150, 150);
        doc.text("Generated by DoctorHub", 105, 290, {
            align: "center"
        });

        doc.save("ketqua-dass42.pdf");
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