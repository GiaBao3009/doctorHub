<?php
// Include the initialization file
require_once '../../../config/init.php';
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bài Test kiểm tra dấu hiệu bệnh Parkinson - DoctorHub</title>
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
            <h1 class="test-title">Bài Test kiểm tra dấu hiệu bệnh Parkinson</h1>
            <div class="progress-container">
                <div class="progress-bar">
                    <div class="progress-bar-fill" id="progress-bar-fill"></div>
                </div>
                <span class="progress-text" id="progress-text">1/25</span>
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
            question: "Bạn có bị run (tremor) ở tay, chân, hoặc cằm khi nghỉ ngơi không?",
            options: [{
                    text: "Không",
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
                    text: "Liên tục",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có cảm thấy cơ thể hoặc các chi bị cứng (cứng cơ) khi di chuyển không?",
            options: [{
                    text: "Không",
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
                    text: "Liên tục",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có nhận thấy động tác của mình chậm hơn bình thường không (chậm vận động)?",
            options: [{
                    text: "Không",
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
                    text: "Rất rõ ràng",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có gặp khó khăn khi giữ thăng bằng hoặc dễ ngã không?",
            options: [{
                    text: "Không",
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
                    text: "Liên tục",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có bị thay đổi tư thế, như cúi người hoặc khom lưng khi đứng không?",
            options: [{
                    text: "Không",
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
                    text: "Rất rõ ràng",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có gặp khó khăn khi bắt đầu một chuyển động (như đứng dậy, bước đi)?",
            options: [{
                    text: "Không",
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
                    text: "Liên tục",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có bị bước đi ngắn, lê chân, hoặc khó xoay người không?",
            options: [{
                    text: "Không",
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
                    text: "Liên tục",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có bị mất khả năng thực hiện các động tác tự động (như vung tay khi đi)?",
            options: [{
                    text: "Không",
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
                    text: "Rất rõ ràng",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có bị co cơ hoặc chuột rút thường xuyên không?",
            options: [{
                    text: "Không",
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
                    text: "Liên tục",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có gặp khó khăn khi viết chữ (chữ nhỏ dần, run khi viết) không?",
            options: [{
                    text: "Không",
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
                    text: "Rất rõ ràng",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có bị thay đổi giọng nói, như nói nhỏ hoặc giọng đều đều không?",
            options: [{
                    text: "Không",
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
                    text: "Rất rõ ràng",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có bị cứng nét mặt hoặc giảm biểu cảm khuôn mặt không?",
            options: [{
                    text: "Không",
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
                    text: "Rất rõ ràng",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có bị khó nuốt hoặc chảy nước dãi không kiểm soát không?",
            options: [{
                    text: "Không",
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
                    text: "Liên tục",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có bị táo bón kéo dài không rõ nguyên nhân không?",
            options: [{
                    text: "Không",
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
                    text: "Liên tục",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có bị rối loạn giấc ngủ, như khó ngủ hoặc cử động nhiều khi ngủ không?",
            options: [{
                    text: "Không",
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
                    text: "Liên tục",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có bị giảm khứu giác hoặc mất khả năng ngửi không?",
            options: [{
                    text: "Không",
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
                    text: "Hoàn toàn",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có cảm thấy lo âu, trầm cảm, hoặc mất hứng thú không?",
            options: [{
                    text: "Không",
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
                    text: "Liên tục",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có bị đau cơ hoặc đau khớp không rõ nguyên nhân không?",
            options: [{
                    text: "Không",
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
                    text: "Liên tục",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có gặp khó khăn khi thực hiện các công việc hàng ngày (như mặc quần áo, ăn uống)?",
            options: [{
                    text: "Không",
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
                    text: "Liên tục",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có bị đổ mồ hôi bất thường hoặc cảm giác nóng lạnh thất thường không?",
            options: [{
                    text: "Không",
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
                    text: "Liên tục",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có tiền sử gia đình mắc bệnh Parkinson hoặc rối loạn thần kinh không?",
            options: [{
                    text: "Không",
                    score: 0
                },
                {
                    text: "Có thể",
                    score: 1
                },
                {
                    text: "Có, người thân cấp 2",
                    score: 2
                },
                {
                    text: "Có, người thân cấp 1",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có từng tiếp xúc lâu dài với hóa chất độc hại (như thuốc trừ sâu) không?",
            options: [{
                    text: "Không",
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
                    text: "Liên tục",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có từng bị chấn thương đầu nghiêm trọng không?",
            options: [{
                    text: "Không",
                    score: 0
                },
                {
                    text: "1-2 lần",
                    score: 1
                },
                {
                    text: "Nhiều lần",
                    score: 2
                },
                {
                    text: "Thường xuyên",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có trên 60 tuổi không?",
            options: [{
                    text: "Không",
                    score: 0
                },
                {
                    text: "Dưới 60",
                    score: 1
                },
                {
                    text: "60-70",
                    score: 2
                },
                {
                    text: "Trên 70",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có đi khám thần kinh định kỳ để kiểm tra sức khỏe não bộ không?",
            options: [{
                    text: "Có, đều đặn",
                    score: 0
                },
                {
                    text: "Thỉnh thoảng",
                    score: 1
                },
                {
                    text: "Hiếm khi",
                    score: 2
                },
                {
                    text: "Không bao giờ",
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

        // Kiểm tra các triệu chứng nghiêm trọng (triệu chứng vận động chính của Parkinson)
        const criticalSymptoms = [0, 1, 2, 3]; // Run, cứng cơ, chậm vận động, mất thăng bằng
        const hasCriticalSymptom = criticalSymptoms.some(index => answers[index] >= 2);

        if (totalScore <= 15) {
            resultMessage =
                "Bạn có rất ít hoặc không có dấu hiệu của bệnh Parkinson. Hãy duy trì lối sống lành mạnh và kiểm tra sức khỏe định kỳ.";
        } else if (totalScore <= 30) {
            resultMessage =
                "Bạn có một số dấu hiệu nhẹ có thể liên quan đến bệnh Parkinson. Hãy theo dõi thêm và tham khảo ý kiến bác sĩ thần kinh.";
        } else if (totalScore <= 45) {
            resultMessage =
                "Bạn có nhiều dấu hiệu đáng lo ngại. Hãy đến bác sĩ thần kinh để được kiểm tra và đánh giá nguy cơ bệnh Parkinson.";
        } else {
            resultMessage =
                "Bạn có nguy cơ cao mắc bệnh Parkinson. Hãy đến bệnh viện hoặc bác sĩ thần kinh ngay để được chẩn đoán và điều trị.";
        }

        if (hasCriticalSymptom) {
            resultMessage +=
                "\n\nCẢNH BÁO: Bạn có các triệu chứng nghiêm trọng (như run, cứng cơ, chậm vận động, hoặc mất thăng bằng). Đây là các dấu hiệu đặc trưng của bệnh Parkinson. Hãy đến bác sĩ thần kinh ngay lập tức.";
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
        doc.text("Kết quả đánh giá Dấu hiệu bệnh Parkinson", 105, 30, {
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

        doc.save("ketqua-parkinson.pdf");
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