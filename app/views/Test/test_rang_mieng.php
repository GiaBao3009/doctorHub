<?php
// Include the initialization file
require_once '../../../config/init.php';
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bài Test Sức khỏe răng miệng - DoctorHub</title>
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
            <h1 class="test-title">Bài Test Sức khỏe răng miệng</h1>
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
            question: "Bạn có bị đau răng hoặc nhạy cảm khi ăn đồ nóng, lạnh, hoặc ngọt không?",
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
            question: "Bạn có bị chảy máu nướu khi đánh răng hoặc dùng chỉ nha khoa không?",
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
            question: "Bạn có nhận thấy nướu của mình bị sưng, đỏ, hoặc đau không?",
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
            question: "Bạn có bị hôi miệng hoặc cảm thấy có mùi khó chịu trong miệng không?",
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
            question: "Bạn có thấy răng của mình bị đổi màu, ố vàng, hoặc có mảng bám không?",
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
            question: "Bạn có nhận thấy răng của mình bị lung lay hoặc lỏng không?",
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
            question: "Bạn có bị sâu răng hoặc lỗ hổng trên răng không?",
            options: [{
                    text: "Không",
                    score: 0
                },
                {
                    text: "Có 1-2 răng",
                    score: 1
                },
                {
                    text: "Có vài răng",
                    score: 2
                },
                {
                    text: "Nhiều răng",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có bị đau hàm hoặc khó khăn khi nhai thức ăn không?",
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
            question: "Bạn có bị loét miệng, nhiệt miệng, hoặc tổn thương trong miệng không?",
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
            question: "Bạn có cảm thấy khô miệng hoặc thiếu nước bọt không?",
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
            question: "Bạn có bị đau hoặc nhạy cảm ở vùng quanh chân răng không?",
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
            question: "Bạn có thường xuyên đánh răng ít nhất 2 lần mỗi ngày không?",
            options: [{
                    text: "Có, đều đặn",
                    score: 0
                },
                {
                    text: "Thỉnh thoảng bỏ lỡ",
                    score: 1
                },
                {
                    text: "Hiếm khi",
                    score: 2
                },
                {
                    text: "Hầu như không",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có sử dụng chỉ nha khoa hoặc nước súc miệng thường xuyên không?",
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
        },
        {
            question: "Bạn có hút thuốc lá hoặc sử dụng các sản phẩm thuốc lá không?",
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
                    text: "Hàng ngày",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có tiêu thụ nhiều đồ ngọt hoặc đồ uống có đường không?",
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
                    text: "Hàng ngày",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có đi khám nha sĩ định kỳ (ít nhất 6 tháng/lần) không?",
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
        },
        {
            question: "Bạn có tiền sử gia đình mắc các bệnh răng miệng (viêm nướu, sâu răng) không?",
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
            question: "Bạn có bị bệnh tiểu đường hoặc các bệnh ảnh hưởng đến răng miệng không?",
            options: [{
                    text: "Không",
                    score: 0
                },
                {
                    text: "Có thể",
                    score: 1
                },
                {
                    text: "Đã được chẩn đoán",
                    score: 2
                },
                {
                    text: "Đang điều trị",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có nhận thấy răng của mình bị mòn hoặc nứt không?",
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
            question: "Bạn có bị đau khi cắn hoặc nhai thức ăn cứng không?",
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
            question: "Bạn có cảm thấy hơi thở của mình có mùi kim loại hoặc bất thường không?",
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

        // Kiểm tra các triệu chứng nghiêm trọng
        const criticalSymptoms = [5, 6, 7, 10]; // Câu hỏi về răng lung lay, sâu răng, đau hàm, đau quanh chân răng
        const hasCriticalSymptom = criticalSymptoms.some(index => answers[index] >= 2);

        if (totalScore <= 10) {
            resultMessage = "Sức khỏe răng miệng của bạn có vẻ ổn. Hãy duy trì thói quen vệ sinh răng miệng tốt.";
        } else if (totalScore <= 20) {
            resultMessage =
                "Bạn có một số dấu hiệu nhẹ về vấn đề răng miệng. Hãy cải thiện thói quen vệ sinh và cân nhắc thăm nha sĩ.";
        } else if (totalScore <= 30) {
            resultMessage =
                "Bạn có nhiều triệu chứng đáng lo ngại về sức khỏe răng miệng. Hãy đến nha sĩ để được kiểm tra và điều trị.";
        } else {
            resultMessage =
                "Bạn có nguy cơ cao gặp vấn đề nghiêm trọng về răng miệng. Hãy đến nha sĩ ngay để được đánh giá và điều trị.";
        }

        if (hasCriticalSymptom) {
            resultMessage +=
                "\n\nCẢNH BÁO: Bạn có các triệu chứng nghiêm trọng (như răng lung lay, sâu răng, hoặc đau nặng). Đây có thể là dấu hiệu của bệnh lý răng miệng nghiêm trọng. Hãy đến nha sĩ ngay lập tức.";
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
        doc.text("Kết quả đánh giá Sức khỏe răng miệng", 105, 30, {
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

        doc.save("ketqua-rangmieng.pdf");
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